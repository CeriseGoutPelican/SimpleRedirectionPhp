<?php
	
	$https = false;
	
	$url   = ($https?'https':'http').'://'.$_SERVER['HTTP_HOST'].'/';
	
	$json = json_decode(file_get_contents("../data/redirections.json"), true);