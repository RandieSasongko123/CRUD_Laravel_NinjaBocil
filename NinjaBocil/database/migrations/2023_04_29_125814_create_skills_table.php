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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('fotoskill', 255);
            $table->string('nama_skill', 255);
            $table->string('slug_skill', 255);
            $table->string('grade_skill', 255);
            $table->string('damage_skill', 255);
            $table->string('chakra_skill', 255);
            $table->string('proc_rate_skill', 255);
            $table->string('effect_skill', 255);
            $table->string('launch_skill', 255);
            $table->string('restriction_skill', 255);
            $table->string('round_skill', 255);
            $table->string('kartegori', 255);
            $table->string('tier_skill', 255);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
