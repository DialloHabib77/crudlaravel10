<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'date_naissance', 'sexe', 'telephone', 'photo'];

    public function classes()
    {
        return $this->belongsToMany(Classe::class, 'classe_etudiant')->withPivot('annee_academique');
    }
}
