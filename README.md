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

2. **Configuration de l'environnement**
    ```bash
    Copiez et configurez .env.example en .env

3. **Installation de composer et demarrage du conteneur**
    ```bash
    docker run --rm -v $(pwd):/app composer install

4. **Ajout des permissions**
    ```bash
    sudo chmod -R 777 storage bootstrap/cache
    sudo chown -R www-data:www-data /var/www/html

4. **Démarrez les containers Docker**
    ```bash
    docker-compose up -d --build

5. **Exécution des migrations et des seeders**
    ```bash
    docker-compose exec app php artisan migrate --seed
6. **Accédez à l'application**
    ```bash
    - Application : http://localhost:8888
    - phpMyAdmin : http://localhost:8081

7. **Arrêtez les containers Docker**
    ```bash
    docker-compose down
8. **Lancer le projet React Native**
   ```bash
   - (Optionnel) Faire npx create-expo-app sante-app-react dans le dossier sante-app pour installer.
   - Lancer npx expo start.
## Utilisation

- Accueil : Accédez à la page d'accueil de l'application.
- Admin : Interface d'administration pour gérer les actes de santé, les pays, les recommandations et les déplacements.
- Login/Inscription : Authentifiez-vous ou inscrivez-vous pour accéder aux fonctionnalités de l'application.
