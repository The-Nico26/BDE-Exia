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
 
	<div class="titre">
    			
    	Titre de l'idée
				 <input type="text" name="title">
    		</div>
    		<div class="corpus">
    			<textarea rows="10" cols="70" name="corpus" placeholder="Descritpion"></textarea>
    		</div>
    		<div class="btns">
    			<button onclick="save()">Enregistrer</button>
				<button onclick="net()">Nettoyer</button>
    		</div>
		<?php
				foreach(ideeDAO::find() as $row){
					?>
						<section>
				    		<div class="titre">
				    			<?= htmlspecialchars($_POST["title"]); ?>
				    		</div>
				    		<div class="corpus">
				    			<?= htmlspecialchars($_POST["corpus"]); ?>
				    		</div>
				    	</section>
					<?php
				}
			?>
	
    
    		<footer>
			Copyright
		</footer>
        <script src="../js/live.js"></script>
        <script>
        	function save(){
        		var title = $("input[name=title]").val();
        		var corpus = $("input[name=corpus]").val();
        		var id = $("input[name=id]").val();
        		var data = "action=add&title="+title+"&corpus="+corpus+"&id="+id;
        		send("../php/ajax/gestionidee.php", data);
        	}
        	function modif(id, title, corpus){
        		$("input[name=title]").val(title);
        		$("input[name=id]").val(id);
        		$("textarea").val(corpus);
        	}
        	function net(){
        		$("input[name=title]").val("");
        		$("textarea").val("");
        		$("input[name=id]").val("-1");
        	}
        	function remove(id){
        		send("../php/ajax/gestionidee.php", "action=remove&id="+id);
        	}
        </script>
	</body>
</html>