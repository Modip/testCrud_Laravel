<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use App\Models\Fonction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'fonction'=>'required'

        ]);

        $Query=DB::table('personnes')->insert([
            'prenom'=>$request->input('prenom'),
            'nom'=>$request->input('nom'),
            'email'=>$request->input('email'),
            'fonction'=>$request->input('fonction')

        ]);

        return $request->input();

    }
}
