<?php
$error = [
    "password" => "Password Not Matched!",
    "fields" => "Please Fill All Fields Properly!",
    "image" => "Please Select Valid Format of Image!",
    "signupSuccess" => "SIGN UP Successfully..."
];

if (isset($_REQUEST["error"]) ) $check = $_REQUEST["error"];
if (isset($_REQUEST["errorSuccess"]) ) $check = $_REQUEST["errorSuccess"];

if (isset($check)) {
    foreach ($error as $key => $msg) {
        if (isset($check) && $key == $check) {
            $alertType = "Be Warned";
            $alertColor = "orange";
            if (isset($_REQUEST["errorSuccess"])) {
                $alertType = "Success";
                $alertColor = "green";
            }
            echo '<div class="bg-'.$alertColor.'-200 border-l-4 border-'.$alertColor.'-500 text-'.$alertColor.'-700 p-2" role="alert">
                <p class="font-bold">'.$alertType.'</p>
                <p>'.$msg.'</p>
            </div>';
        }
    }

    if (!array_key_exists($check, $error)) {
        header("location: ../login/register.php");
    }
}
?>