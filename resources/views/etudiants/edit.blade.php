@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier l'étudiant</h1>
        <form action="{{ route('etudiants.update', $etudiant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudiant->nom }}" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $etudiant->prenom }}" required>
            </div>
            <div class="form-group">
                <label for="date_naissance">Date de naissance</label>
                <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $etudiant->date_naissance }}" required>
            </div>
            <div class="form-group">
                <label for="sexe">Sexe</label>
                <select class="form-control" id="sexe" name="sexe" required>
                    <option value="Homme" {{ $etudiant->sexe == 'Homme' ? 'selected' : '' }}>Homme</option>
                    <option value="Femme" {{ $etudiant->sexe == 'Femme' ? 'selected' : '' }}>Femme</option>
                </select>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" value="{{ $etudiant->telephone }}" required>
            </div>
            <div class="form-group">
                <label for="classe_id">Classe</label>
                <select class="form-control" id="classe_id" name="classe_id" required>
                    @foreach($classes as $classe)
                        <option value="{{ $classe->id }}" {{ $etudiant->classe_id == $classe->id ? 'selected' : '' }}>{{ $classe->libelle }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="annee_academique">Année académique</label>
                <input type="text" class="form-control" id="annee_academique" name="annee_academique" value="{{ $etudiant->classes->first()->pivot->annee_academique ?? '' }}" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo</label><br>
                @if($etudiant->photo)
                    <img src="{{ asset('images/' . $etudiant->photo) }}" alt="Photo de profil" style="max-width: 150px; max-height: 150px; margin-bottom: 10px;"><br>
                @endif
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>
            <button type="submit" class="btn btn-outline-primary mt-4">Modifier</button>
            <button type="rest" class="btn btn-dark mt-4">Annuler</button>
        </form>
    </div>
@endsection
