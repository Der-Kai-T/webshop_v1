<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('user_id');
            $table->uuid('item_id');
            $table->uuid('variant_id')->nullable();
            $table->uuid('item_size_id')->nullable();
            $table->decimal('price');
            $table->unsignedInteger('quantity');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('item_size_id')->references('id')->on('item_sizes');
            $table->foreign('variant_id')->references('id')->on('variants');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
