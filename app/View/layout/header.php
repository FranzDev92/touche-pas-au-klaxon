<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Touche pas au Klaxon</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
<?php require __DIR__.'/flash.php'; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4 px-3">
<a class="navbar-brand fw-bold" href="/">Touche pas au Klaxon</a>
<div class="collapse navbar-collapse">
<ul class="navbar-nav ms-auto">
<?php if(!empty($_SESSION['user'])): ?>
<li class="nav-item me-3">
<a class="nav-link" href="/trajet/create">Créer un trajet</a>
</li>
<?php if(!empty($_SESSION['user']['is_admin']) && (int)$_SESSION['user']['is_admin']===1): ?>
<li class="nav-item me-3">
<a class="nav-link" href="/admin">Administration</a>
</li>
<?php endif; ?>
<li class="nav-item me-3">
<span class="nav-link">Bonjour <?=htmlspecialchars($_SESSION['user']['prenom'])?></span>
</li>
<li class="nav-item">
<a class="btn btn-outline-danger btn-sm" href="/logout">Déconnexion</a>
</li>
<?php else: ?>
<li class="nav-item">
<a class="btn btn-primary btn-sm" href="/login">Connexion</a>
</li>
<?php endif; ?>
</ul>
</div>
</nav>
