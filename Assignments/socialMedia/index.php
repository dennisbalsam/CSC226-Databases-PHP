
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
      //add in the following
      if (isset($_GET['page']))
      $thispage = $_GET['page'];
      else
      $thispage = 1;


      //first query for total amount of records
      $query = "SELECT count(postID)
      FROM post";
      $stmt = $conn -> prepare($query);
      $stmt->execute();
      $stmt->store_result();
        $stmt->bind_result($totrecords);
      $stmt->fetch();
      $stmt->free_result();

      $recordsperpage = 5;

      $totalpages = ceil($totrecords / $recordsperpage);
      $offset = ($thispage - 1) * $recordsperpage;


      //select p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5
      $sql = "SELECT p.body,p.title,p.postdate, u.nickname, p.postID from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT  $offset, $recordsperpage";
      $stmt = $conn->prepare($sql);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($postBody, $postTitle, $postDate, $username, $postID);
      
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

      //select p.body,p.title,p.postdate, u.nickname ,case when exists (select c.body from comments c where p.postID = c.postID) then (select c.body from comments c where p.postID = c.postID) end from post p, users u where p.userID = u.userID ORDER BY p.postdate LIMIT 5
      $secondsql = "SELECT c.body, u.nickname from comments c, users u where c.postID = $postID and c.userID = u.userID";
      $newstmt = $conn->prepare($secondsql);
      $newstmt->execute();
      $newstmt->store_result();
      $newstmt->bind_result($commentBody, $nickname);
      echo '<div class="card-header text-center" style="font-size: 20px;">  Comments </div>';
      while ($newstmt->fetch()) {
        if($commentBody != NULL )
        {
        echo ' 
          <div class="card-body " style="border: 1px solid black;">
              <p class="card-text text-center" >' . $commentBody . '<p class="float-right">'. $nickname . '</p>'.  '</p>';
            '</div> ';
        echo '</div> ';
            
        }
      }
     
      }
      $stmt->free_result();
      //change paging for prev 5 posts
      if ($thispage > 1)
      {

          $page = $thispage - 1;
          // <a class="btn btn-primary float-left mt-5 mb-5" href="#" role="button">Last 5 posts</a> -->
          $prevpage = "<a class=\"btn btn-primary float-left mt-5 mb-5\" href=\"index.php?&page=$page\">Previous 5 Posts</a>";
          echo $prevpage;
          if($thispage < $totalpages)
          {
            $page = $thispage + 1;
            $nextpage = "<a class=\"btn btn-primary float-right mt-5 mb-5\" href=\"index.php?&page=$page\">Next 5 Posts</a>";
            echo $nextpage;
            
          }
  
          
      } 
      else
      {
          if($thispage < $totalpages)
          {
            $page = $thispage + 1;
            $nextpage = "<a class=\"btn btn-primary float-right mt-5 mb-5\" href=\"index.php?&page=$page\">Next 5 Posts</a>";
            echo $nextpage;
          }

      }

          
  } 



  // Call the function:
  post($conn);
  if (isset($_SESSION['user'])) {
    ?>
      logged in HTML and code here
    <?php
   
    } else {
      
  }
?>
<!-- <a class="btn btn-primary float-right mt-5 mb-5" href="#" role="button">Next 5 posts</a>
<a class="btn btn-primary float-left mt-5 mb-5" href="#" role="button">Last 5 posts</a> -->
<?php

  include('footer.html');
?>