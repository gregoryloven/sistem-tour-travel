<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\Destinasi;
use App\Models\ObjekWisata;
use App\Models\TipeHarga;
use App\Models\LamaHari;
use App\Models\IncludeItem;
use App\Models\WhatBring;
use App\Models\GeneralTerm;
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
        $data2 = ObjekWisata::all();
        $lamahari = LamaHari::all();
        $includeitem = IncludeItem::all();
        $whatbring = WhatBring::all();
        $generalterm = GeneralTerm::all();

        return view('daftar_paket.create',compact('data','data2','lamahari','includeitem','whatbring','generalterm'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // $jsonData = json_encode($request->get('data'));
        // return $request->get('data');
        // $jsonCheck = json_encode($request->get('check'));

        $data = new DaftarPaket();
        $data->destinasi_id = $request->get('destinasi_id');
        $data->objekwisata_data = $request->get('data');
        $data->nama = $request->get("nama");
        $data->overview = $request->get("overview");
        $data->lama_hari = $request->get("lama_hari");
        $data->include = $request->get('include');
        $data->what_bring = $request->get('what_bring');
        $data->general_term = $request->get('general_term');
        // $data->include = $request->get('check');
        // $data->what_bring = $request->get("what_bring");

        $file=$request->file('gambar');
        $imgFolder = 'gambar/';
        $extension = $request->file('gambar')->extension();
        $imgFile=time()."_".$request->get('nama').".".$extension;
        $file->move($imgFolder,$imgFile);
        $data->gambar=$imgFile;

        $file2=$request->file('gambar2');
        if(isset($file2))
        {
            $imgFolder2 = 'gambar/';
            $extension2 = $request->file('gambar2')->extension();
            $imgFile2=time()."_".$request->get('nama').".".$extension2;
            $file2->move($imgFolder2,$imgFile2);
            $data->gambar2=$imgFile2;
        }

        $file3=$request->file('gambar3');
        if(isset($file3))
        {
            $imgFolder3 = 'gambar/';
            $extension3 = $request->file('gambar3')->extension();
            $imgFile3=time()."_".$request->get('nama').".".$extension3;
            $file3->move($imgFolder3,$imgFile3);
            $data->gambar3=$imgFile3;
        }

        $file4=$request->file('gambar4');
        if(isset($file4))
        {
            $imgFolder4 = 'gambar/';
            $extension4 = $request->file('gambar4')->extension();
            $imgFile4=time()."_".$request->get('nama').".".$extension4;
            $file4->move($imgFolder4,$imgFile4);
            $data->gambar4=$imgFile4;
        }

        $file5=$request->file('gambar5');
        if(isset($file5))
        {
            $imgFolder5 = 'gambar/';
            $extension5 = $request->file('gambar5')->extension();
            $imgFile5=time()."_".$request->get('nama').".".$extension5;
            $file5->move($imgFolder5,$imgFile5);
            $data->gambar5=$imgFile5;
        }

        $data->save();

        if($request->get("tipe_harga") == 1)
        {
            $data2 = new TipeHarga();
            $data2->daftarpaket_id = $data->id;
            $data2->tipe = $request->get("tipe_harga");
            $data2->min_pax = $request->get("min_pax");
            $data2->harga = $request->get("harga_min_pax");

            $data2->save();
        }
        else
        {
            $array = explode("," , $request->get("pax_person"));
            $array2 = explode("," , $request->get("harga_pax"));

            foreach($array as $i => $key)
            {
                $data2 = new TipeHarga();
                $data2->daftarpaket_id = $data->id;
                $data2->tipe = $request->get("tipe_harga");

                $data2->pax_person = $array[$i];
                $data2->harga = $array2[$i];

                $data2->save();
            }           
        }

        return response()->json(array(
            'status'=>'success'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = DaftarPaket::where('id', $request->id)->get();
        $data2 = TipeHarga::where('daftarpaket_id', $request->id)->get(); 

        $id = DaftarPaket::where('id', $request->id)->first();
        $a = explode("," , $id->objekwisata_data);
        $arrayhasil = array();

        //untuk what bring
        $dataArray = explode("," , $id->what_bring);

        //untuk include
        $dataArray2 = explode("," , $id->include);

        //untuk general term
        $dataArray3 = explode("," , $id->general_term);

        foreach($a as $t)
        {
            $hasil = ObjekWisata::where('id', $t)->first();
            $arrayhasil[] = $hasil->nama;

        }

        return view('daftar_paket.detail',compact('data','data2','dataArray','arrayhasil', 'dataArray2', 'dataArray3'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $data = DaftarPaket::leftjoin('tipe_hargas', 'daftar_pakets.id', '=', 'tipe_hargas.daftarpaket_id')->find($request->id);
        $destinasi = Destinasi::all();
        $objekwisata = ObjekWisata::all();
        $objekwisata_data = explode(',', $data->objekwisata_data);
        $lamahari = LamaHari::all();
        $tipeharga = TipeHarga::where('daftarpaket_id', $request->id)->get();
        $include = IncludeItem::all();
        $include_data = explode(',', $data->include);
        $whatbring = WhatBring::all();
        $whatbring_data = explode(',', $data->what_bring);
        $generalterm = GeneralTerm::all();
        $generalterm_data = explode(',', $data->general_term);

        return view('daftar_paket.edit', compact('data','destinasi','objekwisata','objekwisata_data','lamahari','tipeharga','include','include_data','whatbring','whatbring_data','generalterm','generalterm_data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        //Mengubah data string dipisahkan oleh koma menjadi array 
       $array = explode(",", $request->get("pax_person"));
       $array2 = explode(",", $request->get("data_upd"));


        //Mengubah isi array menjadi int
       $integerArray = array_map('intval', $array);
       $integerArray2 = array_map('intval', $array2);

        //Menggabungkan kedua array
       $gabung = array_merge($integerArray2, $integerArray);

    //    return $gabung;
  
    return response()->json(array(
        'status'=>'success'
    ));
 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = DaftarPaket::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('daftar-paket.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('daftar-paket.index')->with('error', 'Gagal Menghapus Data');    
        }
    }
}
