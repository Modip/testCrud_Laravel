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
    
    public function editPersonne($id)
    {
        $fonctions = Fonction::all();
        $personne = DB::table('personnes')->where('id', $id)->first();

        return view('edit-personne', compact('personne', 'fonctions'));

    }


    public function updatePersonne(Request $request)
    {

        $fonctions = Fonction::all();
        DB::table('personnes')->where('id', $request->id)->update([
            'prenom'=>$request->prenom,
            'nom'=>$request->nom,
            'email'=>$request->email,
            'fonction_id'=>$request->fonction_id

        ]);
        return back()->with('update_personne', "Personne bien modifiée", compact("fonctions"));
          
    } 


    
    public function deletePersonne($id){
        DB::table('personnes')->where('id', $id)->delete();

        return back()->with('delete_personne', "Personne bien supprimer");
          
        
    }



    


    

    
}
