@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Recommandations</h1>
    <a href="{{ route('recommandations.create') }}" class="btn btn-primary">Ajouter une recommandation</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Contenu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($recommandations as $recommandation)
                <tr>
                    <td>{{ $recommandation->titre }}</td>
                    <td>{{ $recommandation->contenu }}</td>
                    <td>
                        <a href="{{ route('recommandations.edit', $recommandation->id) }}" class="btn btn-warning">Modifier</a>
                        <form action="{{ route('recommandations.destroy', $recommandation->id) }}" method="POST" style="display:inline;">
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
