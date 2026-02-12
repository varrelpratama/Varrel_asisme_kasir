@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <!-- Header Faktur -->
                        <div class="text-center mb-4">
                            <h2 class="mb-0">FAKTUR PENJUALAN</h2>
                            <p class="text-muted mb-3">No. Faktur:
                                {{ str_pad($penjualan->PenjualanID, 6, '0', STR_PAD_LEFT) }}</p>
                        </div>

                        <hr>

                        <!-- Informasi Penjualan -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold">Informasi Penjualan:</h6>
                                <p class="mb-1"><strong>Tanggal:</strong>
                                    {{ $penjualan->TanggalPenjualan->format('d/m/Y H:i') }}</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold">Pelanggan:</h6>
                                <p class="mb-0">{{ $penjualan->pelanggan->NamaPelanggan }}</p>
                            </div>
                        </div>

                        <hr>

                        <!-- Tabel Detail Penjualan -->
                        <table class="table table-bordered table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Barang</th>
                                    <th class="text-end">Jumlah</th>
                                    <th class="text-end">Harga Satuan</th>
                                    <th class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan->detailPenjualans as $key => $detail)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $detail->barang->NamaBarang }}</td>
                                        <td class="text-end">{{ $detail->JumlahBarang }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->HargaSatuan, 0, ',', '.') }}</td>
                                        <td class="text-end">Rp {{ number_format($detail->SubTotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Total Harga -->
                        <div class="row mb-4">
                            <div class="col-md-6 offset-md-6">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h6 class="fw-bold">TOTAL HARGA:</h6>
                                        <h4 class="text-success">Rp {{ number_format($penjualan->TotalHarga, 0, ',', '.') }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Tombol Aksi -->
                        <div class="text-center mt-4">
                            <button onclick="window.print()" class="btn btn-primary me-2">
                                <i class="fas fa-print"></i> Cetak
                            </button>
                            <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .container {
                margin: 0;
                padding: 0;
            }

            .btn {
                display: none;
            }

            hr {
                border: 1px solid #000;
            }
        }
    </style>
@endsection
