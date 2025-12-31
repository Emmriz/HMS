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
    Schema::create('vitals', function (Blueprint $table) {
        $table->id();

        $table->foreignId('consultation_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->decimal('temperature', 5, 2)->nullable(); // °C
        $table->string('blood_pressure')->nullable();     // 120/80
        $table->integer('pulse_rate')->nullable();         // bpm
        $table->decimal('weight', 5, 2)->nullable();       // kg
        $table->decimal('height', 5, 2)->nullable();       // cm

        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vitals');
    }
};
