<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('item_images', function (Blueprint $table) {
            $table->uuid("id")->primary()->unique();
            $table->uuid('item_id');
            $table->string('original_file_name');
            $table->string('file_name');
            $table->string('alt')->nullable();
            $table->integer('sort')->nullable();
            $table->timestamps();

            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('item_images');
    }
};
