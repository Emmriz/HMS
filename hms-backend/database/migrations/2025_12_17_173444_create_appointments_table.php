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
    Schema::create('appointments', function (Blueprint $table) {
        $table->id();

        // Patient linked to appointment
        $table->foreignId('patient_id')
            ->constrained()
            ->cascadeOnDelete();

        // Staff assigned to appointment (doctor/nurse)
        $table->foreignId('staff_id')
            ->constrained()
            ->restrictOnDelete();

        $table->dateTime('appointment_date');
        $table->enum('status', ['scheduled', 'completed', 'cancelled'])->default('scheduled');
        $table->text('notes')->nullable();

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
