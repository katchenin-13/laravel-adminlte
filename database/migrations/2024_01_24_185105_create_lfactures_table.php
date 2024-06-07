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
        Schema::create('lfactures', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->char('numero');
            $table->char('quantite');
            $table->string('statut');
            $table->unsignedBigInteger('factures_id');
            $table->foreign('factures_id')->references('id')->on('factures')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('lfactures');
    }
};
