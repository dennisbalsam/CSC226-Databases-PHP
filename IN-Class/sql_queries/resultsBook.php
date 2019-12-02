<?php
//logon to server - ideally it would be in seperate file for security reasons

define('DB_USER', 'krupitsky');
define('DB_PASSWORD', 'spiritsword99');
define('DB_HOST', 'localhost');
define('DB_NAME', 'bookOrama');


// Create connection
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Connection failed: " . mysqli_connect_error());

  

//define variables to store the credentials that are inputted
$searchType =$_POST['searchtype'];
$searchTerm =$_POST['searchterm'];


$sql = "SELECT ISBN, Author, Title, Price FROM Books WHERE $searchType = """;
$result = mysqli_query($conn, $sql);  

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "ISBN: " . $row["ISBN"]. " - Author: " . $row["Author"]. "- Title" . $row["Title"].  "- Price" . $row["Price"]. "<br>";
    }
} else {
    echo "0 results";
}


?>