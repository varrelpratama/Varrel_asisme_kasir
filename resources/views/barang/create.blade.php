@extends('layouts.app')

@section('content')
<h2>Tambah Barang</h2>

<form action="{{ route('barang.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="NamaBarang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="Harga" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="Stok" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-dark">Simpan</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
