<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bahan_pangans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->string('kategori')->nullable();
            $table->string('satuan');
            $table->decimal('harga', 12, 2);
            $table->decimal('stok', 12, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bahan_pangans');
    }
};
