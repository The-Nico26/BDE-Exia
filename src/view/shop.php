<?php
	ini_set('display_errors', 1);
	require('../php/BDD/produitDAO.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/shop.css\">");
	$head->setTitle('shop - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>

		
		<section class="tileheigt">
			<div class="title">
				Super Shop de ouf
			</div>
		</section>
		
		<section class="cate">
			<a href="panier.html">Votre panier : <span class="number">0</span></a>
		</section>
		
		<section class="produits">
			<div class="produit">
				<div class="description">
					<input type="hidden" value="-1" name="id">
					Nom <br>
					<input type="text" name="nom"> <br>
					Image <br>
					<input type="url" name="url"> <br>
					Prix <br>
					<input type="number" name="prix"><br>
					Description :<br>
					<textarea type="text" name="description"></textarea><br>
					<button onclick="save()">Enregistrer</button>
					<button onclick="net()">Nettoyer</button>
				</div>
			</div>
			<?php
				foreach(produitDAO::find() as $row){
					?>
						<div class="produit prd">
							<div class="logo">
								<img src="<?= $row->image ?>">
							</div>
							<div class="description">
								<h1><?= $row->name ?></h1>
								<?= $row->description ?>
								<hr>
								<?= $row->prix ?>€<br>
								<button>Acheter</button>
								
								<button onclick="modif('<?= $row->id ?>', '<?= $row->name ?>', '<?= $row->image ?>', '<?= $row->prix ?>', '<?= $row->description ?>')">Modifier</button>
								<button onclick="remove('<?= $row->id ?>')">Supprimer</button>
							</div>
						</div>
					<?php
				}
			?>
		</section>
		<footer>
			Copyright
		</footer>
        <script src="../js/jquery.js"></script>
        <script src="../js/metro.js"></script>
        <script src="../js/site.js"></script>
        <script>
        	function save(){
        		var nom = $("input[name=nom]").val();
        		var url = $("input[name=url]").val();
        		var prix = $("input[name=prix]").val();
        		var id = $("input[name=id]").val();
        		var description = $("textarea").val();
        		var data = "action=add&nom="+nom+"&url="+url+"&prix="+prix+"&description="+description+"&id="+id;
        		send("../php/ajax/gestionProduit.php", data);
        	}
        	function modif(id, nom, url, prix, description){
        		$("input[name=nom]").val(nom);
        		$("input[name=url]").val(url);
        		$("input[name=prix]").val(prix);
        		$("input[name=id]").val(id);
        		$("textarea").val(description);
        	}
        	function net(){
        		$("input[name=nom]").val("");
        		$("input[name=url]").val("");
        		$("input[name=prix]").val("");
        		$("input[name=id]").val("-1");
        		$("textarea").val("");
        	}
        	function remove(id){
        		send("../php/ajax/gestionProduit.php", "action=remove&id="+id);
        	}
        </script>
	</body>
</html>