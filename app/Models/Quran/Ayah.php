<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class Ayah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'number',
        'juz' ,
        'manzil',
        'page' ,
        'ruku',
        'hizb_quarter' ,
        'surah_number',
        'number_in_surah' ,
        'quran_simple',
        'quran_simple_clean' ,
        'quran_simple_enhanced',
        'quran_simple_min' ,
        'quran_uthmani_min',
        'quran_uthmani' ,
        'ar_muyassar'
    ];

    // TODO: Question : Override the default __toString() method
    public function __toString() {
        return $this->quran_uthmani_min ." : [".  $this->Surah->name . "," . $this->number_in_surah  . "]";
    }

    public function Surah()
    {
        return $this->belongsTo(Surah::class,'surah_id');
    }

}

