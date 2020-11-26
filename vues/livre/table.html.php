<table class="table">
    <thead class="thead-dark">
        <th>Id</th>
        <th>Titre</th>
        <th>Auteur</th>
    </thead>
    <?php foreach ($livres as $livre) : ?>
        <tr>
            <td><?= $livre->getId() ?></td>
            <td><?= $livre->getTitre() ?></td>
            <td><?= $livre->getAuteur() ?></td>
        </tr>
    <?php endforeach ?>
</table>