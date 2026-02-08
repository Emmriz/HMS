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
    Schema::create('lab_results', function (Blueprint $table) {
        $table->id();

        $table->foreignId('lab_request_id')
            ->constrained()
            ->cascadeOnDelete();

        $table->foreignId('recorded_by_staff_id')
            ->constrained('staff')
            ->restrictOnDelete(); // lab technician

        $table->text('result'); // numeric / text / observation
        $table->text('remarks')->nullable();

        $table->timestamp('reported_at')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lab_results');
    }
};
