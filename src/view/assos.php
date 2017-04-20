<?php
	require 'php/BDD/assoDAO.php';
	require 'php/header/head.php';
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/asso.css\">");
	$head->setTitle('Association - BDE cesi');
	$head->getHead();
	require 'php/header/menu.php';
?>  

<body>
		<section class="situation">
			<div class="numero">
				<div class="numero_left"></div>
				<div class="numero_center">
					<span class="numero_text">Association</span>
					<span class="numero_right"></span>
				</div>
			</div>
		</section>

		<section class="asso">
			<?php if($_SESSION['token'] != "-1") { ?>
			<div class="cadre">
				<div class="content">
					<div class="left">
						<input type="hidden" name="id" value="-1">
						<div class="title">
							Titre : 
							<input type="text" name="titre">
						</div>
						Image de l'association : <input type="text" name="image"><br>
						Description de l'association :<br>
						<textarea></textarea><br><br>
						<button onclick="save()">Sauvegarder</button>
					</div>
					<div class="right">
						<img src=".">
					</div>
				</div>
				<div class="bottom">
					<div class="taff">
						Responsable : <?= $membre->nom." ".$membre->prenom ?>
					</div>
				</div>
			</div>
		<?php } foreach (assoDAO::find() as $row) {?>
			<div class="cadre">
				<div class="content">
					<div class="left">
						<div class="title">
							<?= $row->nom ?>
						</div>
						<?= $row->description ?>
					</div>
					<div class="right">
						<img src="<?= $row->image ?>">
					</div>
				</div>
				<div class="bottom">
					<div class="taff">
						Responsable : <?php $m = membreDAO::find($row->idMembre)[0]; echo $m->nom." ".$m->prenom; ?>
						<?php if($_SESSION['token'] != "-1"){?>
						<button onclick="remove('<?= $row->id ?>')"> Supprimer </button>
						<?php } ?>
					</div>
				</div>
			</div>

			<?php } ?>
		</section>
		
		<footer>
			Copyright
		</footer>
        <script>
        	function save(){
        		var titre = $("input[name=titre]").val();
        		var image = $("input[name=image]").val();
        		var id = $("input[name=id]").val();
        		var description = $("textarea").val();
        		var data = "action=add&titre="+titre+"&image="+image+"&description="+description+"&id="+id+"&idM=<?= $membre->id ?>";
        		send("php/ajax/gestionAssociation.php", data);
        	}
        	function modif(id, titre, image, prix, description){
        		$("input[name=titre]").val(titre);
        		$("input[name=image]").val(image);
        		$("input[name=prix]").val(prix);
        		$("input[name=id]").val(id);
        		$("textarea").val(description);
        	}
        	function net(){
        		$("input[name=titre]").val("");
        		$("input[name=image]").val("");
        		$("input[name=id]").val("-1");
        		$("textarea").val("");
        	}
        	function remove(id){
        		send("php/ajax/gestionAssociation.php", "action=remove&id="+id);
        	}
        </script>

	</body>
</html>