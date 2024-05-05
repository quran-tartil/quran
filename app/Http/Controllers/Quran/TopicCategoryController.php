<?php

namespace App\Http\Controllers\Quran;

use App\Imports\Quran\TopicCategoryImport;
use App\Models\Quran\TopicCategory;
use Illuminate\Http\Request;
use App\Http\Requests\Quran\TopicCategoryRequest;
use App\Repositories\Quran\TopicCategoryRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\Quran\TopicCategoryExport;
use Maatwebsite\Excel\Facades\Excel;

class TopicCategoryController extends AppBaseController
{
    protected $repository;

    public function __construct(TopicCategoryRepository $TopicCategoryRepository)
    {
        $this->repository = $TopicCategoryRepository;
    }

    public function index(Request $request)
    {
        $entities = null;
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $entities = $this->repository->paginate($searchValue);
                return view('Quran.topicCategory.index', compact('entities'))->render();
            }
        }else{
            $entities = $this->repository->paginate(); 
        }
        return view('Quran.topicCategory.index', compact('entities'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('Quran.topicCategory.create', compact('dataToEdit'));
    }


    public function store(TopicCategoryRequest $request)
    {
            $validatedData = $request->validated();
            $this->repository->create($validatedData);
            return redirect()->route('topicCategories.index')->with('success', 'Le TopicCategory a été ajouté avec succès.');
    }

    public function show(string $id)
    {
        $fetchedData = $this->repository->find($id);
        return view('Quran.topicCategory.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->repository->find($id);
        return view('Quran.topicCategory.edit', compact('dataToEdit'));
    }


    public function update(TopicCategoryRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->repository->update($id, $validatedData);
        // topicCategories.index
        return redirect()->route('topicCategories.index', $id)->with('success', 'Le TopicCategory a été modifier avec succès.');
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);
        $entities = $this->repository->paginate();
        return view('Quran.topicCategory.index', compact('entities'))->with('succes', 'Le TopicCategory a été supprimer avec succés.');
    }


    public function export()
    {
        $topicCategories = TopicCategory::all();

        return Excel::download(new TopicCategoryExport($topicCategories), 'TopicCategory_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new TopicCategoryImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('TopicCategories.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('TopicCategories.index')->with('success', 'TopicCategory a ajouté avec succès');
    }
}