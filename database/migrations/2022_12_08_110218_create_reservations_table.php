<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->nullable(false);
            $table->TinyInteger('number_of_people')->nullable(false);
            $table->date('checkin')->nullable(false);
            $table->date('checkout')->nullable(false);
            $table->float('price')->nullable(false);
            $table->enum('stay_type', ['pro', 'personal'])->nullable(false);
            $table->enum('status', ['cancelled', 'terminated', 'no-show', 'validated'])->nullable(false);
            $table->unique(["user_id", "checkin", "checkout"]);
            $table->index("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
