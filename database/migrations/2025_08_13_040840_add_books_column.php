<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::table('books', function (Blueprint $table) {
            $table->string('booktype')->nullable(); // Example: adds a nullable string column
            // You can specify other data types and constraints:
            // $table->integer('age')->default(0);
            // $table->boolean('is_active')->default(false);
            // $table->timestamp('published_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->dropColumn('booktype'); // To revert the change
        });
    }
};
