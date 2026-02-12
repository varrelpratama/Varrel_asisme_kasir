@extends('layouts.app')

@section('content')
    <h2>Data Penjualan</h2>
    <a href="{{ route('penjualan.create') }}" class="btn btn-dark mb-3">Buat
        Penjualan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Pelanggan</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penjualans as $key => $penjualan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $penjualan->TanggalPenjualan->format('d/m/Y') }}</td>
                    <td>{{ $penjualan->pelanggan->NamaPelanggan }}</td>
                    <td>Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('penjualan.invoice', $penjualan->PenjualanID) }}" class="btn btn-info btn-sm me-2">
                            Faktur
                        </a>
                        <form action="{{ route('penjualan.destroy', $penjualan->PenjualanID) }}" method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
