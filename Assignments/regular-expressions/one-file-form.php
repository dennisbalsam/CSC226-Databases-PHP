<html>
<head>
  <title>Form and Processing</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"></head>

<body>
<?php
//function containing the form
function submitForm()
{
  //create the form
  echo "<div class='container'> <div class= 'mx-auto mt-5 w-50'>";
  echo "<form method='post' action='one-file-form.php'> Username:<input type='text'  class='form-control mb-3' placeholder='Enter username' name='username'>  Password:<input type='password' class='form-control' placeholder='Enter Password'  name='password'>";
  echo "<input type='submit' name='submit' class='mt-3 btn btn-primary'>";
  echo "</div> </div>";
}
//function to dislay error messages
function putErrors($errorList)
{
  echo "<div class = 'text-danger mt-2 text-center'>";
  echo $errorList['Error'];
  echo "</div>";
  submitForm();
}
?> 
 <body>
 <?php

//define user credentials array
    $userCredentials = array(
        "joeDoe" => "goProgramPHP!", "junk0" => "isthismypassword",
        "busyBee" => "pass20word","computerGal" => "pass30word", 
        "compGuy" => "mypass2309","expertComp" => "60your78",
        "smartone" => "78y68pal","johndoe" => "pass4567",
        "johndoe3" => "pass2100", "johndoe67" => "pass2099"
    );


 //submittion of form for login
  $errorList = array('Error' => "");


  if(isset($_POST['submit']))
  {
    //convert special chars
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));

    //trim white space

  }

  if (!isset($_POST['submit']))
    submitForm(); 
  else if ($username == NULL || array_key_exists($username, $userCredentials) == false ){
    echo "<h1 class ='w-75 mt-5 mx-auto text-center'>" . 'Sorry, wrong information has been entered!' . '</h1>';
    $errorList['Error'] = "<h3>PLEASE PUT IN A PROPER USERNAME</h3>";
    putErrors($errorList);
  }
  else if ($password== NULL || $userCredentials[$username] != $password){
    echo "<h1 class ='w-75 mt-5 mx-auto text-center'>" . 'Sorry, wrong information has been entered!' . '</h1>';
      $errorList['Error'] = "<h3>PLEASE PUT IN A PROPER PASSWORD</h3>";
      putErrors($errorList);
  }
  else
  {
    //check to see that the credentials entered are accurate 
    //check to see this user and password are correct in order to login
    if (array_key_exists($username, $userCredentials) && $userCredentials[$username] == $password) {
      //output message confirming login
      echo "<h1 class ='text-success w-75 mt-5 mx-auto text-center'>" . 'Welcome '. $username . " you have successfully logged in" . '</h1>';
    }
  }

  
?>

 </body>
 </html>
 
 
 </html>
