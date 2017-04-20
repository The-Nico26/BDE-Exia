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
				<div class="photo">
					<?php
					foreach(AlbumDAO::find($_GET['id']) as $row){
						$p = photoDAO::find($row->id)[0];
						?>
							<img src="<?= $p->url ?>">
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
	<footer>
		Copyright
	</footer>

<?php 
if($membre->role == "BDE") {
	?>
	<script>
		function save(){
			var nom = $("input[name=nom]").val();
			var url = $("input[name=url]").val();
			var id = $("input[name=id]").val();
			var data = "action=add&nom="+nom+"&url="+url+"&id="+id+"&idAlbum=<?= $_GET['id'] ?>";
			send("../php/ajax/gestionAlbum.php", data);
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
			send("../php/ajax/gestionAlbum.php", "action=remove&id="+id);
		}
	</script>
<?php } ?>
	</body>
</html>