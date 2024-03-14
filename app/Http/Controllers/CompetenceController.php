<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Competence
};
use App\Http\Requests\{
    CompetenceRequest
};

class CompetenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $competences = Competence::all(); //Méthode static où on ne peut pas faire de "WHERE ...", on peut choisir les colonnes qu'on veut SELECT, mais on a TOUS les enregistrements
//        $competences = Competence::all('intitule');
//        $competences = Competence::where('intitule', ='PHP')->get();
//        $competences = Competence::where('description', 'LIKE', '%PHP%')->get();
//        $competences = Competence::orderByDesc('id')->limit(5)->get();
//        $competences = Competence::orderByDesc('id')->offset(5)->get();
//        $competences = Competence::where('description', 'LIKE', '%PHP%')->count();
//        $competences = Competence::find(5);
//        $competences = Competence::first();
        $countcompetences = Competence::count();
        $competences = Competence::orderBy('id', 'desc')->get(); // get() c'est la même méthode que all(), sauf qu'on peut mettre des conditions, ou des ORDER BY
        return view('competences.index', [
            'competences' => $competences,
            'count' => $countcompetences,
            'tablename' => 'Table des compétences',
            'title' => config("app.name") . ' | Liste des compétences',
            'description' => 'Retrouvez toutes les compétences de ' . config("app.name"),
            'menuactive' => '2'

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('competences.create', [
            'formname' => 'Création d\'une compétence',
            'title' => config("app.name") . ' | Création d\'une compétence',
            'menuactive' => '2'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompetenceRequest $competenccerequest)
    {
        //Récupération des données validées dans un tableau
        $validateData = $competenccerequest->validated();
        Competence::create($validateData);
        return redirect()->route('competences.index')->withSucces('La compétence a bien été créée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(COMPETENCE $competence)
    {
        return view('competences.show', [
            'competence' => $competence,
            'formname' => 'Compétence | Consultation',
            'title' => config("app.name") . ' | Consultation compétence',
            'menuactive' => '2'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competence $competence)
    {
        $data = [
            'formname' => 'Edition d\'une compétence',
            'title' => 'Les compétences de ' . config('app.name'),
            'description' => 'Retrouver toutes les compétences de ' . config('app.name'),
            'competence' => $competence,
            'menuactive' => '2'
        ];
        return view('competences.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompetenceRequest $request, Competence $competence)
    {
        $validateData = $request->validated();
        $competence->update($validateData);
        return redirect()->route('competences.index')->withSucces('La compétence a été modifiée avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competence $competence)
    {
        $competence->delete();
        return back()->withSucces('Suppression effectuée avec succès');
    }

}
