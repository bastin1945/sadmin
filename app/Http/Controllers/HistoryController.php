<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with(['tiket', 'promo', 'user'])
            ->where('user_id', Auth::id()) // Filter data berdasarkan user login
            ->orderBy('created_at', 'desc') // Mengurutkan data dari terbaru ke terlama
            ->get();
        // dd($order->toArray());
        return view('history.index', compact('order'));
    }


    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->status_pembayaran = $request->status_pembayaran;
        $order->save();

        return response()->json(['success' => true]);
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
        $oder = Order::with('tiket')->findOrFail($id); // Ambil pesanan berdasarkan ID
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
