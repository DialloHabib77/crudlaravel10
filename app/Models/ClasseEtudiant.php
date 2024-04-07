<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClasseEtudiant extends Model
{
    use HasFactory;
    protected $table = 'classe_etudiant';

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }
}
