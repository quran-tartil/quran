<?php

namespace App\Http\Controllers\Quran;

use App\Imports\Quran\NoteAyatImport;
use App\Models\Quran\NoteAyat;
use Illuminate\Http\Request;
use App\Http\Requests\Quran\NoteAyatRequest;
use App\Repositories\Quran\NoteAyatRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\Quran\NoteAyatExport;
use App\Models\Quran\Ayah;
use App\Models\Quran\Topic;
use App\Repositories\Quran\AyahRepository;
use App\Repositories\Quran\TopicRepository;
use Maatwebsite\Excel\Facades\Excel;

class NoteAyatController extends AppBaseController
{
    protected $repository;

    public function __construct(NoteAyatRepository $NoteAyatRepository)
    {
        $this->repository = $NoteAyatRepository;
    }

    public function index(Request $request)
    {
        $entities = null;
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $entities = $this->repository->paginate($searchValue);
                return view('Quran.noteAyat.index', compact('entities'))->render();
            }
        }else{
            $entities = $this->repository->paginate(); 
        }
        return view('Quran.noteAyat.index', compact('entities'));
    }

    public function create()
    {   
        $topics = (new TopicRepository())->all();
        $ayahs  = (new AyahRepository)->all();
        $noteAyat = null;
        return view('Quran.noteAyat.create', compact( 'noteAyat','topics','ayahs'));
    }

    public function store(NoteAyatRequest $request)
    {
            $validatedData = $request->validated();
            $this->repository->create($validatedData);
            return redirect()->route('noteAyats.index')->with('success', 'Le NoteAyat a été ajouté avec succès.');
    }

 
    public function edit(string $id)
    {
        $topics = Topic::all();
        $ayahs  = Ayah::all();
        $noteAyat = $this->repository->find($id);
        return view('Quran.noteAyat.edit', compact('noteAyat','topics','ayahs'));
    }


    public function update(NoteAyatRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->repository->update($id, $validatedData);
        // noteAyats.index
        return redirect()->route('noteAyats.index', $id)->with('success', 'Le NoteAyat a été modifier avec succès.');
    }

    public function show(string $id)
    {
        $fetchedData = $this->repository->find($id);
        return view('Quran.noteAyat.show', compact('fetchedData'));
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);
        $entities = $this->repository->paginate();
        return view('Quran.noteAyat.index', compact('entities'))->with('succes', 'Le NoteAyat a été supprimer avec succés.');
    }


    public function export()
    {
        $noteAyats = NoteAyat::all();

        return Excel::download(new NoteAyatExport($noteAyats), 'NoteAyat_export.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new NoteAyatImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('NoteAyats.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('NoteAyats.index')->with('success', 'NoteAyat a ajouté avec succès');
    }
}