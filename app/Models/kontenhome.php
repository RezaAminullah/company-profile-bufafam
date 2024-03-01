<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kontenhome extends Model
{
    use HasFactory;

    protected $table = 'kontenhome';

    protected $fillable =[

        'judul',
        'deskripsi',
        'gambar',


    ];

}
