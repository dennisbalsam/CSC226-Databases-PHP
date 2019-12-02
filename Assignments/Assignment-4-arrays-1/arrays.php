<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div  class ="text-center">
    <div class="alert alert-primary" role="alert">
    <h2>Some arrays being outputted based on a condition</h2>
    </div>
    <?php
    //create print function
    function printArray($myArray, $condition)
    {
        //set a temp array
        $tempArray =$myArray;

        //make sure criteria isn't our action
        if($condition == 'Criteria')
        {
            $tempArray = array_filter($myArray, "criteriaArray");
        }
        //make sure unsetted isnt our action
        if ($condition == 'Unsetted')
        {
            $x = 0;
            foreach($tempArray as $state => $team) {
              $x = $x + 1;
              if ($x == 4)
              {
                unset($tempArray[$state]);
              }
              
            }  
        }
        //output array in a table
        $table = "<h1 class = 'mt-5'>" . $condition . "</h1>";
        $table .= "<table class='w-50 mb-5 table-sm mx-auto table-hover' border='3'>";
        $table .= '<th>' . 'City' . '</th>'; 
        $table .= '<th>' . 'Team' . '</th>'; 
        //loop through array and output each state and team
        foreach($tempArray as $state => $team) {
            $table .= "<tr>" .
                '<td>' . $state . '</td>' .
                '<td>' . $team . '</td>' 
                . '</tr>';
        
        }
        $table .= "</table>";
        echo $table;
    }
    
    //function to filter the array based on the team name being > Jaguars
    function criteriaArray($array) {
        return $array > "Jaguars";
    }

    //function to unset the fourth element
    function unsetElement($array)
    {
        unset($array['Carolina']);
        return $array;
    }

    //declare array
    $footballTeams = array(
        "Minnesota" => "Vikings", "Chicago" => "Bears",
        "Seattle" => "Seahawks","Carolina" => "Panthers", 
        "Atlanta" => "Falcons","Detriot" => "Lions",
        "Dallas" => "Cowboys","Houston" => "Texans",
        "Jacksonville" => "Jaguars", "Denver" => "Broncos"
    );
    $tableAlteration = array('1' => 'Normal', '2' => 'Criteria', '3' => 'Sorted', '4' => 'Unsetted', '5' => 'Reverse Sorted', '6' => 'Key Sort');
   
    //check to see what condition we need for the array
   foreach($tableAlteration as $index => $action )
    {
        //normal array output
    if($action == 'Normal' )
    {
        printArray($footballTeams, $action);
    }
    //array based on criteria
    elseif($action == 'Criteria')
    {
        printArray($footballTeams, $action);
    }
    //sorted array
    elseif($action == 'Sorted')
    {

        asort($footballTeams);
        printArray($footballTeams, $action);
    }
    //unsetted element array
    elseif($action == 'Unsetted')
    {
        printArray($footballTeams, $action);
    }
    //reverse sorted array
    elseif($action == 'Reverse Sorted')
    {
        arsort($footballTeams);
        printArray($footballTeams, $action);
    }
    //array sorted by key 
    elseif($action == 'Key Sort')
    {   
        ksort($footballTeams);
        printArray($footballTeams, $action);
    }
   
   }    
?>

    
</div>

</body>
</html>