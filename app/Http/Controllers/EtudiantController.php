<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Classe;
use App\Imports\EtudiantImport;
use App\Imports\EtudiantExport;
use Maatwebsite\Excel\Facades\Excel;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::paginate(3);
        return view('etudiants.index', compact('etudiants'));
    }
    public function import()
    {
        Excel::import(new EtudiantImport, request()->file('file'));

        return redirect()->back();
    }
    public function export()
    {
        return Excel::download(new EtudiantExport(), 'Etudiant.xlsx');
    }
    public function create()
    {
        $classes = Classe::all();
        return view('etudiants.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'sexe' => 'required',
            'telephone' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'classe_id' => 'required|exists:classes,id',
            'annee_academique' => 'required',
        ]);

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $photoName);
        } else {
            $photoName = null;
        }

        $etudiant = Etudiant::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'photo' => $photoName,
        ]);

        $etudiant->classes()->attach($request->classe_id, ['annee_academique' => $request->annee_academique]);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès.');
    }

    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $classes = Classe::all();
        return view('etudiants.edit', compact('etudiant', 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'date_naissance' => 'required|date',
            'sexe' => 'required',
            'telephone' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'classe_id' => 'required|exists:classes,id',
            'annee_academique' => 'required',
        ]);

        $etudiant = Etudiant::findOrFail($id);

        // Gestion de l'upload de la photo
        if ($request->hasFile('photo')) {
            $photoName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $photoName);
        } else {
            $photoName = $etudiant->photo;
        }

        $etudiant->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'sexe' => $request->sexe,
            'telephone' => $request->telephone,
            'photo' => $photoName,
        ]);

        // Mettre à jour la classe et l'année académique de l'étudiant
        $etudiant->classes()->sync([$request->classe_id => ['annee_academique' => $request->annee_academique]]);

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès.');
    }

    
}
