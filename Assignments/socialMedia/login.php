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
    session_start();
    //include headers
    include('credentials.php');
    include('header.php');

    
    //define variables to store the credentials that are inputted
    $email =trim(htmlspecialchars($_POST['email']));
    $password =trim(htmlspecialchars($_POST['password']));

    //check database for user credentials
    $sql = "SELECT password,nickname FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$email);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($dbpassword, $nickname);

        if($stmt->num_rows() > 0)
        {
            while ($stmt->fetch()) {
                //hash user inputted password to compare the data
                if($dbpassword === hash('sha256', $password))
                {
                    $_SESSION['username'] = $nickname;
                    $_SESSION["loginattemptfail"] = false;
                    $_SESSION["loggedin"] = true;
                    header('Location: index.php');
                }
                else 
                {
                    $_SESSION["loginattemptfail"] = true;
                    header('Location: loginlanding.php');
                    $_SESSION["loggedin"] = false;
                }
                
            }
        }
        else {
            $_SESSION["loginattemptfail"] = true;
            header('Location: loginlanding.php');
            $_SESSION["loggedin"] = false;
        }






    ?>
    </div>
        
</body>
</html>



