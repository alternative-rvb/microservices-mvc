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
    <main>
        <div class="container-fluid mb-4">
        <div class="row py-5 bg-custom-primary justify-content-center">
                <div class="col-md-4">
                    <h1 class="text-white text-center">20 000 micro-services pour tous vos besoins.</h1>
                </div>
            </div>
        </div>
        <div class="container">

            <div class="row">
                <?php

                require_once 'controllers/MicroserviceController.php';
                $MC = new MicroserviceController();
                $MC->displayMicroservicesWithUserDetails();
                ?>
            </div>
        </div>
    </main>
    <?php
    include_once 'inc/footer.php';
    ?>
</body>

</html>