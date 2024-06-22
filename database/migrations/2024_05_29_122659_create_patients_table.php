<?php

use App\Models\Sexe;
use App\Models\TypePopulation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('CodeUIC')->unique();
            $table->foreignIdFor(TypePopulation::class, "TypePopulation")->constrained("type_populations", "TypePopulation")->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('Sexe', Sexe::$SEXES);
            $table->date("DateNaissance");
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
