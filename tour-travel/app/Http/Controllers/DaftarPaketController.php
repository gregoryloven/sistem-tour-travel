<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\Destinasi;
use App\Models\TipeHarga;
use Illuminate\Http\Request;

class DaftarPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$data = DaftarPaket::join('destinasis', 'daftar_pakets.destinasi_id_salah', '=','destinasis.id')->get(['daftar_pakets.*', 'destinasis.*']);
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
        // $jsonData = json_encode($request->get('data'));
        // return $request->get('data');
        // $jsonCheck = json_encode($request->get('check'));

        $data = new DaftarPaket();
        $data->destinasi_data = $request->get('data');
        $data->nama = $request->get("nama");
        $data->lama_hari = $request->get("lama_hari");
        $data->included = $request->get('check');
        $data->whats_bring = $request->get("whats_bring");

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
            $array2 = explode(", " , $request->get("harga_pax"));

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
        $a = explode("," , $id->destinasi_data);
        $arrayhasil = array();

        //untuk whatsbring
        $dataArray = explode(", " , $id->whats_bring);

        //untuk included
        $dataArray2 = explode("," , $id->included);

        foreach($a as $t)
        {
            $hasil = Destinasi::where('id', $t)->first();
            $arrayhasil[] = $hasil->nama;

        }

        return view('daftar_paket.detail',compact('data','data2','dataArray','arrayhasil', 'dataArray2'));
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
