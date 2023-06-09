<?php
require_once 'models/variables.php';
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
    <main>
        <div class="hero container-fluid mb-4">
            <div class="row py-5 justify-content-center">
                <div class="col-md-6">
                    <h1 class="text-white text-center">20 000 micro-services pour tous vos besoins.</h1>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <?php

                require_once ROOT_PATH . '/controllers/MicroserviceController.php';
                $MC = new MicroserviceController();
                $MC->displayMicroservicesWithUserDetails();
                ?>
            </div>
        </div>
    </main>
    <?php
    include_once ROOT_PATH . '/inc/footer.php';
    ?>
</body>

</html>