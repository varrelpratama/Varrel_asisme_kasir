@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="mb-0">Tambah Pelanggan</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('pelanggan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Nama Pelanggan</label>
                    <input type="text" name="NamaPelanggan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="Alamat" class="form-control" required></textarea>
                </div>
                <div class="mb-3">
                    <label>Nomor Telepon</label>
                    <input type="text" name="NomorTelepon" class="form-control" maxlength="15" required>
                </div>
                <button type="submit" class="btn btn-dark">Simpan</button>
                <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
