<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id(); // id pengajuan
            $table->foreignId('karyawan_id')->constrained('employees')->onDelete('cascade');
            $table->string('nama_karyawan');
            $table->string('departemen');
            $table->string('jabatan');
            $table->enum('tipe_pengajuan', ['sakit', 'izin', 'cuti', 'peningkatan gaji', 'pengunduran diri']);
            $table->date('tanggal_pengajuan');
            $table->string('dokumen')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('requests');
    }
};
