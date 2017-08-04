<?php

require_once __DIR__ . '/../bootstrap.php';

$source = Rx\Observable::range(1, 10000)
    ->bufferWithCount(5000)
    ->subscribe($stdoutObserver);
