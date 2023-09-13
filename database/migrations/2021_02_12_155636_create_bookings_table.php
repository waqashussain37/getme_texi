<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('journey_type');
            $table->unsignedInteger('vehicle_id');
            $table->text('pick_up_location');
            $table->text('drop_off_location');
            $table->date('pick_up_date');
            $table->time('pick_up_time');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('payment_id')->nullable();
            $table->unsignedInteger('driver_id')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->boolean('has_failed')->default(false);
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
        Schema::dropIfExists('bookings');
    }
}
