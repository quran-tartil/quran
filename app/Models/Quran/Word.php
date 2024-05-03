<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class Word extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'number' ,
        'number_occurrences',
        'code',
        'word_simple'
    ];

    public function root()
    {
        return $this->belongsTo(Root::class,'root_id');
    }
}

