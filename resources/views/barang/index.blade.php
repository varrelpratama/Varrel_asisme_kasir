@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Data Barang</h2>
            <a href="{{ route('barang.create') }}" class="btn btn-dark btn-sm">Tambah Barang</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $key => $barang)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $barang->NamaBarang }}</td>
                                <td>Rp {{ number_format($barang->Harga, 0, ',', '.') }}</td>
                                <td>{{ $barang->Stok }}</td>
                                <td>
                                    <a href="{{ route('barang.edit', $barang->BarangID) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->BarangID) }}" method="POST"
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
