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
        Schema::create('procedures_appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('procedure_id')->constrained('procedures');
            $table->foreignId('treatment_apppointment_id')->constrained('treatments_appointments');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procedures_appointments');
    }
};
