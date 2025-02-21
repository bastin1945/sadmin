<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil status dari input (sekarang hanya satu nilai, bukan array)
        $status = $request->input('status');

        // Ambil pesanan untuk pengguna yang terautentikasi
        $orders = Order::with(['tiket', 'promo', 'user'])
            ->where('user_id', Auth::id()) // Filter berdasarkan user yang login
            ->orderBy('created_at', 'desc'); // Mengurutkan dari terbaru ke terlama

        // Tambahkan filter berdasarkan status jika ada yang dipilih
        if (!empty($status)) {
            $orders->where('status_pembayaran', $status);
        }

        // Ambil data pesanan dengan pagination
        $order = $orders->paginate(3); // Ganti 10 dengan jumlah yang diinginkan per halaman

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
        // Validasi input
        $request->validate([
            'comment' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Maksimal 2MB jika ada foto
        ]);

        // Menyimpan file jika ada
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('uploads/reviews', 'public'); // Simpan di storage/app/public/uploads/reviews
        }

        // Simpan data ke database
        Review::create([
            'order_id' => $request->order_id, // Pastikan order_id ada dalam request
            'user_id' => auth::id(), // Menggunakan ID pengguna yang sedang login
            'comment' => $request->comment,
            'photo' => $photoPath,
        ]);

        return redirect()->route('history.index');
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
