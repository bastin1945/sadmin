<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tiket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\konser;

class TiketController extends Controller
{
    public function index()
    {
        $search = request()->input('search');
        $jenis_tiket = request()->input('jenis_tiket');
        $harga_tiket = request()->input('harga_tiket');
        $status_tiket = request()->input('status_tiket');

        $query = Tiket::with('konser');

        if ($search) {
            $query->whereHas('konser', function ($query) use ($search) {
                $query->where('nama', 'like', '%' . $search . '%');
            })->orWhere('konser_id', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan jenis tiket
        if ($jenis_tiket) {
            $query->where('jenis_tiket', $jenis_tiket);
        }

        // Filter berdasarkan harga tiket
        if ($harga_tiket) {
            $query->where('harga_tiket', '<=', $harga_tiket);
        }

        // Filter berdasarkan status tiket
        if ($status_tiket) {
            $query->where('status_tiket', $status_tiket);
        }

        // Ambil tiket yang sudah difilter
        $tiket = $query->paginate(10)->withQueryString();

        // Ambil data unik untuk dropdown
        $jenisTikets = Tiket::select('jenis_tiket')->distinct()->pluck('jenis_tiket');
        $statusTikets = Tiket::select('status_tiket')->distinct()->pluck('status_tiket');

        return view('admin.tiket.index', compact('tiket', 'jenisTikets', 'statusTikets'));
    }

    public function create()
    {
        $konser = konser::all();
        // dd($konser->toArray()); // Pastikan model `Konser` sesuai
        return view('admin.tiket.create', compact('konser'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'konser_id' => 'required|exists:konsers,id',
            'jenis_tiket' => 'required|string|max:255',
            'harga_tiket' => 'required|string|min:0',
            'jumlah_tiket' => 'required|integer|min:1',
            'status_tiket' => 'required|string|max:255',
        ]);

        $exists = Tiket::where('konser_id', $request->konser_id)
            ->where('jenis_tiket', $request->jenis_tiket)
            ->exists();

        if ($exists) {
            return back()->withErrors(['jenis_tiket' => 'Jenis tiket sudah ada untuk konser ini. Pilih jenis tiket lain.'])->withInput();
        }

        // Simpan data tiket
        Tiket::create([
            'konser_id' => $request->konser_id,
            'jenis_tiket' => $request->jenis_tiket,
            'harga_tiket' => $request->harga_tiket,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_tiket' => $request->status_tiket,
        ]);


        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        $konser = Konser::all();
        return view('admin.tiket.edit', compact('tiket', 'konser'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'konser_id' => 'required|exists:konsers,id',
            'jenis_tiket' => 'required|string|max:255',
            'harga_tiket' => 'required|string|min:0',
            'jumlah_tiket' => 'required|integer|min:1',
            'status_tiket' => 'required|string|max:255',
        ]);

        $tiket = Tiket::findOrFail($id);
        $tiket->update([
            'konser_id' => $request->konser_id,
            'jenis_tiket' => $request->jenis_tiket,
            'harga_tiket' => $request->harga_tiket,
            'jumlah_tiket' => $request->jumlah_tiket,
            'status_tiket' => $request->status_tiket,
        ]);

        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();
        return redirect()->route('admin.tiket.index')->with('success', 'Tiket berhasil dihapus.');
    }
}
