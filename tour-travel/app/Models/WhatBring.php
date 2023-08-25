<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatBring extends Model
{
    use HasFactory;
    protected $table = 'what_brings';
    protected $primaryKey = 'id';

    public function daftar_paket()
    {
    	return $this->hasMany(DaftarPaket::class, 'whatbring_id', 'id');
    }
}
