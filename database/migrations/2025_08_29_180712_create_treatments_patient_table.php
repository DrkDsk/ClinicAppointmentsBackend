<?php

use App\Classes\Const\TreatmentStatus;
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
        Schema::create('treatments_patient', function (Blueprint $table) {
            $table->id();
            $table->foreignId('treatment_id')->constrained('treatments');
            $table->foreignId('doctor_id')->constrained('doctors');
            $table->foreignId('patient_id')->constrained('patients');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', TreatmentStatus::all());
            $table->text('observations')->nullable();
            $table->integer('coast_total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments_patient');
    }
};
