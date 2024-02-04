@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Actes de Santé</h1>
    <a href="{{ route('actes_sante.create') }}" class="btn btn-primary">Ajouter un nouvel acte de santé</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Pays</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actesSante as $acte)
                <tr>
                    <td>{{ $acte->nom }}</td>
                    <td>{{ $acte->description }}</td>
                    <td>{{ number_format($acte->prix, 2, ',', ' ') }}€</td>
                    <td>{{ $acte->pays->nom }}</td>
                    <td>
                        <a href="{{ route('actes_sante.edit', $acte->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('actes_sante.destroy', $acte->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
