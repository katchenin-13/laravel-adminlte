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
        Schema::create('coursiers', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('nom');
            $table->string('prenom');
            $table->string('numero_telephone');
            $table->string('numero_permis_conduire')->nullable();
            $table->string('plaque_immatriculation')->nullable();
            $table->string('cni');
            $table->string('email')->unique();
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id') ->on('zones')->onDelete('cascade');
            $table->unsignedBigInteger('vehicule_id');
            $table->foreign('vehicule_id')->references('id') ->on('vehicules')->onDelete('cascade');
            $table->unsignedBigInteger('employer_id');
            $table->foreign('employer_id')->references('id') ->on('employers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coursiers');
    }
};
