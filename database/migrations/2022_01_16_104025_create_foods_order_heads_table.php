<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsOrderHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_order_heads', function (Blueprint $table) {
            $table->string('order_id');
            $table->string('email_user');
            $table->foreign('email_user')->references('email')->on('users');
            $table->enum('jenis', ['satu_kota', 'beda_kota']);
            $table->string('provinsi')->nullable();
            $table->string('kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('jasa_kirim');
            $table->string('estimasi');
            $table->integer('kode_pos');
            $table->integer('harga_ongkir');
            $table->string('alamat_rumah');
            $table->string('no_hp');
            $table->integer('total');
            $table->string('no_resi')->default('-');
            $table->timestamp('order_at');
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
        Schema::dropIfExists('foods_order_heads');
    }
}
