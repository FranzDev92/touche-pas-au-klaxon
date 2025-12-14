<div class="container my-4">
  <h1 class="h4 mb-3">Gestion des trajets</h1>

  <div class="table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Départ</th>
          <th>Destination</th>
          <th>Date départ</th>
          <th>Heure départ</th>
          <th>Places</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
      <?php foreach($trajets as $t): ?>
        <tr>
          <td><?= (int)$t['id'] ?></td>
          <td><?= htmlspecialchars((string)($t['depart'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($t['destination'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($t['date_depart'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($t['heure_depart'] ?? '')) ?></td>
          <td><?= htmlspecialchars((string)($t['places_total'] ?? '')) ?></td>
          <td class="text-end">
            <a href="/admin/trajet/edit?id=<?=urlencode((string)$t['id'])?>" class="btn btn-warning btn-sm">Modifier</a>
            <a href="/admin/trajet/<?= (int)$t['id'] ?>/delete" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce trajet ?');">Supprimer</a>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
