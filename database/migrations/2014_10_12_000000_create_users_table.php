<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('gender', ['Madame', 'Monsieur'])->nullable();;
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            //$table->timestamp('email_verified_at')->nullable(); // TODO - enable ?
            $table->string('phone')->nullable();
            $table->string('avatar_url')->nullable();
            $table->string('password')->nullable(); // TODO - Remplacer le password par son hash
            $table->json('personal_address')->nullable();
            $table->string('enterprise_name')->nullable();;
            $table->json('professional_address')->nullable();;
            $table->enum('role', ['Customer', 'Admin'])->default('Customer');
            $table->rememberToken(); // TODO - Ask if this line is compulsory there and in the CustomerFactory
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
