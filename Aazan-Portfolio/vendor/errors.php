<?php
$error = [
    "password" => "Password Not Matched!",
    "fields" => "Please Fill All Fields Properly!",
    "image" => "Please Select Valid Format of Image!",
    "signupSuccess" => "SIGN UP Successfully...",
    "cvFormat" => "Please Upload PDF Format Only!",
    "formSubmit" => "Data Save Successfully!",
    "formNotSubmit" => "Please Fill Data Carefully!",
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
            echo '<div class="relative">
                <div class="bg-'.$alertColor.'-200 border-l-4 border-'.$alertColor.'-500 text-'.$alertColor.'-700 p-2 xl:absolute xl:inset-0 xl:z-auto xl:w-1/4 xl:rounded-e-2xl" role="alert" style="height: 75px;">
                    <p class="font-bold">'.$alertType.'</p>
                    <p>'.$msg.'</p>
                </div>
            </div>';
        }
    }

    if (!array_key_exists($check, $error)) {
        header("location: ../login/register.php");
    }
}
?>