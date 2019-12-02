<html> 
<!-- Declare, assign and print arrays -->
<?php
$cars = array("Volvo", "BMW", "Toyota");
echo "I like " . $cars[0] . ", " . $cars[1] . " and " . $cars[2] . ".</br>";
echo "I like $cars[0], $cars[1] and $cars[2].</br>";
echo 'I like $cars[0], $cars[1] and $cars[2].';
?>

<?php
echo "<br />";
$cars = array("Volvo", "BMW", "Toyota");
$arrlength = count($cars);

for($x = 0; $x < $arrlength; $x++) {
    echo $cars[$x];
    echo "<br>";
}
?>

<?php
$salaries["Bob"] = 2000;
$salaries["Sally"] = 4000;
$salaries["Charlie"] = 600;
$salaries["Clare"] = 0;

echo "Bob is being paid - $" . $salaries["Bob"] . "<br />";
echo "Sally is being paid - $" . $salaries['Sally'] . "<br />";
echo 'Charlie is being paid - $' . $salaries["Charlie"] . "<br />";
echo "Clare is being paid - $ {$salaries["Clare"]}</br>";
//without the { }, as associative array will not be interpreted
//this causes an error: echo "Clare is being paid - $ $salaries["Clare"]</br>";
?>



<!-- According to the U.S. Census Bureau, the 10 largest American cities (by population) in 2000 were as follows:

//New York, NY (8,008,278 people)
//Los Angeles, CA (3,694,820)
//Chicago, IL (2,896,016)
//Houston, TX (1,953,631)
//Philadelphia, PA (1,517,550)
//Phoenix, AZ (1,321,045)
//San Diego, CA (1,223,400)
//Dallas, TX (1,188,580)
//San Antonio, TX (1,144,646)
//Detroit, MI (951,270)

//Define an array (or arrays) that holds this information about locations and population. Print a table of locations and population information that includes the total population in all 10 cities. 

# define the population array -->

<?php
$array = array(
"New York, NY" => 8008278,
"Los Angeles, CA" => 3694820,
"Chicago, IL" => 2896016,
"Houston, TX" => 1953631,
"Philadelphia, PA" => 1517550,
"Phoenix, AZ" => 1321045,
"San Diego, CA" => 1223400,
"Dallas, TX" => 1188580,
"San Antonio, TX" => 1144646,
"Detroit, MI" => 951270
);
?>

<!-- print out the population array -->

<table border="1" cellspacing="0" cellpadding="4">
<tr>
<th>City</th>
<th>Population</th>
</tr>
<?php foreach ($array as $key=>$value) {
echo "<tr><td>$key</td><td>".number_format($value)."</td></tr>";
}
echo "<tr><th>Total</th><th>".number_format(array_sum($array))."</th></tr>";
?>
</table>
</html>
