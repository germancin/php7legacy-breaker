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



/****************************************************/
echo "<br/><br/>";
echo "<h2>Value Key array_map</h2>"; 
echo "There is a myth that there is no way to pass values and keys of an array to a callback, but we can bust it:<br/><br/>";
?>

<xmp>
$model = ['id' => 7, 'name'=>'James'];
 
$callback = function($key, $value) {
    return "$key is $value";
};

$res = array_map($callback, array_keys($model), $model);
print_r($res);

</xmp>

<?php
$model = ['id' => 7, 'name'=>'James'];
 
$callback = function($key, $value) {
    return "$key is $value";
};
 
$res = array_map($callback, array_keys($model), $model);
print_r($res);


/****************************************************/
echo "<br/><br/>";
echo "<h2>array_walk</h2>"; 
echo "But this looks dirty. It is better to use array_walk() instead. This function looks the same as array_map(), but it works differently. 
		First of all, an array is passed by a reference, so array_walk() doesn't create a new array, but changes a given array. 
		So as a source array, you can pass the array value by a reference in a callback. Array keys can also be passed easily:<br/><br/>";
?>

<xmp>
$fruits = [
    'banana' => 'yellow',
    'apple' => 'green',
    'orange' => 'orange',
];
 
array_walk($fruits, function(&$value, $key) {
    $value = "$key is $value";
});
 
print_r($fruits);
 
// Array
// (
//     [banana] => banana is yellow
//     [apple] => apple is green
//     [orange] => orange is orange
// )
</xmp>
<?php
$fruits = [
    'banana' => 'yellow',
    'apple' => 'green',
    'orange' => 'orange',
];
 
array_walk($fruits, function(&$value, $key) {
    $value = "$key is $value";
});
 
print_r($fruits);






/****************************************************/
echo "<br/><br/>";
echo "<h2>array_diff && array_intersect the explanation</h2>"; 
echo "To remove array values from another array (or arrays), use array_diff(). 
		To get values which are present in given arrays, use array_intersect(). 
		The next examples will show how it works::<br/><br/>";
?>

<xmp>
$array1 = [1, 2, 3, 4];
$array2 =       [3, 4, 5, 6];
 
$diff = array_diff($array1, $array2);
print_r($diff); // [0 => 1, 1 => 2]
 
$intersect = array_intersect($array1, $array2);
print_r($intersect);  // [2 => 3, 3 => 4]
</xmp>

<?php
$array1 = [1, 2, 3, 4];
$array2 =       [3, 4, 5, 6];
 
$diff = array_diff($array1, $array2);
print_r($diff); // [0 => 1, 1 => 2]
 
$intersect = array_intersect($array1, $array2);
print_r($intersect);  // [2 => 3, 3 => 4]







