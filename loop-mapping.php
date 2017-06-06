<?php
declare(strict_types=1);
error_reporting( E_ALL );
require_once "vendor/autoload.php";
use App\User;
//uppercase all the emails in the foreach loop
$user = new User();
$resp = [];
$emailsList = $user->getEmailsList();
var_dump($emailsList);
echo "<br/><br/>";
echo "<h2>NORMAL FOREACH LOOP</h2>";?>
<xmp>
foreach ($emailsList as $key => $email) {
	$resp[] = strtoupper($email);
}	
</xmp>
<?php
foreach ($emailsList as $key => $email) {
	$resp[] = strtoupper($email);
}
var_dump($resp);
/****************************************************/
echo "<br/><br/>";
echo "<h2>Functional Mapping </h2>"; ?>

<xmp>
function getEmailsInUppercase(string $email) {
	$uppercaseEmails = [];
	array_push($uppercaseEmails, strtoupper($email));
	return $uppercaseEmails;
}

$b = array_map("getEmailsInUppercase", $emailsList);
</xmp>

<?php
function getEmailsInUppercase(string $email) {
	$uppercaseEmails = [];
	array_push($uppercaseEmails, strtoupper($email));
	return $uppercaseEmails;
}
$emailsUppered = array_map("getEmailsInUppercase", $emailsList);
var_dump($emailsUppered);
/****************************************************/
echo "<br/><br/>";
echo "<h2>Anonimous Function Mapping</h2>"; ?>

<xmp>
$emailsUppered2 = array_map(function($email) {
	$uppercaseEmails2 = [];
	array_push($uppercaseEmails2, strtoupper($email));
	return $uppercaseEmails2;
}, $emailsList);

var_dump($emailsUppered2);
</xmp>


<?php
	$emailsUppered2 = array_map(function($email) {
		$uppercaseEmails2 = [];
		array_push($uppercaseEmails2, strtoupper($email));
		return $uppercaseEmails2;
	}, $emailsList);
	
	var_dump($emailsUppered2);
?>