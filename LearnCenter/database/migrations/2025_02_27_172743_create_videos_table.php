<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('videos', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('course_id');
            $table->foreign('course_id')->references('id')->on('courses');
            $table->string('title', 255);
            $table->string('video_url', 255);
            $table->timestamp('created_at')->nullable()->useCurrent();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
