<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class Root extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'root' ,
        'global_meaning',
        'quantity_words'
    ];

    public function words(){
        return $this->hasMany(Word::class,'root_id');
    }
}

