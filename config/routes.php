<?php

use App\Controller\TrajetController;
use App\Controller\AuthController;
use App\Controller\AdminController;

/*
 * Page d’accueil : liste publique des trajets
 */
$router->get('/', function () {
    $c = new TrajetController();
    $c->publicList();
});

/*
 * Détail d’un trajet (page “modal” avec Peter Parker & co)
 * URL attendue : /trajet/1, /trajet/2, etc.
 */
$router->get('/trajet/{id}', function (int $id) {
    $c = new TrajetController();
    $c->details($id);
});

/*
 * Authentification
 */
$router->get('/login', function () {
    $c = new AuthController();
    $c->showLogin();
});

$router->post('/login', function () {
    $c = new AuthController();
    $c->login();
});

$router->get('/logout', function () {
    $c = new AuthController();
    $c->logout();
});

/*
 * Espace admin
 * Toutes ces routes passent par AdminController et requireAdmin()
 */

// page d’accueil de l’admin = liste des trajets
$router->get('/admin', function () {
    $c = new AdminController();
    $c->trajets();
});

$router->get('/admin/trajets', function () {
    $c = new AdminController();
    $c->trajets();
});

// liste des utilisateurs
$router->get('/admin/users', function () {
    $c = new AdminController();
    $c->users();
});

// liste des agences
$router->get('/admin/agences', function () {
    $c = new AdminController();
    $c->agences();
});

// création d’agence
$router->post('/admin/agences', function () {
    $c = new AdminController();
    $c->createAgence();
});

// modification d’agence
$router->post('/admin/agences/{id}', function (int $id) {
    $c = new AdminController();
    $c->updateAgence($id);
});

// suppression d’agence
$router->post('/admin/agences/{id}/delete', function (int $id) {
    $c = new AdminController();
    $c->deleteAgence($id);
});
