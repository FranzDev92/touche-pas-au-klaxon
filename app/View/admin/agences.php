<h2 class="mb-4">Agences</h2>

<?php if(!empty($_SESSION['flash'])):?>
<div class="alert alert-<?=htmlspecialchars($_SESSION['flash']['type'])?> mb-3">
<?=htmlspecialchars($_SESSION['flash']['message'])?>
</div>
<?php unset($_SESSION['flash']);endif;?>

<table class="table table-striped align-middle mb-4">
<thead>
<tr>
<th>Ville</th>
<th class="text-end">Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($agences as $a):?>
<tr>
<td><?=htmlspecialchars($a['ville'])?></td>
<td class="text-end">
<form action="/admin/agences/<?=$a['id']?>/delete" method="post" class="d-inline">
<button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Supprimer cette agence ?');">Supprimer</button>
</form>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>

<form action="/admin/agences/create" method="post" class="row g-2 align-items-center">
<div class="col-auto">
<input type="text" name="ville" class="form-control" placeholder="Nouvelle agence" required>
</div>
<div class="col-auto">
<button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
</div>
</form>
