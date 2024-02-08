
![Santé-App Interface](https://github.com/rayanejr/sante-app/blob/main/logo.png)

# À propos de Santé-App

Santé-App est une application web innovante développée avec le framework Laravel. Elle vise à cartographier les coûts des actes de santé à l'échelle mondiale et offre des outils pour l'estimation de la trace carbone générée par les déplacements des individus. Santé-App intègre également des fonctionnalités pour le tourisme de santé.

## Fonctionnalités

- Cartographie des coûts des actes de santé.
- Estimation de l'empreinte carbone des déplacements.
- Recommandations pour le tourisme de santé.
- Authentification sécurisée pour les utilisateurs et administrateurs.

## Caractéristiques principales

- Cartographie des coûts des actes de santé.
- Estimation de l'empreinte carbone des déplacements.
- Recommandations pour le tourisme de santé.
- Interface utilisateur intuitive pour une expérience utilisateur optimale.

## Technologies utilisées

- Laravel
- MySQL
- Docker

## Installation et Configuration

Assurez-vous d'avoir Docker installé sur votre machine. Suivez ces étapes pour configurer l'application :

1. **Cloner le dépôt**
    ```bash
    git clone https://github.com/rayanejr/sante-app.git
    cd sante-app
    ```

2. **Configuration de l'environnement**
    ```bash
    Copiez et configurez .env.example en .env
    ```

3. **Installation de composer et démarrage du conteneur**
    ```bash
    docker run --rm -v $(pwd):/app composer install
    ```

4. **Ajout des permissions**
    ```bash
    sudo chmod -R 777 storage bootstrap/cache
    sudo chown -R www-data:www-data /var/www/html
    ```

5. **Démarrez les containers Docker**
    ```bash
    docker-compose up -d --build
    ```

6. **Exécution des migrations et des seeders**
    ```bash
    docker-compose exec app php artisan migrate --seed
    ```

7. **Après avoir initialisé le projet et exécuté les migrations, vous devez effacer toutes les tables et importer `sante-db.sql` qui se trouve à la racine de `sante-app-laravel` pour avoir une base de données complète.**

8. **Accédez à l'application**
    ```bash
    - Application : http://localhost:8888
    - phpMyAdmin : http://localhost:8081
    ```

9. **Arrêtez les containers Docker**
    ```bash
    docker-compose down
    ```

## Utilisation

- **Accueil** : Accédez à la page d'accueil de l'application.
- **Admin** : Interface d'administration pour gérer les actes de santé, les pays, les recommandations et les déplacements.
- **Login/Inscription** : Authentifiez-vous ou inscrivez-vous pour accéder aux fonctionnalités de l'application.
