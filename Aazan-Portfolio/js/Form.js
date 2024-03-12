$(document).ready(function() {
    $('[aria-controls="mobile-menu"]').click(function() {
        $('#mobile-menu').toggleClass('hidden');
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
    });

    $('#user-menu-button').click(function() {
        $('#user-menu').toggleClass('hidden');
        var expanded = $(this).attr('aria-expanded') === 'true';
        $(this).attr('aria-expanded', !expanded);
    });

    $(document).click(function(event) {
        if (!$(event.target).closest('#user-menu-button').length && !$(event.target).closest('#user-menu').length) {
            $('#user-menu').addClass('hidden');
            $('#user-menu-button').attr('aria-expanded', 'false');
        }
    });

    $("input").click(function(){
        var clickedID = $(this).attr('id');
        if(clickedID == "education_Toggle" || clickedID == "services_Toggle") {
            if (clickedID == "education_Toggle") {
                var functionName = clickedID.split('_');
                funName =  "educationFields";
                window[funName] = function (nameVar) {
                    return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                                <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
                                <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
                                <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
                            </div> \
                        </div> \
                    </div> \
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
                                <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
                                <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
                                <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
                            </div> \
                        </div> \
                    </div>');
                }
            }
            if (clickedID == "services_Toggle") {
                var functionName = clickedID.split('_');
                funName =  "servicesFields";
                window[funName] = function (nameVar) {
                    return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                                <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center h-20"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
                                <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
                                <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
                            </div> \
                        </div> \
                    </div> \
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
                                <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
                                <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                            </div> \
                        </div> \
                        <div class="flex items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
                                <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
                            </div> \
                        </div> \
                    </div>');
                }
            }

            $(document).on("click", "#"+clickedID, function() {
                let toggle = $("#"+clickedID).prop('checked');
                if (toggle === true) {
                    html = window[funName](functionName[0]);
                    html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" class="text-2xl AddBtn"><i class="fa-solid fa-circle-plus abc"></i></button> \
                        </div> \
                    </div>';
                    $("#put"+functionName[0]).html(html);
                    $(".AddBtn").addClass('Add' + functionName[0]);
                } else {
                    $("#put"+functionName[0]).html("");
                }
            });
            numb = 1;
            $(document).on("click", ".Add"+functionName[0], function(){
                nameVar = functionName[0]+numb;
                html = '<div class="addClass">';
                html += window[funName](nameVar);
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" class="text-2xl deleteButton"><i class="fa-solid fa-trash"></i></button> \
                        </div> \
                    </div> \
                </div>';

                $("#put"+functionName[0]).append(html);
                $(".addClass").addClass('forDelete' + functionName[0]);
                $(".deleteButton").addClass('delAdd' + functionName[0]);
                numb = numb+1;
            });
            $(document).on("click", ".delAdd"+functionName[0], function(){
                $(this).closest(".forDelete"+functionName[0]).remove();
            });


        }
    });

    // // Education Code Start
    // function eduFields (nameVar) {
    //     return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
    //             <div class="flex justify-end items-center h-20"> \
    //                 <div class="relative w-full"> \
    //                     <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
    //                     <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
    //                 </div> \
    //             </div> \
    //             <div class="flex justify-end items-center h-20"> \
    //                 <div class="relative w-full"> \
    //                     <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Education Description"></textarea> \
    //                     <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
    //                 </div> \
    //             </div> \
    //             <div class="flex justify-end items-center"> \
    //                 <div class="relative w-full"> \
    //                     <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Institution Name" /> \
    //                     <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
    //                 </div> \
    //             </div> \
    //         </div> \
    //         <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
    //             <div class="flex items-center"> \
    //                 <div class="relative w-full"> \
    //                     <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
    //                     <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
    //                 </div> \
    //             </div> \
    //             <div class="flex items-center"> \
    //                 <div class="relative w-full"> \
    //                     <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
    //                     <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
    //                 </div> \
    //             </div> \
    //             <div class="flex items-center"> \
    //                 <div class="relative w-full"> \
    //                     <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Degree" /> \
    //                     <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
    //                 </div> \
    //             </div> \
    //         </div>');
    // }
    // $(document).on("click", "#eduToggle", function() {
    //     let toggle = $('#eduToggle').prop('checked');
    //     if (toggle === true) {
    //         html = eduFields("education");
    //         html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
    //             <div class="flex justify-end items-center"> \
    //                 <button type="button" id="eduAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
    //             </div> \
    //         </div>';
    //         $("#putedu").html(html);
    //     } else {
    //         $("#putedu").html("");
    //     }
    // });
    // numb = 1;
    // $(document).on("click", "#eduAdd", function(){
    //     nameVar = "education"+numb;
    //     html = '<div class="forDeleteedu">';
    //     html += eduFields(nameVar);
    //     html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
    //             <div class="flex justify-end items-center"> \
    //                 <button type="button" id="delAddEdu" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
    //             </div> \
    //         </div> \
    //     </div>';

    //     $("#putedu").append(html);
    //     numb = numb+1;
    // });
    // $(document).on("click", "#delAddEdu", function(){
    //     $(this).closest(".forDeleteedu").remove();
    // });
    // // Education Code End
});