<?php
    session_start();
    date_default_timezone_set("Asia/Karachi");
    require_once "Database.php";
    $objDatabase = new Database;
    require_once "../vendor/errors_new.php";
    $objErrors = new Errors;

    $action = $_REQUEST["action"];
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];

    if (isset($action) && $action == "register")
    {
        $fname = htmlspecialchars($_REQUEST["fname"]);
        $email = htmlspecialchars($_REQUEST["email"]);
        $address = htmlspecialchars($_REQUEST["address"]);
        $mobile = htmlspecialchars($_REQUEST["mobile"]);
        $password = htmlspecialchars($_REQUEST["password"]);
        $confirmpassword = htmlspecialchars($_REQUEST["conf_pass"]);
        $occupation = htmlspecialchars($_REQUEST["occupation_title"]);
        $myworkurl = htmlspecialchars($_REQUEST["myworkurl"]);

        if ($fname == "" || $email == "" || $address == "" || $mobile == "" || $password == "" || $occupation == "") {
            header("location: ../login/register.php?error=fields");
            exit;
        }

        $userData = $objDatabase->verifyEmail($email);
        if (mysqli_num_rows($userData) > 0) header("location: ../login/register.php?error=emailExist");

        if ($password != $confirmpassword) {
            header("location: ../login/register.php?error=password");
            exit;
        }

        $password = md5($password);

        $path = pathinfo($_FILES["profile"]["name"]);
        $cvPath = pathinfo($_FILES["cv"]["name"]);

        // Profile
        if ($_FILES["profile"]["name"] != '')
            if (strtolower($path["extension"]) == "jpg" || strtolower($path["extension"]) == "jpeg" || strtolower($path["extension"]) == "png") {
                $dir = "../images/Profiles/";
                if (!is_dir($dir)) mkdir($dir, 0777, true);
                $file_name = rand(0000,9999) . "_" . time() . ".PNG";
                $ImgPath = $_FILES["profile"]["tmp_name"];
                move_uploaded_file($ImgPath, $dir."/".$file_name);
            } else {
                header("location: ../login/register.php?error=image");
                exit;
            }

        // Resume
        if ($_FILES["cv"]["name"] != '')
            if (strtolower($cvPath["extension"]) == "pdf") {
                $cvDir = "../vendor/Resumes/";
                if (!is_dir($cvDir)) mkdir($cvDir, 0777, true);
                $cvFile_name = rand(0000,9999) . "_" .time().".".$cvPath["extension"];
                move_uploaded_file($_FILES["cv"]["tmp_name"], $cvDir."/".$cvFile_name);
            } else {
                header("location: ../login/register.php?error=cvFormat");
                exit;
            }

        // Insertion
        $res = $objDatabase->signup($fname, $email, $address, $mobile, $password, $file_name, $occupation, $myworkurl, $cvFile_name);
        if ($res) header("location: ../login/register.php?errorSuccess=signupSuccess");
    }

    elseif (isset($action) && $action == "signIn") 
    {
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

    elseif (isset($action) && $action == "portFolio_Submit")
    {
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
        $workUrl = htmlspecialchars($_REQUEST['workUrl']);
        $address = htmlspecialchars($_REQUEST['address']);
        $iUserId = htmlspecialchars($_REQUEST['userId']);

        if ($name == "" || $email == "" || $mobile == "" || $occupation == "" || $address == "") {
            echo "fill";
            exit;
        }
        
        $dir = "../images/Profiles/";
        
        if ($_FILES["prof_img"]["name"] == "") {
            $profImg = $_REQUEST['old_prof_img'];
        } else {
            $path = pathinfo($_FILES["prof_img"]["name"]);
            if (strtolower($path["extension"]) == "jpg" || strtolower($path["extension"]) == "jpeg" || strtolower($path["extension"]) == "png") {
                $old_ProfImg = $_REQUEST['old_prof_img'];
                if ($old_ProfImg != '')
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

        $cv_dir = "../vendor/Resumes/";

        if ($_FILES["resume"]["name"] == "") {
            $resume = $_REQUEST['old_resume'];
        } else {
            $path = pathinfo($_FILES["resume"]["name"]);
            if (strtolower($path["extension"]) == "pdf") {
                $old_resume = $_REQUEST['old_resume'];
                if ($old_resume != '')
                    if (file_exists($cv_dir. "/" .$old_resume)) {
                        unlink($cv_dir. "/" .$old_resume);
                    }
                $resume = rand(0000,9999) . "_" . time() . ".pdf";
                if (!is_dir($cv_dir)) mkdir($cv_dir, 0777, true);
            } else {
                echo "cvError";
                exit;
            }
        }

        $result = $objDatabase->updateUser($name, $email, $mobile, $occupation, $workUrl, $address, $profImg, $resume, $iUserId);

        if ($result) {
            move_uploaded_file($_FILES["prof_img"]["tmp_name"], $dir."/".$profImg);
            move_uploaded_file($_FILES["resume"]["tmp_name"], $cv_dir."/".$resume);
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

        $fetchPortFolio = $objDatabase->fetchUser ($iUserId);
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
        if (isset($_GET['pId'])) $iUserId = $_GET['pId'];
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

        if ($name == "" || $email == "" || $subject == "" || $message == "") {
            echo "fill";
            exit;
        }
        
        require_once "PHPMailer/vendor/index.php";
        $res = SendMail($name, $email, $subject, $message, $iUserId, "");
        echo $res;
    }

    elseif (isset($action) && $action == "emailVerify")
    {
        $email = htmlspecialchars($_REQUEST['email']);

        if ($email == "") {
            header("location: ../login/verify.php?error=validEmail");
        }

        $fetchEmail = $objDatabase->verifyEmail($email);
        $afetchEmail = mysqli_fetch_assoc($fetchEmail);

        if (mysqli_num_rows($fetchEmail) > 0) {
            $userId = $afetchEmail["userId"];
            require_once "PHPMailer/vendor/index.php";
            $res = SendMail('', '', '', '', $userId, "verifyEmail");
            if ($res == 1)
            {
                $_SESSION['OTP_UserId'] = $userId;
                $otpStatus = $objDatabase->otpSendStatus('1', '0', $userId);
                header("location: ../login/otp.php?errorSuccess=otpSend");
            }
        } else {
            header("location: ../login/verify.php?error=emailExist");
        }
    }

    elseif (isset($action) && $action == "verifyOtp")
    {
        $otp = htmlspecialchars($_REQUEST['otp']);

        if ($otp == "") {
            header("location: ../login/otp.php?error=fillOTP");
        }

        $OTP_UserId = $_SESSION['OTP_UserId'];
        $fetchUser_OTP = $objDatabase->fetchUser($OTP_UserId);

        if (mysqli_num_rows($fetchUser_OTP) > 0)
        {
            $afetchUser_OTP = mysqli_fetch_assoc($fetchUser_OTP);
            $userOTP = $afetchUser_OTP["otp"];
            if ($userOTP == $otp)
            {
                $otpStatus = $objDatabase->otpSendStatus('1', '1', $OTP_UserId);
                header("location: ../login/changePassword.php?errorSuccess=otpVerified");
            }
            else header("location: ../login/otp.php?error=invalidOtp");
        } else {
            header("location: ../login/otp.php?error=wrong");
        }
    }

    elseif (isset($action) && $action == "changePass")
    {
        $new_password = htmlspecialchars($_REQUEST['new_password']);
        $conf_password = htmlspecialchars($_REQUEST['conf_password']);

        if ($new_password == "" && $conf_password == "") {
            header("location: ../login/changePassword.php?error=fillPass");
        }

        $new_password = md5($new_password);
        $conf_password = md5($conf_password);

        if ($new_password == $conf_password) {
            $OTP_UserId = $_SESSION['OTP_UserId'];
            $updUserPass = $objDatabase->updatePassword($new_password, $new_password, $OTP_UserId);
    
            if ($updUserPass)
            {
                $otpStatus = $objDatabase->otpSendStatus('0', '0', $OTP_UserId);
                session_unset();
                session_destroy();
                header("location: ../login/index.php?errorSuccess=passChanged");
            }
            else header("location: ../login/changePassword.php?error=wrong");
        } else
        {
            header("location: ../login/changePassword.php?error=passMisMatch");
        }
    }

    elseif (isset($action) && $action == "deleteUser")
    {
        $iUserId = $_REQUEST['userId'];
        $fetchUser = $objDatabase->fetchUser ($iUserId);
        $afetchUser = mysqli_fetch_assoc($fetchUser);
        $Cv = "../vendor/Resumes/$afetchUser[resume]";
        $proImg = "../images/Profiles/$afetchUser[profile]";
        
        $res = $objDatabase->deleteUser($iUserId);
        if ($res == 1)
        {
            if ($afetchUser['resume'] != '')
                if (file_exists($Cv)) unlink($Cv);

            if ($afetchUser['profile'] != '')
                if (file_exists($proImg)) unlink($proImg);
                
            $objErrors->setError('UserDel', ['1', 'User Record Deleted Successfully...']);
            header("location: ../vendor/viewUsers.php");
        }
    }

?>