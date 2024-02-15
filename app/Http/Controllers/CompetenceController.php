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
        $competences = Competence::orderBy('id', 'desc')->get(); // Même méthode que all(), sauf qu'on peut mettre des conditions, ou des ORDER BY
        dd($competences);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
