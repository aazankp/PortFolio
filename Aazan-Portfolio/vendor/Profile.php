<?php
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    $objLibrary->Header("PortFolio");
    
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];
	else header("location: ../login/");

    $objLibrary->NavBar($iUserId);

    $fileName = basename($_SERVER['REQUEST_URI']);
    $aFIle = explode("?", $fileName);

    $backBtn = '';
    if ($aFIle[0] == 'usersDetail.php' && isset($_GET['action']))
    {
        $iUserId = $_GET['user'];
        $backBtn = '<div class="mb-8"><a href="viewUsers.php" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-base px-5 py-2.5 text-center me-2 float-left"><i class="fa fa-angle-left me-2"></i>Back</a></div>';
    }

    $userData = $objDatabase->fetchUser($iUserId);
    $aUserData = mysqli_fetch_assoc($userData);

    $pro_title = "Your";
    if ($aFIle[0] == 'usersDetail.php' && isset($_GET['action'])) $pro_title = $aUserData['fullName']." - ";

    $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
    $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
    
    $Prof_img = $aUserData['profile'];
    if ($aUserData['profile'] == "" || mysqli_num_rows($userData) < 1) $Prof_img = "no-image.jpg";

    $ProfileUrl= "";
    if (mysqli_num_rows($fetchPortFolio) > 0) $ProfileUrl = $aProfFolioData['portfolioUrl'];

?>

<div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 pt-3 text-center">
    <?= $backBtn ?>
    <h1 class="font-bold text-2xl"><?= $pro_title ?> Profile</h1>
    <form id="profile_Form_Submit" enctype="multipart/form-data" class="mb-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-50">
                <div class="relative w-full">
                    <div class="copy-Text-Div flex flex-row flex-wrap">
                        <h1 class="font-bold text-left min-w-max">PortFolio Url:</h1>
                        <div class="text-left copyTxt ms-1"><?= $ProfileUrl; ?> <i class="far fa-copy text-lg w-8" id="copyBtn"></i></div>
                    </div>
                    <div id="copyStatus" class="text-slate-600 text-sm pt-3 h-8 mb-2"></div>
                    <div class="flex flex-wrap justify-between">
                        <?php if($aUserData["resume"] != '') {?>
                            <a href="../vendor/Resumes/<?= $aUserData['resume']  ?>" target="_blank" class="float-left hover:text-blue-600 mt-2">View your uploaded resume <i class="fa fa-external-link-alt"></i></a>
                        <?php } else { ?>
                            <h3 class="float-left hover:text-blue-600 mt-2 font-bold">Uploaded resume: </h3>
                        <?php } ?>
                        <input type="file" name="resume" class="border-b-2 border-teal-400 pb-2 float-right">
                        <input type="hidden" name="old_resume" value="<?= $aUserData['resume']; ?>">
                    </div>
                </div>
            </div>
            <div class="flex justify-end items-center h-50">
                <div class="relative w-full profile-img-pro flex flex-col items-end items-center mb-5">
                    <img class="rounded-full float-right" src="../images/Profiles/<?= $Prof_img; ?>" alt="Rounded avatar">
                    <input type="file" name="prof_img" class="border-b-2 border-teal-400 pb-2">
                    <input type="hidden" name="old_prof_img" value="<?= $aUserData['profile']; ?>">
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="name" name="name" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Name" value="<?= $aUserData['fullName']; ?>" />
                    <label for="name" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Name</label>
                </div>
            </div>
            <div class="flex justify-end items-center h-8 prof-second-input">
                <div class="relative w-full">
                    <input autocomplete="off" id="email" name="email" type="email" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Email" value="<?= $aUserData['email']; ?>" />
                    <label for="Email" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Email</label>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="mobile" name="mobile" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Mobile" value="<?= $aUserData['mobile']; ?>" />
                    <label for="mobile" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Mobile</label>
                </div>
            </div>
            <div class="flex justify-end items-center h-8 prof-second-input">
                <div class="relative w-full">
                    <input autocomplete="off" id="occupation" name="occupation" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Occupation" value="<?= $aUserData['occupation']; ?>" />
                    <label for="occupation" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Occupation</label>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="WorkUrl" name="workUrl" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Work Url" value="<?= $aUserData['workUrl']; ?>" />
                    <label for="WorkUrl" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Work Url</label>
                </div>
            </div>
            <div class="flex justify-end items-center h-8">
                <div class="relative w-full">
                    <input autocomplete="off" id="address" name="address" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate_Pro" placeholder="Address" value="<?= $aUserData['address']; ?>" />
                    <label for="address" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Address</label>
                </div>
            </div>
        </div>
        <input type="hidden" value="<?= $aUserData['userId'] ?>" name="userId">
        <button type="submit" class="bg-emerald-500 text-white rounded-md px-10 py-2 mt-5" id="submitBtnProf">Save</button>
    </form>
</div>

<?php $objLibrary->Footer(); ?>