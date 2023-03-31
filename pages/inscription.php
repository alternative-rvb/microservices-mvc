<?php 
require_once '../models/variables.php';
?>

<!doctype html>
<html lang="en">

<head>
    <?php
    include_once ROOT_PATH . '/inc/head.php';
    ?>
</head>

<body>
    <?php
    include_once ROOT_PATH . '/inc/header.php';
    ?>
    <main class="container p-1">
        <div class="row py-4 text-center">
            <h1 class="text-custom-dark">Inscription</h1>
        </div>
        <div class="row">
            <?php
            require_once ROOT_PATH . '/controllers/UserController.php';
            $MC = new UserController();
            $MC->handleSignUpFormSubmission();
            ?>
        </div>
        </div>

    </main>
    <?php
    include_once ROOT_PATH . '/inc/footer.php';
    ?>
</body>

</html>