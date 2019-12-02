
<?php 
  session_start();
  include('credentials.php');
  include('header.html');
  function post() {
   
      // Create connection
      $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die("Connection failed: " . mysqli_connect_error());

      //select p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5
      $sql = "SELECT p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($postBody, $postTitle, $postDate, $username, $commentBody);
      echo '<div class="mb-5 w-75 mx-auto mt-5">';
      while ($stmt->fetch()) {

        echo 
        '<div class="card" style="margin-top:20px;">
        <div class="card-header text-center" style="font-size: 20px;">' . $postTitle .' </div>
        <div class="card-body">
          <p class="card-text text-center">' . $postBody .'</p>
          <span class="float-left"> ' . $postDate . ' </span>
          <span class="float-right"> ' . $username . ' </span> 
        </div>
        </div>'; 
      if($commentBody != NULL)
      {
      echo ' <div class="card-header text-center" style="font-size: 20px;">  Comments </div>
        <div class="card-body" style="border: 1px solid black;">
            <p class="card-text text-center" >' . $commentBody .'</p>
          </div>  ';
      }
    }
  } 
  echo '</div>';
  $page_title = 'Welcome to this Site!';

  // Call the function:
  post();
?>
<a class="btn btn-primary float-right mt-5 mb-5" href="#" role="button">Next 5 posts</a>
<a class="btn btn-primary float-left mt-5 mb-5" href="#" role="button">Last 5 posts</a>
<?php

  include('footer.html');
?>