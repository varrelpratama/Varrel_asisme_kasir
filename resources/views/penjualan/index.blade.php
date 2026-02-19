@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Data Penjualan</h2>
            <a href="{{ route('penjualan.create') }}" class="btn btn-dark btn-sm">Buat Penjualan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
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
                                    <a href="{{ route('penjualan.invoice', $penjualan->PenjualanID) }}"
                                        class="btn btn-info btn-sm me-2">Faktur</a>
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
            </div>
        </div>
    </div>
@endsection
