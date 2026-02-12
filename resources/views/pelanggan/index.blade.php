@extends('layouts.app')

@section('content')
<h2>Data Pelanggan</h2>
<a href="{{ route('pelanggan.create') }}" class="btn btn-dark mb-3">Tambah
Pelanggan</a>

<table class="table table-bordered">
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
        @foreach($pelanggans as $key => $pelanggan)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $pelanggan->NamaPelanggan }}</td>
            <td>{{ $pelanggan->Alamat }}</td>
            <td>{{ $pelanggan->NomorTelepon }}</td>
            <td>
                <a href="{{ route('pelanggan.edit', $pelanggan->PelangganID) }}"
class="btn btn-warning btn-sm">Edit</a>
                <form action="{{ route('pelanggan.destroy', $pelanggan ->PelangganID) }}" method="POST" style="display:inline;">
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
