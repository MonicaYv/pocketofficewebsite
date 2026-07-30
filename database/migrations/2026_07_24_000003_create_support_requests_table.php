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
        Schema::create('support_requests', function (Blueprint $table) {
            $table->id();
            $table->string('department', 100);
            $table->string('customer_id', 100);
            $table->string('name');
            $table->string('country_code', 20);
            $table->string('phone_number', 20);
            $table->string('email');
            $table->text('message');
            $table->json('attachment_paths')->nullable();
            $table->string('status', 50)->default('new');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('support_requests');
    }
};
