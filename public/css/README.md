# Touche pas au Klaxon

Application web de covoiturage développée en PHP dans le cadre d’un projet pédagogique.

## Fonctionnalités
- Consultation publique des trajets
- Détails d’un trajet
- Authentification utilisateur
- Création de trajets
- Espace administrateur :
  - Gestion des trajets
  - Gestion des utilisateurs
  - Gestion des agences

## Prérequis
- PHP 8.x
- MySQL / MariaDB
- Serveur local (XAMPP, WAMP ou serveur PHP intégré)
- Composer

## Installation

1. Cloner le dépôt :
```bash
git clone https://github.com/FranzDev92/touche-pas-au-klaxon.git

Installer les dépendances :

composer install


Créer la base de données :

Importer le fichier database/schema.sql

Importer le fichier database/seed.sql

Configurer la base de données :
Modifier le fichier :

config/database.php


Lancer le serveur :

php -S localhost:4000 -t public


Accéder à l’application :
http://localhost:4000

Comptes de test
Compte administrateur

Email : tony.stark@tpak.local

Mot de passe : admin123

Compte utilisateur

Email : peter.parker@tpak.local

Mot de passe : user123