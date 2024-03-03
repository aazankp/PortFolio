<?php
echo "<pre>";
print_r($_REQUEST);

if ($_REQUEST["action"] == "register") {
    $fname = $_REQUEST["fname"];
    $email = $_REQUEST["email"];
    $address = $_REQUEST["address"];
    $zipcode = $_REQUEST["zipcode"];
    $mobile = $_REQUEST["mobile"];
    $dob = $_REQUEST["dob"];
    $password = $_REQUEST["password"];
    $confirmpassword = $_REQUEST["confirmpassword"];
    $profile = $_FILES["profile"];

    if ($password != $confirmpassword)
        header("location: register.php?error=password");
}



?>