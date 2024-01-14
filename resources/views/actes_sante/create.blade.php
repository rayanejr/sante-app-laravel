<x-guest-layout>
    <div id="wrapper">
        <!-- Sidebar (à adapter selon vos besoins) -->
        <div id="sidebar-wrapper">
            <div class="sidebar-heading">Sante-APP</div>
            <div class="list-group list-group-flush">
                <a href="{{ route('admin.index') }}" class="list-group-item list-group-item-action">Dashboard</a>
                <a href="{{ route('actes_sante.index') }}" class="list-group-item list-group-item-action">Actes de Santé</a>
                <a href="{{ route('deplacements.index') }}" class="list-group-item list-group-item-action">Déplacements</a>
                <a href="{{ route('pays.index') }}" class="list-group-item list-group-item-action">Pays</a>
                <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action">Utilisateurs</a>
            </div>
        </div>

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container">
                <h1 class="mt-4">Ajouter un Acte de Santé</h1>
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('actes_sante.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control" id="nom" name="nom" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" id="prix" name="prix" step="0.01" required>
                            </div>
                            <div class="form-group">
                                <label for="pays_id">Pays</label>
                                <select class="form-control" id="pays_id" name="pays_id" required>
                                    @foreach($pays as $paysItem)
                                        <option value="{{ $paysItem->id }}">{{ $paysItem->nom }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        body, html {
        height: 100%;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Roboto', sans-serif;
        }
        #wrapper {
            display: flex;
        }
        #sidebar-wrapper {
            min-height: 100vh;
            width: 250px;
            background-color: #3490dc;
            color: white;
        }
        .sidebar-heading {
            text-align: center;
            padding: 20px;
            font-size: 1.5rem;
        }
        .list-group-item {
            background-color: #3490dc;
            padding: 15px;
            border-radius: 0;
            transition: all 0.3s ease;
            border: none;
        }
        .list-group-item:hover, .list-group-item:focus {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
            background-color: #2779bd;
        }
        #page-content-wrapper {
            flex-grow: 1;
            padding: 20px;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 1200px;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0,0,0,0.2);
        }
        .card-header {
            background: linear-gradient(135deg, #6AC8FF 0%, #3A8DFF 100%);
            color: #fff;
            padding: 20px;
        }
        .card-body {
            background-color: #fff;
            padding: 40px 20px;
        }
        h1.mt-4 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #3490dc;
            border-color: #2779bd;
        }
        .btn-primary:hover {
            background-color: #2779bd;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</x-guest-layout>
