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
    Schema::create('admissions', function (Blueprint $table) {
        $table->id();

        $table->foreignId('patient_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('ward_id')
            ->constrained()
            ->restrictOnDelete();

        $table->foreignId('bed_id')
            ->constrained()
            ->restrictOnDelete();

        $table->foreignId('admitted_by_staff_id')
            ->constrained('staff')
            ->restrictOnDelete();

        $table->dateTime('admission_date');
        $table->dateTime('discharge_date')->nullable();

        $table->text('reason')->nullable();
        $table->enum('status', ['admitted', 'discharged'])->default('admitted');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissions');
    }
};
