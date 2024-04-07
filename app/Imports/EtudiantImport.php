<?php

namespace App\Imports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EtudiantImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Etudiant([
            'nom'=> $row['nom'],
            'prenom'=> $row['prenom'],
            'date_naissance'=> $row['date_naissance'],
            'sexe'=> $row['sexe'],
            'telephone'=> $row['telephone'],
            
        ]);
    }
}
