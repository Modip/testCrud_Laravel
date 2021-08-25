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
            'email'=>'required|email|unique:personnes',
            'fonction_id'=>'required'

        ]);
        $personne = new Personne();
        $personne->prenom=$request->prenom;
        $personne->nom=$request->nom;
        $personne->email=$request->email;
        $personne->fonction_id=$request->fonction_id;

        $pers = $personne->save();

        if($pers){
            return back()->with('success', 'Personne bien ajouter');

        }else {
            return back()->with('fail', 'Erreur');
    }
       


    }

    public function edit(){
        $fonctions = Fonction::all();
        $personne = Personne::all();

        return view( 'editPersonne', compact("personne", "fonctions"));
    }

    public function update(Request $request, Personne $personne){
        $request->validate([
            'prenom'=>'required',
            'nom'=>'required',
            'email'=>'required',
            'fonction_id'=>'required'

        ]);
        $personne->update([
            'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'email'=>$request->email,
            'fonction_id'=>$request->fonction_id

        ]);

        return back()->with('success', "Personne bien modifié");
    }

    public function delete($personne){

        $individu = $personne->prenom ." ". $personne->nom;
        //Personne ::find($personne)->delete();
        $personne->delete();

        return back()->with("successDelete", "La personne '$individu' est bien supprime");

    }


    public function showdata ($id){
        $data = Personne::find($id);
        return view('edit', ['data'->$data]);
    }

    public function testupdatz (Request $req){
        $data = Personne::find($req->id);
        $data->prenom = $prenom->prenom;
        $data->nom = $prenom->prenom;
        $data->email = $email->email;
        $data->fonction_id = $fonction_id->fonction_id;
        $data->save();
        return redirect('index');
    }
}
