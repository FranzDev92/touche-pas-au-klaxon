<div class="container my-4">
  <h1 class="h4 mb-3">Créer un trajet</h1>

  <form method="post" action="/trajet/store" class="row g-3">

    <div class="col-md-6">
      <label class="form-label" for="depart">Ville de départ</label>
      <input type="text"
             class="form-control"
             id="depart"
             name="depart"
             required>
    </div>

    <div class="col-md-3">
      <label class="form-label" for="date_depart">Date de départ</label>
      <input type="date"
             class="form-control"
             id="date_depart"
             name="date_depart"
             required>
    </div>

    <div class="col-md-3">
      <label class="form-label" for="heure_depart">Heure de départ</label>
      <input type="time"
             class="form-control"
             id="heure_depart"
             name="heure_depart"
             required>
    </div>

    <div class="col-md-6">
      <label class="form-label" for="destination">Ville d'arrivée</label>
      <input type="text"
             class="form-control"
             id="destination"
             name="destination"
             required>
    </div>

    <div class="col-md-3">
      <label class="form-label" for="date_arrivee">Date d'arrivée</label>
      <input type="date"
             class="form-control"
             id="date_arrivee"
             name="date_arrivee">
    </div>

    <div class="col-md-3">
      <label class="form-label" for="heure_arrivee">Heure d'arrivée</label>
      <input type="time"
             class="form-control"
             id="heure_arrivee"
             name="heure_arrivee">
    </div>

    <div class="col-md-3">
      <label class="form-label" for="places_total">Nombre total de places</label>
      <input type="number"
             class="form-control"
             id="places_total"
             name="places_total"
             min="1"
             required>
    </div>

    <div class="col-12 d-flex justify-content-between mt-3">
      <a href="/admin/trajets" class="btn btn-outline-secondary">
        Annuler
      </a>
      <button type="submit" class="btn btn-primary">
        Enregistrer le trajet
      </button>
    </div>
  </form>
</div>
