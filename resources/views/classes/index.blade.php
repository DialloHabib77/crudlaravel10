@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Liste des classes</h1>
        <a href="{{ route('classes.create') }}" class="btn btn-primary mb-2">Ajouter une classe</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Libellé</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($classes as $classe)
                <tr>
                    <td>{{ $classe->id }}</td>
                    <td>{{ $classe->libelle }}</td>
                    <td>
                        <a href="{{ route('classes.show', $classe->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('classes.edit', $classe->id) }}" class="btn btn-primary btn-sm">Modifier</a>
                        <form action="{{ route('classes.destroy', $classe->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette classe ?')">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
