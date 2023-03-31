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
                <th scope="row">
                    <a href="/patients/show/<?= $patient['id'] ?>"> <?= $patient['name'] ?> <i class="bi bi-eye-fill"></i></a>
                </th>
                <td><a href="mailto:<?= $patient['email'] ?>"><?= $patient['email'] ?></a></td>
                <td><?= $patient['phone'] ?></td>
                <td><?= $patient['health_condition'] ?></td>
                <td class="d-flex gap-2">

                    <a href="/patients/edit/<?= $patient['id'] ?>" class="btn btn-primary" role="button">
                        <i class="bi bi-pen-fill"></i>
                    </a>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $patient['id'] ?>">
                        <i class="bi bi-trash-fill"></i>
                    </button>
                    <div class="modal fade" id="deleteModal<?= $patient['id'] ?>" tabindex="-1" aria-labelledby="deleteModal<?= $patient['id'] ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Supprimer un patient</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Voulez vous vraiment Supprimer le patient : <strong><mark><?= $patient['name'] ?></mark></strong></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="/patients/delete/<?= $patient['id'] ?>" role="button">Supprimer</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<div class="d-grid gap-2">
    <a class="btn btn-primary" href="/patients/add">Ajouter un patient</a>
</div>


<!-- <?php var_dump($data['patients']) ?> -->