<?php

namespace App\Http\Controllers;

use App\Models\WhatBring;
use Illuminate\Http\Request;

class WhatBringController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WhatBring::all();
        return view('what_bring.index', compact('data'));
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
        $data = new WhatBring();
        $data->what_bring = $request->get('what_bring');
        $data->save();

        return redirect()->route('what-bring.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhatBring $whatBring)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhatBring $whatBring)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = WhatBring::find($request->id);
        $data->what_bring = $request->get('what_bring');
        $data->save();

        return redirect()->route('what-bring.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = WhatBring::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('what-bring.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('what-bring.index')->with('error', 'Gagal Menghapus Data');    
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = WhatBring::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('what_bring.EditForm',compact('data'))->render()),200);
    }
}
