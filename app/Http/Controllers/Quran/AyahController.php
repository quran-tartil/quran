<?php

namespace App\Http\Controllers\Quran;

use App\Imports\Quran\AyahImport;
use App\Models\Quran\Ayah;
use Illuminate\Http\Request;
use App\Http\Requests\Quran\AyahRequest;
use App\Repositories\Quran\AyahRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use App\Exports\Quran\AyahExport;
use Maatwebsite\Excel\Facades\Excel;

class AyahController extends AppBaseController
{
    protected $repository;

    public function __construct(AyahRepository $AyahRepository)
    {
        $this->repository = $AyahRepository;
    }

    public function index(Request $request)
    {
        $entities = null;
        if ($request->ajax()) {
            $searchValue = $request->get('searchValue');
            if ($searchValue !== '') {
                $entities = $this->repository->paginate($searchValue);
                return view('Quran.ayah.index', compact('entities'))->render();
            }
        }else{
            $entities = $this->repository->paginate(); 
        }
        return view('Quran.ayah.index', compact('entities'));
    }


    public function create()
    {
        $dataToEdit = null;
        return view('Quran.ayah.create', compact('dataToEdit'));
    }


    public function store(AyahRequest $request)
    {
            $validatedData = $request->validated();
            $this->repository->create($validatedData);
            return redirect()->route('Ayahs.index')->with('success', 'Le Ayah a été ajouté avec succès.');
    }

    public function show(string $id)
    {
        $fetchedData = $this->repository->find($id);
        return view('Quran.ayah.show', compact('fetchedData'));
    }


    public function edit(string $id)
    {
        $dataToEdit = $this->repository->find($id);
        return view('Quran.ayah.edit', compact('dataToEdit'));
    }


    public function update(AyahRequest $request, string $id)
    {
        $validatedData = $request->validated();
        $this->repository->update($id, $validatedData);
        return redirect()->route('Ayahs.index', $id)->with('success', 'Le Ayah a été modifier avec succès.');
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);
        $entities = $this->repository->paginate();
        return view('Quran.ayah.index', compact('entities'))->with('succes', 'Le Ayah a été supprimer avec succés.');
    }


    public function export()
    {
        $ayahs = Ayah::all();

        return Excel::download(new AyahExport($ayahs), 'Ayah_export.xlsx');
    }


    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        try {
            Excel::import(new AyahImport, $request->file('file'));
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('Ayahs.index')->withError('Le symbole de séparation est introuvable. Pas assez de données disponibles pour satisfaire au format.');
        }
        return redirect()->route('Ayahs.index')->with('success', 'Ayah a ajouté avec succès');
    }
}