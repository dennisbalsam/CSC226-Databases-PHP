
<?php 
  session_start();
  //some headers
  include('credentials.php');
  include('header.php'); ?>
  <style>
  <?php include 'style.css'; ?>
</style>
<?php
  function post($conn) {
   
      
      if(isset($_SESSION['username']))
      {
        echo "Logged in as: ". $_SESSION['username'];
      }
      //select p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5
      $sql = "SELECT p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($postBody, $postTitle, $postDate, $username, $commentBody);
      echo '<div class="mb-5 mt-5 mx-auto">';
      while ($stmt->fetch()) {

        echo 
        '<div class="comments mx-auto">
        <div class="card " style="margin-top:20px;">
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
          </div> 
          </div> ';
      }
    }
  } 
  echo '</div>';
  $page_title = 'Welcome to this Site!';

  // Call the function:
  post($conn);
  if (isset($_SESSION['user'])) {
    ?>
      logged in HTML and code here
    <?php
   
    } else {
      
  }
?>
<a class="btn btn-primary float-right mt-5 mb-5" href="#" role="button">Next 5 posts</a>
<a class="btn btn-primary float-left mt-5 mb-5" href="#" role="button">Last 5 posts</a>
<?php

  include('footer.html');
?>