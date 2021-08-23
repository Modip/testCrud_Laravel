<?php

namespace App\Http\Controllers;

use App\Models\Personne;
use Illuminate\Http\Request;

class PersonneController extends Controller
{
    //
    public function index(){

        $personnes = Personne::orderBy("nom", "asc")->get();
        return view("index",compact("personnes"));

    }
}
