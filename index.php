<?php
	require_once("partial/header.php");
	require_once("action/actionManipulerFichier.php");
	$file = new File("announce.txt");
?>
	<div id="page-container">
   		<div id="content-wrap">
			<div class="announce">
				<div class="introAnnonce">
					<h1>Actuality</h1>
					<marquee>You can watch videos, publishing by the Admin</marquee>
				</div>
				<?= $file->afficherAnnonce() ?>
			</div>
		</div>
	</div>
<?php
	require_once("partial/footer.php");
?>