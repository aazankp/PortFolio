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

    // Education Code Start
    function educationFields (nameVar) {
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
    $(document).on("click", "#education_Toggle", function() {
        let toggle = $('#education_Toggle').prop('checked');
        if (toggle === true) {
            html = educationFields("education");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="educationAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                </div> \
            </div>';
            $("#puteducation").html(html);
        } else {
            $("#puteducation").html("");
        }
    });
    numb = 1;
    $(document).on("click", "#educationAdd", function(){
        nameVar = "education"+numb;
        html = '<div class="forDeleteeducation">';
        html += educationFields(nameVar);
        html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="delAddeducation" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                </div> \
            </div> \
        </div>';

        $("#puteducation").append(html);
        numb = numb+1;
    });
    $(document).on("click", "#delAddeducation", function(){
        $(this).closest(".forDeleteeducation").remove();
    });
    // Education Code End

    //  Services Code Start
    function servicesFields (nameVar) {
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'iconName" name="'+ nameVar +'[iconName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Icon Name" /> \
                    <label for="'+ nameVar +'iconName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Icon Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'serviceName" name="'+ nameVar +'[serviceName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Service Name" /> \
                    <label for="'+ nameVar +'serviceName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Service Name</label> \
                </div> \
            </div> \
        </div>');
    }
    $(document).on("click", "#services_Toggle", function() {
        let toggle = $('#services_Toggle').prop('checked');
        if (toggle === true) {
            html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                <div class="flex justify-end items-center h-20"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                        <label for="servicesDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                    </div> \
                </div> \
            </div>';
            html += servicesFields("services");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                </div> \
            </div>';
            $("#putservices").html(html);
        } else {
            $("#putservices").html("");
        }
    });
    numb = 1;
    $(document).on("click", "#servicesAdd", function(){
        nameVar = "services"+numb;
        html = '<div class="forDeleteservices">';
        html += servicesFields(nameVar);
        html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="delAddservices" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                </div> \
            </div> \
        </div>';

        $("#putservices").append(html);
        numb = numb+1;
    });
    $(document).on("click", "#delAddservices", function(){
        $(this).closest(".forDeleteservices").remove();
    });
    // Services Code End
});