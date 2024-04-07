@extends('layouts.app')

@section('content')
    <div class="container">
        <hr>
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Liste des étudiants</h2>
            <form action="{{ route('etudiants.import')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="file">Sélectionnez un fichier Excel :</label>
                    <input type="file" class="form-control-file" id="file" name="file">
                </div>
                <button type="submit" class="btn btn-primary">Importer un étudiant</button>
            </form>
            <a href="{{ route('etudiants.create') }}" class="btn btn-primary">Ajouter un étudiant</a>
        </div>
        <hr>
        <a href="{{ route('etudiants.export') }}" class="btn btn-primary mb-4">Exporter un étudiant</a>

    
        <div class="row">
            @foreach ($etudiants as $etudiant)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    @if($etudiant->photo)
                        <img src="{{ asset('images/' . $etudiant->photo) }}" class="card-img-top" width="200px" height="200px" alt="Photo de l'étudiant">
                    @else
                        <!-- Ajoutez ici une image par défaut si aucune photo n'est disponible -->
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h5>
                        <p class="card-text"><strong>Date de naissance: </strong> {{ $etudiant->date_naissance }}</p>
                        <p class="card-text"><strong>Sexe: </strong> {{ $etudiant->sexe }}</p>
                        <p class="card-text"><strong>Téléphone: </strong> {{ $etudiant->telephone }}</p>
                        <p class="card-text"><strong>Classe: </strong>{{ $etudiant->classes->first()->libelle ?? '-' }}</p>
                        <p class="card-text"><strong>Année academique: </strong>{{ $etudiant->classes->first()->pivot->annee_academique ?? '-' }}</p>
                      
                        <td>
                            <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-outline-info btn-sm">Voir</a>
                            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-outline-primary btn-sm">Modifier</a>
                            <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet étudiant ?')">Supprimer</button>
                            </form>
                        </td>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="page-links">
        {{ $etudiants->links('pagination::bootstrap-4') }}
    </div>
@endsection
