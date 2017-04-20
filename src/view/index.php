<?php
	if(!$ROUTE){
		header("Location: ../?/index");
		exit();
	}
	require 'php/header/head.php';
	require 'php/BDD/eventDAO.php';
	require 'php/BDD/commIdeeDAO.php';
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/accueil.css\">");
	$head->setTitle('Index - BDE cesi');
	$head->getHead();
	require 'php/header/menu.php';
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
								<span class="ext_numero_right"></span>
							</div>
						</div>
						<div class="content">
							<div class="btns">
								<i class="fa fa-thumbs-up" style="color:green" onclick="bleu('<?= $membre->id ?>', '<?= $row['ID_Idee'] ?>');"></i> <?= $row['Pbleu'] ?> <br> 
								<i class="fa fa-thumbs-down" style="color:red" onclick="rouge('<?= $membre->id ?>', '<?= $row['ID_Idee'] ?>');"></i>  <?= $row['Prouge'] ?><br>
								<i class="fa fa-comments" onclick="showComment('<?= $row['ID_Idee'] ?>')"></i> <?= count(commIdeeDAO::findEvent($row['ID_Idee'])) ?>
							</div>
							<div class="titre">
								 <?= $row['Titre'] ?>
							</div>
							 <?= $row['Description'] ?><br>
							 Proposé par : <?php 
								 $m = membreDAO::find($row['ID_Membre'])[0];
								 echo $m->nom." ".$m->prenom."<br>";
							 ?>
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
			function rouge(idM, id){
				send("../php/ajax/gestionIdee.php", "action=rouge&id="+id+"&idM="+idM);
			}
			function bleu(idM, id){
				send("../php/ajax/gestionIdee.php", "action=bleu&id="+id+"&idM="+idM);
			}
        	function showComment(id){
        		window.location.assign("?/idees/id="+id);
        	}
        	function showAll(){
        		window.location.assign("?/idees");
        	}
        </script>
	</body>
</html>