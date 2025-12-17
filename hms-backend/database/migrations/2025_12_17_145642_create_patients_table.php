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
    Schema::create('patients', function (Blueprint $table) {
        $table->id();

        $table->string('patient_number')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        $table->enum('gender', ['male', 'female', 'other']);
        $table->date('date_of_birth')->nullable();

        $table->text('address')->nullable();
        $table->enum('blood_group', ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'])->nullable();

        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
