<h1>Détails du patient</h1>
<hr>
<figure>
    <blockquote class="blockquote">
        <h2>
            <?= $data['name']; ?>
        </h2>
</figure>

<h5><span class="badge bg-primary"><i class="bi bi-envelope-fill"></i></span> <u>
        <?php echo $data['email']; ?>
    </u></h5>
<h5><span class="badge bg-primary"><i class="bi bi-telephone-fill"></i></span> <u>
        <?php echo $data['phone']; ?>
    </u></h5>
<h5><span class="badge bg-primary"><i class="bi bi-file-earmark-medical-fill"></i></span> <?= $data['health_condition'] ?></h5>