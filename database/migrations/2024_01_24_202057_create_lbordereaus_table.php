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
        Schema::create('lbordereaus', function (Blueprint $table) {
            $table->id();
            $table->char('prix');
            $table->char('quantite');
            $table->string('nom');
            $table->unsignedBigInteger('bordereau_id');
            $table->unsignedBigInteger('colis_id');
            $table->foreign('bordereau_id')->references('id')->on('bordereaus')->onDelete('cascade');
            $table->foreign('colis_id')->references('id')->on('colis')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('lbordereaus');
    }
};
