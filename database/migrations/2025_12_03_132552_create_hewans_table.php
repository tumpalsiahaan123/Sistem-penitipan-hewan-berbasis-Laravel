<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hewans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // WAJIB
            $table->string('nama_pemilik', 100); // Kolom 1
            $table->string('nama_hewan', 100);   // Kolom 2
            $table->string('jenis_hewan', 50);   // Kolom 3
            $table->string('ras', 50)->nullable(); // Kolom 4
            $table->text('deskripsi_kesehatan')->nullable(); // Opsional
            $table->date('tanggal_masuk');       // Opsional
            $table->date('tanggal_keluar')->nullable(); // Opsional
            $table->enum('status', ['dititipkan', 'diambil', 'dirawat'])->default('dititipkan'); // Opsional
            $table->timestamps(); // WAJIB
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('hewans');
    }
};