<?php
if(count($_GET) > 0){
	$ROUTE = true;
	$url = $_SERVER["QUERY_STRING"];
	$GET = "";

	$api = preg_split('/([.]*\/)/', $url);

	if(count($api) >= 2){
		for ($i=2; $i < count($api); $i++) { 
			$v = preg_split('/([.]*)=([.]*)/', $api[$i]);
			if(count($v) == 2){
				$GET[$v[0]] = $v[1];
			} else {
				$GET[$v[0]] = $v[0];
			}
		}
	}

	if(file_exists('view/'.$api[1].'.php')){
		include_once('view/'.$api[1].'.php');
	}else{
		echo '<br>error 404<br>';
	}
} else {
	include_once('view/index.php');
}