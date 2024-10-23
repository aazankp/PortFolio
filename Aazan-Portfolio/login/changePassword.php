<?php
    require_once "../vendor/errors.php";
    require_once "../vendor/Library.php";
    require_once "../vendor/Database.php";
    $objDatabase = new Database;
    $objLibrary = new Library;
    $objLibrary->Header("PortFolio");
    if (!isset($_SESSION['OTP_UserId'])) header("location: verify.php");
    else
    {
        $fetchUser_OTP = $objDatabase->fetchUser($_SESSION['OTP_UserId']);
        $afetchUser_OTP = mysqli_fetch_assoc($fetchUser_OTP);
        if (mysqli_num_rows($fetchUser_OTP) > 0)
        {
            $user_OtpStatus = $afetchUser_OTP['otpSend'];
            if ($afetchUser_OTP['otpSend'] == 0 || $afetchUser_OTP['otpVerified'] == 0) header("location: otp.php");
        } else
        {
            header("location: changePassword.php?error=wrong");
        }
    }
?>

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-2xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-2xl">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">Change Password</h1>
                    </div>
                    <div class="divide-y divide-gray-200 mb-8">
                        <form action="../vendor/Process.php" method="POST">
                            
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="newPass" name="new_password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base text-sm" placeholder="New Password" />
                                    <label for="newPass" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">New Password</label>
                                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showNewPass"></i>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="conf_pass" name="conf_password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base text-sm" placeholder="Confirm Password" />
                                    <label for="conf_pass" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm Password</label>
                                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showConfPass"></i>
                                </div>
                                <div class="relative">
                                    <button class="bg-blue-500 text-white rounded-md px-2 py-2 w-full">Change Password</button>
                                </div>
                            </div>
                            <input type="hidden" name="action" value="changePass">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $objLibrary->Footer(); ?>