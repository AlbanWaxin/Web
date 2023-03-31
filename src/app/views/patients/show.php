<h1>Détails du patient</h1>
<hr>
<figure>
    <blockquote class="blockquote">
        <h2>
            <?= $data['name']; ?>
        </h2>
    </blockquote>
    <figcaption class="blockquote-footer">
        <?= 'Dernière modification : ' . date_format(new DateTime($data["updated_at"]), 'd/m/Y') ?>
    </figcaption>
</figure>

<div class="container text-start">

    <div class="row">

        <div class="col-1 text-end">
            <h4><span class="badge bg-primary"><i class="bi bi-envelope-fill"></i></span></h4>
        </div>

        <div class="col-11">
            <p>
                <?php echo $data['email']; ?>
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-1 text-end">
            <h4><span class="badge bg-primary"><i class="bi bi-telephone-fill"></i></span></h4>
        </div>

        <div class="col-11">
            <p>
                <?php echo $data['phone']; ?>
            </p>
        </div>
    </div>

    <div class="row">

        <div class="col-1 text-end">
            <h4><span class="badge bg-primary"><i class="bi bi-file-earmark-medical-fill"></i></span></h4>
        </div>

        <div class="col-11">
            <p class="text-start"><?= $data['health_condition'] ?></p>
        </div>
    </div>
</div>