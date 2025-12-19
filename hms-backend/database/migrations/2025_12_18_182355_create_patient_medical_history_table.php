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
    Schema::create('patient_medical_histories', function (Blueprint $table) {
        $table->id();

        $table->foreignId('patient_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('recorded_by_staff_id')
            ->constrained('staff')
            ->restrictOnDelete();

        $table->text('diagnosis');
        $table->text('treatment')->nullable();
        $table->text('notes')->nullable();
        $table->date('recorded_at');

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patient_medical_history');
    }
};
