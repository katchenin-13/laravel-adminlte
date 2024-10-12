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
        Schema::create('livraisons', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('destinataire');
            $table->string('numerodes');
            $table->string('adresse_livraison');
            $table->timestamps();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->unsignedBigInteger('coursier_id');
            $table->foreign('coursier_id')->references('id')->on('coursiers')->onDelete('cascade');
            $table->unsignedBigInteger('statut_id');
            $table->foreign('statut_id')->references('id')->on('statuts')->onDelete('cascade');

        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livraisons');
    }
};
