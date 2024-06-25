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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->string('icon')->nullable(); // Make icon nullable
            $table->string('route');
            $table->string('permission')->nullable();
            $table->unsignedBigInteger('parent_id')->nullable(); // Add parent_id column
            $table->timestamps();
        
            $table->foreign('parent_id')
                ->references('id')
                ->on('pages')
                ->onDelete('cascade'); // Optional: Set onDelete behavior (cascade here)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
