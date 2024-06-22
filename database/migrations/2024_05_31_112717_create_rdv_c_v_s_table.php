<?php

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
        // Code UIC
        // Date de prélèvement
        // Nombre de copies
        // Résultat CV
        // Prochaine Date de RDV de la Charge Virale

        Schema::create('rdv_c_v_s', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Patient::class, "Patient")->nullable()->constrained("patients", "id")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('CodeUIC');
            $table->foreignIdFor(TypePopulation::class, "TypePopulation")->constrained("type_populations", "TypePopulation")->cascadeOnUpdate()->restrictOnDelete();
            $table->string("Sexe", 20);
            $table->date("DateNaissance");
            $table->date('DateRDV');

            $table->date('DatePrelevement');
            $table->integer('NombreCopie');
            $table->string('ResultatCV');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdv_c_v_s');
    }
};
