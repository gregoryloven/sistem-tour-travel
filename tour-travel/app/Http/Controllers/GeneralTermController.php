<?php

namespace App\Http\Controllers;

use App\Models\GeneralTerm;
use Illuminate\Http\Request;

class GeneralTermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = GeneralTerm::all();
        return view('general_term.index', compact('data'));
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
        $data = new GeneralTerm();
        $data->general_term = $request->get('general_term');
        $data->save();

        return redirect()->route('general-term.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralTerm $generalTerm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralTerm $generalTerm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = GeneralTerm::find($request->id);
        $data->general_term = $request->get('general_term');
        $data->save();

        return redirect()->route('general-term.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = GeneralTerm::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('general-term.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('general-term.index')->with('error', 'Gagal Menghapus Data');    
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = GeneralTerm::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('general_term.EditForm',compact('data'))->render()),200);
    }
}
