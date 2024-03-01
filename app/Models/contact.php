<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contact';

    protected $fillable = [
        'emailperusahaan',
        'notelperusahaan',
        'alamatperusahaan',
        'namacp1',
        'nocp1',
        'namacp2',
        'nocp2',
    ];
}
