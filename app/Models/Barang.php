<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'BarangID';
    protected $fillable = ['NamaBarang', 'Harga', 'Stok'];

    public function Penjualans()
    {
        return $this->hasMany(Penjualan::class, 'BarangID', 'BarangID');
    }
}
