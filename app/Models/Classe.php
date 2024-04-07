<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $fillable = ['libelle'];

    
    public function etudiants()
    {
        return $this->belongsToMany(Etudiant::class, 'classe_etudiant')->withPivot('annee_academique');
    }
}
