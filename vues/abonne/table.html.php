<table class="table">
    <thead class="thead-dark">
        <th>Id</th>
        <th>Prénom</th>
        <th>Incription</th>
    </thead>
    <?php foreach ($abonnes as $abonne) : ?>
        <tr>
            <td><?= $abonne->getId() ?></td>
            <td><?= $abonne->getPrenom() ?></td>
            <td><?= $abonne->getDate_inscription() ?></td>
        </tr>
    <?php endforeach ?>
</table>