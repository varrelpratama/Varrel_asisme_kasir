@extends('layouts.app')

@section('content')
<h2>Edit barang</h2>

<form action="{{ route('barang.update', $barang->BarangID) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="NamaBarang" class="form-control" value="{{
$barang->NamaBarang }}" required>
    </div>
    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="Harga" class="form-control" value="{{ $barang ->Harga }}" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="Stok" class="form-control" value="{{ $barang ->Stok }}" required>
    </div>
    <button type="submit" class="btn btn-dark">Update</button>
    <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
