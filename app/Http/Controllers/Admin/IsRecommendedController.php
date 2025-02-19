<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\is_recommended;
use Illuminate\Http\Request;

class IsRecommendedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recommend = is_recommended::whereHas('konser.tiket', function ($query) {
            $query->where('jenis_tiket', 'Regular');
        })->with([
                    'konser' => function ($query) {
                        $query->with([
                            'tiket' => function ($query) {
                                $query->where('jenis_tiket', 'Regular');
                            }
                        ]);
                    }
                ])->get();
        return view('admin.recommend.index',compact('recommend'));
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
        //
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
