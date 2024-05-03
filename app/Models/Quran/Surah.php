<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class Surah extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'number' ,
        'name',
        'number_of_ayahs',
        'revelation_type'
    ];

    public function ayahs(){
        return $this->hasMany(Ayah::class,'surah_id');
    }
}

