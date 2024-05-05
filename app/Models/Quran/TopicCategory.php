<?php

namespace App\Models\Quran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Task;

class TopicCategory extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name' ,
        'description'
    ];

    public function ayahs(){
        return $this->hasMany(Ayah::class,'topicCategory_id');
    }
}

