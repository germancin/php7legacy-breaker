<?php

require_once "vendor/autoload.php";

$filesArr = scandir('/home/ubuntu/workspace');

array_filter($filesArr, function($file) {

	//if(strpos($file, '.php') ){

    	echo "<a href='/{$file}'> {$file} </a> <br/>";

	//}
			    
});

var_dump($res);

?>