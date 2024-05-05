<?php

namespace App\Repositories\Quran;

use App\Models\Quran\NoteAyat;
use App\Repositories\BaseRepository;

class NoteAyatRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'name'
    ];

    public function __construct(NoteAyat $NoteAyat)
    {
        $this->model = $NoteAyat;
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

   
}
