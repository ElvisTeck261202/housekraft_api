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
        Schema::create('budgets', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->uuid('client_uuid');
            $table->uuid('user_uuid');
            $table->uuid('property_uuid');
            $table->decimal('total_amount', 10, 2);
            $table->string('status');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('client_uuid')->references('uuid')->on('clients')->onDelete('cascade');
            $table->foreign('user_uuid')->references('uuid')->on('users')->onDelete('cascade');
            $table->foreign('property_uuid')->references('uuid')->on('properties')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budgets');
    }
};
