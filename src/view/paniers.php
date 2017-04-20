<?php
	require 'php/BDD/produitDAO.php';
	require 'php/BDD/panierDAO.php';
	require 'php/header/head.php';
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/panier.css\">");
	$head->setTitle('Panier - BDE cesi');
	$head->getHead();
	require 'php/header/menu.php';
?>
		<section class="tileheigt">
			<div class="title">
				Panier
			</div>
		</section>
		
		<div class="panier">
			<div class="header">
				<div class="column">Article</div>
				<div class="column">Référence</div>
				<div class="column">Prix</div>
				<div class="column">Total</div>
				<div class="column">Option</div>
			</div>
			<?php
			foreach (PanierDAO::findMembre($membre->id) as $row) {
				$p = ProduitDAO::find($row->idProduit)[0];
				?>

				<div class="produit">
					<div class="column">
						<img src="<?= $p->image ?>">
					</div>
					<div class="column"><?= $p->name ?></div>
					<div class="column"><?= $p->prix ?></div>
					<div class="column"><?= $p->prix ?></div>
					<div class="column"><button onclick="remove('<?= $row->id ?>')">Supprimer cet article </button></div>
				</div>
				<?php
				}
			?>
		</div>
		
		<footer>
			Copyright
		</footer>
		<script>
        	function remove(id){
        		send("php/ajax/gestionPanier.php", "action=remove&id="+id);
        	}
		</script>
	</body>
</html>