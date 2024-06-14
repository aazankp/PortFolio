<?php
    session_start();
    class Library{
        public function Header($title){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <title><?= $title; ?></title>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link rel="icon" type="image/png" href="../images/logo.png"/>
                <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
                <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.min.css" rel="stylesheet">
                <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
                <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
                <link rel="stylesheet" href="../css/form.css">
            </head>
            <body class="bg-gray-100">
            <?php
        }

        public function NavBar($iUserId)
        {
            global $objDatabase;

            $url = explode("/", $_SERVER['REQUEST_URI']);
            if ($url[count($url)-1] == "") header("location: ../../vendor/404.php");

            $fetchPortFolio = $objDatabase->fetchUser ($iUserId);
            $aProfFolioData = mysqli_fetch_assoc($fetchPortFolio);
            $fetchPortFolioo = $objDatabase->fetchPortFolio ($iUserId);

            if($aProfFolioData['email'] == 'aazank517@gmail.com') $viewUsers = '';
            if ($aProfFolioData["password"] != $aProfFolioData["oldPassword"]) header("location: ../vendor/Process.php?action=signOut");
            $Prof_img = "/".$aProfFolioData['profile'];
            if ($aProfFolioData['profile'] == "" || mysqli_num_rows($fetchPortFolio) < 1) $Prof_img = "no-image.jpg";

            ?>
                <nav id="NavBar">
                    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                        <div class="relative flex h-16 items-center justify-between">
                        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                            <button type="button" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                            <span class="absolute -inset-0.5"></span>
                            <span class="sr-only">Open main menu</span>
                            <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                            </svg>
                            <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            </button>
                        </div>
                        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                            <div class="hidden sm:ml-6 sm:block">
                                <div class="flex space-x-4">
                                    <?php if (mysqli_num_rows($fetchPortFolioo) > 0){ ?>
                                        <a href="../portfolio.php?pId=<?= $iUserId; ?>" class="bg-blue-600 text-white rounded-md px-3 py-2 text-sm font-medium">View Portfolio</a>
                                    <?php } ?>
                                    <a href="../portfolio/portfolio.php" class="bg-blue-600 text-white rounded-md px-3 py-2 text-sm font-medium">Home</a>
                                    <?php if($aProfFolioData['email'] == 'aazank517@gmail.com') { ?>
                                        <a href="../vendor/viewUsers.php" class="bg-blue-600 text-white rounded-md px-3 py-2 text-sm font-medium">View Users</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                            <!-- Profile dropdown -->
                            <div class="relative ml-3">
                            <div>
                                <button type="button" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="../images/Profiles/<?= $Prof_img; ?>">
                                </button>
                            </div>
                            <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden nav-menu-btn" id="user-menu" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                                <a href="../vendor/Profile.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
                                <a href="../vendor/Password.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Change Your Password</a>
                                <a href="../vendor/Process.php?action=signOut" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="sm:hidden hidden" id="mobile-menu">
                        <div class="space-y-1 px-2 pb-3 pt-2">
                            <?php if (mysqli_num_rows($fetchPortFolioo) > 0){ ?>
                                <a href="../portfolio.php?pId=<?= $iUserId; ?>" class="bg-blue-600 text-white block rounded-md px-3 py-2 text-base font-medium">Portfolio</a>
                            <?php } ?>
                            <a href="../portfolio/portfolio.php" class="bg-blue-600 text-white block rounded-md px-3 py-2 text-base font-medium">Home</a>
                            <?php if($aProfFolioData['email'] == 'aazank517@gmail.com') { ?>
                                <a href="../vendor/viewUsers.php" class="bg-blue-600 text-white block rounded-md px-3 py-2 text-base font-medium">View Users</a>
                            <?php } ?>
                        </div>
                    </div>
                </nav>
            <?php
        }
        
        public function Footer(){
            ?>
                    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                    <script src="https://cdn.tailwindcss.com"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert2/11.10.6/sweetalert2.all.min.js"></script>
                    <script src="../fonts/icons/icons.js"></script>
                    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
                    <script src="../js/Form.js"></script>
                </body>
                </html>
            <?php
        }
    }
?>