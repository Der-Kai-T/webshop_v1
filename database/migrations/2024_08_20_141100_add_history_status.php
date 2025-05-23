<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('user_histories', function (Blueprint $table) {
            $table->uuid("status_id")->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('user_histories', function (Blueprint $table) {
            //
        });
    }
};
