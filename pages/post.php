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
    <main class="py-4">
        <div class="container">

            <div class="row justify-content-center">
                <?php
                // REVIEW Préparer une requête pour récupérer les auteurs des microservices
                // displayPosts('microservices');
                // ANCHOR NEW

                require_once ROOT_PATH . '/controllers/MicroserviceController.php';
                $MC = new MicroserviceController();
                $MC->displayMicroservice();
                ?>
            </div>
        </div>
    </main>
    <?php
    include_once ROOT_PATH . '/inc/footer.php';
    ?>
</body>

</html>