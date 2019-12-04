<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <?php   
    session_start();
     include('header.php'); 
    ?>
    <style>
  <?php include 'style.css'; ?>
</style>

</head>
<body>
        <div class="container">
            <div class= "mx-auto mt-5 w-50">
                <form action="post.php" method="post">
                        <div class="form-group">
                          <label for="Post Title">Title</label>
                          <input type="text" required class="form-control" name="title" placeholder="Enter a title for your post">
                        </div>
                        <div class="form-group">
                          <label for="body">Post Body</label>
                          <textarea type="text" class="form-control" id="exampleFormControlTextarea1"  placeholder="Enter the body for your post" name="body" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post</button>
                </form>
            </div>
        </div>
</body>
</html>
