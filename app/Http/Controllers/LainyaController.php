<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\konser;
use App\Models\lokasi;
use Illuminate\Http\Request;

class LainyaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $city = $request->input('city'); // Lokasi yang dipilih
        $search = $request->input('search'); // Nama konser yang dicari
        $minPrice = $request->input('min_price'); // Minimum price
        $maxPrice = $request->input('max_price'); // Maximum price
        $date = $request->input('date'); // Tanggal

        // Start building the query
        $konsers = konser::with([
            'lokasi',
            'tiket' => function ($query) {
                $query->where('jenis_tiket', 'Regular'); // Filter hanya tiket Regular
            }
        ]);

        // Filter berdasarkan nama konser
        if ($search) {
            $konsers->where('nama', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan lokasi jika ada
        if ($city) {
            $konsers->whereHas('lokasi', function ($query) use ($city) {
                $query->where('location', $city);
            });
        }

        // Filter berdasarkan harga jika ada
        if ($minPrice) {
            $konsers->whereHas('tiket', function ($query) use ($minPrice) {
                $query->where('harga_tiket', '>=', $minPrice);
            });
        }

        if ($maxPrice) {
            $konsers->whereHas('tiket', function ($query) use ($maxPrice) {
                $query->where('harga_tiket', '<=', $maxPrice);
            });
        }

        // Filter berdasarkan tanggal jika ada
        if ($date) {
            $konsers->whereDate('tanggal', $date); // Pastikan 'tanggal' adalah nama kolom yang benar
        }

        // Sekarang paginate hasilnya
        $konsers = $konsers->paginate(6); // Sesuaikan angka sesuai preferensi Anda

        $locations = Lokasi::whereHas('konser')
            ->select('location')
            ->distinct()
            ->get();

        $isEmpty = $city && $konsers->isEmpty();

        return view('lainya.index', compact('konsers', 'locations', 'city', 'isEmpty'));
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
