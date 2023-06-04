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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('Name');
            $table->string('Admin_ID');
            $table->string('Matric_ID')->Cpnstrained()->cascadeOnDelete();
            $table->string('Name');
            $table->string('Staff_ID');
            $table->string('Gender');
            $table->string('Email');
            $table->string('Phone_Number');
            $table->string('Staff_ID');
            $table->date('DateEnter');
            $table->integer('Year');
            $table->string('program');
            $table->string('Role');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
