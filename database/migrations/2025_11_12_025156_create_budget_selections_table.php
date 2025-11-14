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
            $table->uuid('id')->index()->unique();
            $table->uuid('budget_id');
            $table->uuid('item_id');
            $table->uuid('builder_id');
            $table->decimal('item_cost_snapshot', 10, 2);
            $table->decimal('builder_cost_snapshot', 10, 2);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('budget_id')->references('id')->on('budgets')->onDelete('cascade');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->foreign('builder_id')->references('id')->on('builders')->onDelete('cascade');
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
