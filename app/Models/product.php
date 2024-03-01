<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    public function cariProduct($id){
        $data = product::where('id',$id)->first();



        return $data;
    }

}
