<?php
// ANCHOR Afficher les articles
foreach ($rows as $row) :
?>
    <article class="col-md-6 col-lg-4 p-2">
        <div class="art__body  h-100 rounded d-flex flex-column">
            <?php
            if (isset($row['Image']) && !empty($row['Image']) && file_exists('uploads/images/' . $row['Image'])) :
            ?>
                <div class="text-center">
                    <img class="img-fluid" src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Contenu'] ?>">
                </div>
            <?php
            endif;
            ?>
            <div class="p-2">
                <h3><a class="link-custom-dark" href="<?= BROWSER_PATH.'/pages/post.php?id='.$row['microservice_id'] ?>"><?= $row['Titre'] ?></a></h3>
                <p class="text-custom-secondary"><i class="bi bi-person-circle"></i>
                    <?php
                    if (!empty($row['Prénom']) && !empty($row['Nom'])) {
                        echo $row['Prénom'] . ' ' . $row['Nom'];
                    } else {
                        echo 'Anonymous';
                    }
                    ?>
                </p>
                <p><?= $row['Contenu'] ?></p>
            </div>
            <p class="p-2 mt-auto d-flex justify-content-between align-items-end">
                <a class="btn btn-custom-secondary" href="#">À partir de <strong><?= $row['Prix'] ?> €</strong></a>
                <!-- READ MORE -->
                <a class="link-custom-secondary" href="<?= BROWSER_PATH.'/pages/post.php?id='. $row['microservice_id'] ?>">En savoir plus </a>
            </p>
        </div>
    </article>
<?php
endforeach;
?>