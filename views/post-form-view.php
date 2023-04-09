<div class="my-2   border border-custom-primary p-4 rounded">
    <form class="mb-2" method="POST" enctype="multipart/form-data">
        <!-- ANCHOR HIDDEN -->
        <input type="hidden" name="id" value="<?= $id ?>" />
        <!-- ANCHOR HIDDEN -->
        <input type="hidden" name="action" value="<?= $action ?>" />
        <div class="mb-3">
            <label class="form-label" for="titre">Titre :</label>
            <input class="form-control" type="text" id="titre" name="titre" value="<?= isset($_SESSION['titre']) ? $_SESSION['titre'] : (isset($row['title']) ? $row['title']  : NULL)  ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label" for="contenu">Contenu :</label>
            <textarea class="form-control" id="contenu" name="contenu" style="min-height:20vh;"><?= isset($_SESSION['contenu']) ? $_SESSION['contenu'] : (isset($row['content']) ? $row['content']  : NULL)  ?></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label" for="prix">Prix :</label>
            <input class="form-control" type="text" name="prix" value="<?= isset($_SESSION['prix']) ? $_SESSION['prix'] : (isset($row['content']) ? $row['price']  : NULL)  ?>">
        </div>
        <div class="mb-3">
            <!-- ANCHOR HIDDEN -->
            <!-- Double condition -->
            <input class="form-control" type="hidden" name="userID" value="<?= isset($_SESSION['currentUser_id']) ? $_SESSION['currentUser_id'] : (isset($row['user_id']) ? $row['user_id']  : 1) ?>
">
        </div>
        <div class="mb-3">
            <!-- ANCHOR HIDDEN -->
            <input type="hidden" name="old_image" value="<?= isset($row['image']) ? $row['image']  : NULL ?>">

            <label class="form-label" for="image">Ajouter une image :
                <?php if (!empty($row['image'])) : ?>
                    <div>
                        <img src="<?= BROWSER_PATH . '/uploads/images/' .(isset($row['image']) ? $row['image']  : NULL) ?>" alt="<?= isset($_SESSION['titre']) ? $_SESSION['titre'] : (isset($row['title']) ? $row['title']  : NULL)  ?>" width="100px" />
                    </div>
                    <p> <strong>image actuelle :</strong><?= $row['image'] ?></p>
                <?php endif ?>
            </label>
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
            <input type="hidden" name="id" value="<?= isset($row['microservice_id']) ? $row['microservice_id']  : NULL ?>" />
            <div>
                <button class="btn btn-danger btn-sm" type="submit"><i class="bi bi-trash"></i> Supprimer</button>
            </div>
        </form>
    <?php endif ?>
    <a class="btn btn-sm" href="<?= BROWSER_PATH . '/dashboard/' ?>">Annuler</a>
</div>