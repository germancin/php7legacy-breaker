<?php

error_log("non-blocking/index.php. \n", 3, '/var/www/app.log');

$descriptors =[
    0 => ['pipe', 'r'], //stdin
    1 => ['pipe', 'w'], //stdout
    2 => ['file', '/var/www/non-blocking', 'a'], //stderr
];

$proc = proc_open('php task.php', $descriptors, $pipes );
stream_set_blocking($pipes[1], 0);

//while( proc_get_status($proc)['running'] ){
//    usleep(100 * 1000);
//    $str = fread($pipes[1], 1024);
//    if($str){
//        error_log($str . "  \n", 3, '/var/www/app.log');
//    }else{
//        //error_log( " .... \n", 3, '/var/www/app.log');
//    }
//}

if( proc_get_status($proc)['running'] ){
    usleep(100 * 1000);
    $str = fread($pipes[1], 1024);
    if($str){
        error_log($str . "dddd  \n", 3, '/var/www/app.log');
    }

}

echo "Completed!!2";
