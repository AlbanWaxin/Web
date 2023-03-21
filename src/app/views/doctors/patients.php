<h1>Patients</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Health Condition</th>
        </tr>
    </thead>
    <tbody class="table-group-divider">
        <?php
        foreach ($data['patients'] as $patient) { ?>
            <tr>
                <th scope="row"><?= $patient['name'] ?></th>
                <td><a href="mailto:<?= $patient['email'] ?>"><?= $patient['email'] ?></a></td>
                <td><?= $patient['phone'] ?></td>
                <td><?= $patient['health_condition'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- <?php var_dump($data['patients']) ?> -->