<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_sizes', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('item_id');
            $table->string('size');
            $table->decimal('price_set')->nullable();
            $table->decimal('price_add')->nullable();
            $table->decimal('price_factor')->nullable();
            $table->timestamps();

            $table->foreign('item_id')
                ->references('id')
                ->on('items')
                ->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_sizes');
    }
};
