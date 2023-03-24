<?php
require_once 'models/variables.php'
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
    include ROOT_PATH . '/inc/head.php'
    ?>
    <title>Connexion</title>
</head>

<body>
    <?php
    include_once ROOT_PATH . '/inc/header.php'
    ?>
    <main class="container p-1">
        <div class="row py-4 text-center">
            <h1 class="text-custom-dark">Connexion</h1>
        </div>
        <?php

        require_once 'controllers/UserController.php';
        $MC = new UserController();
        $MC->handleSignInFormSubmission();
        ?>
    </main>
    <?php
    include_once ROOT_PATH . "/inc/footer.php"
    ?>
</body>

</html>