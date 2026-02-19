@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Data Pelanggan</h2>
            <a href="{{ route('pelanggan.create') }}" class="btn btn-dark btn-sm">Tambah Pelanggan</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggans as $key => $pelanggan)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $pelanggan->NamaPelanggan }}</td>
                                <td>{{ $pelanggan->Alamat }}</td>
                                <td>{{ $pelanggan->NomorTelepon }}</td>
                                <td>
                                    <a href="{{ route('pelanggan.edit', $pelanggan->PelangganID) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('pelanggan.destroy', $pelanggan->PelangganID) }}" method="POST"
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
