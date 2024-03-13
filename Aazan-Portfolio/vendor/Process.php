<?php

require_once "Database.php";
$objDatabase = new Database;

$action = $_REQUEST["action"];
echo "<pre>";

if (isset($action) && $action == "register") {
    $fname = htmlspecialchars($_REQUEST["fname"]);
    $email = htmlspecialchars($_REQUEST["email"]);
    $address = htmlspecialchars($_REQUEST["address"]);
    $zipcode = htmlspecialchars($_REQUEST["zipcode"]);
    $mobile = htmlspecialchars($_REQUEST["mobile"]);
    $dob = htmlspecialchars($_REQUEST["dob"]);
    $password = htmlspecialchars($_REQUEST["password"]);
    $confirmpassword = htmlspecialchars($_REQUEST["confirmpassword"]);
    $occupation = htmlspecialchars($_REQUEST["occupation_title"]);
    $myworkurl = htmlspecialchars($_REQUEST["myworkurl"]);

    if ($fname == "" || $email == "" || $address == "" || $zipcode == "" || $mobile == "" || $dob == "" || $password == "" || $occupation == "" || $myworkurl == "") {
        header("location: ../login/register.php?error=fields");
        exit;
    }
    
    if ($password != $confirmpassword) {
        header("location: ../login/register.php?error=password");
        exit;
    }

    $password = md5($password);

    $path = pathinfo($_FILES["profile"]["name"]);
    $cvPath = pathinfo($_FILES["cv"]["name"]);


    if (strtolower($path["extension"]) == "jpg" || strtolower($path["extension"]) == "jpeg" || strtolower($path["extension"]) == "png") {
        if (strtolower($cvPath["extension"]) == "pdf") {
            // Resume
            $cvDir = "../vendor/Resumes";
            if (!is_dir($cvDir)) mkdir($cvDir, 0777, true);
            $cvFile_name = rand(0000,9999) . "_" .$_FILES["cv"]["name"];
            move_uploaded_file($_FILES["cv"]["tmp_name"], $cvDir."/".$cvFile_name);
            // Profile
            $dir = "../images/Profiles";
            if (!is_dir($dir)) mkdir($dir, 0777, true);
            $file_name = rand(0000,9999) . "_" .$_FILES["profile"]["name"];
            move_uploaded_file($_FILES["profile"]["tmp_name"], $dir."/".$file_name);
            // Insertion
            $res = $objDatabase->signup($fname, $email, $address, $zipcode, $mobile, $dob, $password, $file_name, $occupation, $myworkurl, $cvFile_name);
            if ($res) header("location: ../login/register.php?errorSuccess=signupSuccess");
        } else {
            header("location: ../login/register.php?error=cvFormat");
            exit;
        }
    } else {
        header("location: ../login/register.php?error=image");
        exit;
    }
}

elseif (isset($action) && $action == "resumeForm") {
    print_r($_REQUEST);
    $eduArr = [];
    foreach ($_REQUEST as $key => $value) {
        if (stripos($key, "education") === 0) $eduArr[$key] = $value;
    }

    // print_r($eduArr);
}



?>