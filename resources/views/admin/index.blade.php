<x-guest-layout>
    <div id="wrapper">

        <!-- Sidebar -->
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
                <h1 class="mt-4">Tableau de Bord</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                Cartographie des Coûts des Actes de Santé à l'échelle Mondiale
                            </div>
                            <div class="card-body">
                                <p>Une analyse détaillée des coûts des actes de santé dans différents pays, offrant une comparaison transparente pour les utilisateurs.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                Recommandations pour le Tourisme de Santé
                            </div>
                            <div class="card-body">
                                <p>Conseils pratiques et recommandations pour ceux qui envisagent le tourisme de santé, incluant des informations sur les destinations les plus prisées et les aspects à considérer.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                Impact Environnemental : Trace Carbone des Déplacements en Tourisme de Santé
                            </div>
                            <div class="card-body">
                                <p>Évaluation de l'empreinte carbone liée aux voyages internationaux pour des soins médicaux, soulignant l'importance d'une approche durable.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Styles here */
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
    </style>
</x-guest-layout>
