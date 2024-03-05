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
        <form action="vendor/Process.php" method="POST">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4">
                <div class="flex justify-end items-center h-20">
                    <div class="relative w-full">
                        <textarea autocomplete="off" id="aboutDescription" name="about[aboutDescription]" type="text" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea>
                        <label for="aboutDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label>
                    </div>
                </div>
            </div>
    
            <!-- Education -->
            <div class="grid grid-cols-12 gap-4 bg-gray-700 p-4 text-white font-bold my-4 rounded-3xl">
                <div class="col-span-11 flex items-center">Education</div>
                <div class="col-span-1 flex justify-end items-center">
                    <label for="eduToggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="education[eduToggle]" id="eduToggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putedu"></div>
            <!-- Education End -->

            <input type="hidden" name="action" value="resumeForm">
            <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-2 mt-5">Submit</button>
        </form>


    </div>

    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="js/Form.js"></script>
    <script>
        $(document).ready(function() {
            // Education Code Start
            function eduFields (nameVar) {
                return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="educationDescription" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                                <label for="educationDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="eduDescription" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
                                <label for="eduDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="eduinstitute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
                                <label for="eduinstitute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
                            </div> \
                        </div> \
                    </div> \
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="fromedu" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
                                <label for="fromedu" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="toedu" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
                                <label for="toedu" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="edudegree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
                                <label for="edudegree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
                            </div> \
                        </div> \
                    </div>');
            }
            $(document).on("click", "#eduToggle", function() {
                let toggle = $('#eduToggle').prop('checked');
                if (toggle === true) {
                    html = eduFields("education");
                    html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="eduAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                        </div> \
                    </div>';
                    $("#putedu").html(html);
                } else {
                    $("#putedu").html("");
                }
            });
            numb = 1;
            $(document).on("click", "#eduAdd", function(){
                nameVar = "education"+numb;
                html = '<div class="forDeleteedu">';
                html += eduFields(nameVar);
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAdd" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                        </div> \
                    </div> \
                </div>';

                $("#putedu").append(html);
                numb = numb+1;
            });
            $(document).on("click", "#delAdd", function(){
                $(this).closest(".forDeleteedu").remove();
            });

            // Education Code End







        });
    </script>
</body>

</html>