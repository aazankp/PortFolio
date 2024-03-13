<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PortFolio</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="css/Form.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <?php require_once "vendor/NavBar.html"; ?>


    <div class="container mx-auto px-4 md:px-10 lg:px-20 xl:px-40 py-10 text-center">
        <h1 class="font-bold text-2xl">Form For Resume</h1>

        <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
            <div class="col-span-11 flex items-center">About</div>
        </div>
        <form id="portFolio_Form_Submit" enctype="multipart/form-data">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4">
                <div class="flex justify-end items-center">
                    <div class="relative w-full">
                        <textarea autocomplete="off" id="aboutDescription" name="about[aboutDescription]" type="text" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea>
                        <label for="aboutDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label>
                    </div>
                </div>
            </div>

            <!-- Contact -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Contact</div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4">
                <div class="flex justify-end items-center">
                    <div class="relative w-full">
                        <textarea autocomplete="off" id="contactdescription" name="contact[Description]" type="text" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea>
                        <label for="contactDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
    
            <!-- Education -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Education</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="education_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="education[education_Toggle]" id="education_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="puteducation" class="mb-8"></div>
            <!-- Education End -->

            <!-- Services -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Services</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="services_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="services[services_Toggle]" id="services_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putservices" class="mb-8"></div>
            <!-- Services End -->

            <!-- Experience -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Experience</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="experience_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="experience[experience_Toggle]" id="experience_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putexperience" class="mb-8"></div>
            <!-- Experience End -->

            <!-- Skills -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Skills</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="skills_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="skills[skills_Toggle]" id="skills_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putskills" class="mb-8"></div>
            <!-- Skills End -->

            <!-- Projects -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Projects</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="projects_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="projects[projects_Toggle]" id="projects_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putprojects" class="mb-8"></div>
            <!-- Projects End -->

            <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-2 mt-5">Save</button>
        </form>


    </div>

    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="js/Form.js"></script>
</body>

</html>