<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop the existing foreign key first
            $table->dropForeign(['category_id']);

            // Add the new foreign key with cascade delete
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop the cascade foreign key
            $table->dropForeign(['category_id']);

            // Restore original FK without cascade
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories');
        });
    }
};
