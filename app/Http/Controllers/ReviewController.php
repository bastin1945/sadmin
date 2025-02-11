<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'orderId' => 'required|integer|exists:orders,id',
            'comment' => 'required|string|max:255',
        ]);

        // Simpan review ke database
        Review::create([
            'order_id' => $request->orderId,
            'user_id' => Auth::id(), // Mendapatkan ID pengguna yang sedang login
            'comment' => $request->comment,
        ]);

        return response()->json(['success' => true]);
    }
}
