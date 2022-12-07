<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentationVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('presentation_videos', function (Blueprint $table) {
            $table->id()->nullable(false);
            $table->string('video_url')->nullable(false);
            $table->json('title')->nullable(false);
            $table->json('description')->nullable(false);
            $table->string('slug')->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('presentation_videos');
    }
}
