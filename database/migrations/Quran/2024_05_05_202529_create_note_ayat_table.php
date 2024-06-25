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
        Schema::create('note_ayats', function (Blueprint $table) {
            $table->id();
            $table->text('note')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('topic_id'); 
            $table->unsignedBigInteger('ayah_id'); 

            $table->foreign('topic_id')->references('id')->on('topics');
            $table->foreign('ayah_id')->references('id')->on('ayahs');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('note_ayat');
    }
};
