@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="mb-0">Edit Barang</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('barang.update', $barang->BarangID) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nama Barang</label>
                    <input type="text" name="NamaBarang" class="form-control" value="{{ $barang->NamaBarang }}" required>
                </div>
                <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="Harga" class="form-control" value="{{ $barang->Harga }}" required>
                </div>
                <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="Stok" class="form-control" value="{{ $barang->Stok }}" required>
                </div>
                <button type="submit" class="btn btn-dark">Update</button>
                <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
@endsection
