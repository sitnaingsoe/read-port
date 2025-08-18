<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Rename the column
            $table->renameColumn('avator', 'avatar');
        });

        // Make it nullable after renaming
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->change();
        });
    }

    public function down(): void
    {
        // Rollback: make it not nullable and rename back
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable(false)->change();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('avatar', 'avator');
        });
    }
};
