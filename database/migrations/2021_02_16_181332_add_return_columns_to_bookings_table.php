<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddReturnColumnsToBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->text('return_pick_up_location')->nullable();
            $table->date('return_pick_up_date')->nullable();
            $table->time('return_pick_up_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('return_pick_up_location');
            $table->dropColumn('return_pick_up_date');
            $table->dropColumn('return_pick_up_time');
        });
    }
}
