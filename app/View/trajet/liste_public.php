<div class="container my-4">
    <h1 class="h3 mb-4">Trajets proposés</h1>

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
                    <th class="text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($trajets as $t): ?>
                <tr>
                    <td><?=htmlspecialchars($t['depart'])?></td>
                    <td><?=htmlspecialchars($t['date_depart'])?></td>
                    <td><?=htmlspecialchars($t['heure_depart'])?></td>
                    <td><?=htmlspecialchars($t['destination'])?></td>
                    <td><?=htmlspecialchars($t['date_arrivee'])?></td>
                    <td><?=htmlspecialchars($t['heure_arrivee'])?></td>
                    <td class="text-center"><?=htmlspecialchars($t['places_total'])?></td>

                    <td class="text-center">
                        <?php if(!empty($_SESSION['user'])): ?>
                            <a href="/trajet?id=<?=urlencode((string)$t['id'])?>"
                               class="btn btn-outline-primary btn-sm">
                                Voir +
                            </a>
                        <?php else: ?>
                            <small class="text-muted">Connectez-vous</small>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <p class="text-muted mt-3 mb-0">
        Pour obtenir plus d'informations sur un trajet, veuillez vous connecter.
    </p>
</div>
