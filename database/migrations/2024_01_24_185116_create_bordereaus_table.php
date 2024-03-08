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
        Schema::create('bordereaus', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('nom_des');
            $table->unsignedBigInteger('coursier_id');
            $table->foreign('coursier_id')->references('id')->on('coursiers')->onDelete('cascade');
            $table->timestamps();

        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bordereaus');
    }
};
