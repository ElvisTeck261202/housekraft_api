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
        Schema::create('builder_skills', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->uuid('builder_uuid');
            $table->uuid('item_uuid');
            $table->decimal('work_cost', 10, 2);
            $table->string('estimated_time');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('builder_uuid')->references('uuid')->on('builders')->onDelete('cascade');
            $table->foreign('item_uuid')->references('uuid')->on('items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('builder_skills');
    }
};
