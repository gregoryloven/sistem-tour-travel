<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\DaftarPaket;
use Illuminate\Http\Request;
use DB;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Destinasi::all();

        $countData = DB::table('daftar_pakets')
            ->select('destinasi_id', DB::raw('COUNT(destinasi_id) as destinasi_count'))
            ->groupBy('destinasi_id')
            ->get();

        return view('enduser.destination.index', compact('data','countData'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $detail = DaftarPaket::findOrFail($id);
        return view('enduser.destination.detail', compact('detail'));
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
    public function update(Request $request, Destinasi $destinasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destinasi $destinasi)
    {
        //
    }

    public function getTour($destinasi_id)
    {
        $tour = DaftarPaket::where('destinasi_id', $destinasi_id)->get();

        return view('enduser.destination.tour', compact('tour'));
    }

    public function selectTour(Request $request)
    {
        $tour = DaftarPaket::where('destinasi_id', $request->destination)->get();
        
        return view('enduser.destination.tour', compact('tour'));
    }
}
