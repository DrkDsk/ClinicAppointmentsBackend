<?php

use App\Classes\BodyMeasures;
use App\Classes\Enum\HeightMeasureEnum;
use App\Classes\Enum\WeightMeasureEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('person_id')->constrained('people')->onDelete('cascade');
            $table->decimal('height', total: 5, places: 2)->nullable();
            $table->decimal('weight', 5, 2)->nullable();
            $table->enum('height_measure_type', BodyMeasures::heightMeasureTypes())->default(HeightMeasureEnum::CENTIMETER->value)->nullable();
            $table->enum('weight_measure_type', BodyMeasures::weightMeasureTypes())->default(WeightMeasureEnum::KILOGRAM->value)->nullable();
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
