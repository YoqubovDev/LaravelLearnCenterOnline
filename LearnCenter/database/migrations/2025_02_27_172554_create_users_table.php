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

        Schema::create('users', function (Blueprint $table) {
            $table->id(); // unsignedBigInteger + auto_increment
            $table->string('full_name', 255);
            $table->string('phone_number', 255)->unique();
            $table->string('password', 255);
            $table->decimal('wallet', 10, 2)->default(0);
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->foreignId('role_id')->constrained(); // foreign key avtomatik
            $table->rememberToken();
            $table->timestamps(); // created_at va updated_at ni avtomatik qo‘shadi
        });

        Schema::enableForeignKeyConstraints();
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
