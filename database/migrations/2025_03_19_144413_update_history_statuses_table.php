<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('history_statuses', function (Blueprint $table) {
            $table->unsignedInteger("sort")->default(0)->after("next_name");
            $table->boolean("show_in_group")->default(false)->after("sort");
        });
    }

    public function down(): void
    {
        Schema::table('history_statuses', function (Blueprint $table) {
            $table->dropColumn("sort");
            $table->dropColumn("show_in_group");
        });
    }
};
