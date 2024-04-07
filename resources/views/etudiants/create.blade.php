@extends('layouts.app')

@section('content')
    <div class="page-heading">
        <hr>
        <h1>Ajouter | Etudiant</h1>
        <hr>
    </div>
    <div class="page-content">
        <div class="col-md-10 col-12" style="padding-left: 150px;">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Caractéristiques des classes</h3>
                </div>
                <br>
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('etudiants.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        <label for="nom">Nom</label>
                                        <input type="text" class="form-control" id="nom" name="nom" required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="prenom">Prénom</label>
                                        <input type="text" class="form-control" id="prenom" name="prenom" required>
                                    </div>
                                    <div class="col-md-12 mb-2 ml-4 mb-4">
                                        <label for="date_naissance">Date de naissance</label>
                                        <input type="date" class="form-control" id="date_naissance" name="date_naissance"
                                            required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="sexe">Sexe</label>
                                        <fieldset class="col-md-12 mb-2">
                                            <select class="form-select" id="sexe" name="sexe" required>
                                                <option value="Homme">Homme</option>
                                                <option value="Femme">Femme</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="telephone">Téléphone</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="classe_id">Classe</label>
                                        <select class="form-select" id="classe_id" name="classe_id" required>
                                            @foreach ($classes as $classe)
                                                <option value="{{ $classe->id }}">{{ $classe->libelle }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <label for="annee_academique">Année académique</label>
                                        <input type="text" class="form-control" id="annee_academique"
                                            name="annee_academique" required>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control-file" id="photo" name="photo">
                                    </div>
                                    <div class="col-12 mb-2 d-flex justify-content-end">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary me-1 mb-1">Ajouter</button>
                                        <button type="reset" class="btn btn-danger me-1 mb-1">
                                            <a href="{{ route('etudiants.index') }}">Annuler</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
