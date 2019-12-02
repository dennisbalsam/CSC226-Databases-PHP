
<?php
//logon to server - ideally it would be in seperate file for security reasons

define('DB_USER', 'krupitsky');
define('DB_PASSWORD', 'spiritsword99');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bookOrama');


// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Connection failed: " . mysqli_connect_error());

  

//define variables to store the credentials that are inputted
$searchType =trim($_POST['searchtype']);
$searchTerm =trim($_POST['searchterm']);

if (!$searchType || !$searchTerm)
	exit;
switch($searchType)
{
case 'Title':
case 'Author':
case 'ISBN':
	break;
default:
	echo "Not legal";
	exit;
}

//need select query to see if user has already registered
//user for next homework
// $query = "INSERT into users VALUES (NULL, ?,?,?)"; 
// $stmt->bind_param('sss',);

$sql = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchType = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s',$searchTerm);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($ISBN, $Author, $Title, $Price);

echo "<p> Number of Books: ". $stmt->num_rows() . "</p>";

while ($stmt->fetch()) {
 echo $ISBN . "<br/>" . $Author . "<br/>" . $Title .  "<br/>" . $Price;
}

?>