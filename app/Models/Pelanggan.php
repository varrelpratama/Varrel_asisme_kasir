<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $primaryKey = 'PelangganID';

    protected $fillable = ['NamaPelanggan', 'Alamat', 'NomorTelepon'];

    public function penjualans()
    {
        return $this->hasMany(Penjualan::class, 'PelangganID', 'PelangganID');
    }
}
