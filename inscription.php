<!doctype html>
<html lang="en">

<head>
    <?php
    include_once 'inc/head.php';
    ?>
</head>

<body>
    <?php
    include_once 'inc/header.php';
    ?>
    <main class="container p-1">
        <div class="row py-4 text-center">
            <h1 class="text-custom-dark">Inscription</h1>
        </div>
        <div class="row">
            <?php
            require_once 'controllers/UserController.php';
            $MC = new UserController();
            $MC->handleSignUpFormSubmission();
            ?>
        </div>
        </div>

    </main>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>

</html>