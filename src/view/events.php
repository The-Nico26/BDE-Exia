<?php
	ini_set('display_errors', 1);
	require('../php/BDD/eventDAO.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/event.css\">");
	$head->setTitle('Evenement - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>
	<div class="body">
		<section class="idees">
				<div class="idee">
					<div class="content add">
						<input type="hidden" name="id" value="-1">
						Titre :<br /> <input type="text" name="titre"><br />
						Date :<br /> <input type="date" name="calendrier" placeholder="aaaa-mm-jj"><br />
						Lieu :<br /> <input type="text" name="lieu"><br />
						Formulaire :<br /> <textarea name="formulaire"></textarea><br />
						Description :<br /> <textarea name="description"></textarea> <br />
						<button onclick="save()">Sauvegarde</button>
						<button onclick="net()">Nettoyer</button>
					</div> 
				</div>

			<?php
				foreach(EventDAO::find() as $row){
			?>
				<div class="idee">
					<div class="numero">
						<div class="numero_left"></div>
						<div class="numero_center">
							<span class="numero_text"><?= $row->calendrier ?></span>
							<span class="numero_right"></span>
						</div>
					</div>
					<div class="content">
						<div class="btns">
							<button onclick="modif('<?= $row->id ?>', '<?= $row->calendrier ?>', '<?= $row->titre ?>', '<?= $row->description ?>', '<?= $row->lieu ?>', '<?= $row->formulaire ?>')">Modifier</button><br>
							<button onclick="remove('<?= $row->id ?>')">Supprimer</button>
						</div>
						<div class="titre">
							 <?= $row->titre ?>
						</div>
						 <?= $row->description ?>
						 <br />
						 <a href="albums.php?id=<?= $row->id ?>">Voir l'album</a>
					</div>
				</div>
			<?php
				}
			?>
		</section>
	</div>
	<footer>
		Copyright
	</footer>
    <script src="../js/jquery.js"></script>
    <script src="../js/site.js"></script>
    <script>
    	function save(){
    		var titre = $("input[name=titre]").val();
    		var calendrier = $("input[name=calendrier]").val();
    		var id = $("input[name=id]").val();
    		var lieu = $("input[name=lieu]").val();
    		var formulaire = $("textarea[name=formulaire]").val();
    		var description = $("textarea[name=description]").val();
    		var data = "action=add&titre="+titre+"&calendrier="+calendrier+"&description="+description+"&id="+id+"&lieu="+lieu+"&formulaire="+formulaire;
    		send("../php/ajax/gestionEvent.php", data);
    	}
    	function modif(id, calendrier, titre, description, lieu, formulaire){
    		$("input[name=titre]").val(titre);
    		$("input[name=calendrier]").val(calendrier);
    		$("input[name=id]").val(id);
    		$("input[name=lieu]").val(lieu);
    		$("textarea[name=description]").val(description);
    		$("textarea[name=formulaire]").val(formulaire);
    	}
    	function net(){
    		$("input[name=titre]").val("");
    		$("input[name=calendrier]").val("");
    		$("input[name=id]").val("-1");
    		$("input[name=lieu]").val("");
    		$("textarea[name=formulaire]").val("");
    		$("textarea[name=description]").val("");
    	}
    	function remove(id){
    		send("../php/ajax/gestionEvent.php", "action=remove&id="+id);
    	}
    </script>
</body>
</html>