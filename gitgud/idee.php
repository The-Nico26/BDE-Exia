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
 <section>
	<div class="titre">
    			<input type="hidden" value="1" name="id">
    	Titre de l'idée
				 <input type="text" name="titre">
    		</div>
    		<div class="corpus">
    			<textarea rows="10" cols="70" name="description" placeholder="descritpion"></textarea>
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
				    			<?= $row->titre ?>
				    		</div>
				    		<div class="corpus">
				    			<?= $row->description ?>
				    		</div>
				    	</section>
					<?php
				}
			?>
</section>	
    
    		<footer>
			Copyright
		</footer>
                <script src="../js/jquery.js"></script>

        <script src="../js/site.js"></script>
        <script>
        	function save(){
        		var title = $("input[name=title]").val();
        		var description = $("input[name=description]").val();
        		var id = $("input[name=id]").val();
        		var data = "action=add&title="+title+"&description="+description+"&id="+id;
        		send("../php/ajax/gestionidee.php", data);
        	}
        	function modif(id, title, description){
        		$("input[name=title]").val(title);
        		$("input[name=id]").val(id);
        		$("textarea").val(description);
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