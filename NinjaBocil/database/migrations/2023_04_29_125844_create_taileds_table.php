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
        Schema::create('taileds', function (Blueprint $table) {
            $table->id();
            $table->string('foto_tailed', 255);
            $table->string('nama_tailed', 255);
            $table->string('slug_tailed', 255);
            $table->unsignedBigInteger('skill_1_tailed');
            $table->unsignedBigInteger('skill_2_tailed');
            $table->unsignedBigInteger('skill_3_tailed');
            $table->unsignedBigInteger('skill_4_tailed');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('skill_1_tailed')->references('id')->on('skills');
            $table->foreign('skill_2_tailed')->references('id')->on('skills');
            $table->foreign('skill_3_tailed')->references('id')->on('skills');
            $table->foreign('skill_4_tailed')->references('id')->on('skills');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taileds');
    }
};
