<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $primaryKey = 'id'; // Mengubah parameter kunci primer menjadi 'id'

    public $incrementing = true; // Mengatur agar 'id' bertambah otomatis

    protected $fillable = [
        'judul',
        'slug',
        'content',
        'gambar',
    ];

    // Jika Anda ingin menambahkan custom logic atau metode di sini, Anda dapat melakukannya
}
