<?php

use App\Models\User;
use App\Models\Patient;
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
        Schema::create('assoc_agent_patients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class, "Patient")->nullable()->constrained("patients", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignIdFor(User::class, "Agent")->nullable()->constrained("users", "id")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assoc_agent_patients');
    }
};
