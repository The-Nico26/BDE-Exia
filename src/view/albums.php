<?php
	require 'php/header/head.php';
	require 'php/BDD/albumDAO.php';
	require 'php/BDD/photoDAO.php';
	require 'php/BDD/commPhotoDAO.php';
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/albums.css\">");
	$head->setTitle('Albums - BDE cesi');
	$head->getHead();
	require 'php/header/menu.php';
?>
	<section class="tileheigt">
		<?php
		//var_dump($GET);
		if(empty($GET['id']))exit();
		if(count(AlbumDAO::find($GET['id'])) == 0) exit();
		
		foreach(AlbumDAO::find($GET['id']) as $row){
			?>
				<div class="logo" style="background-image:url(<?= photoDAO::find($row->id)[0]->url ?>);"></div>
				<div class="title">
					Albums de "<?= $row->titre ?>"
				</div>
			<?php
		}
		?>
	</section>

	<?php 
	if($membre->role == "BDE") {
		?>
		<section class="addImage">
			<input type="hidden" value="-1" name="id">
			<div class="text"> Nom de l'image : </div>
			<input type="text" name="nom"><br>
			<div class="text"> Url de l'image : </div>
			<input type="text" name="url"><br>
			<button onclick="save('<?= $_GET['id'] ?>')">Enregistrer</button>
		</section>
	<?php } ?>
	<section class="master">
			<div class="photos">
				<div class="photo" onclick="lookImg()">
					<input type="hidden" name="idAlb" value="<?= $GET['id'] ?>">
					<?php
					foreach(AlbumDAO::find($GET['id']) as $row){
						$p = photoDAO::find($row->id)[0];
						?>
							<img src="<?= $p->url ?>" name="ma" id="<?= $p->id ?>">
							<span class="description">
								<?= $p->nom ?>
							</span>
						<?php
					}
					?>
					
				</div>
				<div class="listphoto">
					<div class="onephoto">
						<?php
						foreach(Server::getRows("SELECT * FROM Photo WHERE ID_Album = ".$GET['id']."") as $row){
							?>
								<img src="<?= $row['URL'] ?>" width="20vw" class="photo<?= $row['ID_Photo'] ?>" title="<?= $row['Titre'] ?>" onclick="changeImg('<?= $row['ID_Photo'] ?>')">
							<?php
						}
						?>
					</div>
				</div>
			</div>
		</section>
	<footer>
		Copyright
	</footer>

<?php
if(isset($GET['idP'])){
	$ev = photoDAO::find($GET['idP'])[0];
?>
 <div class="boxe" onclick="hideComment()">
 	<div class="content">
 		<div class="title">
 			Commentaire de : <?= $ev->nom ?> <br>
 			<img src="<?= $ev->url ?>">
 		</div>
 		<div class="comments">
 			<?php if($_SESSION['token'] != "-1"){ ?>
	 			<div class="addComment">
	 				<input type="hidden" name="idComment" value="<?= $ev->id ?>">
	 				Votre commentaire : <br>
	 				<textarea name="comment"></textarea> <br>
	 				<button onclick="saveComment();">Soumettre</button>
	 			</div>
 			<?php }
 			foreach(commPhotoDAO::findPhoto($ev->id) as $r) { ?>
	 			<div class="comment">
	 				<div class="author">
	 				Par :
	 					<?php
		 					$m = membreDAO::find($r['ID_Membre'])[0];
		 					echo $m->nom." ".$m->prenom; 
	 					?>
	 					</div>
	 				<div class="text"> 
	 					<?php if($membre->role == "BDE"){ ?>
	 						<button onclick="removeComment('<?= $r['ID_CommIdee'] ?>')">Supprimer </button><br>
	 					<?php } ?>
	 					<?= $r['Description'] ?> 
	 				</div>
	 			</div>
 			<?php } ?>
 		</div>
 	</div>
 </div>
 <?php } ?>

	<script>
		<?php 
		if($membre->role == "BDE") {
			?>
			function save(){
				var nom = $("input[name=nom]").val();
				var url = $("input[name=url]").val();
				var id = $("input[name=id]").val();
				var data = "action=add&nom="+nom+"&url="+url+"&id="+id+"&idAlbum=<?= $_GET['id'] ?>";
				send("php/ajax/gestionAlbum.php", data);
			}
			function modif(id, nom, url){
				$("input[name=nom]").val(nom);
				$("input[name=url]").val(url);
				$("input[name=id]").val(id);
			}
			function net(){
				$("input[name=nom]").val("");
				$("input[name=url]").val("");
				$("input[name=id]").val("-1");
			}
			function remove(id){
				send("php/ajax/gestionAlbum.php", "action=remove&id="+id);
			}
		<?php } ?>
			function changeImg(src){
				var photo = $(".photo"+src);
				$("img[name=ma]").attr('src', photo.attr('src'));
				$("img[name=ma]").attr('id', src);
				$('.description').empty();
				$('.description').append(photo.attr('title'));
			}
        	function saveComment(){
        		var com = $("textarea[name=comment]").val();
        		var id = $("input[name=idComment]").val();

        		send("php/ajax/gestionAlbum.php", "action=addComment&id="+id+"&com="+com+"&idM=<?= $membre->id ?>");
        	}
        	function removeComment(id){
        		send("php/ajax/gestionAlbum.php", "action=removeComment&id="+id);
        	}
			function lookImg(){
				var idP = $("img[name=ma]").attr('id');
				var idAlb = $("input[name=idAlb]").val();
        		window.location.assign("?/albums/id="+idAlb+"/idP="+idP);
			}
			function hideComment(){
        		window.location.assign("?/albums/id=<?= $GET['id'] ?>");
			}
			$('.content').click(function(event){
				event.stopPropagation();
			})
	</script>
	</body>
</html>