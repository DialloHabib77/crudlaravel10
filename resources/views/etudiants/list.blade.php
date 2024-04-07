@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des étudiants</h1>
        <a href="{{ route('etudiants.create') }}" class="text-light text-decoration-none">Ajouter un étudiant</a>
        <div class="row">
            @foreach ($etudiants as $etudiant)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    @if($etudiant->photo)
                        <img src="{{ asset('images/' . $etudiant->photo) }}" class="card-img-top" alt="Photo de l'étudiant">
                    @else
                        <!-- Ajoutez ici une image par défaut si aucune photo n'est disponible -->
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h5>
                        <p class="card-text"><strong>Date de naissance:</strong> {{ $etudiant->date_naissance }}</p>
                        <p class="card-text"><strong>Sexe:</strong> {{ $etudiant->sexe }}</p>
                        <p class="card-text"><strong>Téléphone:</strong> {{ $etudiant->telephone }}</p>
                        <p class="card-text"><strong>Classe:</strong>>{{ $etudiant->classes->first()->libelle ?? '-' }}</p>
                        <p class="card-text"><strong>Année academique:</strong>{{ $etudiant->classes->first()->pivot->annee_academique ?? '-' }}</p>
                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                        </form>
                        
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
