<?php
	
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', '/form_jack');
	

	require_once "app/Config/Autoload.php";

	Config\Autoload::run();
	
	if(empty($_GET['url'])){
	    $url = "";
	}else{
	    $url = $_GET['url'];
	}

	$request = new Config\Request($url);
	$request->execute();
?>