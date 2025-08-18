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
         Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_premium')->default(false); // Example: adds a nullable string column
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_premium'); // To revert the change
        });
    }
};
