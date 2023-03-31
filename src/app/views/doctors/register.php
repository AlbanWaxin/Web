<div class="my-3">
    <?php
    foreach ($data['error'] as $error) { ?>
        <div class="alert alert-danger" role="alert">
            <?= $error ?>
        </div>
    <?php } ?>
</div>

<form action="/doctors/register" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="password2" class="form-label">Password Confirmation</label>
        <input type="password" class="form-control" id="password2" name="password2">
    </div>
    <div class="mb-3">
        <label for="gender" class="form-label">Genre</label>
        <select class="form-control" id="gender" name="gender">
            <option value="H">Homme</option>
            <option value="F">Femme</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="specialist" class="form-label">Sélectionnez une spécialité :</label>
        <select class="form-control" id="specialist" name="specialist">
            <option>General</option>
            <option>Pediatric</option>
            <option>Cardiology</option>
            <option>Neurology</option>
            <option>Oncology</option>
        </select>
    </div>

    <button type=" submit" class="btn btn-primary">Submit</button>
</form>