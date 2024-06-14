<?php
    ob_start();
    require_once "../vendor/errors_new.php";
    $objErrors = new Errors;
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    $objLibrary->Header("PortFolio");
    
    if (isset($_SESSION["userInfo"]["userId"])) $iUserId = $_SESSION["userInfo"]["userId"];
	else if (isset($_COOKIE['User'])) $iUserId = $_COOKIE['User'];
    else header("location: ../login/");

    $objLibrary->NavBar($iUserId);
    $userData = $objDatabase->fetchAllUser();

?>

<div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 pt-7 text-center">
    <?php
        if (isset($_SESSION['UserDel'])) $objErrors->showError('UserDel');
        if (isset($_SESSION['UserDel'])) $objErrors->destroyError('UserDel');
    ?>
    <table id="viewUsers" class="stripe hover" style="width:100%; padding-top: 1em; padding-bottom: 1em;">
        <thead class="bg-gray-400">
            <tr>
                <th>S.No</th>
                <th>Profile</th>
                <th>Name</th>
                <th>Occupation</th>
                <th>Mobile No</th>
                <th>Email</th>
                <th>View</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $Sno = 1;
                while ($row = mysqli_fetch_assoc($userData)) {
                    $Prof_img = "/".$row['profile'];
                    if ($row['profile'] == "" || mysqli_num_rows($userData) < 1) $Prof_img = "no-image.jpg";
            ?>
            <tr>
                <td><?= $Sno ?></td>
                <td><img src="../images/Profiles/<?= $Prof_img ?>" width="70" height="70"></td>
                <td><?= $row['fullName'] ?></td>
                <td><?= $row['occupation'] ?></td>
                <td><?= $row['mobile'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><a href="usersDetail.php?user=<?= $row['userId'] ?>&action=view"><i class="fa fa-list-alt text-blue-600 text-xl"></i></a></td>
                <td><a href="usersDetail.php?user=<?= $row['userId'] ?>&action=edit"><i class="fa fa-pen-square text-blue-600 text-xl"></i></a></td>
                <td><a href="usersDetail.php?user=<?= $row['userId'] ?>&action=delete"><i class="fa fa-trash-alt text-blue-600 text-xl"></i></a></td>
            </tr>
            <?php
                    $Sno++;
                }
            ?>
        </tbody>
    </table>
</div>

<?php $objLibrary->Footer(); ?>