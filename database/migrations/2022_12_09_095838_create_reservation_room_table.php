<?php

use App\Models\Reservation;
use App\Models\Rooms;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_room', function (Blueprint $table) {

            $table->integer('reservation_id')->nullable(false);
            $table->foreign('reservation_id')->references('id')->on('reservations');

            $table->integer('room_number')->nullable(false);
            $table->foreign('room_number')->references('room_number')->on('rooms');

            $table->unique(['reservation_id', 'room_number']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_room');
    }
}
