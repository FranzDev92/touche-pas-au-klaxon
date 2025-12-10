<?php
if(session_status()===PHP_SESSION_NONE){session_start();}
$user=$_SESSION['user']??null;
$isAdmin=$user && !empty($user['is_admin']);
$isAdminPage=!empty($isAdminPage) && $isAdmin;
?><!doctype html>
<html lang="fr">
<head>
<meta charset="utf-8">
<title>Touche pas au klaxon</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="/css/style.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<header class="border-bottom mb-4">
  <div class="container d-flex align-items-center justify-content-between py-2">
    <div class="fw-semibold fs-5">Touche pas au klaxon</div>
    <nav class="d-flex align-items-center gap-2">
      <?php if($isAdminPage):?>
        <a href="/admin/users" class="btn btn-secondary btn-sm">Utilisateurs</a>
        <a href="/admin/agences" class="btn btn-secondary btn-sm">Agences</a>
        <a href="/admin/trajets" class="btn btn-secondary btn-sm">Trajets</a>
      <?php elseif($user):?>
        <a href="/trajets/create" class="btn btn-dark btn-sm">Créer un trajet</a>
      <?php endif;?>

      <?php if($user):?>
        <span class="ms-3">Bonjour <?=htmlspecialchars($user['prenom'].' '.$user['nom'])?></span>
        <a href="/logout" class="btn btn-dark btn-sm ms-2">Déconnexion</a>
      <?php else:?>
        <a href="/login" class="btn btn-dark btn-sm">Connexion</a>
      <?php endif;?>
    </nav>
  </div>
</header>

<main class="container mb-5">
<?php if(!empty($flash['type'])):?>
  <div class="alert alert-<?=htmlspecialchars($flash['type'])?> mb-4">
    <?=htmlspecialchars($flash['message'])?>
  </div>
<?php endif;?>
