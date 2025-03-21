<?php

namespace App\Http\Controllers\Admin;

use App\Models\lokasi;
use App\Models\konser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request()->input('search');
        if ($search) {
            // Menggunakan paginate untuk hasil pencarian
            $lokasi = Lokasi::where('location', 'like', '%' . $search . '%')
                ->orderBy('location', 'asc') // Pastikan hasil terurut
                ->paginate(10)->withQueryString(); // Pagination dengan 10 item per halaman
        } else {
            // Menggunakan paginate untuk semua lokasi
            $lokasi = Lokasi::with('konser')
                ->orderBy('location', 'asc')
                ->paginate(10); // Pagination dengan 10 item per halaman
        }

        return view('admin.lokasi.index', compact('lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $konser = konser::all();
        return view('admin.lokasi.create', compact('konser'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'location' => 'required|string|max:255|unique:lokasis,location'
        ]);

        lokasi::create([
            'location' => $request->location
        ]);

        return redirect()->route('admin.lokasi.index')->with('success', 'lokasi berhasil ditambahkan');
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
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);  // Ambil data berdasarkan ID
        return view('admin.lokasi.edit', compact('lokasi'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $lokasi = Lokasi::findOrFail($id);

        $lokasi->location = $request->input('location');

        if ($lokasi->save()) {
            return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
        } else {
            return back()->withErrors('Terjadi masalah saat menyimpan data.');
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('admin.lokasi.index')->with('success', 'Lokasi sukses dihapus.');
    }
}
