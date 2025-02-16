<?php

namespace App\Http\Controllers\Admin;

use App\Models\order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $orders = Order::all();
    $totalTickets = $orders->sum('jumlah_tiket');
    $totalRevenue = $orders->sum('harga_total');

    // Menghitung pendapatan vendor dan website
    $vendorRevenue = $totalRevenue * 0.8; // 80% untuk vendor
    $websiteRevenue = $totalRevenue * 0.2; // 20% untuk website

    // Menghitung persentase pendapatan
    $vendorPercentage = $totalRevenue > 0 ? ($vendorRevenue / $totalRevenue) * 100 : 0; // 80%
    $websitePercentage = $totalRevenue > 0 ? ($websiteRevenue / $totalRevenue) * 100 : 0; // 20%

    $targetTickets = 1000; // contoh target
    $percentage = ($totalTickets / $targetTickets) * 100;

    // Menghitung total pengguna aktif berdasarkan 'created_at'
    $totalActiveUsers = User::where('created_at', '>=', now()->subDays(30))->count();

    // Menghitung persentase pengguna aktif
    $totalUsers = User::count();
    $activeUserPercentage = $totalUsers > 0 ? ($totalActiveUsers / $totalUsers) * 100 : 0;

    // Menghitung pengguna aktif per hari
    $activeUsers = [];
    for ($i = 0; $i < 7; $i++) {
        $date = now()->subDays($i)->format('Y-m-d');
        $count = User::whereDate('created_at', $date)->count();
        $activeUsers[] = $count;
    }

    // Membalik array agar mulai dari hari Senin
    $activeUsers = array_reverse($activeUsers);

    // Ambil data penjualan per hari
    $salesData = Order::selectRaw('DATE(created_at) as date, SUM(jumlah_tiket) as total_tickets')
        ->groupBy('date')
        ->orderBy('date', 'desc')
        ->limit(4)
        ->get();

    // Menyiapkan data untuk grafik
    $dates = $salesData->pluck('date')->toArray();
    $totals = $salesData->pluck('total_tickets')->toArray();

    // Menghitung pendapatan bulanan
    $monthlyRevenue = Order::selectRaw('MONTH(created_at) as month, SUM(harga_total) as total_revenue')
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Menyiapkan data untuk grafik pendapatan bulanan
    $revenueData = array_fill(0, 12, 0);
    foreach ($monthlyRevenue as $revenue) {
        $revenueData[$revenue->month - 1] = $revenue->total_revenue;
    }

    return view('admin.dashboard', compact(
        'revenueData',
        'dates',
        'totals',
        'activeUsers',
        'totalActiveUsers',
        'totalTickets',
        'percentage',
        'totalRevenue',
        'vendorRevenue', // Tambahkan pendapatan vendor
        'websiteRevenue', // Tambahkan pendapatan website
        'vendorPercentage', // Tambahkan persentase pendapatan vendor
        'websitePercentage' // Tambahkan persentase pendapatan website
    ));
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
