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
        Schema::create('ayahs', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->integer('juz');
            $table->integer('manzil');
            $table->integer('page');
            $table->integer('ruku');
            $table->integer('hizb_quarter');
            $table->integer('surah_number');
            $table->integer('number_in_surah');
            $table->text('quran_simple');
            $table->text('quran_simple_clean');
            $table->text('quran_simple_enhanced');
            $table->text('quran_simple_min');
            $table->text('quran_uthmani_min');
            $table->text('quran_uthmani');
            $table->text('ar_muyassar');
            $table->unsignedBigInteger('surah_id'); 
            $table->foreign('surah_id')->references('id')->on('surahs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ayahs');
    }
};
