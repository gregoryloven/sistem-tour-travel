<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncludeItem extends Model
{
    use HasFactory;
    protected $table = 'includes';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->hasMany(DaftarPaket::class, 'include_id', 'id');
    }
}
