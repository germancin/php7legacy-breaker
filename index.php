<?php

require_once "vendor/autoload.php";

$filesArr = scandir('/home/ubuntu/workspace');

array_map(function($file) {
				
	echo "<a href='/{$file}'> {$file} </a> <br/>";
						
}, $filesArr);



?>