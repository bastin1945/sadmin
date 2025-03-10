<?php

namespace App\Http\Controllers;

use App\Models\is_recommended;
use view;
use App\Models\views;
use App\Models\konser;
use App\Models\lokasi;
use App\Models\sales;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     // Add this at the top of your controller

    public function index(Request $request)
    {
        // Ambil semua lokasi untuk dropdown
        $locations = lokasi::all();

        // Query filter berdasarkan input
        $populer = views::whereHas('konser.tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })
            ->when($request->name_konser, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->name_konser . '%');
                });
            })
            ->when($request->location_id, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('lokasi_id', $request->location_id);
                });
            })
            ->when($request->start && $request->end, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->whereBetween('tanggal', [$request->start, $request->end]);
                });
            })
            ->with([
                'konser' => function ($query) {
                    $query->with([
                        'tiket' => function ($query) {
                            $query->where('jenis_tiket', 'Regular');
                        }
                    ]);
                }
            ])
            ->paginate(3);

        $sales = sales::whereHas('konser.tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })
            ->when($request->name_konser, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->name_konser . '%');
                });
            })
            ->when($request->location_id, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('lokasi_id', $request->location_id);
                });
            })
            ->when($request->start && $request->end, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->whereBetween('tanggal', [$request->start, $request->end]);
                });
            })
            ->with([
                'konser' => function ($query) {
                    $query->with([
                        'tiket' => function ($query) {
                            $query->where('jenis_tiket', 'Regular');
                        }
                    ]);
                }
            ])
            ->paginate(3);

        $rekomend = is_recommended::whereHas('konser.tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })
            ->when($request->name_konser, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('nama', 'like', '%' . $request->name_konser . '%');
                });
            })
            ->when($request->location_id, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->where('lokasi_id', $request->location_id);
                });
            })
            ->when($request->start && $request->end, function ($query) use ($request) {
                $query->whereHas('konser', function ($q) use ($request) {
                    $q->whereBetween('tanggal', [$request->start, $request->end]);
                });
            })
            ->with([
                'konser' => function ($query) {
                    $query->with([
                        'tiket' => function ($query) {
                            $query->where('jenis_tiket', 'Regular');
                        }
                    ]);
                }
            ])
            ->paginate(3);




        return view('dashboard', compact('locations', 'populer', 'sales', 'rekomend'));
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
        return view('product.index');
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
