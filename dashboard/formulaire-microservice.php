<?php
require_once '../models/variables.php';
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once ROOT_PATH . '/inc/head.php'; ?>
</head>

<body>
	<?php include_once ROOT_PATH . '/inc/header.php'; ?>
	<main class="container py-4">
		<div class="row py-4 text-center">
			<h1 class="text-custom-dark">Gestion Microservice</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php
				if (!empty($_SESSION['Message'])) :
				?>
					<?= $_SESSION['Message'] ?></p>
				<?php
					unset($_SESSION['Message']);
				endif;
				?>
				<?php
				require_once ROOT_PATH.'/controllers/MicroserviceController.php';
				$MC = new MicroserviceController();
				$MC->handlePostFormSubmission();
				?>
			</div>
		</div>
	</main>
	<?php include_once ROOT_PATH . '/inc/footer.php'; ?>
</body>

</html>