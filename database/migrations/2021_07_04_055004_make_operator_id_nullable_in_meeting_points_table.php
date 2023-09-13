<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeOperatorIdNullableInMeetingPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting_points', function (Blueprint $table) {
            $table->unsignedBigInteger('operator_id')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting_points', function (Blueprint $table) {
            $table->unsignedBigInteger('operator_id')->nullable(false)->change();
        });
    }
}
