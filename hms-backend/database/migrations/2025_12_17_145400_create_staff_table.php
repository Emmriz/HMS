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
    Schema::create('staff', function (Blueprint $table) {
        $table->id();

        $table->foreignId('user_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('department_id')
            ->constrained()
            ->restrictOnDelete();

        $table->string('staff_number')->unique();
        $table->string('first_name');
        $table->string('last_name');
        $table->string('phone')->nullable();

        $table->enum('gender', ['male', 'female', 'other']);
        $table->date('date_of_birth')->nullable();

        $table->enum('employment_type', ['full_time', 'contract', 'intern']);
        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
