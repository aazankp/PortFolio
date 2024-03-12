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
                    <label for="education_Toggle" class="flex items-center cursor-pointer">
                        <input type="checkbox" name="education[eduToggle]" id="education_Toggle" class="sr-only peer">
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
                        <input type="checkbox" name="Services[servicesToggle]" id="services_Toggle" class="sr-only peer">
                        <div class="block relative bg-blue-300 w-16 h-8 p-1 rounded-full before:absolute before:bg-white before:w-6 before:h-6 before:p-1 before:rounded-full before:transition-all before:duration-500 before:left-1 peer-checked:before:left-8 peer-checked:before:bg-green-600"></div>
                    </label>
                </div>
            </div>
            <div id="putservices" class="mb-8"></div>
            <!-- Services End -->

            <input type="hidden" name="action" value="resumeForm">
            <button type="submit" class="bg-blue-500 text-white rounded-md px-2 py-2 mt-5">Submit</button>
        </form>


    </div>

    



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <script src="js/Form.js"></script>
    <script>
        // $(document).ready(function() {
        //     $("input").click(function(){
        //         var clickedID = $(this).attr('id');
        //         if(clickedID == "services_Toggle") {
        //             if (clickedID == "services_Toggle") {
        //                 funName =  "servicesFields";
        //                 window[funName] = function (nameVar) {
        //                     return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
        //                         <div class="flex justify-end items-center h-20"> \
        //                             <div class="relative w-full"> \
        //                                 <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
        //                                 <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
        //                             </div> \
        //                         </div> \
        //                         <div class="flex justify-end items-center h-20"> \
        //                             <div class="relative w-full"> \
        //                                 <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
        //                                 <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
        //                             </div> \
        //                         </div> \
        //                         <div class="flex justify-end items-center"> \
        //                             <div class="relative w-full"> \
        //                                 <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
        //                                 <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
        //                             </div> \
        //                         </div> \
        //                     </div> \
        //                     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
        //                         <div class="flex items-center"> \
        //                             <div class="relative w-full"> \
        //                                 <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
        //                                 <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
        //                             </div> \
        //                         </div> \
        //                         <div class="flex items-center"> \
        //                             <div class="relative w-full"> \
        //                                 <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
        //                                 <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
        //                             </div> \
        //                         </div> \
        //                         <div class="flex items-center"> \
        //                             <div class="relative w-full"> \
        //                                 <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
        //                                 <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
        //                             </div> \
        //                         </div> \
        //                     </div>');
        //                 }
        //             }

        //             var functionName = clickedID.split('_');
        //             $(document).on("click", "#"+clickedID, function() {
        //                 let toggle = $("#"+clickedID).prop('checked');
        //                 if (toggle === true) {
        //                     html = window[funName]("services");
        //                     html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
        //                         <div class="flex justify-end items-center"> \
        //                             <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
        //                         </div> \
        //                     </div>';
        //                     $("#put"+functionName[0]).html(html);
        //                 } else {
        //                     $("#put"+functionName[0]).html("");
        //                 }
        //             });
        //             numb = 1;
        //             $(document).on("click", "#"+functionName[0]+"Add", function(){
        //                 nameVar = functionName[0]+numb;
        //                 html = '<div class="addClass">';
        //                 html += window[funName](nameVar);
        //                 html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
        //                         <div class="flex justify-end items-center"> \
        //                             <button type="button" class="text-2xl deleteButton"><i class="fa-solid fa-trash"></i></button> \
        //                         </div> \
        //                     </div> \
        //                 </div>';

        //                 $("#put"+functionName[0]).append(html);
        //                 $(".addClass").addClass('forDelete' + functionName[0]);
        //                 $(".deleteButton").addClass('delAdd' + functionName[0]);
        //                 numb = numb+1;
        //             });
        //             $(document).on("click", ".delAdd"+functionName[0], function(){
        //                 $(this).closest(".forDelete"+functionName[0]).remove();
        //             });


        //         }
        //     });

        //     // return false;

        //     // Services Code Start
        //     // function servicesFields (nameVar) {
        //     //     return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
        //     //         <div class="flex justify-end items-center h-20"> \
        //     //             <div class="relative w-full"> \
        //     //                 <textarea autocomplete="off" id="'+ nameVar +'Description'+ nameVar +'" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
        //     //                 <label for="'+ nameVar +'Description'+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
        //     //             </div> \
        //     //         </div> \
        //     //         <div class="flex justify-end items-center h-20"> \
        //     //             <div class="relative w-full"> \
        //     //                 <textarea autocomplete="off" id="'+ nameVar +'Description'+ nameVar +'" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
        //     //                 <label for="'+ nameVar +'Description'+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
        //     //             </div> \
        //     //         </div> \
        //     //         <div class="flex justify-end items-center"> \
        //     //             <div class="relative w-full"> \
        //     //                 <input autocomplete="off" id="'+ nameVar +'institute'+ nameVar +'" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
        //     //                 <label for="'+ nameVar +'institute'+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
        //     //             </div> \
        //     //         </div> \
        //     //     </div> \
        //     //     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
        //     //         <div class="flex items-center"> \
        //     //             <div class="relative w-full"> \
        //     //                 <input autocomplete="off" id="from'+ nameVar +''+ nameVar +'" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
        //     //                 <label for="from'+ nameVar +''+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
        //     //             </div> \
        //     //         </div> \
        //     //         <div class="flex items-center"> \
        //     //             <div class="relative w-full"> \
        //     //                 <input autocomplete="off" id="to'+ nameVar +''+ nameVar +'" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
        //     //                 <label for="to'+ nameVar +''+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
        //     //             </div> \
        //     //         </div> \
        //     //         <div class="flex items-center"> \
        //     //             <div class="relative w-full"> \
        //     //                 <input autocomplete="off" id="'+ nameVar +'degree'+ nameVar +'" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
        //     //                 <label for="'+ nameVar +'degree'+ nameVar +'" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
        //     //             </div> \
        //     //         </div> \
        //     //     </div>');
        //     // }
        //     // $(document).on("click", "#servicesToggle", function() {
        //     //     let toggle = $('#servicesToggle').prop('checked');
        //     //     if (toggle === true) {
        //     //         html = servicesFields("services");
        //     //         html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
        //     //             <div class="flex justify-end items-center"> \
        //     //                 <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
        //     //             </div> \
        //     //         </div>';
        //     //         $("#putServices").html(html);
        //     //     } else {
        //     //         $("#putServices").html("");
        //     //     }
        //     // });
        //     // numb = 1;
        //     // $(document).on("click", "#servicesAdd", function(){
        //     //     nameVar = "services"+numb;
        //     //     html = '<div class="forDeleteservices">';
        //     //     html += servicesFields(nameVar);
        //     //     html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
        //     //             <div class="flex justify-end items-center"> \
        //     //                 <button type="button" id="delAddservices" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
        //     //             </div> \
        //     //         </div> \
        //     //     </div>';

        //     //     $("#putServices").append(html);
        //     //     numb = numb+1;
        //     // });
        //     // $(document).on("click", "#delAddservices", function(){
        //     //     $(this).closest(".forDeleteservices").remove();
        //     // });

        //     // Services Code End







        // });
    </script>
</body>

</html>