<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
    <script> 
    $(function(){
      $("#header").load("header.php"); 
      $("#footer").load("footer.html"); 
    });
    </script> 
</head>
<body>
    <div id="header"></div>
        <div class="container">
            <div class= "mx-auto mt-5 w-50">
                <form action="login.php" method="post" autocomplete="off">
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input type="email" required class="form-control" name="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" required class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                </form>
                <?php 
                session_start();
                if(isset($_SESSION['loginattemptfail'])) {
                  if($_SESSION['loginattemptfail'] === true)
                  {
                    echo "PLEASE TRY AGAIN";
                  }
                } 
                
                ?>
            </div>
        </div>



           
              
</body>
</html>
