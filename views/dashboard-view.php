<?php
// ANCHOR DASHBOARD | Afficher un tableau
?>
<div>
    <a class="btn btn-custom-primary btn-sm" href="<?=BROWSER_PATH?>/dashboard/formulaire-microservice.php"><i class="bi bi-plus-square"></i> Ajouter un post</a>
</div>
<?php
foreach ($rows as $row) :
    // var_dump(array_key_first($row) ? 'yes' : $row);
?>

    <div class="my-2 p-2">
        <article class="row position-relative rounded art__body">
            <div class="p-2 col-md-9">
                <p>
                    <a class="link-custom-primary stretched-link text-decoration-none" href="<?=BROWSER_PATH?>/dashboard/formulaire-microservice.php?id=<?= $row['microservice_id'] ?>"><i class="bi bi-pencil-square"></i> ID: <?= $row['microservice_id'] ?></a>
                </p>

                <p><strong>Titre: </strong><?= $row['title'] ?></p>
                <hr class="border border-white ">

                <p><strong>Description: </strong><?= $row['content'] ?></p>
                <hr class="border border-white ">
                
                <p><strong>Prix:</strong> <?= $row['price'] ?> €</p>
                <p><strong>Auteur: </strong><?= $row['first_name'] . ' ' . $row['last_name'] ?></p>
                <p><?= ($row['role'] === 0) ? '<span class="badge rounded-pill text-bg-custom-secondary">Administrateur</span> ' :  '' ?></p>

            </div>
            <div class="bg-light p-2 col-md-3 text-center">
                <?php
                if (isset($row['image']) && !empty($row['image']) && file_exists(ROOT_PATH.'/uploads/images/' . $row['image'])) :
                ?>
                    <img class="img-fluid" src="<?= BROWSER_PATH.'/uploads/images/' . $row['image'] ?>" alt="<?= $row['title'] ?>">
                    <p><small><strong>Repertoire: </strong>uploads/images/<?= $row['image'] ?> </small></p>
                <?php
                endif;
                ?>
            </div>
        </article>
    </div>
<?php
endforeach;
?>