<?php

require_once "../vendor/autoload.php";

$filesArr = scandir('/var/www/public/webroot');

array_filter($filesArr, function($file) {

	//if(strpos($file, '.php') ){

    	echo "<a href='/{$file}'> {$file} </a> <br/>";

	//}
			    
});


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