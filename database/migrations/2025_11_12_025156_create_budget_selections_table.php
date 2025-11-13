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
        Schema::create('budget_selections', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique()->index();
            $table->uuid('budget_uuid');
            $table->uuid('item_uuid');
            $table->uuid('builder_uuid');
            $table->decimal('item_cost_snapshot', 10, 2);
            $table->decimal('builder_cost_snapshot', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('budget_uuid')->references('uuid')->on('budgets')->onDelete('cascade');
            $table->foreign('item_uuid')->references('uuid')->on('items')->onDelete('cascade');
            $table->foreign('builder_uuid')->references('uuid')->on('builders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('budget_selections');
    }
};
