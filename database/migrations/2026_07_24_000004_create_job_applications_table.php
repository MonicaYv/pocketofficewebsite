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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->string('job_slug', 255)->nullable();
            $table->string('job_title', 255)->nullable();
            $table->string('first_name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('position');
            $table->string('portfolio', 2048)->nullable();
            $table->text('message')->nullable();
            $table->string('resume_path');
            $table->string('status', 50)->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
