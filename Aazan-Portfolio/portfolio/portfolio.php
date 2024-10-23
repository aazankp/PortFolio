<?php
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    $objLibrary->Header("PortFolio");
    
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];
    else header("location: ../login/index.php");

    $objLibrary->NavBar($iUserId);

    $fetchPortFolio = $objDatabase->fetchPortFolio ($iUserId);
    if (mysqli_num_rows($fetchPortFolio) > 0) {
        $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
        $aAbout = json_decode($aProfFolioData["about"], true);
        $aContact = json_decode($aProfFolioData["contact"], true);
        $aEducation = json_decode($aProfFolioData["education"], true);
        $aServices = json_decode($aProfFolioData["services"], true);
        $aExperiences = json_decode($aProfFolioData["experiences"], true);
        $aSkills = json_decode($aProfFolioData["skills"], true);
        $aProjects = json_decode($aProfFolioData["projects"], true);
        
        $sAboutDesc = $aAbout["aboutDescription"];
        $sContactDesc = $aContact["Description"];
        $portfolioUrl = $aProfFolioData["portfolioUrl"];
    } else {
        $sAboutDesc = "";
        $sContactDesc = "";
        $portfolioUrl = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "?pId=" . $iUserId;
        $portfolioUrl = str_replace('portfolio/', '', $portfolioUrl);
    }

    $btnValue = (mysqli_num_rows($fetchPortFolio) > 0) ? "update" : "insert";
?>

<div class="portfolio_main">
    <div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 pt-7 text-center">
        <h1 class="font-bold text-2xl">Form For Resume</h1>
        <form id="portFolio_Form_Submit" enctype="multipart/form-data" class="mb-16">
            <!-- About -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles mt-7 heading-bar-color">
                <div class="col-span-11 flex items-center">About</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4">
                <div class="flex justify-end items-center">
                    <div class="relative w-full">
                        <textarea autocomplete="off" id="aboutDescription" name="about[aboutDescription]" type="text" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:border-teal-600 text-sm leading-5 bg-gray-100 validate pt-1" placeholder="Description"><?= $sAboutDesc; ?></textarea>
                        <label for="aboutDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label>
                    </div>
                </div>
            </div>
            <!-- About End -->

            <!-- Contact -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Contact</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4">
                <div class="flex justify-end items-center">
                    <div class="relative w-full">
                        <textarea autocomplete="off" id="contactdescription" name="contact[Description]" type="text" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"><?= $sContactDesc; ?></textarea>
                        <label for="contactDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
    
            <!-- Education -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Education</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="education_Toggle" class="flex items-center cursor-pointer">
                        <input <?= (isset($aEducation["education"]["education_Toggle"])) ? "checked" : ""; ?> type="checkbox" name="education[education_Toggle]" id="education_Toggle" class="sr-only peer">
                        <div class="block relative bg-stone-400 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-9 peer-checked:before:bg-red-500"></div>
                    </label>
                </div>
            </div>
            <div id="puteducation" class="mb-8"> </div>
            <!-- Education End -->

            <!-- Services -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Services</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="services_Toggle" class="flex items-center cursor-pointer">
                        <input <?= (isset($aServices["services"]["services_Toggle"])) ? "checked" : ""; ?> type="checkbox" name="services[services_Toggle]" id="services_Toggle" class="sr-only peer">
                        <div class="block relative bg-stone-400 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-9 peer-checked:before:bg-red-500"></div>
                    </label>
                </div>
            </div>
            <div id="putservices" class="mb-8"></div>
            <!-- Services End -->

            <!-- Experience -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Experience</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="experience_Toggle" class="flex items-center cursor-pointer">
                        <input <?= (isset($aExperiences["experience"]["experience_Toggle"])) ? "checked" : ""; ?> type="checkbox" name="experience[experience_Toggle]" id="experience_Toggle" class="sr-only peer">
                        <div class="block relative bg-stone-400 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-9 peer-checked:before:bg-red-500"></div>
                    </label>
                </div>
            </div>
            <div id="putexperience" class="mb-8"></div>
            <!-- Experience End -->

            <!-- Skills -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Skills</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="skills_Toggle" class="flex items-center cursor-pointer">
                        <input <?= (isset($aSkills["skills"]["skills_Toggle"])) ? "checked" : ""; ?> type="checkbox" name="skills[skills_Toggle]" id="skills_Toggle" class="sr-only peer">
                        <div class="block relative bg-stone-400 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-9 peer-checked:before:bg-red-500"></div>
                    </label>
                </div>
            </div>
            <div id="putskills" class="mb-8"></div>
            <!-- Skills End -->

            <!-- Projects -->
            <div class="grid grid-cols-12 gap-4 p-4 font-bold my-4 rounded-2xl toggles heading-bar-color">
                <div class="col-span-11 flex items-center">Projects</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="projects_Toggle" class="flex items-center cursor-pointer">
                        <input <?= (isset($aProjects["projects"]["projects_Toggle"])) ? "checked" : ""; ?> type="checkbox" name="projects[projects_Toggle]" id="projects_Toggle" class="sr-only peer">
                        <div class="block relative bg-stone-400 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-9 peer-checked:before:bg-red-500"></div>
                    </label>
                </div>
            </div>
            <div id="putprojects" class="mb-8"></div>
            <!-- Projects End -->

            <input type="hidden" value="<?= $iUserId; ?>" name="userId">
            <input type="hidden" value="<?= $btnValue; ?>" name="btnValue">
            <input type="hidden" id="portfolioUrl" value="<?= $portfolioUrl; ?>" name="portfolioUrl">
            <button type="submit" class="bg-emerald-500 text-white rounded-md px-10 py-2 mt-5" id="submitButton">Save</button>
        </form>
    </div>
</div>

<?php $objLibrary->Footer(); ?>