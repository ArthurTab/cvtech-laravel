<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MetierRequest;
use Illuminate\Http\Request;
use App\Models\{
    Professionnel,
    Competence,
    Metier,
};
use App\Http\Requests\ProfessionnelRequest;

class ProfessionnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug = '')
    {
        $pro = $slug ?
            Metier::where('slug', $slug)->firstOrFail()->professionnels()->get() :
            Professionnel::get();
        $combometiers = Metier::all();
        $combocompetences = Competence::all();
        return view('professionnels.index', [
            'pro' => $pro,
            'metiers' => $combometiers,
            'slug' => $slug,
            'comp' => $combocompetences,
            'idcomp' => '',
            'tablename' => 'Table des professionnels',
            'title' => config("app.name") . ' | Liste des professionnels',
            'description' => 'Retrouvez tous les professionnels de ' . config("app.name"),
            'menuactive' => '4'
        ]);
    }

    public function search(Request $request){
        $professionnels = Professionnel::where('nom', 'LIKE', "%{$request->input('search')}%")->orWhere('prenom', 'LIKE', "%{$request->input('search')}%")->get();
        $combometiers = Metier::all();
        return view('professionnels.index', [
            'pro' => $professionnels,
            'metiers' => $combometiers,
            'slug' => '',
            'idcomp' => '',
            'tablename' => 'Table des professionnels',
            'title' => config("app.name") . ' | Liste des professionnels',
            'description' => 'Retrouvez tous les professionnels de ' . config("app.name"),
            'menuactive' => '4'
        ]);
    }

    public function searchcomp(Request $request){
        $competences = Competence::where('intitule', 'LIKE', "%{$request->input('comp')}%")->get();
        $ids = $competences->pluck('id');
        $professionnels = Professionnel::whereHas('competences', function($query) use ($ids) {
            $query->whereIn('competence_id', $ids);
        })->get();
        $combometiers = Metier::all();
        return view('professionnels.index', [
            'pro' => $professionnels,
            'metiers' => $combometiers,
            'slug' => '',
            'idcomp' => '',
            'tablename' => 'Table des professionnels',
            'title' => config("app.name") . ' | Liste des professionnels',
            'description' => 'Retrouvez tous les professionnels de ' . config("app.name"),
            'menuactive' => '4'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $competences = Competence::orderBy('intitule')->get();
        $metiers = Metier::all();
        $data = [
            'metiers' => $metiers,
            'formname' => 'Création d\'un professionnel',
            'title' => 'Création d\'un professionnel | ' . config('app.name'),
            'description' => 'Création d\'un professionnel | ' . config('app.name'),
            'menuactive' => '4',
            'competences' => $competences,
        ];
        return view('professionnels.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfessionnelRequest $professionnelRequest)
    {
        $validatedData = $professionnelRequest->all();
        if (isset($professionnelRequest->formation)){
            $validatedData['formation'] = 1;
        } else {
            $validatedData['formation'] = 0;
        }
        $validatedData['domaine'] = implode(',', $professionnelRequest->domaine);
        if ($professionnelRequest->hasFile('cv') && $professionnelRequest->file('cv')->isValid()) {
            $chemin = $professionnelRequest->cv->store('public/cv');
            $validatedData['cv_path'] = $chemin;
        }
        $pro = Professionnel::create($validatedData);
        $pro->competences()->attach($professionnelRequest->comp);
        return redirect()->route('professionnels.index')->withSucces('Professionnel créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Professionnel $professionnel)
    {
        return view('professionnels.show', [
            'pro' => $professionnel,
            'formname' => 'Professionnel | Consultation',
            'title' => config("app.name") . ' | Consultation professionnel',
            'menuactive' => '4'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Professionnel $professionnel)
    {
        $competences = Competence::orderBy('intitule')->get();
        $professionnel->domaine = explode(',', $professionnel->domaine);
        $metiers = Metier::all();
        $data = [
            'metiers' => $metiers,
            'formname' => 'Edition d\'un professionnel',
            'title' => 'Edition d\'un professionnel | ' . config('app.name'),
            'description' => 'Edition d\'un professionnel | ' . config('app.name'),
            'pro' => $professionnel,
            'procomp' => $professionnel->competences,
            'menuactive' => '4',
            'competences' => $competences
        ];
        return view('professionnels.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfessionnelRequest $professionnelRequest, Professionnel $professionnel)
    {
        $validatedData = $professionnelRequest->all();
        if (isset($professionnelRequest->formation)){
            $validatedData['formation'] = 1;
        } else {
            $validatedData['formation'] = 0;
        }
        $validatedData['domaine'] = implode(',', $professionnelRequest->domaine);
        if ($professionnelRequest->hasFile('cv') && $professionnelRequest->file('cv')->isValid()) {
            if ($professionnel->cv_path && Storage::exists($professionnel->cv_path)) {
                Storage::delete($professionnel->cv_path);
            }
            $chemin = $professionnelRequest->cv->store('public/cv');
            $validatedData['cv_path'] = $chemin;
        }
        $professionnel->update($validatedData);
        $professionnel->competences()->sync($professionnelRequest->comp);
        return redirect()->route('professionnels.index')->withSucces('Professionnel modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Professionnel $professionnel)
    {
        $professionnel->delete();
        return redirect()->route('professionnels.index')->withSucces('Le professionnel a été supprimé avec succès.');
    }

    public function predelete(Professionnel $professionnel)
    {
        return view('professionnels.predelete', [
            'pro' => $professionnel,
            'formname' => 'Professionnel | Suppression',
            'title' => config("app.name") . ' | Suppression professionnel',
            'menuactive' => '4'
        ]);
    }
}
