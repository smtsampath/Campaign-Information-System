<?php
//delete the session variable and go to login page
session_start();
session_destroy();

header("location:login.php");

?>