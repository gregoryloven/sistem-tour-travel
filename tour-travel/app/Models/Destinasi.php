<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasis';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->hasMany(DaftarPaket::class, 'destinasi_id', 'id');
    }
}
