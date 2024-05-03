<?php

namespace App\Http\Controllers\Quran;

use App\Imports\Quran\SurahImport;
use App\Models\Quran\Surah;
use Illuminate\Http\Request;
use App\Http\Requests\Quran\SurahRequest;
use App\Repositories\Quran\SurahRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\Quran\SurahExport;
use Maatwebsite\Excel\Facades\Excel;

class SurahController extends AppBaseController
{
    protected $repository;

    public function __construct(SurahRepository $SurahRepository)
    {
        $this->repository = $SurahRepository;
    }

    public function index(Request $request)
    {
        $entities = null;
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $entities = $this->repository->paginate($searchValue);
                return view('Quran.Surah.index', compact('entities'))->render();
            }
        }else{
            $entities = $this->repository->paginate(); 
        }
        return view('Quran.Surah.index', compact('entities'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('Quran.Surah.create', compact('dataToEdit'));
    }


    public function store(SurahRequest $request)
    {
            $validatedData = $request->validated();
            $this->repository->create($validatedData);
            return redirect()->route('Surahs.index')->with('success', 'Le Surah a été ajouté avec succès.');
    }

    public function show(string $id)
    {
        $fetchedData = $this->repository->find($id);
        return view('Quran.Surah.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->repository->find($id);
        return view('Quran.Surah.edit', compact('dataToEdit'));
    }


    public function update(SurahRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->repository->update($id, $validatedData);
        return redirect()->route('Surahs.index', $id)->with('success', 'Le Surah a été modifier avec succès.');
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);
        $entities = $this->repository->paginate();
        return view('Quran.Surah.index', compact('entities'))->with('succes', 'Le Surah a été supprimer avec succés.');
    }


    public function export()
    {
        $surahs = Surah::all();

        return Excel::download(new SurahExport($surahs), 'Surah_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new SurahImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('Surahs.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('Surahs.index')->with('success', 'Surah a ajouté avec succès');
    }
}