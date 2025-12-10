<div class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50 d-flex align-items-center justify-content-center">
  <div class="card shadow" style="min-width:320px;max-width:480px;">
    <div class="card-header d-flex justify-content-between align-items-center">
      <span>Détails du trajet</span>
      <a href="/" class="btn-close"></a>
    </div>
    <div class="card-body">
      <p class="mb-2"><strong>Auteur :</strong> <?=htmlspecialchars($trajet['nom'])?></p>
      <p class="mb-2"><strong>Téléphone :</strong> <?=htmlspecialchars($trajet['telephone'])?></p>
      <p class="mb-2"><strong>Email :</strong> <?=htmlspecialchars($trajet['email'])?></p>
      <p class="mb-0"><strong>Nombre total de places :</strong> <?=htmlspecialchars($trajet['places_total'])?></p>
    </div>
    <div class="card-footer text-end">
      <a href="/" class="btn btn-secondary btn-sm">Fermer</a>
    </div>
  </div>
</div>
