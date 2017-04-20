<?php
	if(!$ROUTE){
		header("Location: ../?/index");
		exit();
	}
	require 'php/header/head.php';
	require 'php/BDD/ideeDAO.php';
	require 'php/BDD/commIdeeDAO.php';
	$head->setup();
	$head->addLink("<link rel=\"stylesheet\" type=\"text/css\" href=\"css/Document/idee.css\">");
	$head->setTitle('Idee - BDE cesi');
	$head->getHead();
	require 'php/header/menu.php';
?>
<?php 
if(isset($GET['id'])){
	$ev = ideeDAO::find($GET['id'])[0];
?>
 <div class="box" onclick="hideComment()">
 	<div class="content">
 		<div class="title">
 			Commentaire de : <?= $ev->titre ?>
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
 			foreach(commIdeeDAO::findEvent($ev->id) as $r) { ?>
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
							<textarea name="description"></textarea><br><br>
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
								<i class="fa fa-thumbs-up" style="color:green" onclick="bleu('<?= $membre->id ?>', '<?= $row->id ?>');"></i> <?= $row->pbleu ?> <br> 
								<i class="fa fa-thumbs-down" style="color:red" onclick="rouge('<?= $membre->id ?>', '<?= $row->id ?>');"></i>  <?= $row->prouge ?><br>
								<i class="fa fa-comments" onclick="showComment('<?= $row->id ?>')"></i> <?= count(commIdeeDAO::findEvent($row->id)) ?>
							</div>
							<div class="titre">
								 <?= $row->titre ?>
							</div>
							 <?= $row->description ?><br>
							 Proposé par : <?php 
								 $m = membreDAO::find($row->idMembre)[0];
								 echo $m->nom." ".$m->prenom."<br>";
							 ?>
							 <center>
								 <button onclick="modif('<?= $row->id?>', '<?= $row->titre ?>', '<?= $row->description ?>', '<?= $row->calendrier ?>')">Modification</button>
								 <button onclick="remove('<?= $row->id?>')">Suppression</button>
							 </center
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
				var description = $("textarea[name=description]").val();
				var id = $("input[name=id]").val();

				var data = "action=add&title="+title+"&calendrier="+calendrier+"&description="+description+"&id="+id+"&idM=<?= $membre->id ?>";
				send("php/ajax/gestionIdee.php", data);
			}
			function modif(id, title, corpus, calendrier){
				$("input[name=title]").val(title);
				$("input[name=id]").val(id);
				$("input[name=calendrier]").val(calendrier);
				$("textarea[name=description]").val(corpus);
			}
			function net(){
				$("input[name=title]").val("");
				$("input[name=id]").val("-1");
				$("textarea[name=description]").val("");
				$("input[name=calendrier]").val("");
			}
			function remove(id){
				send("php/ajax/gestionIdee.php", "action=remove&id="+id);
			}
			function rouge(idM, id){
				send("php/ajax/gestionIdee.php", "action=rouge&id="+id+"&idM="+idM);
			}
			function bleu(idM, id){
				send("php/ajax/gestionIdee.php", "action=bleu&id="+id+"&idM="+idM);
			}
        	function showComment(id){
        		window.location.assign("idees.php?id="+id);
        	}
        	function saveComment(){
        		var com = $("textarea[name=comment]").val();
        		var id = $("input[name=idComment]").val();

        		send("php/ajax/gestionIdee.php", "action=addComment&id="+id+"&com="+com+"&idM=<?= $membre->id ?>");
        	}
        	function removeComment(id){
        		send("php/ajax/gestionIdee.php", "action=removeComment&id="+id);
        	}
			function hideComment(){
        		window.location.assign("?/idees");
			}
			$('.content').click(function(event){
				event.stopPropagation();
			})
		</script>
	</body>
</html>