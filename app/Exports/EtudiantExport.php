<?php

namespace App\Exports;

use App\Models\Etudiant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EtudiantExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Etudiant::select("id","nom","prenom","date_naissance","sexe","telephone","photo")->get();
    }
    public function heading(): array
    {
        return ["ID","NOM","PRENOM","DATE","SEXE","TELEPHONE","PHOTO"];
    }
}
