<?php
	ini_set('display_errors', 1);
	require('../php/BDD/eventDAO.php');
	require('../php/BDD/idee.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/accueil.css\">");
	$head->setTitle('Index - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>
		<section>
			<div class="presentation">
				<div class="vedette">
					<div class="description">
					<?php 
						foreach(Server::getRows("SELECT * FROM Event JOIN Photo ON Event.ID_Album = Photo.ID_Album ORDER BY RAND() LIMIT 1", null) as $row){
							?>
							<?= $row['Description'] ?>
							</div>
							<img src='<?= $row['URL'] ?>'>
							<?php
						}
					?>
					
				</div>
				<div class="list">
					<?php
						foreach(Server::getRows("SELECT * FROM Event LIMIT 0, 5", null) as $row){
						?>	
							<a href="events.php?id=<?= $row['ID_Event'] ?>" class="link"><?= $row['Titre'] ?></a>
						<?php
						}
					?>
				</div>
			</div>
		</section>
		<div class="body">
			<section class="idees">
				<?php
					foreach(Server::getRows("SELECT * FROM Idee LIMIT 0, 5", null) as $row){
				?>
					<div class="idee">
						<div class="numero">
							<div class="numero_left"></div>
							<div class="numero_center">
								<span class="numero_text"><?= $row['Calendrier'] ?></span>
								<span class="numero_right"></span>
							</div>
						</div>
						<div class="content">
							<div class="btns">
								<i class="fa fa-thumbs-up" style="color:green"></i> <?= $row['Pbleu'] ?> <br> <i class="fa fa-thumbs-down" style="color:red"></i>  <?= $row['Prouge'] ?><br><i class="fa fa-comments"></i> ?
							</div>
							<div class="titre">
								 <?= $row['Titre'] ?>
							</div>
							 <?= $row['Description'] ?>
						</div>
					</div>
				<?php
					}
				?>
				<div class="showIdee" onclick="showAll()">
					<i class="fa fa-arrow-down"></i> Show More Ideas <i class="fa fa-arrow-down"></i>
				</div>
			</section>
		</div>
		
		<footer>
			Copyright
		</footer>
        <script>
        	function showAll(){
        		window.location.assign("idees.php");
        	}
        </script>
	</body>
</html>