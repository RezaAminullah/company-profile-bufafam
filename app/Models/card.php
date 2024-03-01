<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'card';

    protected $primaryKey = 'id'; // Mengubah parameter kunci primer menjadi 'id'

    public $incrementing = true; // Mengatur agar 'id' bertambah otomatis

    protected $fillable = [
        'judul',
        'slug',
        'deskripsi',
        'konten',
        'gambar',
    ];
}
