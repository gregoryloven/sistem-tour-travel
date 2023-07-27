<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    protected $table = 'daftar_pakets';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->belongsTo(DaftarPaket::class, 'paket_id');
    }
}
