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
</tr>
<?php endforeach;?>
</tbody>
</table>
<p class="mt-4">Pour obtenir plus d'informations sur un trajet, veuillez vous connecter.</p>
