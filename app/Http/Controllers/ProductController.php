<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\Promo;
use App\Models\tiket;
use App\Models\konser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('product.index');
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
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'tiket_id' => 'required|exists:tikets,id',
            'jumlah_tiket' => 'required|integer|min:1',
            'harga_total' => 'required|numeric',
            'promo_id' => 'nullable|exists:promos,code_promo',
            'email' => 'required|email',
            'contact' => 'required',
            'alamat' => 'required',
        ]);

        $tiket = Tiket::find($request->tiket_id);
        $hargaTiket = $tiket->harga_tiket;
        $diskon = 0;

        if ($request->promo_id) {
            $promo = Promo::where('code_promo', $request->promo_id)
                ->where('status_promo', 'aktif')
                ->whereDate('tanggal_mulai', '<=', now())
                ->whereDate('tanggal_berakhir', '>=', now())
                ->first();

            if ($promo) {
                $diskon = ($promo->nilai_diskon / 100) * ($hargaTiket * $request->jumlah_tiket);
            }
        }

        $totalSetelahDiskon = ($hargaTiket * $request->jumlah_tiket) - $diskon;

        // Simpan data order
        $order = Order::create([
            'user_id' => Auth::id(),
            'tiket_id' => $request->tiket_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'harga_total' => $totalSetelahDiskon,
            'promo_id' => isset($promo) ? $promo->id : null,
            'email' => $request->email,
            'contact' => $request->contact,
            'alamat' => $request->alamat,
        ]);

        // Redirect dengan data order yang baru disimpan
        return redirect()->route('history.index')->with('success', [
            'total' => $order->harga_total,
            'jumlah_tiket' => $order->jumlah_tiket,
            'nama_tiket' => $tiket->nama_tiket,
            'diskon' => $diskon,
            'alamat' => $order->alamat,
            'contact' => $order->contact,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $konser = konser::with(['lokasi', 'tiket'])->whereHas('tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })->with([
                    'tiket' => function ($query) {
                        $query->where('jenis_tiket', 'Regular');
                    }
                ])->findOrFail($id);
        // dd($konser->toArray());
        return view('product.show', compact('konser'));
    }
    public function buy($id)
    {
        $konser = Konser::with('tiket')->findOrFail($id);


        //  dd($konser->toArray());
        return view('product.buy', compact('konser'));
    }



    public function applyPromo(Request $request)
    {
        // Validasi input
        $request->validate([
            'promo_code' => 'required|string',
            'harga_tiket' => 'required|numeric'
        ]);

        // Mencari promo yang valid
        $promo = Promo::where('code_promo', $request->promo_code)
            ->where('status_promo', 'aktif')
            ->whereDate('tanggal_mulai', '<=', now())
            ->whereDate('tanggal_berakhir', '>=', now())
            ->first();

        if ($promo) {
            // Hitung diskon
            $diskon = ($promo->nilai_diskon / 100) * $request->harga_tiket; // Jika nilai_diskon dalam persen
            $totalSetelahDiskon = $request->harga_tiket - $diskon;

            return response()->json([
                'success' => true,
                'message' => 'Kode promo berhasil digunakan!',
                'diskon' => $diskon,
                'total_setelah_diskon' => $totalSetelahDiskon
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Kode promo tidak valid atau sudah kadaluarsa!'
            ]);
        }
    }
}
