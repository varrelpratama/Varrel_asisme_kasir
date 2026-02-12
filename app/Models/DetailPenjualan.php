<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    protected $primaryKey = 'DetailPenjualanID';
    protected $fillable = ['PenjualanID', 'BarangID', 'JumlahBarang', 'HargaSatuan', 'SubTotal'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'PenjualanID', 'PenjualanID');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'BarangID', 'BarangID');
    }
}
