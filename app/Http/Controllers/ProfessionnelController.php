<?php

namespace App\Http\Controllers;

use App\Http\Requests\MetierRequest;
use Illuminate\Http\Request;
use App\Models\{
    Professionnel,
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
        return view('professionnels.index', [
            'pro' => $pro,
            'metiers' => $combometiers,
            'slug' => $slug,
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
        $metiers = Metier::all();
        $data = [
            'metiers' => $metiers,
            'formname' => 'Création d\'un professionnel',
            'title' => 'Création d\'un professionnel | ' . config('app.name'),
            'description' => 'Création d\'un professionnel | ' . config('app.name'),
            'menuactive' => '4'
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
        Professionnel::create($validatedData);
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
        $professionnel->domaine = explode(',', $professionnel->domaine);
        $metiers = Metier::all();
        $data = [
            'metiers' => $metiers,
            'formname' => 'Edition d\'un professionnel',
            'title' => 'Edition d\'un professionnel | ' . config('app.name'),
            'description' => 'Edition d\'un professionnel | ' . config('app.name'),
            'pro' => $professionnel,
            'menuactive' => '4'
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
        $professionnel->update($validatedData);
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
