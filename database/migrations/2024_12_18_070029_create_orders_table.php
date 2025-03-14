<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->OnDelete('cascade');
            $table->foreignId('tiket_id')->constrained()->OnDelete('cascade');
            $table->integer('jumlah_tiket');
            $table->decimal('harga_total');
            $table->string('email');
            $table->integer('contact');
            $table->string('alamat');
            $table->string('kode_tiket')->unique();
            $table->enum('status_pembayaran',['pendding','lunas'])->default('pendding');
            $table->foreignId('promo_id')->nullable()->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
