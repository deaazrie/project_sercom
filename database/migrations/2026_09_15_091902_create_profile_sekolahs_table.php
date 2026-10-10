<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profil_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('kepala_sekolah');
            $table->string('foto_kepala_sekolah', 100)->nullable();
            $table->string('foto')->nullable();
            $table->string('logo')->nullable();
            $table->string('npsn');
            $table->text('alamat');
            $table->string('kontak', 15);
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->year('tahun_berdiri');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profil_sekolah');
    }
};
