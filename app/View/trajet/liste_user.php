<h1 class="mb-4">Trajets proposés</h1>
<table class="table table-hover align-middle">
<thead>
<tr>
<th>Départ</th>
<th>Date</th>
<th>Heure</th>
<th>Destination</th>
<th>Date</th>
<th>Heure</th>
<th>Places dispo</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<?php foreach($trajets as $t):?>
<tr>
<td><?=htmlspecialchars($t['depart'])?></td>
<td><?=htmlspecialchars($t['date_depart'])?></td>
<td><?=htmlspecialchars($t['heure_depart'])?></td>
<td><?=htmlspecialchars($t['arrivee'])?></td>
<td><?=htmlspecialchars($t['date_arrivee'])?></td>
<td><?=htmlspecialchars($t['heure_arrivee'])?></td>
<td><?=htmlspecialchars($t['places_total'])?></td>
<td class="text-nowrap">
<button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#trajetModal<?=$t['id']?>">
Détails
</button>
<?php if(isset($user) && $user['id']==$t['id_utilisateur']):?>
<a href="/trajet/<?=$t['id']?>/edit" class="btn btn-sm btn-outline-secondary">Modifier</a>
<form action="/trajet/<?=$t['id']?>/delete" method="post" class="d-inline" onsubmit="return confirm('Supprimer ce trajet ?');">
<button type="submit" class="btn btn-sm btn-outline-danger">Supprimer</button>
</form>
<?php endif;?>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>

<?php foreach($trajets as $t):?>
<div class="modal fade" id="trajetModal<?=$t['id']?>" tabindex="-1" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Détails du trajet</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
</div>
<div class="modal-body">
<p><strong>Auteur :</strong> <?=htmlspecialchars($t['prenom'].' '.$t['nom'])?></p>
<p><strong>Téléphone :</strong> <?=htmlspecialchars($t['telephone'])?></p>
<p><strong>Email :</strong> <?=htmlspecialchars($t['email'])?></p>
<p><strong>Nombre total de places :</strong> <?=htmlspecialchars($t['places_total'])?></p>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
</div>
</div>
</div>
</div>
<?php endforeach;?>

<p class="mt-3 text-muted">Pour proposer un trajet, utilisez le bouton “Créer un trajet” dans le header.</p>
