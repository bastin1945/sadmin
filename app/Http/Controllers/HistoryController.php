<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = order::with(['tiket','promo','user',])->get();
        // dd($order->toArray());
        return view('history.index',compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }



    public function show($id)
    {
        $oder = Order::with(['tiket.konser.lokasi'])->findOrFail($id); // Ambil pesanan berdasarkan ID
        // dd($oder->toArray());
        return view('history.show', compact('oder'));
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
