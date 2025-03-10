<?php

namespace App\Http\Controllers\Admin;

use App\Models\order;
use App\Models\tiket;
use App\Models\Konser;
use App\Models\lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class KonserController extends Controller
{



    public function index(Request $request)
    {
        $search = request()->input('search');
        $lokasi_id = request()->input('lokasi_id'); // Ambil input lokasi
        $tanggal = $request->input('tanggal');
        // Ambil semua lokasi untuk dropdown
        $lokasis = Lokasi::all(); // Pastikan Anda mengambil data lokasi

        // Query dasar untuk konser
        $konsers = Konser::with('lokasi'); // Mengambil konser dengan relasi lokasi

        // Pencarian berdasarkan nama konser
        if ($search) {
            $konsers->where('nama', 'like', '%' . $search . '%');
        }

        // Filter berdasarkan lokasi jika ada input dari user
        if ($lokasi_id) {
            $konsers->where('lokasi_id', $lokasi_id);
        }

        if ($tanggal) {
            $konsers->whereDate('tanggal', $tanggal);
        }

        // Ambil data konser yang sudah difilter
        $konsers = $konsers->paginate(10)->withQueryString();



        return view('admin.konser.index', compact('konsers', 'lokasis')); // Kirimkan $lokasis ke view
    }

    public function create()
    {
        $lokasi = lokasi::all();
        return view('admin.konser.create',compact('lokasi'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255|unique:konsers,nama',
            'deskripsi' => 'required|string|max:1000',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'tanggal_penukaran' => 'required|date',
            'lokasi_penukaran' => 'required',// Ubah validasi jam
            'lokasi_id' => 'required|exists:lokasis,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ], [

            'nama.required' => 'Nama tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'tanggal.required' => 'Tanggal tidak boleh kosong',
            'jam.required' => 'Jam tidak boleh kosong',
            'jam.date_format' => 'Jam harus dalam format H:i',
            'lokasi.required' => 'Lokasi tidak boleh kosong',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'image.max' => 'Ukuran gambar maksimal 2MB',
        ]);


        $path = $request->file('image') ? $request->file('image')->store('images', 'public') : null;


        Konser::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'jam' => $request->jam,
            'tanggal_penukaran' => $request->tanggal_penukaran,
            'lokasi_penukaran' => $request->lokasi_penukaran,
            'lokasi_id' => $request->lokasi_id,
            'image' => $path,
        ]);


        return redirect()->route('admin.konser.index')->with('success', 'Konser berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // return redirect()->route('admin.konser.edit');
        $konser = Konser::findOrFail($id);
        // dd($konser->toArray());
        $lokasi = Lokasi::all();
        return view('admin.konser.edit', compact('konser', 'lokasi'));
    }


    public function detail(string $id){
        $konser = Konser::findOrFail($id);
        return view('admin.konser.detail', compact('konser'));
    }

    public function update(Request $request, $id)
{

    $request->validate([
        'nama' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:1000',
        'tanggal' => 'required|date',
        'jam' => 'required', // Ubah validasi jam
        'lokasi_id' => 'required|string|max:255',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ], [
        'nama.required' => 'Nama tidak boleh kosong',
        'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        'tanggal.required' => 'Tanggal tidak boleh kosong',
        'jam.required' => 'Jam tidak boleh kosong',
        'jam.date_format' => 'Jam harus dalam format H:i',
        'lokasi.required' => 'Lokasi tidak boleh kosong',
        'image.image' => 'File harus berupa gambar',
        'image.mimes' => 'Format gambar harus jpeg, png, atau jpg',
        'image.max' => 'Ukuran gambar maksimal 2MB',
    ]);


    $konser = Konser::findOrFail($id);


    $data = $request->all();


    if ($request->hasFile('image')) {

        if ($konser->image && Storage::disk('public')->exists($konser->image)) {
            Storage::disk('public')->delete($konser->image);
        }


        $path = $request->file('image')->store('images', 'public');
        $data['image'] = $path;
    }


    $konser->update([
        'nama' => $data['nama'],
        'deskripsi' => $data['deskripsi'],
        'tanggal' => $data['tanggal'],
        'jam' => $data['jam'],
        'lokasi_id' => $data['lokasi_id'],
        'image' => $data['image'] ?? $konser->image,
    ]);


    return redirect()->route('admin.konser.index')->with('success', 'Konser berhasil diperbarui.');
}


    public function destroy($id)
    {
        $konser = Konser::findOrFail($id);

        // Periksa jika ada pesanan terkait
        $relatedOrders = order::whereIn('tiket_id', tiket::where('konser_id', $konser->id)->pluck('id'))->exists();

        if ($relatedOrders) {
            // Kirim notifikasi jika ada data yang terkait
            return redirect()->route('admin.konser.index')->with('error', 'Tidak dapat menghapus konser, karena ada pesanan terkait.');
        }

        // Hapus gambar jika ada
        if ($konser->image && Storage::disk('public')->exists($konser->image)) {
            Storage::disk('public')->delete($konser->image);
        }

        // Hapus konser
        $konser->delete();

        return redirect()->route('admin.konser.index')->with('success', 'Konser berhasil dihapus.');
    }
}
