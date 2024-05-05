<?php

namespace App\Repositories\Quran;

use App\Models\Quran\TopicCategory;
use App\Repositories\BaseRepository;

class TopicCategoryRepository extends BaseRepository
{
    protected $model;
    protected $fieldsSearchable = [
        'name'
    ];

    public function __construct(TopicCategory $TopicCategory)
    {
        $this->model = $TopicCategory;
    }
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

}
