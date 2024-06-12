<?php
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    $objLibrary->Header("PortFolio");
    
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];
	else header("location: login");

    $objLibrary->NavBar($iUserId);

    $userData = $objDatabase->fetchUser($iUserId);
    $aUserData = mysqli_fetch_assoc($userData);
    
    $Prof_img = $aUserData['profile'];
    if ($aUserData['profile'] == "") $Prof_img = "no-image.jpeg";
?>

<div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 pt-7 text-center">
    <h1 class="font-bold text-2xl">Change Your Password</h1>
    <form id="pass_Form_Submit" enctype="multipart/form-data" class="mb-16 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="currentPass" name="currentPass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Current Password" />
                    <label for="currentPass" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Current Password</label>
                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showCurrPass"></i>
                </div>
            </div>
            <div class="flex justify-end items-center h-8 prof-second-input">
                <div class="relative w-full">
                    <input autocomplete="off" id="newPass" name="newPass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="New Password" />
                    <label for="newPass" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">New Password</label>
                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showNewPass"></i>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="conf_pass" name="conf_pass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Confirm Password" />
                    <label for="conf_pass" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Confirm Password</label>
                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showConfPass"></i>
                </div>
            </div>
        </div>
        <button type="submit" class="bg-emerald-500 text-white rounded-md px-10 py-2 mt-5" id="chngPass">Change Password</button>
    </form>
</div>

<?php $objLibrary->Footer(); ?>