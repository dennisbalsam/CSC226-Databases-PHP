<?php 
    //include header
    include('header.php');

    //start session
    session_start();

    //give message of logging out then destroy session
    echo "LOGGING OUT";    
    session_destroy();
    
 
    header('Location: index.php');
?>