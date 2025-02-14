<?php

namespace App\Http\Controllers\Admin;

use App\Models\views;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $populer = views::whereHas('konser.tiket', function ($query) {
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
        return view('admin.populer.index',compact('populer'));
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
