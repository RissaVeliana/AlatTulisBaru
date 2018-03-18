<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelians', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jenis')->unsigned();
            $table->string('nama');
            $table->integer('stock');
            $table->integer('harga_asli');
            $table->integer('harga_jual');
            $table->integer('total');
            $table->integer('id_supplier');
            $table->date('tgl_pembelian');
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
        Schema::dropIfExists('pembelians');
    }
}
