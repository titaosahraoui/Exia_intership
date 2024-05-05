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
        Schema::create('condidature', function (Blueprint $table) {
            $table->id();
            $table->text('lettre_de_motivation');
            $table->string('cv_path');
            $table->date('date_de_soumission')->nullable();
            $table->string('etat')->default('pending');
            $table->foreignId('offre_stage_id')->constrained();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('condidature');
    }
};
