<?php	
	setlocale(LC_TIME, 'es_CO.UTF-8');
	
	require_once 'vendor/autoload.php';

	if(empty($_GET['url'])){
	    $url = "";
	}else{
	    $url = $_GET['url'];
	}
	var_dump($_SESSION);
	$request = new App\Config\Request($url);
	$request->execute();
?>