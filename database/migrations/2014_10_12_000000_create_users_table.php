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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('admin_id');
            $table->string('matric_id')->Constrained()->cascadeOnDelete();
            $table->string('gender');
            $table->string('phone_number');
            $table->string('staff_id')->comment('for company purpose');
            $table->date('dateEnter');
            $table->integer('year');
            $table->string('program');
            $table->boolean('is_active');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
