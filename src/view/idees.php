<?php
	ini_set('display_errors', 1);
	require('../php/BDD/ideeDAO.php');
	include_once('../php/header/head.php');
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/Document/idee.css\">");
	$head->setTitle('Idee - BDE cesi');
	$head->getHead();
	require('../php/header/menu.php');
?>    		
 
		<div class="body">
			<section class="idees">
				<div class="idee">
					<div class="numero">
						<div class="numero_left"></div>
						<div class="numero_center">
							<span class="numero_text"></span>
							<span class="numero_right"></span>
							<span class="ext_numero_right"></span>
						</div>
					</div>
					<div class="content">
						<input type="hidden" name="id" value="-1">
						<div class="titre">
							Titre de l'idée<br>
							<input type="text" name="title">
						</div>
						<div class="add">
							Date de l'évenement <br> <input type="date" name="calendrier"><br>
							Description <br>
							<textarea></textarea><br><br>
							<button onclick="save()">Enregistrer</button> 
							<button onclick="net()">Nettoyer</button>
						</div>
					</div>
				</div>
				<?php
					foreach(ideeDAO::find() as $row){
				?>
					<div class="idee">
						<div class="numero">
							<div class="numero_left"></div>
							<div class="numero_center">
								<span class="numero_text"><?= $row->calendrier ?></span>
								<span class="numero_right"></span>
								<span class="ext_numero_right"></span>
							</div>
						</div>
						<div class="content">
							<div class="btns">
								<i class="fa fa-thumbs-up" style="color:green"></i> <?= $row->pbleu ?> <br> <i class="fa fa-thumbs-down" style="color:red"></i>  <?= $row->prouge ?><br><i class="fa fa-comments"></i> ?
							</div>
							<div class="titre">
								 <?= $row->titre ?>
							</div>
							 <?= $row->description ?><br>
							 Proposé par : <?php 
								 $m = membreDAO::find($row->idMembre)[0];
								 echo $m->nom." ".$m->prenom."<br>";
							 ?>
							 <button onclick="modif('<?= $row->id?>', '<?= $row->titre ?>', '<?= $row->description ?>', '<?= $row->calendrier ?>')">Modification</button>
							 <button onclick="remove('<?= $row->id?>')">Suppression</button>
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
		<script>
			function save(){
				var title = $("input[name=title]").val();
				var calendrier = $("input[name=calendrier]").val();
				var description = $("textarea").val();
				var id = $("input[name=id]").val();

				var data = "action=add&title="+title+"&calendrier="+calendrier+"&description="+description+"&id="+id+"&idM=<?= $membre->id ?>";
				send("../php/ajax/gestionIdee.php", data);
			}
			function modif(id, title, corpus, calendrier){
				$("input[name=title]").val(title);
				$("input[name=id]").val(id);
				$("input[name=calendrier]").val(calendrier);
				$("textarea").val(corpus);
			}
			function net(){
				$("input[name=title]").val("");
				$("input[name=id]").val("-1");
				$("textarea").val("");
				$("input[name=calendrier]").val("");
			}
			function remove(id){
				send("../php/ajax/gestionIdee.php", "action=remove&id="+id);
			}
		</script>
	</body>
</html>