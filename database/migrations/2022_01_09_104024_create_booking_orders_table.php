<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_orders', function (Blueprint $table) {
            // $table->id();
            $table->string('booking_id');
            $table->string('email_user');
            $table->foreign('email_user')->references('email')->on('users');
            $table->decimal('total_booking', 10, 2);
            $table->timestamp('booking_date');
            $table->string('no_meja');
            $table->enum('payment_status', ['capture','challenge','settlement','pending','deny','expire','cancel']);
            $table->enum('booking_status', ['pending','accept','queue','finish', 'expire', 'cancel', 'deny']);
            $table->string('snap_token')->nullable();
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
        Schema::dropIfExists('booking_orders');
    }
}
