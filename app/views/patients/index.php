
<h1>Patients</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Health Condition</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
        foreach ($data['patients'] as $patient) { ?>
            <tr>
                <th scope="row"><a href=/patients/show/<?= $patient['id'] ?>> <?= $patient['name'] ?></a></th>
                <td><a href="mailto:<?= $patient['email'] ?>"><?= $patient['email'] ?></a></td>
                <td><?= $patient['phone'] ?></td>
                <td><?= $patient['health_condition'] ?></td>
                <td class="d-flex gap-2">

                    <!-- TODO : faire les pages delete et update -->
                    <a href="/patients/edit/<?= $patient['id'] ?>" class="btn btn-primary" role="button">
                        <i class="bi bi-pen-fill"></i>
                    </a>
                    <a href="/patients/delete/<?= $patient['id'] ?>" class="btn btn-danger" role="button">
                        <i class="bi bi-trash-fill"></i>
                    </a>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="d-grid gap-2">
    <a class="btn btn-primary" href="/patients/add">Ajouter un patient</a>
</div>