<div class="container my-4">
<h1 class="h3 mb-4">Mes trajets</h1>
<?php if(empty($trajets)):?>
<p class="text-muted">Vous n'avez encore créé aucun trajet.</p>
<?php else:?>
<div class="table-responsive">
<table class="table table-hover align-middle">
<thead class="table-light">
<tr>
<th>Départ</th>
<th>Date</th>
<th>Heure</th>
<th>Destination</th>
<th>Date</th>
<th>Heure</th>
<th class="text-center">Places</th>
</tr>
</thead>
<tbody>
<?php foreach($trajets as $t):?>
<tr>
<td><?=htmlspecialchars($t['depart'])?></td>
<td><?=htmlspecialchars($t['date_depart'])?></td>
<td><?=htmlspecialchars($t['heure_depart'])?></td>
<td><?=htmlspecialchars($t['destination'])?></td>
<td><?=htmlspecialchars($t['date_arrivee'])?></td>
<td><?=htmlspecialchars($t['heure_arrivee'])?></td>
<td class="text-center"><?=htmlspecialchars($t['places_total'])?></td>
</tr>
<?php endforeach;?>
</tbody>
</table>
</div>
<?php endif;?>
</div>
