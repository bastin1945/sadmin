<?php

namespace App\Http\Controllers;

use App\Models\tiket;
use Exception;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tiket = tiket::get();
        return view('tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tiket.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{

    $validatedData = $request->validate([
        'konser_id' => 'required|exists:konser,id',
        'jenis_tiket' => 'required|string|max:255',
        'harga_tiket' => 'required|integer|min:0',
        'jumlah_tiket' => 'required|integer|min:0',
    ]);

    $tiket = new Tiket();
    $tiket->konser_id = $validatedData['konser_id'];
    $tiket->jenis_tiket = $validatedData['jenis_tiket'];
    $tiket->harga_tiket = $validatedData['harga_tiket'];
    $tiket->jumlah_tiket = $validatedData['jumlah_tiket'];
    $tiket->save();

    return redirect()->route('tiket.index')->with('success', 'Tiket created successfully');
}


    /**
     * Display the specified resource.
     */
    public function show(tiket $tiket)
    {
        return view('tiket.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tiket $tiket)
    {
        return view('tiket.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tiket $tiket)
{

    $validatedData = $request->validate([
        'konser_id' => 'required|exists:konser,id',
        'jenis_tiket' => 'required|string|max:255',
        'harga_tiket' => 'required|integer|min:0',
        'jumlah_tiket' => 'required|integer|min:0',
    ]);


    $tiket->update($validatedData);

    return redirect()->route('tiket.index')->with('success', 'Tiket updated successfully');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tiket $tiket)
    {
    try{
        $tiket->delete();
        return redirect()->back()->with('success','deleted');
    }catch(Exception){
        return redirect()->back()->with('Error', ['Data cannot be deleted due to an error']);
    }
    }
}
