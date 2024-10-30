<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_categories', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('item_id');
            $table->uuid('category_id');

            $table->timestamps();

            $table->foreign("item_id")
                ->references("id")
                ->on("items")
                ->onDelete("cascade");

            $table->foreign("category_id")
                ->references("id")
                ->on("categories")
                ->onDelete("cascade");
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_categories');
    }
};
