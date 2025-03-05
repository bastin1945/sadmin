<?php

namespace App\Http\Controllers\Admin;

use App\Models\views;
use App\Models\konser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\is_recommended;
use App\Models\sales;
use GuzzleHttp\Promise\Create;

class ViewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');

        if ($search) {
            // Mengambil data dari tabel views dan mencari nama konser yang berelasi
            $populer = Views::whereHas('konser', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%'); // Ganti 'name' sesuai dengan kolom di tabel konser
            })->get();
        } else {
            // Ambil semua data views jika tidak ada pencarian
            $populer = Views::all();
        }

        return view('admin.populer.index', compact('populer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($web)
    {
        if ($web == "populer") {
            $dataKonser = konser::all();
            return view('admin.populer.create',compact('dataKonser')); // Buat tampilan untuk form tambah
        } else if ($web == "laris") {
            $dataKonser = konser::all();
            return view('admin.laris.create',compact('dataKonser'));
        } else {
            $dataKonser = konser::all();
            return view('admin.recommend.create', compact('dataKonser'));
        }
    }

    public function store(Request $request,$web)
    {
        if($web == "populer"){


            $request->validate([
                'konser_id' => 'required|string|max:255|unique:views,konser_id',
                // Tambahkan validasi lain sesuai kebutuhan
            ]);

            // Membuat entri baru untuk konser
            views::create(['konser_id' => $request->konser_id

            ]);

            return redirect()->route('admin.populer.index')->with('success', 'Data konser berhasil ditambahkan.');
        }else if($web == "laris"){
            $request->validate([
                'konser_id' => 'required|string|max:255|unique:sales,konser_id',
                // Tambahkan validasi lain sesuai kebutuhan
            ]);

            // Membuat entri baru untuk konser
            sales::create(['konser_id' => $request->konser_id

            ]);

            return redirect()->route('admin.laris.index')->with('success', 'Data konser berhasil ditambahkan.');

        } else{
            $request->validate([
                'konser_id' => 'required|string|max:255|unique:is_recommendeds,konser_id',
                // Tambahkan validasi lain sesuai kebutuhan
            ]);

            // Membuat entri baru untuk konser
            is_recommended::create(['konser_id' => $request->konser_id

            ]);

            return redirect()->route('admin.recommend.index')->with('success', 'Data konser berhasil ditambahkan.');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

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
    /**
     * Remove the specified resource from storage.
     */
    public function populers(string $id)
    {
        $view = views::findOrFail($id);
        $view->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus.');
    }
    public function sales(string $id)
    {
        // dd($id);
        $pop = sales::findOrFail($id);
        $pop->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus.');
    }
    public function rekomend(string $id)
    {
        $view = is_recommended::findOrFail($id);
        $view->delete();

        return redirect()->back()->with('success', 'Item berhasil dihapus.');
    }
}
