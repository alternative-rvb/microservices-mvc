<?php
// ANCHOR DASHBOARD | Afficher un tableau
?>
<div>
    <a class="btn btn-custom-primary btn-sm" href="formulaire-microservice.php"><i class="bi bi-plus-square"></i> Ajouter un post</a>
</div>
<?php
foreach ($rows as $row) :
    // var_dump(array_key_first($row) ? 'yes' : $row);
?>

   <div class="my-2 p-2" >
     <article class="row position-relative rounded art__body">
        <div class="p-2 col-md-9">
            <p>
                <a class="link-custom-primary stretched-link text-decoration-none" href="formulaire-microservice.php?id=<?= $row['microservice_id'] ?>"><i class="bi bi-pencil-square"></i> ID: <?= $row['microservice_id'] ?></a>
            </p>

            <p><strong>Prix:</strong> <?= $row['Prix'] ?> €</p>
            <p><strong>Auteur:</strong><?= $row['Prénom'] . ' ' . $row['Nom'] ?></p>
            <p><?= $row['Rôle'] ? '<span class="badge rounded-pill text-bg-custom-secondary">Administrateur</span> ' :  '' ?></p>

            <hr class="border border-white ">
            <p><strong>Titre: </strong><?= $row['Titre'] ?></p>

            <hr class="border border-white ">
            <p><strong>Description: </strong><?= $row['Contenu'] ?></p>
        </div>
        <div class="bg-light p-2 col-md-3 text-center">
            <?php
            if (isset($row['Image']) && !empty($row['Image']) && file_exists('uploads/images/' . $row['Image'])) :
            ?>
                <img class="img-fluid" src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Titre'] ?>">
                <p><small><strong>Repertoire: </strong>uploads/images/<?= $row['Image'] ?> </small></p>
            <?php
            endif;
            ?>
        </div>
    </article>
   </div>
<?php
endforeach;
?>