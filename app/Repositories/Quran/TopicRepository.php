<?php

namespace App\Repositories\Quran;

use App\Models\Quran\Topic;
use App\Repositories\BaseRepository;

class TopicRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'name'
    ];

    public function __construct()
    {   
        parent::__construct(new Topic);
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

}
