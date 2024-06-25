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
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->integer('number')->nullable();
            $table->integer('number_occurrences');
            $table->string('code')->unique();
            $table->text('word_simple')->nullable();
            $table->text('word_simple_clean')->nullable();
            $table->text('word_simple_enhanced')->nullable();
            $table->text('word_simple_min')->nullable();
            $table->text('word_uthmani_min')->nullable();
            $table->text('word_uthmani')->nullable();
            $table->text('description')->nullable();
           
            $table->unsignedBigInteger('root_id')->nullable(); 
            $table->foreign('root_id')->references('id')->on('roots');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mots');
    }
};
