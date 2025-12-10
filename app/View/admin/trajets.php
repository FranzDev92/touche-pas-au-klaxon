<h2 class="mb-4">Trajets proposés</h2>

<table class="table table-striped align-middle">
  <thead>
    <tr>
      <th>Départ</th>
      <th>Date</th>
      <th>Heure</th>
      <th>Destination</th>
      <th>Date</th>
      <th>Heure</th>
      <th>Places</th>
      <th class="text-end">Actions</th>
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
      <td><?=htmlspecialchars($t['places_total'])?></td>
      <td class="text-end">
        <a href="/trajet/<?=$t['id']?>" class="me-2" title="Voir">
          <i class="bi bi-eye"></i>
        </a>
        <!-- liens de modif/suppresion qu’on branchera ensuite -->
        <a href="#" class="me-2" title="Modifier">
          <i class="bi bi-pencil"></i>
        </a>
        <a href="#" title="Supprimer">
          <i class="bi bi-trash"></i>
        </a>
      </td>
    </tr>
  <?php endforeach;?>
  </tbody>
</table>

<p class="text-muted mt-3">
  Pour obtenir plus d’informations sur un trajet, veuillez vous connecter.
</p>
