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
    Schema::create('bills', function (Blueprint $table) {
        $table->id();

        $table->foreignId('patient_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->foreignId('treatment_plan_id')
              ->nullable()
              ->constrained()
              ->nullOnDelete();

        $table->decimal('total_amount', 10, 2)->default(0);

        $table->enum('status', ['pending', 'paid', 'partially_paid'])
              ->default('pending');

        $table->text('notes')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
