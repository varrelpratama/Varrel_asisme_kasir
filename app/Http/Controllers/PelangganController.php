<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::all();

        return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
    {
        return view('pelanggan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaPelanggan' => 'required',
            'Alamat' => 'required',
            'NomorTelepon' => 'required|max:15',
        ]);

        Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan
berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NamaPelanggan' => 'required',
            'Alamat' => 'required',
            'NomorTelepon' => 'required|max:15',
        ]);

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan
berhasil diupdate!');
    }

    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan
berhasil dihapus!');
    }
}
