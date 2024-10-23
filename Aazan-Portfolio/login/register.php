<?php
    require_once "../vendor/errors.php";
    require_once "../vendor/Library.php";
    $objLibrary = new Library;
    $objLibrary->Header("PortFolio");
?>

    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-300 to-blue-600 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-2xl"></div>
            <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-2xl">
                <div class="max-w-md mx-auto">
                    <div>
                        <h1 class="text-2xl font-semibold">SIGN UP</h1>
                    </div>
                    <form action="../vendor/Process.php" method="POST" enctype="multipart/form-data" class="mb-10">
                        <div class="divide-y divide-gray-200">
                            <div class="py-4 text-base leading-6 space-y-2 text-gray-700 sm:text-lg sm:leading-7">
                                <div class="grid grid-cols-6 gap-4">
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="fname" name="fname" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Full Name" />
                                            <label for="fname" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Full Name</label>
                                        </div>
                                    </div>

                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="email" name="email" type="email" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Email Address" />
                                            <label for="email" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email Address</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-4">
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="address" name="address" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Address" />
                                            <label for="address" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Address</label>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="mobile" name="mobile" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Mobile" />
                                            <label for="mobile" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Mobile</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-6 gap-4">
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="password" name="password" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Password" />
                                            <label for="password" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                                            <div id="regPass">
                                                <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showLoginPass"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="conf_pass" name="conf_pass" type="password" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Confirm Password" />
                                            <label for="conf_pass" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm Password</label>
                                            <div id="regPass">
                                                <i class="fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass" id="showConfPass"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="grid grid-cols-6 gap-4">
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="occupation_title" name="occupation_title" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="Occupation Title" />
                                            <label for="occupation_title" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Occupation Title</label>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-12 xl:col-span-3 h-12">
                                        <div class="relative">
                                            <input autocomplete="off" id="myworkurl" name="myworkurl" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 text-gray-900 focus:outline-none focus:borer-teal-600 text-base" placeholder="My Work Url" />
                                            <label for="myworkurl" class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">My Work Url <small>( If any )</small></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <label class="text-gray-600 text-base">
                                        Image
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="profile" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span class="">Upload a file</span>
                                                    <input id="profile" name="profile" type="file" class="sr-only">
                                                </label>
                                                <p class="pl-1 text-black">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-black">
                                                PNG, JPG, JPEG
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="text-gray-600 text-base">
                                        Resume / CV
                                    </label>
                                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                        <div class="space-y-1 text-center">
                                            <svg class="mx-auto h-12 w-12 text-black" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                            <div class="flex text-sm text-gray-600">
                                                <label for="cv" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                                    <span class="">Upload a file</span>
                                                    <input id="cv" name="cv" type="file" class="sr-only">
                                                </label>
                                                <p class="pl-1 text-black">or drag and drop</p>
                                            </div>
                                            <p class="text-xs text-black">
                                                PDF only
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="relative">
                                    <button type="submit" class="bg-blue-500 text-white rounded-md px-8 py-2 w-full">SIGN UP</button>
                                    <a href="index.php" class="bg-blue-600 text-white rounded-md px-8 py-2 float-right w-full mt-2 text-center">Back to SIGN IN</a>
                                </div>
                                <input type="hidden" value="register" name="action">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php $objLibrary->Footer(); ?>