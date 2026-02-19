@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">
            <h2 class="mb-0">Buat Penjualan Baru</h2>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p class="mb-0">{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            <form action="{{ route('penjualan.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Pilih Pelanggan</label>
                    <select name="PelangganID" class="form-control" required>
                        <option value="">-- Pilih Pelanggan --</option>
                        @foreach ($pelanggans as $pelanggan)
                            <option value="{{ $pelanggan->PelangganID }}">{{ $pelanggan->NamaPelanggan }}</option>
                        @endforeach
                    </select>
                </div>
                <h4>Barang</h4>
                <div id="barang-container">
                    <div class="row mb-2 barang-item">
                        <div class="col-md-5">
                            <label>Barang</label>
                            <select name="barang[0][BarangID]" class="form-control barang-select" required>
                                <option value="">-- Pilih Barang --</option>
                                @foreach ($barang as $item)
                                    <option value="{{ $item->BarangID }}" data-stok="{{ $item->Stok }}">
                                        {{ $item->NamaBarang }} (Stok: {{ $item->Stok }})
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Jumlah</label>
                            <input type="number" name="barang[0][JumlahBarang]" class="form-control jumlah-input"
                                placeholder="Jumlah" min="1" required>
                            <small class="text-muted stok-info">Pilih barang dulu</small>
                        </div>
                        <div class="col-md-2">
                            <label>&nbsp;</label>
                            <button type="button" class="btn btn-danger d-block remove-barang">Hapus</button>
                        </div>
                    </div>
                </div>
                <button type="button" id="add-barang" class="btn btn-secondary mb-3">+ Tambah Barang</button>
                <br>
                <button type="submit" class="btn btn-dark">Simpan Penjualan</button>
                <a href="{{ route('penjualan.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let index = 1;

                // Data barang dari server (diproses saat page render)
                const barangList = @json($barang);

                // Update max jumlah berdasarkan stok
                function updateStok(selectElement) {
                    const row = selectElement.closest('.barang-item');
                    const jumlahInput = row.querySelector('.jumlah-input');
                    const stokInfo = row.querySelector('.stok-info');

                    const selectedOption = selectElement.selectedOptions[0];

                    if (selectedOption && selectedOption.value) {
                        const stok = selectedOption.getAttribute('data-stok');
                        jumlahInput.max = stok;
                        stokInfo.textContent = `Max: ${stok}`;
                        stokInfo.className = 'text-success stok-info';
                    } else {
                        jumlahInput.max = 0;
                        stokInfo.textContent = 'Pilih barang dulu';
                        stokInfo.className = 'text-muted stok-info';
                    }
                }

                // Event listener untuk perubahan barang
                document.addEventListener('change', function(e) {
                    if (e.target.classList.contains('barang-select')) {
                        updateStok(e.target);
                    }
                });

                // Generate options dari array barangList
                function generateBarangOptions() {
                    return barangList.map(barang =>
                        `<option value="${barang.BarangID}" data-stok="${barang.Stok}">`
                    ).join('');
                }

                // Tambah barang baru
                document.getElementById('add-barang').addEventListener('click',
                    function() {
                        const container = document.getElementById('barang-container');
                        const html = `
                <div class="row mb-2 barang-item">
                    <div class="col-md-5">
                        <label>Barang</label>
                        <select name="barang[${index}][BarangID]" class="form-control barang-select" required>
                            <option value="">-- Pilih barang --</option>
                            ${generateBarangOptions()}
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Jumlah</label>
                        <input type="number" name="barang[${index}][JumlahBarang]" class="form-control jumlah-input"                                placeholder="Jumlah" min="1" required>
                        <small class="text-muted stok-info">Pilih barang dulu</small>
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label>
                        <button type="button" class="btn btn-danger d-block remove-barang">Hapus</button>
                    </div>
                </div>
            `;
                        container.insertAdjacentHTML('beforeend', html);
                        index++;
                    });

                // Hapus barang
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-barang')) {
                        e.target.closest('.barang-item').remove();
                    }
                });
            });
        </script>
    @endpush
@endsection
