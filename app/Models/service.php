<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class service extends Model
{
    use HasFactory;

    protected $table = 'service';

    protected $primaryKey = 'id'; // Mengubah parameter kunci primer menjadi 'id'

    public $incrementing = true; // Mengatur agar 'id' bertambah otomatis

    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'gambar',
    ];
}
