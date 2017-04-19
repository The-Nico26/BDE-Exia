<?php
	include_once('requeteMembre.php');
	include_once ('config.php');
	include_once ('singleton.php');


	$bdd = new singleton();

	$m = new membreModel();
	echo "t";
	$m->findAll();
	echo "ts";
?>
