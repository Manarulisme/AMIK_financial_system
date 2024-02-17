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
        Schema::create('rekening_banks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bank');
            $table->string('nama_bank');
            $table->string('kcp');
            $table->string('nama_pemilik');
            $table->string('no_rek');
            $table->string('alamat');
            $table->string('foto_rek')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekening_banks');
    }
};
