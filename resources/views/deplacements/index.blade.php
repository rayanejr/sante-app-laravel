@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Déplacements</h1>
    <a href="{{ route('deplacements.create') }}" class="btn btn-primary">Ajouter un déplacement</a>
    <table class="table">
        <thead>
            <tr>
                <th>Utilisateur ID</th>
                <th>Pays ID</th>
                <th>Date de Départ</th>
                <th>Date de Retour</th>
                <th>Empreinte CO2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($deplacements as $deplacement)
                <tr>
                    <td>{{ $deplacement->user_id }}</td>
                    <td>{{ $deplacement->pays_id }}</td>
                    <td>{{ $deplacement->date_depart }}</td>
                    <td>{{ $deplacement->date_retour }}</td>
                    <td>{{ $deplacement->empreinte_co2 }}</td>
                    <td>
                        <a href="{{ route('deplacements.edit', $deplacement->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('deplacements.destroy', $deplacement->id) }}" method="POST" style="display:inline;">
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
