@extends('layouts.app')

@section('content')
<h2>Edit Pelanggan</h2>

<form action="{{ route('pelanggan.update', $pelanggan->PelangganID) }}"
method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Pelanggan</label>
        <input type="text" name="NamaPelanggan" class="form-control" value="{{
$pelanggan->NamaPelanggan }}" required>
    </div>
    <div class="mb-3">
        <label>Alamat</label>
        <textarea name="Alamat" class="form-control" required>{{ $pelanggan ->Alamat }}</textarea>
    </div>
    <div class="mb-3">
        <label>Nomor Telepon</label>
        <input type="text" name="NomorTelepon" class="form-control" value="{{
$pelanggan->NomorTelepon }}" maxlength="15" required>
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
