<?php

namespace App\Database\Migrations\Quran;


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
        Schema::create('roots', function (Blueprint $table) {
            $table->id();
            $table->string('root')->unique();
            $table->text('global_meaning')->nullable();
            $table->integer('quantity_words');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racines');
    }
};
