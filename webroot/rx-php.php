<?php

require_once '../vendor/autoload.php';

$log = ['logFile' => "/var/www/public/debug.log"  ];

use Rx\Observable;
use React\EventLoop\Factory;
use Rx\Scheduler;


/******************************************************************************************************************/
$loop = Factory::create();

//You only need to set the default scheduler once
Scheduler::setDefaultFactory(function() use($loop, $log){
    error_log("setDefaultFactory " . date('H:i:s') . " \n\n ", 3, $log['logFile']);
    return new Scheduler\EventLoopScheduler($loop);
});

Observable::interval(5000)
    ->take(2)
    ->flatMap(function ($i) use($log) {
        error_log("flatMap " . date('H:i:s') . " \n ", 3, $log['logFile']);
        return Observable::of($i + 1);
    })
    ->subscribe(function ($e) use($log) {
        error_log("subscribe " . date('H:i:s') . " \n\n\n ", 3, $log['logFile']);
        echo $e, PHP_EOL;
    });

error_log("Send to loop  " . date('H:i:s') . " \n ", 3, $log['logFile']);
$loop->run();

/******************************************************************************************************************/


