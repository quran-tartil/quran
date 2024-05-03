<?php

namespace App\Repositories\GestionProjets;

use App\Models\GestionProjets\Task;
use App\Models\GestionProjets\Projet;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use App\Exceptions\GestionProjets\TaskExisteException;

class TaskRepository extends BaseRepository {
    protected $model;

    protected $fieldsSearchable = [
        'name'
    ];
    public function getFieldsSearchable(): array
    {
        return $this->fieldsSearchable;
    }

    public function __construct(Task $task){
        $this->model = $task;
    }

    public function find($id){
        return $this->model->with('project')->find($id);
    }

    public function create(array $data){
        $nom = $data['nom'];

        $existingTask = Task::where('nom', $nom)->exists();

        if ($existingTask) {
            throw TaskExisteException::createTask();
        } else {
            return parent::create($data);
        }
    }

    public function searchData($searchableData, $id, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData, $id) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->where('project_id', $id)->paginate($perPage);
    }

    public function search($searchableData, $perPage = 4)
    {
        return $this->model->where(function ($query) use ($searchableData) {
            $query->where('nom', 'like', '%' . $searchableData . '%')
                  ->orWhere('description', 'like', '%' . $searchableData . '%');
        })->paginate($perPage);
    }
    
    public function filter()
    {
       return Projet::all();
    }
   
}