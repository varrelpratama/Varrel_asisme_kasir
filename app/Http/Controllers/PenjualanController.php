<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang;
use App\Models\DetailPenjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan') ->get();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $barang = Barang::where('Stok', '>', 0)->get();
        return view('penjualan.create', compact('pelanggans', 'barang'));
    }

    public function store(Request $request)
    {
        // 1. Validasi input dasar
        $request->validate([
            'PelangganID' => 'required',
            'barang' => 'required|array',
            'barang.*.BarangID' => 'required',
            'barang.*.JumlahBarang' => 'required|integer|min:1',
        ]);

        // 2. Cek stok tersedia
        foreach ($request->barang as $item) {
            $barang = Barang::find($item['BarangID']);

            if ($item['JumlahBarang'] > $barang->Stok) {
                return back()->withErrors([
                    'produk' => "Stok {$barang->NamaBarang} tidak cukup! Tersedia: {$barang->Stok}"
                ]);
            }
        }

        // 3. Hitung total harga
        $totalHarga = 0;
        foreach ($request->barang as $item) {
            $barang = Barang::find($item['BarangID']);
            $totalHarga += $barang->Harga * $item['JumlahBarang'];
        }

        // 4. Simpan penjualan
        $penjualan = Penjualan::create([
            'TanggalPenjualan' => now(),
            'TotalHarga' => $totalHarga,
            'PelangganID' => $request->PelangganID,
        ]);

        // 5. Simpan detail dan kurangi stok
        foreach ($request->barang as $item) {
            $barang = Barang::find($item['BarangID']);

            // Simpan detail penjualan
            DetailPenjualan::create([
                'PenjualanID' => $penjualan->PenjualanID,
                'BarangID' => $item['BarangID'],
                'JumlahBarang' => $item['JumlahBarang'],
                'HargaSatuan' => $barang->Harga,
                'SubTotal' => $barang->Harga * $item['JumlahBarang'],
            ]);

            // Kurangi stok
            $barang->Stok -= $item['JumlahBarang'];
            $barang->save();
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil!');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index')->with('success', 'Penjualan
berhasil dihapus!');
    }

    public function invoice($id)
    {
        $penjualan = Penjualan::with('pelanggan', 'detailPenjualans.barang')->findOrFail($id);
        return view('penjualan.invoice', compact('penjualan'));
    }
}
