<?php

namespace App\Http\Controllers\Admin;

use App\Models\promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function index()
    {
        $search = request()->get('search');
        $bulan = request()->get('bulan');
        $tahun = request()->get('tahun');
        $status_promo = request()->get('status_promo');
        $tanggal_mulai = request()->get('tanggal_mulai');
        $tanggal_berakhir = request()->get('tanggal_berakhir');

        $query = Promo::query();

        // Filter berdasarkan search
        if ($search) {
            $query->where('code_promo', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan bulan dan tahun
        if ($bulan && $tahun) {
            $query->whereMonth('tanggal_mulai', $bulan)
                ->whereYear('tanggal_mulai', $tahun);
        }

        // Filter berdasarkan tanggal mulai dan tanggal berakhir
        if ($tanggal_mulai) {
            $query->whereDate('tanggal_mulai', '>=', $tanggal_mulai);
        }
        if ($tanggal_berakhir) {
            $query->whereDate('tanggal_berakhir', '<=', $tanggal_berakhir);
        }

        // Filter berdasarkan status promo
        if ($status_promo) {
            $query->where('status_promo', $status_promo);
        }

        // Ambil promo yang sudah difilter
        $promo = $query->paginate(10)->withQueryString();

        return view('admin.promo.index', compact('promo'));
    }


    public function create()
    {
        return view('admin.promo.create');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'code_promo' => 'required|string|max:255',
            'nilai_diskon' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date',
            'status_promo' => 'required|string|max:255',
        ]);

        // Simpan data
        $promo = promo::create([
            'code_promo' => $request->code_promo,
            'nilai_diskon' => $request->nilai_diskon,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'status_promo' => $request->status_promo,
        ]);

        return redirect()->route('admin.promo.index')->with('success', 'Data berhasil disimpan!');
}

    public function edit($id)
    {
        $promo = promo::findOrFail($id);
        return view('admin.promo.edit', compact('promo'));
    }


    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'code_promo' => 'required|string|max:255',
        'nilai_diskon' => 'required|string|max:255',
        'tanggal_mulai' => 'required|date',
        'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
        'status_promo' => 'required|string|max:255',
    ], [
        'code_promo.required' => 'Kode promo tidak boleh kosong.',
        'nilai_diskon.required' => 'Nilai diskon tidak boleh kosong.',
        'tanggal_mulai.required' => 'Tanggal mulai tidak boleh kosong.',
        'tanggal_berakhir.required' => 'Tanggal berakhir tidak boleh kosong.',
        'tanggal_berakhir.after_or_equal' => 'Tanggal berakhir harus setelah atau sama dengan tanggal mulai.',
        'status_promo.required' => 'Status promo tidak boleh kosong.',
    ]);

    // Temukan data promo berdasarkan ID
    $promo = Promo::findOrFail($id);

    // Ambil semua data input
    $data = $request->only([
        'code_promo',
        'nilai_diskon',
        'tanggal_mulai',
        'tanggal_berakhir',
        'status_promo',
    ]);

    // Perbarui data promo
    $promo->update($data);

    return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil diperbarui.');
}


    public function destroy($id)
    {
        $promo = promo::findOrFail($id);
        // Hapus gambar jika ada
        if ($promo->image && Storage::disk('public')->exists($promo->image)) {
            Storage::disk('public')->delete($promo->image);
        }
        $promo->delete();


        return redirect()->route('admin.promo.index')->with('success', 'Data dihapus dan ID diurutkan ulang dengan sukses.');
    }
}
