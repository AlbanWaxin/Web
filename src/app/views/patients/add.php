<h1>Ajouter un patient</h1>
<div class="my-3">
    <?php
    foreach ($data['error'] as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php } ?>
</div>
<form method="POST" action="/patients/add">
    <!-- Champ pour le nom du patient -->

    <div class="form-group">
        <label for="name">Nom du patient</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $data["name"] ?>">
    </div>
    <!-- Champ pour l'email du patient -->

    <div class="form-group">
        <label for="email">Email du patient</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $data["email"] ?>">
    </div>
    <!-- Champ pour le téléphone du patient -->

    <div class="form-group">
        <label for="phone">Téléphone du patient</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="<?= $data["phone"] ?>">
    </div>
    <!-- Champ pour l'état de santé du patient -->

    <div class="form-group">
        <label for="health_condition">Etat de santé du patient</label>
        <textarea class="form-control" id="health_condition" name="health_condition" value="<?= $data["health_condition"] ?>" rows="3"></textarea>
    </div>
    <!-- Bouton pour soumettre le formulaire -->
    <button type="submit" class="btn btn-primary">Ajouter le patient</button>
</form>