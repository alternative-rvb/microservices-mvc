<div class="my-2   border border-custom-primary p-4 rounded">
    <form class="mb-2" method="POST" enctype="multipart/form-data">
        <!-- ANCHOR HIDDEN -->
        <input type="hidden" name="id" value="<?= $id ?>" />
        <!-- ANCHOR HIDDEN -->
        <input type="hidden" name="action" value="<?= $action ?>" />
        <div class="mb-3">
            <label class="form-label" for="titre">Titre :</label>
            <input class="form-control" type="text" id="titre" name="titre" value="<?= isset($row['Titre']) ? $row['Titre'] : NULL ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="contenu">Contenu :</label>
            <textarea class="form-control" id="contenu" name="contenu" style="min-height:20vh;"><?= isset($row['Contenu']) ? $row['Contenu'] : NULL ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="prix">Prix :</label>
            <input class="form-control" type="text" name="prix" value="<?= isset($row['Prix']) ? $row['Prix'] : NULL ?>">
        </div>
        <div class="mb-3">
            <!-- ANCHOR HIDDEN -->
            <!-- Double condition -->
            <input class="form-control" type="hidden" name="userID" value="<?= isset($row['user_id']) ? $row['user_id'] : (isset($_SESSION['currentUser_id']) ? $_SESSION['currentUser_id'] : 1) ?>
">
        </div>
        <div class="mb-3">
            <!-- ANCHOR HIDDEN -->
            <input type="hidden" name="old_image" value="<?= isset($row['Image']) ? $row['Image'] : NULL ?>">

            <label class="form-label" for="image">Ajouter une image :
                <?php if (isset($row['Image'])) : ?>
                    <div>
                        <img src="uploads/images/<?= $row['Image'] ?>" alt="<?= $row['Image'] ?>" width="100px" />
                    </div>
                    <p> <strong>Image actuelle :</strong><?= $row['Image'] ?></p>
            </label>
        <?php endif ?>
        </div>
        <input id="image" class="form-control" type="file" name="image"><br />
        <div>
            <button class="btn btn-custom-primary btn-sm" type="submit"><?= $libelle ?></button>
        </div>
    </form>
    <?php if ($action != "CREATE") : ?>
        <form method="POST">
            <!-- ANCHOR HIDDEN -->
            <input type="hidden" name="action" value="DELETE" />
            <!-- ANCHOR HIDDEN -->
            <input type="hidden" name="id" value="<?= $row['microservice_id'] ?>" />
            <div>
                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i> Supprimer</button>
            </div>
        </form>
        <?php endif ?>
        <a class="btn btn-sm" href="<?= BROWSER_PATH . '/dashboard.php' ?>">Annuler</a>
</div>