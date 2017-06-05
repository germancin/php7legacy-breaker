<?php
declare(strict_types=1);
require_once "vendor/autoload.php";

use App\Registration;
use App\User;

// setting up global variable EX.
$user = new User();
$registration = new Registration($user);

echo $registration->registerUser();

?>