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
    include('credentials.php');
    include('header.php');

    //define variables to store the credentials that are inputted
    $title =htmlspecialchars($_POST['title']);
    $body =htmlspecialchars($_POST['body']);

    $stmt = $conn->prepare("INSERT INTO post (title, body, userID)VALUES (?, ?, ?)");
    $stmt->bind_param('ssi',$title, $body, $_SESSION['userID']);
    $stmt->execute();

    header('Location: index.php');

   

    ?>
    </div>
        
</body>
</html>



