
<!--Variables -->
<html>
<body>
<?php
$name = "Joe";
$age = 100;
$salary = 2508.25;
echo "<h2>$name</h2>\n";
echo "Age: $age<br />\n";
echo "Salary: $$salary\n";
?>
</body>
</html>

<!--If Statements -->
<html>
<body>
<h1>Dice</h1>
<?php
$die1 = rand(1, 6);
$die2 = rand(1, 6);
if ($die1 == $die2){   
	echo "<h2>Doubles -- $die1</h2>\n";
} 
elseif ($die1 + $die2 == 11){   
	echo "<h2>Total of 11</h2>\n";
} 
else {    
    echo "<h2>Die1: $die1</h2>\n";
	echo "<h2>Die2: $die2</h2>\n";
}


$word = "try it!";

$check = (is_string($word))? 
	"Word is a string!" : 
	"Word is not a string!";
echo $check;
echo "<br/>";

$user = "Joe346";
$loggedin = TRUE;
$message = 'Hello '.($loggedin ? "$user" : 'Guest');
echo $message;
?>
</body>
</html>