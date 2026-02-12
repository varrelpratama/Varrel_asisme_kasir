@extends('layouts.app')

@section('content')
    <div class="text-center">
        <h1>Selamat Datang {{ auth()->user()->name }} di Kasir Pro</h1>
    </div>
@endsection
