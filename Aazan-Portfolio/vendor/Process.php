<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");
    require_once "Database.php";
    $objDatabase = new Database;

    $action = $_REQUEST["action"];
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];

    // echo "<pre>";
    // print_r($_REQUEST);

    if (isset($action) && $action == "register") {
        $fname = htmlspecialchars($_REQUEST["fname"]);
        $email = htmlspecialchars($_REQUEST["email"]);
        $address = htmlspecialchars($_REQUEST["address"]);
        $mobile = htmlspecialchars($_REQUEST["mobile"]);
        $password = htmlspecialchars($_REQUEST["password"]);
        $confirmpassword = htmlspecialchars($_REQUEST["confirmpassword"]);
        $occupation = htmlspecialchars($_REQUEST["occupation_title"]);
        $myworkurl = htmlspecialchars($_REQUEST["myworkurl"]);

        if ($fname == "" || $email == "" || $address == "" || $mobile == "" || $password == "" || $occupation == "" || $myworkurl == "") {
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
                $cvDir = "../vendor/Resumes/User_".$iUserId;
                if (!is_dir($cvDir)) mkdir($cvDir, 0777, true);
                $cvFile_name = rand(0000,9999) . "_" .$_FILES["cv"]["name"];
                move_uploaded_file($_FILES["cv"]["tmp_name"], $cvDir."/".$cvFile_name);
                // Profile
                $dir = "../images/Profiles/User_".$iUserId;
                if (!is_dir($dir)) mkdir($dir, 0777, true);
                $file_name = rand(0000,9999) . "_" . time() . ".PNG";
                $ImgPath = $_FILES["profile"]["tmp_name"];
                move_uploaded_file($ImgPath, $dir."/".$file_name);

                // Insertion
                $res = $objDatabase->signup($fname, $email, $address, $mobile, $password, $file_name, $occupation, $myworkurl, $cvFile_name);
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
        $email = htmlspecialchars($_REQUEST['email']);
        $pass = htmlspecialchars($_REQUEST['password']);
        $password = md5($pass);
        $fetch = $objDatabase->signin ($email, $password);
        
        if (mysqli_num_rows($fetch) > 0) {
            $row = mysqli_fetch_assoc($fetch);
            $aUserInfo = array(
                "userId" => $row["userId"],
                "email" => $row["email"],
                "password" => $row["password"]
            );

            if (isset($_REQUEST['rememberMe'])) {
                setcookie("User", $row["userId"], time() + (86400 * 30), "/");
            }

            $upd_Old_Pass = $objDatabase->updatePassword($row["password"], $row["password"], $row["userId"]);
    
            $_SESSION["userInfo"] = $aUserInfo;
            header("location: ../portfolio/portfolio.php");
        } else {
            header("location: ../login/index.php?error=signinfail");
        }
    }

    elseif (isset($action) && $action == "portFolio_Submit") {
        $about = $_REQUEST["about"];
        $contact = $_REQUEST["contact"];
        $portfolioUrl = htmlspecialchars($_REQUEST["portfolioUrl"]);
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

        $dir = "../images/Projects/User_".$iUserId;

        foreach ($_FILES as $key => $value)
        {
            if ($value["name"] == "" && $prjtArr[$key]["imageName"] == "") {
                echo "projectImg";
                exit;
            } else {
                if (!is_dir($dir)) mkdir($dir, 0777, true);

                if ($value["name"] != "") {
                    $path = pathinfo($value["name"]);
                    if (strtolower($path["extension"]) == "jpg" || strtolower($path["extension"]) == "jpeg" || strtolower($path["extension"]) == "png")
                    {
                        $old_ProfImg = $prjtArr[$key]["imageName"];
                        if ($old_ProfImg != "") {
                            if (file_exists($dir. "/" .$old_ProfImg)) {
                                unlink($dir. "/" .$old_ProfImg);
                            }
                        }
                        $file_name = rand(0000,9999) . "_" . time() . ".jpg";
                        move_uploaded_file($value["tmp_name"], $dir."/".$file_name);
                        $prjtArr[$key]["imageName"] = $file_name;
                    } else {
                        echo "invalid Service Img";
                        exit;
                    }
                }
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

        if ($prjtArr == "") {
            $files = glob($dir . "/*");
            foreach ($files as $file) {
                if (is_file($file)) {
                    unlink($file);
                }
            }
        }

        if ($_REQUEST["btnValue"] == "insert") {
            $result = $objDatabase->portFolioInsertion($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $portfolioUrl, $iUserId);
            if ($result) echo 1;
            else echo 0;
        } else {
            $result = $objDatabase->portFolioUpdate($about, $contact, $eduArr, $srvArr, $expArr, $sklArr, $prjtArr, $portfolioUrl, $iUserId);
            if ($result) echo 1;
            else echo 0;
        }
    }

    elseif (isset($action) && $action == "profile_Submit")
    {
        $name = htmlspecialchars($_REQUEST['name']);
        $email = htmlspecialchars($_REQUEST['email']);
        $mobile = htmlspecialchars($_REQUEST['mobile']);
        $occupation = htmlspecialchars($_REQUEST['occupation']);
        $address = htmlspecialchars($_REQUEST['address']);

        if ($name == "" || $email == "" || $mobile == "" || $occupation == "" || $address == "") {
            echo "fill";
            exit;
        }
        
        $dir = "../images/Profiles";
        
        if ($_FILES["prof_img"]["name"] == "") {
            $profImg = $_REQUEST['old_prof_img'];
        } else {
            $path = pathinfo($_FILES["prof_img"]["name"]);
            if (strtolower($path["extension"]) == "jpg" || strtolower($path["extension"]) == "jpeg" || strtolower($path["extension"]) == "png") {
                $old_ProfImg = $_REQUEST['old_prof_img'];
                if (file_exists($dir. "/" .$old_ProfImg)) {
                    unlink($dir. "/" .$old_ProfImg);
                }
                $profImg = rand(0000,9999) . "_" . time() . ".jpg";
                if (!is_dir($dir)) mkdir($dir, 0777, true);
            } else {
                echo "imgError";
                exit;
            }
        }

        $result = $objDatabase->updateUser($name, $email, $mobile, $occupation, $address, $profImg, $iUserId);

        if ($result) {
            move_uploaded_file($_FILES["prof_img"]["tmp_name"], $dir."/".$profImg);
            echo "1";
        } else {
            echo "0";
        }
    }

    elseif (isset($action) && $action == "password_Submit")
    {
        $current_pass = htmlspecialchars($_REQUEST['currentPass']);
        $new_pass = htmlspecialchars($_REQUEST['newPass']);
        $conf_pass = htmlspecialchars($_REQUEST['conf_pass']);

        $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        $password = $aProfFolioData["password"];

        if ($current_pass == "" || $new_pass == "" || $conf_pass == "") {
            echo "fill";
            exit;
        }

        $current_pass = md5($current_pass);
        $new_pass = md5($new_pass);
        $conf_pass = md5($conf_pass);

        if ($aProfFolioData["password"] != $current_pass)
        {
            echo "curr_pass";
            exit;
        }

        if ($new_pass != $conf_pass)
        {
            echo "conf_pass";
            exit;
        }

        $result = $objDatabase->updatePassword($current_pass, $new_pass, $iUserId);

        if ($result) {
            echo "1";
        } else {
            echo "0";
        }
    }

    elseif (isset($action) && $action == "checkUserData")
    {
        $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        echo json_encode($aProfFolioData);
    }

    elseif (isset($action) && $action == "signOut")
    {
        session_unset();
        session_destroy();
        unset($_COOKIE['User']); 
        setcookie('User', '', -1, '/');
        header("location: ../login/");
    }

    elseif (isset($action) && $action == "SendEmail")
    {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $subject = $_REQUEST['subject'];
        $message = $_REQUEST['message'];
        require_once "PHPMailer/vendor/index.php";
        $res = SendMail($name, $email, $subject, $message, $iUserId);
        echo $res;
    }

?>