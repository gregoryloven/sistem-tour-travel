<?php

namespace App\Http\Controllers;

use App\Models\IncludeItem;
use Illuminate\Http\Request;

class IncludeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = IncludeItem::all();
        return view('include_item.index', compact('data'));
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
        $data = new IncludeItem();
        $data->include = $request->get('include');
        $data->save();

        return redirect()->route('include-item.index')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(IncludeItem $includeItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncludeItem $includeItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $data = IncludeItem::find($request->id);
        $data->include = $request->get('include');
        $data->save();

        return redirect()->route('include-item.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $data = IncludeItem::find($request->id);
    
        try
        {  
            $data->delete();
            return redirect()->route('include-item.index')->with('success', 'Data Berhasil Dihapus');
            
        }
        catch(\Exception $e)
        {
            return redirect()->route('include-item.index')->with('error', 'Gagal Menghapus Data');    
        }
    }

    public function EditForm(Request $request)
    {
        $id = $request->get("id");
        $data = IncludeItem::find($id);

        return response()->json(array(
            'status'=>'oke',
            'msg'=>view('include_item.EditForm',compact('data'))->render()),200);
    }
}
