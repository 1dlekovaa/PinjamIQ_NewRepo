<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    // Menentukan nama tabel jika tidak mengikuti konvensi default
    protected $table = 'bukus';

    // Field yang boleh diisi (mass assignment)
    protected $fillable = [
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'kategori',
        'stok',
    ];

    public function loans()
{
    return $this->hasMany(Loan::class);
}
}
