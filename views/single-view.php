<article class="col-md-6 p-2">
	<?php
	if (isset($row['Image']) && !empty($row['Image']) && file_exists('uploads/images/' . $row['Image'])) :
	?>
		<div class="text-center">
			<img class="img-fluid" src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Titre'] ?>">
		</div>
	<?php
	endif;
	?>
	<?= isset($row['Titre']) ? '<h1 class="text-custom-dark">' . $row['Titre'] . '</h1>' : NULL ?>
	<?= isset($row['Contenu']) ? '<p>' . $row['Contenu'] . '</p>' : NULL ?>
	<?= isset($row['Prix']) ? '<p class="fs-3">Prix: <span class="fs-2">' . $row['Prix'] . ' €</pan></p>' : NULL ?>
	<a class="link-custom-secondary" href="<?= BROWSER_PATH . '/' ?>">Retour</a>
</article>