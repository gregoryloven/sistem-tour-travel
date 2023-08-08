<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipeHarga extends Model
{
    use HasFactory;
    protected $table = 'tipe_hargas';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->belongsTo(DaftarPaket::class, 'daftarpaket_id');
    }
}
