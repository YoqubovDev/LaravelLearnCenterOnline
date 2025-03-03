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

        Schema::create('courses', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->string('title', 255);
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->integer('teacher_id');
            $table->foreign('teacher_id')->references('id')->on('users');
            $table->timestamp('created_at')->nullable()->useCurrent();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
