<?php

use App\Models\RelationElicitation;
use App\Models\Sexe;
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
        Schema::create('elicitations', function (Blueprint $table) {
            $table->id();
            $table->string('CodeElicitation', 255)->unique();
            $table->foreignIdFor(\App\Models\Patient::class, "PatientIndex")->nullable()->constrained("patients", "id")->cascadeOnUpdate()->restrictOnDelete();
            $table->string('CodeUICIndex')->nullable();
            $table->date('DateNaissance');
            $table->enum('Sexe', Sexe::$SEXES);
            $table->foreignIdFor(RelationElicitation::class, "CodeRelation")->nullable()->constrained("relation_elicitations", "CodeRelation")->cascadeOnUpdate()->restrictOnDelete();
            // $table->string("CodeRelation", 100)->constrainted('relation_elicitations', 'CodeRelation')->onDelete('cascade');
            $table->boolean('isTested')->default(false);
            $table->string('TestingCode', 255)->nullable();
            $table->string('Result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elicitations');
    }
};
