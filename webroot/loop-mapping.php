<?php
declare(strict_types=1);
error_reporting( E_ALL );
require_once "../vendor/autoload.php";
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





/****************************************************/
echo "<br/><br/>";
echo "<h2>Generating Arrays</h2>"; 
echo "To generate an array with a given size and the same value, use array_fill():";

?>

<xmp>
$bind = array_fill(0, 5, '?');
print_r($bind); // ['?', '?', '?', '?', '?']
</xmp>

<?php
$date = new DateTime('2000-01-01'); 
echo $date->format('Y-m-d H:i:s');
$cont = 2;
$bind = array_fill(0, 5, 'hello');
var_dump($bind); // ['?', '?', '?', '?', '?']

?>


<xmp>
To generate an array with a range in of keys and values, like day hours or letters, use range():

$letters = range('a', 'z');
print_r($letters); // ['a', 'b', ..., 'z']

$hours = range(0, 23);
print_r($hours); // [0, 1, 2, ..., 23]	



To get a part of an array—for example, just the first three elements—use array_slice():

$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$top = array_slice($numbers, 0, 3);
print_r($top); // [1, 2, 3]	
</xmp>


<br/><br/>

<xmp>
	
Sorting Arrays

It is good to remember that every sorting function in PHP works with arrays by a reference and returns true on success or false on failure. There's a basic sorting function called sort(), and it sorts values in ascending order without preserving keys. The sorting function can be prepended by the following letters:

a, sort preserving keys
k, sort by keys
r, sort in reverse/descending order
u, sort with a user function
You can see the combinations of these letters in the following table:	
	
	
</xmp>

<table style="width:100%; border: 1px solid grey;"><tbody>
<tr>
<td></td>
<td>a</td>
<td>k</td>
<td>r</td>
<td>u</td>
</tr>
<tr>
<td>a</td>
<td><a href="http://php.net/manual/en/function.asort.php" target="_self">asort</a></td>
<td><br></td>
<td><a href="http://php.net/manual/en/function.arsort.php" target="_self">arsort</a></td>
<td><a href="http://php.net/manual/en/function.uasort.php" target="_self">uasort</a></td>
</tr>
<tr>
<td>k</td>
<td></td>
<td><a href="http://php.net/manual/en/function.ksort.php" target="_self">ksort</a></td>
<td><a href="http://php.net/manual/en/function.krsort.php" target="_self">krsort</a></td>
<td></td>
</tr>
<tr>
<td>r</td>
<td><a href="http://php.net/manual/en/function.arsort.php" target="_self">arsort</a></td>
<td><a href="http://php.net/manual/en/function.krsort.php" target="_self">krsort</a></td>
<td><a href="http://php.net/manual/en/function.rsort.php" target="_self">rsort</a></td>
<td></td>
</tr>
<tr>
<td>u</td>
<td><a href="http://php.net/manual/en/function.uasort.php" target="_self">uasort</a></td>
<td><br></td>
<td></td>
<td><a href="http://php.net/manual/en/function.usort.php" target="_self">usort</a></td>
</tr>
</tbody></table>
<br/><br/>


<xmp>

It is easy to use array_sum() and array_map() to calculate the sum of order in a few rows:

$order = [
		    ['product_id' => 1, 'price' => 20, 'count' => 1],
		    ['product_id' => 2, 'price' => 50, 'count' => 2],
		    ['product_id' => 2, 'price' => 5, 'count' => 3],
		 ];
 
$sum = array_sum(array_map(function($product_row) {
    return $product_row['price'] * $product_row['count'];
}, $order));
 
print_r($sum); // 250	
	
</xmp>

<?php
$order = [
		    ['product_id' => 1, 'price' => 20, 'count' => 1],
		    ['product_id' => 2, 'price' => 50, 'count' => 2],
		    ['product_id' => 2, 'price' => 5, 'count' => 3],
		 ];
 
$sum = array_sum(array_map(function($product_row) {
    return $product_row['price'] * $product_row['count'];
}, $order));
 
print_r($sum); // 250	

?>

<br/><br/><br/><br/><br/><br/><br/><br/><br/>