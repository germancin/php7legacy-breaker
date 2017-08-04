<?php

require_once __DIR__ . '/../bootstrap.php';

error_log("**** hit the task.php \n\n", 3, '/var/www/app.log');

$source = Rx\Observable::range(1, 50000)
    ->bufferWithCount(5)
    ->subscribe($stdoutObserver);


//$observable = \Rx\Observable::fromArray(['German', 'Gabriel', 'Gonzalez', 'Bastidas'])->_Vendor_rot13();
//$observable->subscribe($stdoutObserver);

