<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays 2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div  class ="text-center">
    <div class="alert alert-primary" role="alert">
        <h2>A two dimensional Array being outputted based on conditions</h2>
    </div>

<?php

function printArray($myArray, $criteria)
{

    //output array in a table
    $table = "<h1 class = 'mt-5'>" . $criteria   . "</h1>";
    $table .= "<table class='w-75 mb-5 table mx-auto table-hover' border='3'>";
    $table .= '<th>' . 'Username' . '</th>'; 
    $table .= '<th>' . 'Password' . '</th>';
    $table .= '<th>' . 'Start Date' . '</th>'; 
    $table .= '<th>' . 'Score' . '</th>';  
    //loop through array and output each state and team
    foreach($myArray as $username => $info) {
        $date= strtotime($info['startdate']);
        $table .= "<tr>" .
            '<td>' . $username . '</td>' .
            '<td>' . $info['password'] . '</td>' .
            '<td>' . date('M d, Y', $date) . '</td>' .
            '<td>' . $info['score'] . '</td>' 
            . '</tr>';
    
    }
    $table .= "</table>";
    echo $table;
}

//function to sort the array by scores
function scoreSort($array1, $array2){

    if ($array1['score'] == $array2['score'])
        return 0;
    else if ($array1['score'] > $array2['score'])
        return 1;
    else
        return -1;
}

//check for scores under 50
function scoreCheck($myArray)
{
    echo "<h1 class ='alert-primary w-50 mx-auto'>" . 'Users with scores over 50' . '</h1>';
    foreach($myArray as $username => $info)
    {
        if($info['score'] > 50)
        {
        echo "<h2>" . $username . ' has a score over 50 ' . "</h2>" ;
        } 
    }
}
//output total scores for all users
function totalScore($myArray)
{
    echo "<h1 class ='alert-primary w-50 mt-5 mx-auto'>" . 'Total Score of Users' . '</h1>';
    $totalScore = 0;
    foreach($myArray as $username => $info)
    {
        $totalScore += $info['score'];
    }

    echo "<h2 class= 'mb-5'>" . $totalScore . "</h2>";

}
     


   //declare two dimensional array
   $users = array(
    "joeDoe" => array('password'=>'goProgramPHP!','startdate'=>'11/20/18', 'score'=>100),
    "JohnD" => array('password'=>'dontSharePasswords','startdate'=>'12/15/18', 'score'=>180), 
    "computerSavy" => array('password'=>'jjyy&7','startdate'=>'3/16/19', 'score'=>30),
    "bestFriendAccount" => array('password'=>'HoHiHu67','startdate'=>'5/9/19', 'score'=>55)
    );

     $tableAlteration = array('1' => 'Normal', '2' => 'Score Sorted', '3' => 'Username and Score > 50', '4' => 'Total Score');
   
    //check to see what condition we need for the array
   foreach($tableAlteration as $index => $action )
    {
        //normal array output
    if($action == 'Normal' )
    {
        printArray($users, $action);   
    }
    //array based on criteria
    elseif($action == 'Score Sorted')
    {   
        //make call to sort array
        uasort($users, 'scoreSort');
        printArray($users, $action);
    }
    //sorted array
    elseif($action == 'Username and Score > 50')
    {
        scoreCheck($users);
    }
    //unsetted element array
    elseif($action == 'Total Score')
    {
        totalScore($users);
    }
}
?>






</div> 
</body>
</html>