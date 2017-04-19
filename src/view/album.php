<?php
	ini_set('display_errors', 1);
	require('../php/BDD/produitDAO.php');
	require('../php/BDD/photoDAO.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/albums.css\">");
	$head->setTitle('Albums - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>d
	<section class="tileheigt">
		<?php
			foreach(albumDAO::find() as $row){
				?>
					<div class="logo" style="background-image:url(<?= photoDAO::find($row->id)[0]->url ?>);"></div>
					<div class="title">
						Albums de <?= $row->titre ?>
					</div>
				<?php
			}
		?>
	</section>