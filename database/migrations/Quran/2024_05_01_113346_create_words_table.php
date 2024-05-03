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
            $table->integer('number');
            $table->integer('number_occurrences');
            $table->string('code')->unique();
            $table->text('word_simple');
            $table->text('word_simple_clean');
            $table->text('word_simple_enhanced');
            $table->text('word_simple_min');
            $table->text('word_uthmani_min');
            $table->text('word_uthmani');
            $table->text('description');
           
            $table->unsignedBigInteger('root_id'); 
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
