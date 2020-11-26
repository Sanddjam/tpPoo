<ul>
    <li>
        <strong>Identifiant :</strong> <?= $livre->getId() ?> </li>
    <li>
        <strong> Titre : </strong><?= $livre->getTitre() ?>
    </li>
    <li>
        Auteur : </strong><?= $livre->getAuteur() ?>
    </li>
</ul>

<form action="" method="post">
    <button name="confirmation" class="btn btn-primary">Confirmer</button>
    <button name= "annulation" class="btn btn-danger">Annuler</button>
</form>