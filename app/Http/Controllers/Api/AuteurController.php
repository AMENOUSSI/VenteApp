<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAuteurRequest;
use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
       $auteur = new Auteur();
        $auteur->nom->$request->nom ;
        $auteur->email->$request->email ;
        $auteur->password->$request->password ;
        return $auteur;
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateAuteurRequest $request)
    {
        $auteur = new Auteur();
        $auteur->nom->$request->nom ;
        $auteur->email->$request->email ;
        $auteur->password->$request->password ;
        $auteur->save();
        return $auteur;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
