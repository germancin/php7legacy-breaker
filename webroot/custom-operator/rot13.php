<?php

require_once __DIR__ . '/../bootstrap.php';

$observable = \Rx\Observable::fromArray(['German', 'Gabriel', 'Gonzalez', 'Bastidas'])->_Vendor_rot13();

$observable->subscribe($stdoutObserver);
