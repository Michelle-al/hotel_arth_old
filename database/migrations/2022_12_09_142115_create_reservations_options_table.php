<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations_options', function (Blueprint $table) {
            $table->integer('reservation_id')->nullable(false);
            $table->foreign('reservation_id')->references('id')->on('reservations');
            $table->integer('option_id')->nullable(false);
            $table->foreign('option_id')->references('id')->on('options');

            $table->unique(['reservation_id', 'option_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations_options');
    }
}
