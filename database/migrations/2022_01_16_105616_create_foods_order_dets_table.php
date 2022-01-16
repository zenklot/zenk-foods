<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsOrderDetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods_order_dets', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('image')->nullable();
            $table->string('nama_menu');
            $table->string('catatan')->nullable();
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('sub_total');
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
        Schema::dropIfExists('foods_order_dets');
    }
}
