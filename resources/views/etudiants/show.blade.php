@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'étudiant</h1>
    <div class="card" style="width: 20rem;">
        @if($etudiant->photo)
            <img src="{{ asset('images/' . $etudiant->photo) }}" class="card-img-top" alt="Photo de l'étudiant">
        @else
        <p class="card-text"><strong></strong>Photo non spécifiée</p>

        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $etudiant->prenom }} {{ $etudiant->nom }}</h5>
            <p class="card-text"><strong>Date de naissance:</strong> {{ $etudiant->date_naissance }}</p>
            <p class="card-text"><strong>Sexe:</strong> {{ $etudiant->sexe }}</p>
            <p class="card-text"><strong>Téléphone:</strong> {{ $etudiant->telephone }}</p>
            @if($etudiant->classe)
                <p class="card-text"><strong>Classe:</strong>>{{ $etudiant->classes->first()->libelle ?? '-' }}</p>
                @else
                <p class="card-text"><strong>Classe:</strong> Non spécifiée</p>
            @endif
          
            <p class="card-text"><strong>Année academique:</strong>{{ $etudiant->classes->first()->pivot->annee_academique ?? '-' }}</p>
    
            <a href="{{ route('etudiants.index', $etudiant->id) }}" class="btn btn-danger">Retour à la liste des étudiants</a>
            
        </div>
    </div>
</div>
@endsection
