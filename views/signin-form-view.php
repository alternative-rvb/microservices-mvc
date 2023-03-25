<div class="row py-4 justify-content-center">
    <form class="col-md-4  border border-custom-primary p-4 rounded" action="#" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email :</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu'un d'autre.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe :</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <button type="submit" class="btn btn-custom-primary">Connexion</button>
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