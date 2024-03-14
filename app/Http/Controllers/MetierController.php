<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Metier;
use App\Http\Requests\MetierRequest;

class MetierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $metiers = Metier::orderBy('id', 'asc')->get();
        $count = Metier::count();
        return view('metiers.index', [
            'metiers' => $metiers,
            'count' => $count,
            'tablename' => 'Table des métiers',
            'title' => config("app.name") . ' | Liste des métiers',
            'description' => 'Retrouvez tous les métiers de ' . config("app.name"),
            'menuactive' => '3'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('metiers.create', [
            'formname' => 'Création d\'un métier',
            'title' => config("app.name") . ' | Création d\'un métier',
            'menuactive' => '3'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MetierRequest $metiererequest)
    {
        //Récupération des données validées dans un tableau
        $validateData = $metiererequest->validated();
        Metier::create($validateData);
        return redirect()->route('metiers.index')->withSucces('Le métier a bien été créée.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Metier $metier)
    {
        return view('metiers.show', [
            'metier' => $metier,
            'formname' => 'Métier | Consultation',
            'title' => config("app.name") . ' | Consultation métier',
            'menuactive' => '3'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Metier $metier)
    {
        $data = [
            'formname' => 'Edition d\'un métier',
            'title' => 'Edition d\'un métier | ' . config('app.name'),
            'description' => 'Edition d\'un métier | ' . config('app.name'),
            'metier' => $metier,
            'menuactive' => '3'
        ];
        return view('metiers.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MetierRequest $request, Metier $metier)
    {
        $validateData = $request->validated();
        $metier->update($validateData);
        return redirect()->route('metiers.index')->withSucces('Le métier a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Metier $metier)
    {
        $metier->delete();
        return redirect()->route('metiers.index')->withSucces('Le métier a été supprimé avec succès.');
    }

    public function predelete(Metier $metier)
    {
        return view('metiers.predelete', [
            'metier' => $metier,
            'formname' => 'Métier | Suppression',
            'title' => config("app.name") . ' | Suppression métier',
            'menuactive' => '3'
        ]);
    }


}
