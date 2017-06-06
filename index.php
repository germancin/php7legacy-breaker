<?php

require_once "vendor/autoload.php";

$filesArr = scandir('/home/ubuntu/workspace');

array_filter($filesArr, function($file) {

	//if(strpos($file, '.php') ){

    	echo "<a href='/{$file}'> {$file} </a> <br/>";

	//}
			    
});

var_dump($res);

echo "<br/>*******************************************************<br/>";

$arrayC = [
		    'clothes' => 't-shirt1',
		    'size'    => 'medium1',
		    'color'   => 'blue1',
		  ];
 
extract($arrayC);



echo("$clothes $size $color");

var_dump(extract($arrayC));


?>