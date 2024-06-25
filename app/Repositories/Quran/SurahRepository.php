<?php

namespace App\Repositories\Quran;

use App\Models\Quran\Surah;
use App\Repositories\BaseRepository;

class SurahRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'name'
    ];

    public function __construct()
    {
        $this->model = new Surah;
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

}
