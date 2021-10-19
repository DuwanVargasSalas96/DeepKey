<?php
    //Session control
    session_start();
    session_unset();
    session_destroy();
    
    //Redirect to page
    header("location:index.php?kb=login");
?>
