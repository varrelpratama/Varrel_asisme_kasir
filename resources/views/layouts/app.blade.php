<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir pro</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">Kasir pro</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                @auth
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('pelanggan.*') ? 'active' : '' }}"
                                href="{{ route('pelanggan.index') }}">Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('penjualan.*') ? 'active' : '' }}"
                                href="{{ route('penjualan.index') }}">Penjualan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                                href="{{ route('barang.index') }}">Barang</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <span class="nav-link">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="nav-link">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="container mt-4 flex-grow-1">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>

    <footer class="bg-light text-center py-3">
        <div class="container">
            <small>&copy; {{ date('Y') }} Varrel- Kasir pro. All rights reserved.</small>
        </div>
    </footer>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
