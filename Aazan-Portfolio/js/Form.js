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
                <div class="flex justify-end items-center"> \
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

    //  Experience Code Start
    function experienceFields (nameVar) {
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'position" name="'+ nameVar +'[position]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Position" /> \
                    <label for="'+ nameVar +'position" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Position</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'companyName" name="'+ nameVar +'[companyName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Company Name" /> \
                    <label for="'+ nameVar +'companyName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Company Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center h-20"> \
                <div class="relative w-full"> \
                    <textarea autocomplete="off" id="'+ nameVar +'jobDescription" name="'+ nameVar +'[jobDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Job Description"></textarea> \
                    <label for="'+ nameVar +'jobDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Job Description</label> \
                </div> \
            </div> \
        </div> \
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar+'jobFrom" name="'+ nameVar +'[jobFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="From" /> \
                    <label for="'+ nameVar+'jobFrom" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                </div> \
            </div> \
            <div class="flex items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar+'jobTo" name="'+ nameVar +'[jobTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="To" /> \
                    <label for="'+ nameVar+'jobTo" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                </div> \
            </div> \
        </div>');
    }
    $(document).on("click", "#experience_Toggle", function() {
        let toggle = $('#experience_Toggle').prop('checked');
        if (toggle === true) {
            html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                        <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                    </div> \
                </div> \
            </div>';
            html += experienceFields("experience");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="experienceAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                </div> \
            </div>';
            $("#putexperience").html(html);
        } else {
            $("#putexperience").html("");
        }
    });
    numb = 1;
    $(document).on("click", "#experienceAdd", function(){
        nameVar = "experience"+numb;
        html = '<div class="forDeleteexperience">';
        html += experienceFields(nameVar);
        html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="delAddexperience" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                </div> \
            </div> \
        </div>';

        $("#putexperience").append(html);
        numb = numb+1;
    });
    $(document).on("click", "#delAddexperience", function(){
        $(this).closest(".forDeleteexperience").remove();
    });
    // Experience Code Ends

    // Skills Code Start
    function skillsFields (nameVar) {
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'skillName" name="'+ nameVar +'[skillName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Skill Name" /> \
                    <label for="'+ nameVar +'skillName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'skillPercentage" name="'+ nameVar +'[skillPercentage]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Skill Percentage" /> \
                    <label for="'+ nameVar +'skillPercentage" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Percentage</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'completeProjects" name="'+ nameVar +'[completeProjects]" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Complete Projects" /> \
                    <label for="'+ nameVar +'completeProjects" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Complete Projects</label> \
                </div> \
            </div> \
        </div>');
    }
    $(document).on("click", "#skills_Toggle", function() {
        let toggle = $('#skills_Toggle').prop('checked');
        if (toggle === true) {
            html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                        <label for="skillsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                    </div> \
                </div> \
            </div>';
            html += skillsFields("skills");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="skillsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                </div> \
            </div>';
            $("#putskills").html(html);
        } else {
            $("#putskills").html("");
        }
    });
    numb = 1;
    $(document).on("click", "#skillsAdd", function(){
        nameVar = "skills"+numb;
        html = '<div class="forDeleteskills">';
        html += skillsFields(nameVar);
        html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="delAddskills" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                </div> \
            </div> \
        </div>';

        $("#putskills").append(html);
        numb = numb+1;
    });
    $(document).on("click", "#delAddskills", function(){
        $(this).closest(".forDeleteskills").remove();
    });
    // Skills Code Ends

    // Projects Code Start
    function projectsFields (nameVar) {
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsName" name="'+ nameVar +'[projectsName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Projects Name" /> \
                    <label for="'+ nameVar +'projectsName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Projects Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsType" name="'+ nameVar +'[projectsType]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Projects Type" /> \
                    <label for="'+ nameVar +'projectsType" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Project Type</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsImage" name="'+ nameVar +'[projectsImage]" type="file" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" /> \
                </div> \
            </div> \
        </div>');
    }
    $(document).on("click", "#projects_Toggle", function() {
        let toggle = $('#projects_Toggle').prop('checked');
        if (toggle === true) {
            html = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" placeholder="Description"></textarea> \
                        <label for="projectsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                    </div> \
                </div> \
            </div>';
            html += projectsFields("projects");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="projectsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus abc"></i></button> \
                </div> \
            </div>';
            $("#putprojects").html(html);
        } else {
            $("#putprojects").html("");
        }
    });
    numb = 1;
    $(document).on("click", "#projectsAdd", function(){
        nameVar = "projects"+numb;
        html = '<div class="forDeleteprojects">';
        html += projectsFields(nameVar);
        html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                <div class="flex justify-end items-center"> \
                    <button type="button" id="delAddprojects" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                </div> \
            </div> \
        </div>';

        $("#putprojects").append(html);
        numb = numb+1;
    });
    $(document).on("click", "#delAddprojects", function(){
        $(this).closest(".forDeleteprojects").remove();
    });
    // Projects Code Ends

    // PortFolio Form Submittion
    $(document).on("submit", "#portFolio_Form_Submit", function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
         url: "vendor/Process.php?action=portFolio_Submit",
         type: "POST",
         data: formdata,
         cache: false,
         processData: false,
         contentType: false,
         success: function(result){
             console.log(result);
         }});
     });
});