<?php
	
	header('Access-Control-Allow-Origin: *');
	header("Access-Control-Allow-Methods: GET, OPTIONS");
	
	define('DS', DIRECTORY_SEPARATOR);
	define('ROOT', realpath(dirname(__FILE__)) . DS);
	define('URL', "http://2017.ateneasas.com");
	
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