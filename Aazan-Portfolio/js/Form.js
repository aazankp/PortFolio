$(document).ready(function() {
    // Navbar Code
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
    // Navbar Code End

    // PortFolio Form Code
    function CheckTogle (check, target, html) {
        let toggle = $('#'+check).prop('checked');
        if (toggle === true) {
            $("#"+target).html(html);
        } else {
            $("#"+target).html("");
        }
    }

    var PortFolioData;
    var aEducation;
    var aServices;
    var aExperiences;
    var aSkills;
    var aProjects;

    function DataCheck ()
    {
        PortFolioData = $.ajax({
            url: '../vendor/Process.php',
            type: 'POST',
            data: { action: 'checkUserData' },
            success: function (result) {
                aData = JSON.parse(result);
                aEducation = JSON.parse(aData.education);
                aServices = JSON.parse(aData.services);
                aExperiences = JSON.parse(aData.experiences);
                aSkills = JSON.parse(aData.skills);
                aProjects = JSON.parse(aData.projects);

                if (aEducation.hasOwnProperty("education")) {
                    htmlEducation = ' \
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                                <div class="flex justify-end items-center"> \
                                    <div class="relative w-full"> \
                                        <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description">'+ aEducation.education.description +'</textarea> \
                                        <label for="educationDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                    </div> \
                                </div> \
                            </div>';
                    $.each(aEducation, function (index, element) {                     
                        htmlEducation += educationFields ("education", index, element);
                    });

                    htmlEducation += ' \
                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                                <div class="flex justify-end items-center"> \
                                    <button type="button" id="educationAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                                </div> \
                            </div>';

                } else {
                    htmlEducation = ' \
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description"></textarea> \
                                    <label for="educationDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';
                    htmlEducation += educationFields("education", "", "");
                    htmlEducation += ' \
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="educationAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                            </div> \
                        </div>';

                }
                CheckTogle ("education_Toggle", "puteducation", htmlEducation);

                if (aServices.hasOwnProperty("services")) {
                    htmlServices = '\
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description">'+aServices.services.description+'</textarea> \
                                    <label for="servicesDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';
                    $.each(aServices, function (index, element) {                     
                        htmlServices += servicesFields ("services", index, element);
                    });
                    htmlServices += '\
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                            </div> \
                        </div>';    
                } else {
                    htmlServices = '\
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description"></textarea> \
                                    <label for="servicesDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';
                    htmlServices += servicesFields ("services", "", "");
                    htmlServices += '\
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                            </div> \
                        </div>';
                }
                CheckTogle ("services_Toggle", "putservices", htmlServices);

                if (aExperiences.hasOwnProperty("experience")) {
                    htmlExperiences = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description">'+aExperiences.experience.description+'</textarea> \
                                <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aExperiences, function (index, element) {                     
                        htmlExperiences += experienceFields ("experience", index, element);
                    });
                    htmlExperiences += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="experienceAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlExperiences = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description"></textarea> \
                                <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlExperiences += experienceFields ("experience", index, element);
                    htmlExperiences += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="experienceAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("experience_Toggle", "putexperience", htmlExperiences);

                if (aSkills.hasOwnProperty("skills")) {
                    htmlSkills = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description">'+aSkills.skills.description+'</textarea> \
                                <label for="skillsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="skillsCompleteProjects" name="skills[completeProjects]" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Complete Projects" value="'+aSkills.skills.completeProjects+'" /> \
                                <label for="skillsCompleteProjects" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Complete Projects</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aSkills, function (index, element) {                     
                        htmlSkills += skillsFields("skills", index, element);
                    });
                    htmlSkills += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="skillsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlSkills = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description"></textarea> \
                                <label for="skillsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="skillsCompleteProjects" name="skills[completeProjects]" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Complete Projects" /> \
                                <label for="skillsCompleteProjects" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Complete Projects</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlSkills += skillsFields("skills", "", "");
                    htmlSkills += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="skillsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("skills_Toggle", "putskills", htmlSkills);

                if (aProjects.hasOwnProperty("projects")) {
                    htmlProject = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description">'+aProjects.projects.description+'</textarea> \
                                <label for="projectsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aProjects, function (index, element) {                     
                        htmlProject += projectsFields("projects", index, element);
                    });
                    htmlProject += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="projectsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                } else {
                    htmlProject = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5" placeholder="Description"></textarea> \
                                <label for="projectsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlProject += projectsFields("projects", "", "");
                    htmlProject += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="projectsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("projects_Toggle", "putprojects", htmlProject);

            }
        });
    }
    DataCheck ();

    // Education Code Start
    function educationFields (nameVar, index, element) {
        len = Object.keys(element).length
        var nameVar = (len > 0) ? index : nameVar;
        var eduDesc = (len > 0) ? element.educationDescription : "";
        var eduDegree = (len > 0) ? element.educationDegree : "";
        var eduInstitute = (len > 0) ? element.educationInstitute : "";
        var eduFrom = (len > 0) ? element.educationFrom : "";
        var eduTo = (len > 0) ? element.educationTo : "";
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                <div class="flex justify-end items-center h-20"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Education Description">'+eduDesc+'</textarea> \
                        <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
                    </div> \
                </div> \
                <div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Degree" value="'+ eduDegree +'" /> \
                        <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Institution Name" value="'+ eduInstitute +'" /> \
                        <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
                    </div> \
                </div> \
            </div> \
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                <div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="From" value="'+ eduFrom +'" /> \
                        <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                    </div> \
                </div> \
                <div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="To" value="'+ eduTo +'" /> \
                        <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                    </div> \
                </div> \
            </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#education_Toggle", function() {
            DataCheck ();
        });
        numbedu = 'education' in aEducation ? Object.keys(aEducation).length : 1;
        $(document).on("click", "#educationAdd", function(){
            nameVar = "education"+numbedu;
            html = '<div class="forDeleteeducation">';
            html += educationFields(nameVar, "", "");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                    <div class="flex justify-end items-center"> \
                        <button type="button" id="delAddeducation" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                    </div> \
                </div> \
            </div>';
    
            $("#puteducation").append(html);
            numbedu = numbedu+1;
        });
        $(document).on("click", "#delAddeducation", function(){
            $(this).closest(".forDeleteeducation").remove();
        });
    })
    // Education Code End

    //  Services Code Start
    function servicesFields (nameVar, index, element) {
        len = Object.keys(element).length
        var nameVar = (len > 0) ? index : nameVar;
        var srvIconName = (len > 0) ? element.iconName : "";
        var srvServiceName = (len > 0) ? element.serviceName : "";
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'iconName" name="'+ nameVar +'[iconName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Icon Name" value="'+srvIconName+'" /> \
                    <label for="'+ nameVar +'iconName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Icon Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'serviceName" name="'+ nameVar +'[serviceName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Service Name" value="'+srvServiceName+'" /> \
                    <label for="'+ nameVar +'serviceName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Service Name</label> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#services_Toggle", function() {
            DataCheck ();
        });
        numbservices = 1;
        $(document).on("click", "#servicesAdd", function(){
            nameVar = "services"+numbservices;
            html = '<div class="forDeleteservices">';
            html += servicesFields(nameVar, "", "");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                    <div class="flex justify-end items-center"> \
                        <button type="button" id="delAddservices" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                    </div> \
                </div> \
            </div>';
    
            $("#putservices").append(html);
            numbservices = numbservices+1;
        });
        $(document).on("click", "#delAddservices", function(){
            $(this).closest(".forDeleteservices").remove();
        });
    })
    // Services Code End

    //  Experience Code Start
    function experienceFields (nameVar, index, element) {
        len = Object.keys(element).length
        var nameVar = (len > 0) ? index : nameVar;
        var expPosition = (len > 0) ? element.position : "";
        var expCompanyName = (len > 0) ? element.companyName : "";
        var expJobDescription = (len > 0) ? element.jobDescription : "";
        var expJobFrom = (len > 0) ? element.jobFrom : "";
        var expJobTo = (len > 0) ? element.jobTo : "";
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'position" name="'+ nameVar +'[position]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Position" value="'+expPosition+'" /> \
                    <label for="'+ nameVar +'position" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Position</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'companyName" name="'+ nameVar +'[companyName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Company Name" value="'+expCompanyName+'" /> \
                    <label for="'+ nameVar +'companyName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Company Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center h-20"> \
                <div class="relative w-full"> \
                    <textarea autocomplete="off" id="'+ nameVar +'jobDescription" name="'+ nameVar +'[jobDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Job Description">'+expJobDescription+'</textarea> \
                    <label for="'+ nameVar +'jobDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Job Description</label> \
                </div> \
            </div> \
        </div> \
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar+'jobFrom" name="'+ nameVar +'[jobFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="From" value="'+expJobFrom+'" /> \
                    <label for="'+ nameVar+'jobFrom" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                </div> \
            </div> \
            <div class="flex items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar+'jobTo" name="'+ nameVar +'[jobTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="To" value="'+expJobTo+'" /> \
                    <label for="'+ nameVar+'jobTo" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#experience_Toggle", function() {
            DataCheck ();
        });
        numbexp = 1;
        $(document).on("click", "#experienceAdd", function(){
            nameVar = "experience"+numbexp;
            html = '<div class="forDeleteexperience">';
            html += experienceFields(nameVar, "", "");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                    <div class="flex justify-end items-center"> \
                        <button type="button" id="delAddexperience" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                    </div> \
                </div> \
            </div>';
    
            $("#putexperience").append(html);
            numbexp = numbexp+1;
        });
        $(document).on("click", "#delAddexperience", function(){
            $(this).closest(".forDeleteexperience").remove();
        });
    })
    // Experience Code Ends

    // Skills Code Start
    function skillsFields (nameVar, index, element) {
        len = Object.keys(element).length
        var nameVar = (len > 0) ? index : nameVar;
        var sklSkillName = (len > 0) ? element.skillName : "";
        var sklSkillPercentage = (len > 0) ? element.skillPercentage : "";
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'skillName" name="'+ nameVar +'[skillName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Skill Name" value="'+sklSkillName+'" /> \
                    <label for="'+ nameVar +'skillName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'skillPercentage" name="'+ nameVar +'[skillPercentage]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Skill Percentage" value="'+sklSkillPercentage+'" /> \
                    <label for="'+ nameVar +'skillPercentage" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Percentage</label> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#skills_Toggle", function() {
            DataCheck ();
        });
        numbskills = 1;
        $(document).on("click", "#skillsAdd", function(){
            nameVar = "skills"+numbskills;
            html = '<div class="forDeleteskills">';
            html += skillsFields(nameVar, "", "");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                    <div class="flex justify-end items-center"> \
                        <button type="button" id="delAddskills" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                    </div> \
                </div> \
            </div>';
    
            $("#putskills").append(html);
            numbskills = numbskills+1;
        });
        $(document).on("click", "#delAddskills", function(){
            $(this).closest(".forDeleteskills").remove();
        });
    })
    // Skills Code Ends

    // Projects Code Start
    function projectsFields (nameVar, index, element) {
        len = Object.keys(element).length
        var nameVar = (len > 0) ? index : nameVar;
        var prjProjectsName = (len > 0) ? element.projectsName : "";
        var prjProjectsType = (len > 0) ? element.projectsType : "";
        var prjPrev_Image = (len > 0) ? element.prev_Image : "";
        return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsName" name="'+ nameVar +'[projectsName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Projects Name" value="'+prjProjectsName+'" /> \
                    <label for="'+ nameVar +'projectsName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Projects Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsType" name="'+ nameVar +'[projectsType]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm" placeholder="Projects Type" value="'+prjProjectsType+'" /> \
                    <label for="'+ nameVar +'projectsType" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Project Type</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'projectsImage" name="'+ nameVar +'" type="file" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100" /> \
                    <input name="'+ nameVar +'[prev_Image]" type="hidden" value="'+prjPrev_Image+'" /> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#projects_Toggle", function() {
            DataCheck ();
        });
        numbproj = 1;
        $(document).on("click", "#projectsAdd", function(){
            nameVar = "projects"+numbproj;
            html = '<div class="forDeleteprojects">';
            html += projectsFields(nameVar, "", "");
            html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                    <div class="flex justify-end items-center"> \
                        <button type="button" id="delAddprojects" class="text-2xl"><i class="fa-solid fa-trash"></i></button> \
                    </div> \
                </div> \
            </div>';
    
            $("#putprojects").append(html);
            numbproj = numbproj+1;
        });
        $(document).on("click", "#delAddprojects", function(){
            $(this).closest(".forDeleteprojects").remove();
        });
    })
    // Projects Code Ends

    // PortFolio Form Submittion
    $(document).on("submit", "#portFolio_Form_Submit", function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: "../vendor/Process.php?action=portFolio_Submit",
            type: "POST",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                console.log(result);
                if(result == 1){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Your Data has been Submitted!',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                else if (result == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Please Fill All Fields Carefully!'
                    })
                }
                else if (result == "projectImg") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please Upload Project Image!'
                    })
                }
            }
        });
    });
    // PortFolio Form Code End

    // Login Code Start
    // Show Hide Password
    $(document).on("click", "#showPass", function(){
        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
        }
    });
    // Login Code End
});