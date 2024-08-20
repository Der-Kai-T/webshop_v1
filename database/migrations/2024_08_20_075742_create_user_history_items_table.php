<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('user_history_items', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('history_id');
            $table->uuid('item_id');
            $table->uuid('variant_id')->nullable();
            $table->uuid('item_size_id')->nullable();
            $table->decimal('price');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('history_id')->references('id')->on('user_histories')->onDelete('restrict');
            $table->foreign('item_id')->references('id')->on('items')->onDelete('restrict');;
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('restrict');;
            $table->foreign('item_size_id')->references('id')->on('item_sizes')->onDelete('restrict');;

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_history_items');
    }
};
