<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|unique:classes',
            // Ajoutez ici les autres règles de validation
        ]);

        Classe::create($request->all());

        return redirect()->route('classes.index')->with('success', 'Classe ajoutée avec succès.');
    }

    public function show($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.show', compact('classe'));
    }

    public function edit($id)
    {
        $classe = Classe::findOrFail($id);
        return view('classes.edit', compact('classe'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|unique:classes,libelle,'.$id,
            // Ajoutez ici les autres règles de validation
        ]);

        $classe = Classe::findOrFail($id);
        $classe->update($request->all());

        return redirect()->route('classes.index')->with('success', 'Classe mise à jour avec succès.');
    }

    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        $classe->delete();

        return redirect()->route('classes.index')->with('success', 'Classe supprimée avec succès.');
    }
}
