<?php

namespace App\Http\Controllers\Admin;

use App\Models\order;
use App\Models\konser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $konser = Konser::all(); // Ambil semua data konser

        $query = Order::with('tiket', 'promo', 'user')->orderBy('created_at', 'desc');

        // Filter berdasarkan konser yang dipilih
        if ($request->has('konser') && $request->konser != '') {
            $query->whereHas('tiket', function ($q) use ($request) {
                $q->where('konser_id', $request->konser);
            });
        }

        // Filter berdasarkan pencarian
        if ($request->has('search') && $request->search != '') {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%');
            });
        }

        $order = $query->paginate(10);

        return view('admin.history.index', compact('order', 'konser'));
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
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = $request->validate([
            'status_pembayaran' => 'required',
        ]);

        $order->status_pembayaran = $validated['status_pembayaran'];
        $order->save();

        return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
