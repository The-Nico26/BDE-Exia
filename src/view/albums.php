<?php
	ini_set('display_errors', 1);
	require('../php/BDD/albumDAO.php');
	require('../php/BDD/photoDAO.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/albums.css\">");
	$head->setTitle('Albums - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>
	<section class="tileheigt">
		<?php
		if(empty($_GET['id']))exit();
		if(count(AlbumDAO::find($_GET['id'])) == 0) exit();
		
		foreach(AlbumDAO::find($_GET['id']) as $row){
			?>
				<div class="logo" style="background-image:url(<?= photoDAO::find($row->id)[0]->url ?>);"></div>
				<div class="title">
					Albums de "<?= $row->titre ?>"
				</div>
			<?php
		}
		?>
	</section>
	<section class="addImage">
		te
	</section>
	<section class="master">
			<div class="photos">
				<div class="photo">
					<?php
					foreach(AlbumDAO::find($_GET['id']) as $row){
						?>
							<img src="<?= photoDAO::find($row->id)[0]->url ?>">
							<span class="description">
								<?= $row->description ?>
							</span>
						<?php
					}
					?>
					
				</div>
				<div class="listphoto">
					<div class="onephoto">
						<?php
						foreach(Server::getRows("SELECT * FROM Photo WHERE ID_Album = ".$_GET['id']."") as $row){
							?>
								<img src="<?= $row['URL'] ?>" width="20vw">
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>