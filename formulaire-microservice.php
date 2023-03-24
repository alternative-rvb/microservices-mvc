<!doctype html>
<html lang="en">

<head>
	<?php include_once 'inc/head.php'; ?>
</head>

<body>
	<?php include_once 'inc/header.php'; ?>
	<main class="container py-4">
		<div class="row py-4 text-center">
			<h1 class="text-custom-dark">Gestion Microservice</h1>
		</div>
		<div class="row justify-content-center">
			<div class="col-md-6">
				<?php
				require_once 'controllers/MicroserviceController.php';
				$MC = new MicroserviceController();
				$MC->handlePostFormSubmission();
				?>
			</div>
		</div>
	</main>
	<?php include_once 'inc/footer.php'; ?>
</body>

</html>