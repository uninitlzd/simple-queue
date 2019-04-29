<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unit_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('doctor_id');
            $table->bigInteger('unit_id');
            $table->unsignedTinyInteger('day');
            $table->unsignedInteger('queue_quota');
            $table->time('open_at');
            $table->time('closed_at');
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
        Schema::dropIfExists('unit_schedules');
    }
}
