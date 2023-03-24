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
  <main class="py-4">
    <div class="container">
      <div class="row">
        <h1 class="text-custom-dark">Microservices</h1>
      </div>
        <?php
        // REVIEW Préparer une requête pour récupérer les auteurs des microservices
        // displayTable('microservices');
        // ANCHOR NEW
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
          header('Location: ' . BROWSER_PATH . '/index.php');
        }
        require_once 'controllers/MicroserviceController.php';
        $MC = new MicroserviceController();
        $MC->displayDashboard();
        // Utilisez ici les données récupérées pour afficher le tableau des microservices

        ?>


    </div>
  </main>
  <?php
  include_once 'inc/footer.php';
  ?>
</body>

</html>