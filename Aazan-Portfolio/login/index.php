<?php
    require_once "../vendor/errors.php";
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    $objLibrary->Header("PortFolio");
    if (isset( $_SESSION["userInfo"]["userId"])) header("location: ../portfolio/portfolio.php"); 
    else if (isset($_COOKIE['User'])) header("location: ../portfolio/portfolio.php");
?>

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
            <div
                class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-2xl">
            </div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-2xl">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">SIGN IN</h1>
                    </div>
                    <div class="divide-y divide-gray-200 mb-8">
                        <form action="../vendor/Process.php" method="POST">
                            
                            <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="relative">
                                    <input autocomplete="off" id="email" name="email" type="email" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base text-sm" placeholder="Email address" />
                                    <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                                </div>
                                <div class="relative">
                                    <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base text-sm" placeholder="Password" />
                                    <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                    <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showLoginPass"></i>
                                </div>
                                <div class="relative pr-3">
                                    <div class="inline-flex items-center">
                                        <label class="relative flex items-center p-3 rounded-full cursor-pointer" htmlFor="link">
                                            <input type="checkbox" name="rememberMe" id="rememberMe"
                                            class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-green-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-green-500 before:opacity-0 before:transition-opacity checked:border-green-900 checked:bg-green-700 checked:before:bg-green-900 hover:before:opacity-10" checked/>
                                            <span
                                            class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor"
                                                stroke="currentColor" stroke-width="1">
                                                <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                            </svg>
                                            </span>
                                        </label>
                                        <label class="mt-px font-light text-gray-700 cursor-pointer select-none" htmlFor="link" for="rememberMe">
                                            <p class="flex font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900">
                                                Remember me
                                            </p>
                                        </label>
                                    </div>
                                    <a href="verify.php" class="text-base hover:border-b-2 border-teal-400 float-end mt-2.5">Forget Password ?</a>

                                </div>
                                <div class="relative">
                                    <button class="bg-blue-500 text-white rounded-md px-2 py-2 w-full">SIGN IN</button>
                                    <a href="register.php" class="bg-blue-600 text-white rounded-md px-2 py-2 mt-3 w-full float-right text-center">SIGN UP</a>
                                </div>
                            </div>
                            <input type="hidden" name="action" value="signIn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $objLibrary->Footer(); ?>