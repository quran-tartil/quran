<?php

namespace App\Http\Controllers\Quran;

use App\Imports\Quran\TopicImport;
use App\Models\Quran\Topic;
use Illuminate\Http\Request;
use App\Http\Requests\Quran\TopicRequest;
use App\Repositories\Quran\TopicRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\Quran\TopicExport;
use Maatwebsite\Excel\Facades\Excel;

class TopicController extends AppBaseController
{
    protected $repository;

    public function __construct(TopicRepository $TopicRepository)
    {
        $this->repository = $TopicRepository;
    }

    public function index(Request $request)
    {
        $entities = null;
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $entities = $this->repository->paginate($searchValue);
                return view('Quran.topic.index', compact('entities'))->render();
            }
        }else{
            $entities = $this->repository->paginate(); 
        }
        return view('Quran.topic.index', compact('entities'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('Quran.topic.create', compact('dataToEdit'));
    }


    public function store(TopicRequest $request)
    {
            $validatedData = $request->validated();
            $this->repository->create($validatedData);
            return redirect()->route('topics.index')->with('success', 'Le Topic a été ajouté avec succès.');
    }

    public function show(string $id)
    {
        $fetchedData = $this->repository->find($id);
        return view('Quran.topic.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->repository->find($id);
        return view('Quran.topic.edit', compact('dataToEdit'));
    }


    public function update(TopicRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->repository->update($id, $validatedData);
        // topics.index
        return redirect()->route('topics.index', $id)->with('success', 'Le Topic a été modifier avec succès.');
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);
        $entities = $this->repository->paginate();
        return view('Quran.topic.index', compact('entities'))->with('succes', 'Le Topic a été supprimer avec succés.');
    }


    public function export()
    {
        $topics = Topic::all();

        return Excel::download(new TopicExport($topics), 'Topic_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new TopicImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('Topics.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('Topics.index')->with('success', 'Topic a ajouté avec succès');
    }
}