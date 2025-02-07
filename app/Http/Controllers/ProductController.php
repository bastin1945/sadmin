<?php

namespace App\Http\Controllers;

use user;
use Midtrans\Snap;
use App\Models\order;
use App\Models\Promo;
use App\Models\tiket;
use App\Models\konser;
use Illuminate\Http\Request;
use League\Flysystem\Config;
use Illuminate\Support\Facades\Auth;
use Exception;

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
            'promo_id' => 'nullable|exists:promos,code_promo',  // Validasi menggunakan kode promo
        ]);

        // Ambil harga tiket dari database
        $tiket = Tiket::find($request->tiket_id);
        $hargaTiket = $tiket->harga_tiket;

        // Jika ada kode promo, cari ID promo dan hitung diskon
        $diskon = 0;
        if ($request->promo_id) {
            $promo = Promo::where('code_promo', $request->promo_id)
                ->where('status_promo', 'aktif')
                ->whereDate('tanggal_mulai', '<=', now())
                ->whereDate('tanggal_berakhir', '>=', now())
                ->first();

            if ($promo) {
                // Hitung diskon berdasarkan nilai diskon promo (misal dalam persen)
                $diskon = ($promo->nilai_diskon / 100) * ($hargaTiket * $request->jumlah_tiket);
            }
        }

        // Hitung harga total setelah diskon
        $totalSetelahDiskon = ($hargaTiket * $request->jumlah_tiket) - $diskon;

        // Simpan data order
        Order::create([
            'user_id' => Auth::id(),
            'tiket_id' => $request->tiket_id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'harga_total' => $totalSetelahDiskon, // Simpan harga total setelah diskon
            'promo_id' => isset($promo) ? $promo->id : null,  // Simpan ID promo jika ada
        ]);

        return redirect()->route('history.index')->with('success', 'Pemesanan berhasil!');
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
    public function buy(Request $request, $id)
    {
        // Pastikan pengguna sudah login
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login untuk melanjutkan pembelian.');
        }

        $konser = Konser::with('tiket')->findOrFail($id);

        // Ambil promo aktif, misalnya hanya satu promo yang berlaku
        $promo = Promo::first(); // Atau gunakan kondisi lain untuk mendapatkan promo tertentu
        $totalHarga = 0;
        $jumlahTiket = $request->input('jumlah', 1); // Misalnya jumlah tiket yang dibeli
        $user = auth()->user();

        // Pastikan user tidak null
        $firstName = $user->name ?? 'Pengguna'; // Ganti dengan nilai default jika null
        $lastName = ''; // Jika tidak ada field untuk nama belakang, bisa dikosongkan atau diambil dari field lain
        $email = $user->email;

        // Inisialisasi persentase diskon
        $persentaseDiskon = 0;
        if ($promo) { // Pastikan ada promo
            $persentaseDiskon = $promo->nilai_diskon; // Ambil persentase diskon
        }

        foreach ($konser->tiket as $tiket) {
            // Hitung diskon berdasarkan persentase
            $diskon = ($tiket->harga_tiket * $persentaseDiskon) / 100; // Diskon dalam nilai
            $hargaSetelahDiskon = $tiket->harga_tiket - $diskon; // Hitung harga setelah diskon
            $totalHarga += max(0, $hargaSetelahDiskon) * $jumlahTiket; // Pastikan harga tidak negatif
        }

        // Tambahkan log untuk debug
        error_log('Total Harga Setelah Promo: ' . $totalHarga);

        // Pastikan totalHarga lebih besar dari 0.01
        if ($totalHarga < 0.01) {
            throw new Exception('Gross amount must be greater than or equal to 0.01');
        }

        // Set up Midtrans
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $totalHarga,
            ),
            'customer_details' => array(
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $email,
                'phone' => '08111222333',
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('product.buy', compact('konser', 'snapToken'));
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
