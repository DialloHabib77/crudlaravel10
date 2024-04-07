@extends('layouts.app')

@section('content')
<div class="page-heading">
    <hr>
      <h3>Ajouter | Classe</h3>
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
                    <form action="{{ route('classes.store') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 ml-4 mb-4">
                                    <label for="libelle">Libellé</label>
                                    <input type="text" class="form-control" id="libelle" name="libelle" required>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" name="submit" class="btn btn-primary me-1 mb-1">Ajouter</button>
                                    <button type="reset" class="btn btn-danger me-1 mb-1">
                                        <a href="index.php">Retour</a>
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

