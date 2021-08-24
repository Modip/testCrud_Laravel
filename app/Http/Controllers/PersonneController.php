<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Fonction;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class PersonneController extends Controller
{
    //
    public function index(){

        $personnes = Personne::orderBy("nom", "asc")->get();
        return view("index",compact("personnes"));

    }

    public function addPersonne(){

        $fonctions = Fonction::orderBy("libelle", "asc")->get();
        return view("addPersonne", compact("fonctions"));

    }

    public function add(Request $request){
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'required',
            'fonction_id'=>'required'

        ]);

       // $personne->prenom=$request->prenom;
       // $personne->nom=$request->nom;
       // $personne->email=$request->email;
       // $personne->fonction_id=$request->fonction_id;
        Personne::create($request->all());

        return redirect()->route('addPersonne')->with("success", "Personne bien ajouter");

    }

    public function edit($id){
        $personne = Personne::findOrfail($id);

        return view('edit', compact('personne'));
    }
}
