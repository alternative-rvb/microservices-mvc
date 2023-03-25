<div class="row py-4 justify-content-center">
    <form class="col-md-4  border border-custom-primary p-4 rounded" action="#" method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom :</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <input type="hidden" name="role" value="1">

        <button type="submit" class="btn btn-custom-primary">Inscription</button>
    </form>
</div>
<div class="row py-2  justify-content-center">
    <div class="col-md-4">

        <?php
        if (!empty($_SESSION['Message'])) :
        ?>
            <?= $_SESSION['Message'] ?>
        <?php
        endif;
        ?>

    </div>
</div>