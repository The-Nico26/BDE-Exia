<?php
	ini_set('display_errors', 1);
	
	require ('./php/BDD/produitDAO.php');
	$v = Produit::Create("1135", "Marie", "Grosse cigogne super cool","3" ,"http://4.bp.blogspot.com/_s4kUuiviweI/S8X6KOLIc_I/AAAAAAAAFcQ/m-2KaxZ8hIo/s1600/cigue%C3%B1a2.jpg");
	var_dump($v);
	echo "<br><br>";
	ProduitDAO::Update($v);
	
	var_dump(ProduitDAO::find());
?>
 	
    </body>
</html>