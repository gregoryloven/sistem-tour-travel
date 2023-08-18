<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DaftarPaket extends Model
{
    use HasFactory;
    protected $table = 'daftar_pakets';
    protected $primaryKey = 'id';

    public function objek_wisata()
    {
    	return $this->belongsTo(ObjekWisata::class, 'objekwisata_id');
    }

    public function destinasi()
    {
    	return $this->belongsTo(Destinasi::class, 'destinasi_id');
    }

    public function lama_hari()
    {
    	return $this->belongsTo(LamaHari::class, 'lamahari_id');
    }

    public function include_item()
    {
    	return $this->belongsTo(IncludeItem::class, 'include_id');
    }

    public function what_bring()
    {
    	return $this->belongsTo(WhatBring::class, 'whatbring_id');
    }

    public function general_term()
    {
    	return $this->belongsTo(GeneralTerm::class, 'generalterm_id');
    }

    public function tipe_harga()
    {
    	return $this->hasMany(TipeHarga::class, 'daftarpaket_id', 'id');
    }

}
