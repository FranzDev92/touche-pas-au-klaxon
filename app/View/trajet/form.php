<h1 class="mb-4">
<?=($mode==='edit'?'Modifier un trajet':'Créer un trajet')?>
</h1>

<?php if(!empty($errors)):?>
<div class="alert alert-danger">
<ul class="mb-0">
<?php foreach($errors as $e):?>
<li><?=htmlspecialchars($e)?></li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>

<?php
$action=($mode==='edit' && !empty($trajet['id']))
? '/trajet/'.$trajet['id'].'/edit'
: '/trajet/create';
?>

<form method="post" class="row g-3">

<div class="col-md-6">
<label class="form-label">Agence de départ</label>
<select name="id_agence_depart" class="form-select" required>
<option value="">-- Choisir --</option>
<?php foreach($agences as $a):?>
<option value="<?=$a['id']?>"
<?php if((int)($trajet['id_agence_depart']??0)===(int)$a['id']) echo 'selected';?>>
<?=htmlspecialchars($a['ville'])?>
</option>
<?php endforeach;?>
</select>
</div>

<div class="col-md-6">
<label class="form-label">Agence d'arrivée</label>
<select name="id_agence_arrivee" class="form-select" required>
<option value="">-- Choisir --</option>
<?php foreach($agences as $a):?>
<option value="<?=$a['id']?>"
<?php if((int)($trajet['id_agence_arrivee']??0)===(int)$a['id']) echo 'selected';?>>
<?=htmlspecialchars($a['ville'])?>
</option>
<?php endforeach;?>
</select>
</div>

<div class="col-md-3">
<label class="form-label">Date de départ</label>
<input type="date" name="date_depart" class="form-control"
value="<?=htmlspecialchars($trajet['date_depart']??'')?>" required>
</div>

<div class="col-md-3">
<label class="form-label">Heure de départ</label>
<input type="time" name="heure_depart" class="form-control"
value="<?=htmlspecialchars($trajet['heure_depart']??'')?>" required>
</div>

<div class="col-md-3">
<label class="form-label">Date d'arrivée</label>
<input type="date" name="date_arrivee" class="form-control"
value="<?=htmlspecialchars($trajet['date_arrivee']??'')?>" required>
</div>

<div class="col-md-3">
<label class="form-label">Heure d'arrivée</label>
<input type="time" name="heure_arrivee" class="form-control"
value="<?=htmlspecialchars($trajet['heure_arrivee']??'')?>" required>
</div>

<div class="col-md-3">
<label class="form-label">Nombre total de places</label>
<input type="number" min="1" name="places_total" class="form-control"
value="<?=htmlspecialchars($trajet['places_total']??'')?>" required>
</div>

<div class="col-12 mt-3">
<button type="submit" formaction="<?=$action?>" class="btn btn-primary">
<?=($mode==='edit'?'Enregistrer les modifications':'Créer le trajet')?>
</button>
<a href="/" class="btn btn-outline-secondary ms-2">Annuler</a>
</div>

</form>
