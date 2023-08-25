<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Destinasi::all();
        
        return view('destinasi.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = new Destinasi();
        $data->nama = $request->get('nama');
        $data->save();

        return redirect()->route('destinasi.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Destinasi $destinasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destinasi $destinasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = Destinasi::find($request->id);
        $data->nama = $request->get('nama');
        $data->save();

        return redirect()->route('destinasi.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = Destinasi::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('destinasi.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('destinasi.index')->with('error', 'Gagal Menghapus Data Destinasi');    
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = Destinasi::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('destinasi.EditForm',compact('data'))->render()),200);
    }
}
