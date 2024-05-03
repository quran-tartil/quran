<?php

namespace App\Http\Controllers\GestionProjets;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GestionProjets\TaskExport;
use App\Imports\GestionProjets\ImportTask;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\GestionProjets\taskRequest;
use App\Repositories\GestionProjets\TaskRepository;
use App\Repositories\GestionProjets\ProjetRepository;
use App\Exceptions\GestionProjets\TaskExisteException;



class TaskController extends AppBaseController
{
    protected $taskRepository;
    protected $projetRepisotorie;

    public function __construct(TaskRepository $taskRepository, ProjetRepository $projetRepisotorie)
    {
        $this->taskRepository = $taskRepository;
        $this->projetRepisotorie = $projetRepisotorie;
    }

    public function index(Request $request)
    {
        $projects = $this->taskRepository->filter();
        $tasks = $this->taskRepository->paginate();
        if ($request->ajax()) {
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->search($searchTask);
            return view('GestionProjets.task.index', compact('tasks', 'projects'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'projects'));
    }

    public function show(Request $request, $id)
    {
        $project = $this->projetRepisotorie->find($id);
        $projects = $this->taskRepository->filter();
        $tasks = $project->tasks()->paginate();
        if ($request->ajax()) {
            $searchTask = $request->get('searchTask');
            $searchTask = str_replace(" ", "%", $searchTask);
            $tasks = $this->taskRepository->searchData($searchTask, $id);
            return view('GestionProjets.task.index', compact('tasks', 'projects', 'project'))->render();
        }
        return view('GestionProjets.task.index', compact('tasks', 'projects', 'project'));
    }

    public function detail(Request $request, $id)
    {
        $task = $this->taskRepository->find($id);
        return view('GestionProjets.task.show', compact('task'));
    }

    public function create()
    {
        $projects = $this->taskRepository->filter();
        $users = User::all();
        $dataToEdit = null;
        return view('GestionProjets.task.create', compact('dataToEdit', 'projects', 'users'));
    }

    public function store(TaskRequest $request)
    {
        try {

            $data = $request->validated();
            $this->taskRepository->create($data);
            return redirect()->route('task.index')->with('success', __('GestionProjets/task/message.taskAdded'));
        } catch (TaskExisteException $e) {
            return back()->withInput()->withErrors(['project_exists' => __('GestionProjets/projet/message.createTaskException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function edit($id)
    {
        $task = $this->taskRepository->find($id);
        $projects = $this->taskRepository->filter();
        $dataToEdit = $this->taskRepository->find($id);
        $users = User::all();
        return view('GestionProjets.task.edit', compact('dataToEdit', 'task', 'projects', 'users'));
    }

    public function update(TaskRequest $request, $task_id)
    {
        try {
            $data = $request->validated();
            $this->taskRepository->update($task_id, $data);
            return redirect()->route('task.index')->with('success', 'Tâche mise à jour avec succès.');
        } catch (TaskExisteException $e) {
            return back()->withInput()->withErrors(['project_exists' => __('GestionProjets/projet/message.createTaskException')]);
        } catch (\Exception $e) {
            return abort(500);
        }
    }


    public function destroy($task_id)
    {
        $result = $this->taskRepository->destroy($task_id);
        if ($result) {
            return back()->with('success', 'La tâche a été supprimée avec succès.');
        } else {
            return back()->with('error', 'Échec de la suppression de la tâche. Veuillez réessayer.');
        }
    }

    public function export()
    {
        return Excel::download(new TaskExport, 'Task.xlsx');
    }

    public function import(Request $request)
    {

        $file = $request->file('file');

        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportTask, $path);
        }

        return redirect()->back();
    }
}