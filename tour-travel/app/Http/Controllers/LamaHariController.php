<?php

namespace App\Http\Controllers;

use App\Models\LamaHari;
use Illuminate\Http\Request;

class LamaHariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = LamaHari::all();
        return view('lama_hari.index', compact('data'));
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
        $data = new LamaHari();
        $data->day = $request->get('day');
        $data->night = $request->get('night');
        $data->save();

        return redirect()->route('lama-hari.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(LamaHari $lamaHari)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LamaHari $lamaHari)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = LamaHari::find($request->id);
        $data->day = $request->get('day');
        $data->night = $request->get('night');
        $data->save();

        return redirect()->route('lama-hari.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = LamaHari::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('lama-hari.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('lama-hari.index')->with('error', 'Gagal Menghapus Data Lama Hari');    
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = LamaHari::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('lama_hari.EditForm',compact('data'))->render()),200);
    }
}
