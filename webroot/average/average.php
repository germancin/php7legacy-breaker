<?php

require_once __DIR__ . '/../bootstrap.php';

$source = Rx\Observable::range(1, 720000)->average();

$subscription = $source->subscribe($stdoutObserver);
