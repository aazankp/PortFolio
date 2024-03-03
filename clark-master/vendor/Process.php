<?php

require_once "Database.php";
$objDatabase = new Database;

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

    if ($fname == "" || $email == "" || $address == "" || $zipcode == "" || $mobile == "" || $dob == "" || $password == "") {
        header("location: ../login/register.php?error=fields");
        exit;
    }
    
    if ($password != $confirmpassword) {
        header("location: ../login/register.php?error=password");
        exit;
    }

    $password = md5($password);

    $path = pathinfo($_FILES["profile"]["name"]);


    if ($path["extension"] == "jpg" || $path["extension"] == "jpeg" || $path["extension"] == "png") {
        $dir = "../images/Profiles";
        if (!is_dir($dir)) mkdir($dir, 0777, true);
        $file_name = rand(0000,9999) . "_" .$_FILES["profile"]["name"];
        move_uploaded_file($_FILES["profile"]["tmp_name"], $dir."/".$file_name);
        $res = $objDatabase->signup($fname, $email, $address, $zipcode, $mobile, $dob, $password, $file_name);
        if ($res) header("location: ../login/register.php?errorSuccess=signupSuccess");
    } else {
        header("location: ../login/register.php?error=image");
        exit;
    }

    
}



?>