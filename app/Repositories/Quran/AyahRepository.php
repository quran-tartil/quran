<?php

namespace App\Repositories\Quran;

use App\Models\Quran\Ayah;
use App\Repositories\BaseRepository;

class AyahRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'quran_simple',
        'quran_simple_clean' ,
        'quran_simple_enhanced',
        'quran_simple_min' ,
        'quran_uthmani_min',
        'quran_uthmani' ,
    ];

    public function __construct(Ayah $Ayah)
    {
        $this->model = $Ayah;
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

}
