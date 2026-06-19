<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        try{
            Schema::table('user_histories', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
        }catch (Exception $e){

        }

        Schema::table('user_histories', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });

        try{
            Schema::table('user_history_items', function (Blueprint $table) {
                $table->dropForeign(['history_id']);
            });
        }catch (Exception $e){

        }
        Schema::table('user_history_items', function (Blueprint $table) {
            $table->foreign('history_id')->references('id')->on('user_histories')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('user_histories', function (Blueprint $table) {
            //
        });
    }
};
