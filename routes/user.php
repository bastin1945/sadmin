<?php

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\LainyaController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HubungiController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\JelajahiController;


// Rute yang dapat diakses oleh semua user (guest dan login)
Route::get('/', [WelcomeController::class, 'index'])->name('/');

Route::get('/jelajahi', [JelajahiController::class, 'index'])->name('jelajahi');

Route::get('/dashboard', [FrontController::class, 'index'])->name('dashboard');

Route::get('/lainya', [LainyaController::class, 'index'])->name('lainya.index');

Route::get('/hubungi', [HubungiController::class, 'index'])->name('hubungi.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
    Route::resource('history',HistoryController::class);
    Route::get('/history/{id}', [HistoryController::class, 'show'])->name('history.show');

    Route::get('/orders', [HistoryController::class, 'index'])->name('orders.all');
    Route::get('/orders/pending', [HistoryController::class, 'pending'])->name('orders.pending');
    Route::get('/orders/completed', [HistoryController::class, 'completed'])->name('orders.completed');


Route::post('/review', [ReviewController::class, 'store'])->middleware('auth');

});

// Rute untuk melihat konser dan tiket (read-only)

Route::get('/konser/{konser}', [KonserController::class, 'show'])->name('konser.show');
Route::get('/tiket', [TiketController::class, 'index'])->name('tiket.index');
Route::get('/tiket/{tiket}', [TiketController::class, 'show'])->name('tiket.show');


// Route::get('/lainnya', function () {
//     return view('layouts.purchase.lainnya');
// })->name('lainnya');


Route::get('/detail', function () {
    return view('layouts.purchase.product');
})->name('detail');

Route::get('/product', [ProductController::class, 'index'])->name('product.index');
Route::get('/productbuy/{id}', [ProductController::class, 'buy'])->name('productbuy');
Route::resource('/product', ProductController::class);

Route::post('/apply-promo', [ProductController::class, 'applyPromo'])->name('apply.promo');
Route::post('/check-promo', [ProductController::class, 'checkPromo'])->name('check.promo');
Route::get('/lainya', [LainyaController::class, 'index'])->name('lainya.index');
Route::post('/apply-discount', [ProductController::class, 'applyDiscount']);
Route::post('/midtrans/token', [ProductController::class, 'getToken'])->name('midtrans.token');


Route::get('/buy-ticket', function () {
    return view('layouts.purchase.user-beli');
})->name('buy-ticket');

Route::get('/cek-promo', function (Request $request) {
    $promo = Promo::where('code_promo', $request->code)
        ->where('tanggal_mulai', '<=', now())
        ->where('tanggal_berakhir', '>=', now())
        ->where('status_promo', 'aktif')
        ->first();

    return response()->json([
        'diskon' => $promo ? $promo->nilai_diskon : 0,
        'jenis_diskon' => $promo ? $promo->jenis_diskon : null
    ]);
});
