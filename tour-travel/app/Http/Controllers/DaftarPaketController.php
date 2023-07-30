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
        $jsonData = json_encode($request->get('data'));
        $jsonCheck = json_encode($request->get('check'));

        $data = new DaftarPaket();
        $data->destinasi_data = $jsonData;
        $data->nama = $request->get("nama");
        $data->lama_hari = $request->get("lama_hari");
        $data->pax = $request->get("pax");
        $data->harga = $request->get("harga");
        $data->included = $jsonCheck;
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
            $imgFolder = 'gambar/';
            $extension = $request->file('gambar2')->extension();
            $imgFile=time()."_".$request->get('nama').".".$extension;
            $file2->move($imgFolder,$imgFile);
            $data->gambar2=$imgFile;
        }

        $file3=$request->file('gambar3');
        if(isset($file3))
        {
            $imgFolder = 'gambar/';
            $extension = $request->file('gambar3')->extension();
            $imgFile=time()."_".$request->get('nama').".".$extension;
            $file3->move($imgFolder,$imgFile);
            $data->gambar3=$imgFile;
        }

        $file4=$request->file('gambar4');
        if(isset($file4))
        {
            $imgFolder = 'gambar/';
            $extension = $request->file('gambar4')->extension();
            $imgFile=time()."_".$request->get('nama').".".$extension;
            $file4->move($imgFolder,$imgFile);
            $data->gambar4=$imgFile;
        }

        $file5=$request->file('gambar5');
        if(isset($file5))
        {
            $imgFolder = 'gambar/';
            $extension = $request->file('gambar5')->extension();
            $imgFile=time()."_".$request->get('nama').".".$extension;
            $file5->move($imgFolder,$imgFile);
            $data->gambar5=$imgFile;
        }

        $data->save();

        return response()->json(array(
            'status'=>'success'
        ));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $data = DaftarPaket::all();

        $dataFromDatabase = DaftarPaket::pluck('whats_bring')->toArray();
        $dataArray = explode(", ", implode("\n", $dataFromDatabase));

        $arrayid = [];
        $arraynama = [];

        // foreach ($data as $item) {
        //     $destinasiData = json_decode($item->destinasi_data, true);
        //     array_push($arrayid, $destinasiData);
            
        //     $namaDestinasi = Destinasi::whereIn('id', $arrayid)->pluck('nama')->toArray();
        //     // $arraynama[] = $namaDestinasi;
        //     return $namaDestinasi;

        //     // Gabungkan nama destinasi menggunakan bullets (daftar tanpa urutan)
        //     $item->nama_destinasi = implode('<br>&bull; ', $namaDestinasi);
        // }
        // return $arraynama;

        // foreach ($data as $item) {
        //     $destinasiData = json_decode($item->destinasi_data, true);
        
        //     // Validasi apakah $destinasiData berbentuk array
        //     if (is_array($destinasiData)) {
        //         // Ambil nama destinasi berdasarkan ID dari tabel destinasi
        //         $namaDestinasi = Destinasi::whereIn('id', $destinasiData)->pluck('nama')->toArray();
        
        //         // Gabungkan nama destinasi menggunakan bullets (daftar tanpa urutan)
        //         $item->nama_destinasi = implode('<br>&bull; ', $namaDestinasi);
        //     } else {
        //         // Jika $destinasiData bukan array, beri nilai default atau berikan pesan kesalahan sesuai kebutuhan Anda.
        //         $item->nama_destinasi = "Data destinasi tidak valid";
        //     }
        // }

        foreach ($data as $item) {
            $destinasiData = json_decode($item->destinasi_data, true);
        
            // Validasi apakah $destinasiData berbentuk array
            if (is_array($destinasiData)) {
                // Ambil nama destinasi berdasarkan ID dari tabel destinasi
                $namaDestinasi = Destinasi::whereIn('id', $destinasiData)->pluck('nama')->toArray();
        
                // Gabungkan nama destinasi menggunakan bullets (daftar tanpa urutan)
                $item->nama_destinasi = implode('<br>&bull; ', $namaDestinasi);
            } else {
                // Jika $destinasiData bukan array, beri nilai default atau berikan pesan kesalahan sesuai kebutuhan Anda.
                $item->nama_destinasi = "Data destinasi tidak valid";
            }
            dd($item->destinasi_data);
        }
       

        return view('daftar_paket.detail',compact('data','dataArray'));
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
