<?php
    ob_start();
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
    else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];
    else header("location: ../login/");
    
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    if(isset($_REQUEST['action']) && $_REQUEST['action'] != 'edit') $objLibrary->Header("PortFolio");
    if(isset($_REQUEST['action']) && $_REQUEST['action'] != 'edit') $objLibrary->NavBar($iUserId);
    
    $iUserId = $_GET['user'];

    if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'view') 
    {
        $userData = $objDatabase->fetchUser($iUserId);
        $aUserData = mysqli_fetch_assoc($userData);

        $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        
        $Prof_img = $aUserData['profile'];
        if ($aUserData['profile'] == "" || mysqli_num_rows($userData) < 1) $Prof_img = "no-image.jpg";

        $ProfileUrl= "PortFolio Not Created";
        if (mysqli_num_rows($fetchPortFolio) > 0)
            $ProfileUrl = '<div class="text-left copyTxt ms-1">'. $aProfFolioData['portfolioUrl'] .'<i class="far fa-copy text-lg w-8" id="copyBtn"></i></div>';

        if($aUserData["resume"] != '')
        {
            $showResume = '<a href="../vendor/Resumes/'. $aUserData['resume'] .'" target="_blank" class="float-left hover:text-blue-600 mt-2">View your uploaded resume <i class="fa fa-external-link-alt"></i></a>';
        } else {
            $showResume = '';
        }


        $Table = '<div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 pt-3 text-center">
            <div class="mb-8">
                <a href="viewUsers.php" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-base px-5 py-2.5 text-center me-2 float-left"><i class="fa fa-angle-left me-2"></i>Back</a>
            </div>
            <h1 class="font-bold text-2xl">'. $aUserData['fullName'] .' - Profile</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
                <div class="flex justify-end items-center h-50">
                    <div class="relative w-full">
                        <div class="copy-Text-Div flex flex-row flex-wrap">
                            <h2 class="font-bold text-left min-w-max">PortFolio Url:&nbsp</h2>
                            '. $ProfileUrl .'
                        </div>
                        <div id="copyStatus" class="text-slate-600 text-sm pt-3 h-8 mb-2"></div>
                        <div class="flex flex-wrap justify-between">'. $showResume .'</div>
                    </div>
                </div>
                <div class="flex justify-end items-center h-50">
                    <div class="relative w-full profile-img-pro flex flex-col items-end items-center mb-5">
                        <h2 class="font-bold text-left min-w-max">Profile:</h2>
                        <img class="rounded-full float-right" src="../images/Profiles/'. $Prof_img .'" alt="Rounded avatar">
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
                <div class="flex justify-end items-center h-2">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Name: </span>'. $aUserData['fullName'] .'</span>
                    </div>
                </div>
                <div class="flex justify-end items-center h-2 prof-second-input">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Email: </span>'. $aUserData['email'] .'</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
                <div class="flex justify-end items-center h-2">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Mobile: </span>'. $aUserData['mobile'] .'</span>
                    </div>
                </div>
                <div class="flex justify-end items-center h-2 prof-second-input">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Occupation: </span>'. $aUserData['occupation'] .'</span>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4">
                <div class="flex justify-end items-center h-2">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Work Url: </span>'. $aUserData['workUrl'] .'</span>
                    </div>
                </div>
                <div class="flex justify-end items-center h-2">
                    <div class="relative w-full">
                        <span class="float-left"><span class="font-bold">Address: </span>'. $aUserData['address'] .'</span>
                    </div>
                </div>
            </div>
        </div>';

        print($Table);
    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit')
    {
        require_once "../vendor/Profile.php";
    }
    elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete')
    {
        header("location: ../vendor/Process.php?action=deleteUser&userId=$iUserId");
    }
    else
    {
        header("location: ../vendor/viewUsers.php");
    }

    if(isset($_REQUEST['action']) && $_REQUEST['action'] != 'edit') $objLibrary->Footer();

?>