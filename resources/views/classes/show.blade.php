@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Détails de la classe</h1>
        <p><strong>Libellé:</strong> {{ $classe->libelle }}</p>
        <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-primary">Modifier</a>
        <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">Supprimer</button>
        </form>
    </div>
@endsection
