<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');

        if ($search) {
            // Mengambil data dari tabel views dan mencari nama konser yang berelasi
            $sales = sales::whereHas('konser', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%'); // Ganti 'name' sesuai dengan kolom di tabel konser
            })->get();
        } else {
            // Ambil semua data views jika tidak ada pencarian
            $sales = sales::all();
        }
        return view('admin.laris.index',compact('sales'));
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
