<?php

namespace App\Http\Controllers;

use App\Models\konser;
use Illuminate\Http\Request;
use App\Models\lokasi;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // Add this at the top of your controller

    public function index(Request $request)
    {
        $query = $request->input('query'); // Get the search query
        $location = $request->input('location'); // Get the selected location
        $startDate = $request->input('start'); // Get the start date
        $endDate = $request->input('end'); // Get the end date

        // Fetch locations for the dropdown
        $locations = lokasi::all(); // Fetch all locations

        // Start the query for konsers
        $konsers = konser::whereHas('tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })->with([
                    'tiket' => function ($query) {
                        $query->where('jenis_tiket', 'Regular');
                    }
                ]);

        // Apply filters based on user input
        if ($query) {
            $konsers->where('nama', 'like', '%' . $query . '%');
        }

        if ($location && $location !== 'Pilih Lokasi') {
            $konsers->whereHas('lokasi', function ($q) use ($location) {
                $q->where('location', $location);
            });
        }

        if ($startDate) {
            $konsers->where('tanggal', '>=', $startDate);
        }

        if ($endDate) {
            $konsers->where('tanggal', '<=', $endDate);
        }

        $konsers = $konsers->paginate(3);

        

        return view('dashboard', compact('konsers', 'locations')); // Pass locations to the view
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
        return view('product.index');
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
