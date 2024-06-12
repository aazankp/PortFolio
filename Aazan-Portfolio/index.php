<?php
if (isset( $_SESSION["userInfo"]["userId"])) header("location: portfolio/portfolio.php"); 
else if (isset($_COOKIE['User'])) header("location: portfolio/portfolio.php");
else header("location: login");


?>