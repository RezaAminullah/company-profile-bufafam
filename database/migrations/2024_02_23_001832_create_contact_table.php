<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('emailperusahaan');
            $table->string('notelperusahaan', 20); // Menambahkan batasan panjang
            $table->string('alamatperusahaan');
            $table->string('namacp1');
            $table->string('nocp1', 20); // Menambahkan batasan panjang
            $table->string('namacp2');
            $table->string('nocp2', 20); // Menambahkan batasan panjang
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
