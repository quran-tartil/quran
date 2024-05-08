<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class NoteAyat extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'note' ,
        'topic_id',
        'ayah_id'
    ];

    

   
    public function ayah()
    {
        return $this->belongsTo(Ayah::class,'ayah_id');
    }

    public function topic()
    {
        return $this->belongsTo(Topic::class,'topic_id');
    }
}

