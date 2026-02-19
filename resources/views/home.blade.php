@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card shadow-sm w-75">
            <div class="card-body text-center">
                <h1>Selamat Datang {{ auth()->user()->name }} di Kasir Pro</h1>
            </div>
        </div>
    </div>
@endsection
