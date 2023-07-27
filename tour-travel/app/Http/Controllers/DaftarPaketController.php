<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\Destinasi;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarPaket::all();
        
        return view('daftar_paket.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Destinasi::all();
        return view('daftar_paket.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $jsonData = json_encode($request->get('data'));

        $data = new DaftarPaket();
        $data->destinasi_id = $jsonData;
        $data->nama = $request->get("nama");
        $data->lama_hari = $request->get("lama_hari");
        $data->pax = $request->get("pax");
        $data->harga = $request->get("harga");

        // $data->save();

        return response()->json(array(
            'status'=>'success'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(DaftarPaket $daftarPaket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaftarPaket $daftarPaket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DaftarPaket $daftarPaket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaftarPaket $daftarPaket)
    {
        //
    }
}
