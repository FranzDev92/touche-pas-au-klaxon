<h1 class="mb-4">Trajets proposés</h1>
<table class="table tpk-table">
<thead>
<tr>
<th>Départ</th>
<th>Date</th>
<th>Heure</th>
<th>Destination</th>
<th>Date</th>
<th>Heure</th>
<th>Places</th>
<th></th>
</tr>
</thead>
<tbody>
<?php foreach($trajets as $t):?>
<tr>
<td><?=htmlspecialchars($t['depart'])?></td>
<td><?=htmlspecialchars($t['date_depart'])?></td>
<td><?=htmlspecialchars(substr($t['heure_depart'],0,5))?></td>
<td><?=htmlspecialchars($t['destination'])?></td>
<td><?=htmlspecialchars($t['date_arrivee'])?></td>
<td><?=htmlspecialchars(substr($t['heure_arrivee'],0,5))?></td>
<td><?=htmlspecialchars($t['places_total'])?></td>
<td class="text-end">
<a href="/trajets/details/<?=$t['id']?>" class="me-2" title="Voir">👁</a>
<a href="/trajets/edit/<?=$t['id']?>" class="me-2" title="Modifier">✏</a>
<a href="/trajets/delete/<?=$t['id']?>" title="Supprimer">🗑</a>
</td>
</tr>
<?php endforeach;?>
</tbody>
</table>
