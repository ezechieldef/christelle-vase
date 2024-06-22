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

        //         Code UIC
        // Date de visite
        // Régime actuel
        // Nombre de TAR dispensé
        // Date du prochain RDV ARV

        Schema::create('rdv_a_r_v_s', function (Blueprint $table) {

            $table->enum('Sexe', ['Masculin', 'Feminin', 'Autre']);


            $table->id();
            $table->foreignIdFor(\App\Models\Patient::class, "Patient")->nullable()->constrained("patients", "id")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('CodeUIC');
            $table->foreignIdFor(TypePopulation::class, "TypePopulation")->constrained("type_populations", "TypePopulation")->cascadeOnUpdate()->restrictOnDelete();
            $table->enum('Sexe', Sexe::$SEXES);

            $table->date("DateNaissance");
            $table->date('DateRDV');

            $table->date('DateVisite');
            $table->string('RegimeActuel')->nullable();
            $table->double('NombreTarDispense')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rdv_a_r_v_s');
    }
};
