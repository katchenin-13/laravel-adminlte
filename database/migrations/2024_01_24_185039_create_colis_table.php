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
        Schema::create('colis', function (Blueprint $table) {
            $table->id();
            $table->string('categorie');
            // $table->unsignedBigInteger('livraison_id');
            // $table->foreign('livraison_id')->references('id')->on('livraisons')->onDelete('cascade');
            $table->timestamps();
        });

        // Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('colis', function (Blueprint $table) {
        //     $table->foreignId('livraison_id');

        // });
        Schema::dropIfExists('colis');
    }
};
