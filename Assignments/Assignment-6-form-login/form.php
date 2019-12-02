<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div>
    <?php
    //define user credentials array
    $userCredentials = array(
        "joeDoe" => "goProgramPHP!", "junk0" => "isthismypassword",
        "busyBee" => "pass20word","computerGal" => "pass30word", 
        "compGuy" => "mypass2309","expertComp" => "60your78",
        "smartone" => "78y68pal","johndoe" => "pass4567",
        "johndoe3" => "pass2100", "johndoe67" => "pass2099"
    );

    //define variables to store the credentials that are inputted
    $username =htmlspecialchars($_POST['username']);
    $password =htmlspecialchars($_POST['password']);

    //check to see this user and password are correct in order to login
    if (array_key_exists($username, $userCredentials) && $userCredentials[$username] == $password) {
        //output message confirming login
        echo "<h1 class ='alert-primary w-75 mt-5 mx-auto text-center'>" . 'Welcome '. $username . " you have successfully logged in" . '</h1>';
    }
    //output message if credentials are not correct
    else {
        echo "<h1 class ='alert-primary w-75 mt-5 mx-auto text-center'>" . 'Sorry, wrong information has been entered!' . '</h1>';

    }

    ?>
    </div>
        
</body>
</html>

