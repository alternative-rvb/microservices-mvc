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
      <div class="row">
        <h1 class="text-custom-dark">Microservices</h1>
        <?php
        if (!empty($_SESSION['Message'])) :
        ?>
          <?= $_SESSION['Message'] ?>
        <?php
          unset($_SESSION['Message']);
        endif;
        ?>
      </div>
      <?php
      // REVIEW Préparer une requête pour récupérer les auteurs des microservices
      // displayTable('microservices');
      // ANCHOR NEW

      require_once ROOT_PATH . '/controllers/MicroserviceController.php';
      $MC = new MicroserviceController();
      $MC->displayDashboard();
      // Utilisez ici les données récupérées pour afficher le tableau des microservices

      ?>


    </div>
  </main>
  <?php
  include_once ROOT_PATH . '/inc/footer.php';
  ?>
</body>

</html>