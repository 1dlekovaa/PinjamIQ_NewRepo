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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();

            // Relasi ke siswa
            $table->foreignId('student_id')->constrained()->onDelete('cascade');

            // Relasi ke buku
            $table->foreignId('buku_id')->constrained('bukus')->onDelete('cascade');

            // Relasi ke user (petugas)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Informasi tanggal peminjaman
            $table->date('borrowed_at');         // Tanggal pinjam
            $table->date('due_at');              // Tanggal jatuh tempo
            $table->date('returned_at')->nullable(); // Tanggal kembali (jika sudah)

            // Status peminjaman (default: Belum Dikembalikan)
            $table->enum('status', ['Belum Dikembalikan', 'Sudah Dikembalikan'])->default('Belum Dikembalikan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
