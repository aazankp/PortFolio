<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");
    require_once "Database.php";
    $objDatabase = new Database;

    $action = $_REQUEST["action"];
    // echo "<pre>";
    // print_r($_REQUEST);

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
                $file_name = rand(0000,9999) . "_" . time() . ".PNG";

                $fullImgPath = $dir."/".$file_name;
                $ImgPath = $_FILES["profile"]["tmp_name"];
                $boundary = uniqid();
                
                $Curl = curl_init("https://api.pixmiller.com/v1/remove");
                
                $Header = [
                    'X-Api-Key: 11e701956059c9ee935c5e27d46c9d7e33af5aea',
                    'Accept: application/json',
                    'Content-Type: multipart/form-data; boundary='.$boundary
                ];
                
                $Param = "--$boundary\r\n";
                $Param .= 'Content-Disposition: form-data; name="image_file"; filename="' . $file_name . "\"\r\n";
                $Param .= 'Content-Type: image/PNG' . "\r\n\r\n";
                $Param .= file_get_contents($ImgPath) . "\r\n";
                $Param .= "--$boundary--\r\n";

                $Response = CURL ("POST", $Curl, $Param, $Header);
                $Response = json_decode($Response, true);
                $imageContent = file_get_contents($Response["url"]);
                file_put_contents($fullImgPath, $imageContent);
                // move_uploaded_file($ImgPath, $dir."/".$file_name);

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

    elseif (isset($action) && $action == "signIn") {
        $email = $_REQUEST['email'];
        $pass = $_REQUEST['password'];
        $password = md5($pass);
        $fetch = $objDatabase->signin ($email, $password);

        if (mysqli_num_rows($fetch) > 0) {
            $row = mysqli_fetch_assoc($fetch);
            $aUserInfo = array(
                "userId" => $row["userId"],
                "email" => $row["email"],
                "password" => $row["password"]
            );
            $_SESSION["userInfo"] = $aUserInfo;
            header("location: ../portfolio/portfolio.php");
        } else {
            header("location: ../login/index.php?error=signinfail");
        }
    }

    elseif (isset($action) && $action == "portFolio_Submit") {
        $about = $_REQUEST["about"];
        $contact = $_REQUEST["contact"];
        $eduArr = array();
        $srvArr = array();
        $expArr = array();
        $sklArr = array();
        $prjtArr = array();

        foreach ($_REQUEST as $key => $value) {
            if (stripos($key, "education") === 0) $eduArr[$key] = $value;
            if (stripos($key, "services") === 0) $srvArr[$key] = $value;
            if (stripos($key, "experience") === 0) $expArr[$key] = $value;
            if (stripos($key, "skills") === 0) $sklArr[$key] = $value;
            if (stripos($key, "projects") === 0) $prjtArr[$key] = $value;
        }

        foreach ($_FILES as $key => $value) {
            if ($value["name"] == "") {
                echo "projectImg";
                exit;
            } else {
                $dir = "../images/Projects";
                if (!is_dir($dir)) mkdir($dir, 0777, true);
                $file_name = rand(0000,9999) . "_" . time() . ".jpg";
                move_uploaded_file($value["tmp_name"], $dir."/".$file_name);
                $prjtArr[$key]["imageName"] = $file_name;
            }
        }

        $about = json_encode($about);
        $contact = json_encode($contact);
        $eduArr = json_encode($eduArr);
        $srvArr = json_encode($srvArr);
        $expArr = json_encode($expArr);
        $sklArr = json_encode($sklArr);
        $prjtArr = json_encode($prjtArr);

        if ($eduArr == "[]") $eduArr = "";
        if ($srvArr == "[]") $srvArr = "";
        if ($expArr == "[]") $expArr = "";
        if ($sklArr == "[]") $sklArr = "";
        if ($prjtArr == "[]") $prjtArr = "";

        if ($_REQUEST["btnValue"] == "insert") {
            $result = $objDatabase->portFolioInsertion($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $_REQUEST["userId"]);
            if ($result) echo 1;
            else echo 0;
        } else {
            $result = $objDatabase->portFolioUpdate($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $_REQUEST["userId"]);
            if ($result) echo 1;
            else echo 0;
        }
    }

    elseif (isset($action) && $action == "checkUserData")
    {
        $iUserId = $_SESSION["userInfo"]["userId"];
        // $iUserId = 10;
        // die("here". $iUserId);
        $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        echo json_encode($aProfFolioData);
    }

    elseif (isset($action) && $action == "signOut")
    {
       session_unset();
       session_destroy();
       header("location: ../portfolio.php");
    }

    function CURL ($Method, $Curl, $Param, $Header) {
        if ($Method != "GET") {
            curl_setopt($Curl, CURLOPT_POST, true);
        }
        if ($Param != "" || $Param != NULL)
            curl_setopt($Curl, CURLOPT_POSTFIELDS, $Param);
        curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
        if ($Header != "" || $Header != NULL)
            curl_setopt($Curl, CURLOPT_HTTPHEADER, $Header);
        $Response = curl_exec($Curl);
        curl_close($Curl);
        return $Response;
    }



?>