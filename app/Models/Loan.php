<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',   // siswa peminjam
        'buku_id',
        'borrowed_at',
        'due_at',
        'status',
        'user_id',      // petugas yang mencatat
    ];

    protected $casts = [
        'borrowed_at' => 'datetime',
        'due_at'      => 'datetime',
        // tambahkan jika ada kolom tanggal lain, misal 'returned_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function buku()
    {
        return $this->belongsTo(Buku::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // petugas yang mencatat peminjaman
    }
}
