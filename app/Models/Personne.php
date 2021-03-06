<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personne extends Model
{
    use HasFactory;
    protected $fillable = ['prenom', 'nom', 'email', 'fonction_id'];

    public function Fonction()
    {
        return $this->belongsTo(Fonction::class, 'fonction_id', 'id' );
    }
}


