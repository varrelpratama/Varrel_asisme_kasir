@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="mb-0">Edit Pelanggan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.update', $pelanggan->PelangganID) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="NamaPelanggan" class="form-control" value="{{ $pelanggan->NamaPelanggan }}"
                        required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="Alamat" class="form-control" required>{{ $pelanggan->Alamat }}</textarea>
                </div>
                <div class="mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="NomorTelepon" class="form-control" value="{{ $pelanggan->NomorTelepon }}"
                        maxlength="15" required>
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
