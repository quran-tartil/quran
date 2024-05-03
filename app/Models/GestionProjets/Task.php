<?php

namespace App\Models\GestionProjets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GestionProjets\Projet;
use App\Models\User;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom' ,
        'description',
        'date_debut',
        'date_de_fin',
        'project_id',
        'user_id'
    ];
    public function project()
    {
        return $this->belongsTo(Projet::class,'project_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}


