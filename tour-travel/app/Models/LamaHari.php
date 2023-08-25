<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LamaHari extends Model
{
    use HasFactory;
    protected $table = 'lama_haris';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->hasMany(DaftarPaket::class, 'lamahari_id', 'id');
    }
}
