<?php
	
	$https = false;
	
	$url   = ($https?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/';

	// Load json file
	if(@file_get_contents("../data/redirections.json") === false){
		die("You must create a <code>data/redirections.json</code> file.");
	} 
	else {
		$json = json_decode(@file_get_contents("../data/redirections.json"), true);
	}

	// Force redirection
	if($https && $_SERVER["HTTPS"] != "on")
	{
	    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	    exit();
	}