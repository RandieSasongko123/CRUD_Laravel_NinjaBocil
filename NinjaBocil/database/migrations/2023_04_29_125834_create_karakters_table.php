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
        Schema::create('karakters', function (Blueprint $table) {
            $table->id();
            $table->string('foto_karakter', 255);
            $table->string('background', 255);
            $table->string('nama_karakter', 100);
            $table->string('slug_karakter', 100);
            $table->string('grade_karakter', 100);
            $table->string('quality_karakter', 100);
            $table->string('chakra_karakter', 100);
            $table->string('tier_karakter', 50);
            $table->unsignedBigInteger('skill_1_karakter');
            $table->unsignedBigInteger('skill_2_karakter');
            $table->unsignedBigInteger('skill_3_karakter');
            $table->unsignedBigInteger('skill_4_karakter');
            $table->unsignedBigInteger('skill_5_karakter');
            $table->unsignedBigInteger('skill_6_karakter');
            $table->unsignedBigInteger('skill_7_karakter');
            $table->unsignedBigInteger('skill_8_karakter');
            $table->unsignedBigInteger('skill_9_karakter');
            $table->unsignedBigInteger('skill_10_karakter');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();


            $table->softDeletes();


            $table->foreign('skill_1_karakter')->references('id')->on('skills');
            $table->foreign('skill_2_karakter')->references('id')->on('skills');
            $table->foreign('skill_3_karakter')->references('id')->on('skills');
            $table->foreign('skill_4_karakter')->references('id')->on('skills');
            $table->foreign('skill_5_karakter')->references('id')->on('skills');
            $table->foreign('skill_6_karakter')->references('id')->on('skills');
            $table->foreign('skill_7_karakter')->references('id')->on('skills');
            $table->foreign('skill_8_karakter')->references('id')->on('skills');
            $table->foreign('skill_9_karakter')->references('id')->on('skills');
            $table->foreign('skill_10_karakter')->references('id')->on('skills');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karakters');
    }
};
