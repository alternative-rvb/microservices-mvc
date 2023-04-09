<article class="col-md-6 p-2">
	<?php
	if (isset($row['image']) && !empty($row['image']) && file_exists(ROOT_PATH . '/uploads/images/' . $row['image'])) :
	?>
		<div class="text-center">
			<img class="img-fluid" src="<?= BROWSER_PATH . '/uploads/images/' . $row['image'] ?>" alt="<?= $row['title'] ?>">
		</div>
	<?php
	endif;
	?>
	<?= isset($row['title']) ? '<h1 class="text-custom-dark">' . $row['title'] . '</h1>' : NULL ?>
	<?= isset($row['content']) ? '<p>' . $row['content'] . '</p>' : NULL ?>
	<?= isset($row['price']) ? '<p class="fs-3">Prix: <span class="fs-2">' . $row['price'] . ' €</pan></p>' : NULL ?>
	<a class="link-custom-secondary" href="<?= BROWSER_PATH . '/' ?>">Retour</a>
</article>