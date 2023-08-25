<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralTerm extends Model
{
    use HasFactory;
    protected $table = 'general_terms';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->hasMany(DaftarPaket::class, 'generalterm_id', 'id');
    }
}
