<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $primaryKey = 'PenjualanID';
    protected $fillable = ['TanggalPenjualan', 'TotalHarga', 'PelangganID'];
    protected $casts = ['TanggalPenjualan' => 'date'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'PelangganID', 'PelangganID');
    }

    public function detailPenjualans()
    {
        return $this->hasMany(DetailPenjualan::class, 'PenjualanID', 'PenjualanID');
    }
}
