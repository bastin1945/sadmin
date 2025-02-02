<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\konser;

class JelajahiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $konsers = konser::whereHas('tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })->with([
                    'tiket' => function ($query) {
                        $query->where('jenis_tiket', 'Regular');
                    }
                ])->get();


        // $konsers = Konser::all(); // Ambil semua data konser dari database
        return view('jelajahi.index', compact('konsers'));

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
