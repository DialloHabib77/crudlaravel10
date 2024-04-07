@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifier la classe</h1>
        <form action="{{ route('classes.update', $classe->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="libelle">Libellé</label>
                <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $classe->libelle }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection
