<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;
    protected $table = 'destinasis';
    protected $primaryKey = 'id';

    public function destinasi()
    {
    	return $this->hasMany(destinasi::class, 'paket_id', 'id');
    }
}
