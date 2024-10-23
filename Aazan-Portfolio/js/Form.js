// import preline from '@preline';
// preline
$(document).ready(function()
{
    $(document).on('contextmenu', function(e) {
        e.preventDefault();
    });

    $(document).on('keydown', function(e) {
        if (e.key === 'F12' || (e.ctrlKey && e.shiftKey && e.key === 'I')) {
            e.preventDefault();
        }
    });

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

    function disbaleToDate(check, disabled, value)
    {
        let toggle = $('#'+check).prop('checked');
        if (toggle === true) {
            $('#'+disabled).prop('disabled', true);
            $('#'+disabled).addClass('border-b-2 border-gray-400');
            $('#'+disabled).removeClass('validate');
            $('#'+check).val(value);
        } else {
            $('#'+disabled).prop('disabled', false);
            $('#'+disabled).removeClass('border-b-2 border-gray-400');
            $('#'+disabled).addClass('border-b-2 border-teal-400');
            $('#'+disabled).addClass('validate');
            $('#'+check).val('');
        }
    }

    function makeRandomNumb(Arr, ArrCount)
    {
        while (true) {
            randNumb = Math.floor(Math.random() * (100 - 1 + 1)) + 1;
            randNumb = randNumb < 10 ? '0' + randNumb : randNumb.toString();
            if (!Arr.includes(randNumb)) Arr.push(randNumb);
            if (Arr.length >= Object.keys(ArrCount).length) break;
        }
    }

    var PortFolioData;
    var aEducation;
    var aServices;
    var aExperiences;
    var aSkills;
    var aProjects;
    var eduCount = new Array();
    var srvCount = new Array();
    var expCount = new Array();
    var sklCount = new Array();
    var prjCount = new Array();

    function DataCheck ()
    {
        PortFolioData = $.ajax({
            url: '../vendor/Process.php',
            type: 'POST',
            data: { action: 'checkUserData' },
            success: function (result) {
                aData = JSON.parse(result);
                aEducation = (aData !== null && aData.education != "") ? JSON.parse(aData.education) : "";
                aServices = (aData !== null && aData.services != "") ? JSON.parse(aData.services) : "";
                aExperiences = (aData !== null && aData.experiences != "") ? JSON.parse(aData.experiences) : "";
                aSkills = (aData !== null && aData.skills != "") ? JSON.parse(aData.skills) : "";
                aProjects = (aData !== null && aData.projects != "") ? JSON.parse(aData.projects) : "";

                if (aEducation.hasOwnProperty("education")) {
                    htmlEducation = ' \
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                                <div class="flex justify-end items-center"> \
                                    <div class="relative w-full"> \
                                        <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description">'+ aEducation.education.description +'</textarea> \
                                        <label for="educationDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                    </div> \
                                </div> \
                            </div>';
                    $.each(aEducation, function (index, element) {                     
                        htmlEducation += educationFields ("education", index, element);
                        var pattern = /\d+/g;
                        valedu = index.match(pattern);
                        if (valedu !== null) {
                            for (let i = 0; i < valedu.length; i++) {
                                eduCount.push(valedu[i]);
                            }
                        }
                    });

                    htmlEducation += ' \
                            <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                                <div class="flex justify-end items-center"> \
                                    <button type="button" id="educationAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                                </div> \
                            </div>';

                } else {
                    htmlEducation = ' \
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"></textarea> \
                                    <label for="educationDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';
                    htmlEducation += educationFields("education", "", "");
                    htmlEducation += ' \
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="educationAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                            </div> \
                        </div>';

                }
                CheckTogle ("education_Toggle", "puteducation", htmlEducation);

                if (aServices.hasOwnProperty("services")) {
                    htmlServices = '\
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description">'+aServices.services.description+'</textarea> \
                                    <label for="servicesDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';
                    $.each(aServices, function (index, element) {                     
                        htmlServices += servicesFields ("services", index, element);
                        var pattern = /\d+/g;
                        valsrv = index.match(pattern);
                        if (valsrv !== null) {
                            for (let i = 0; i < valsrv.length; i++) {
                                srvCount.push(valsrv[i]);
                            }
                        }
                    });
                    htmlServices += '\
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="servicesAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                            </div> \
                        </div>';    
                } else {
                    htmlServices = '\
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"></textarea> \
                                    <label for="servicesDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                                </div> \
                            </div> \
                        </div>';

                    htmlServices += servicesFields ("services", "", "");
                    htmlServices += '\
                        <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                            <div class="flex justify-end items-center"> \
                                <button type="button" id="servicesAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                            </div> \
                        </div>';
                }

                //modal
                htmlServices += '\
                    <div id="modelConfirm" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 "> \
                        <div class="relative top-40 shadow-xl rounded-md bg-white w-full"> \
                            <div class="flex justify-end p-2"> \
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center closeModall"> \
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"> \
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path> \
                                    </svg> \
                                </button> \
                            </div> \
                            <div class="p-6 pt-0 text-center"> \
                                <h3 class="mb-10 font-bold">Select Icon for Your Service</h3><div class="flex flex-wrap">';
                                    
                                $.each(iconss, function(index, iconClass){
                                    numbservices = srvCount.length > 0 ? srvCount[srvCount.length-1] : "";
                                    htmlServices += ' \
                                        <button type="button" class="text-black focus:shadow-lg focus-=:bg-dark focus:ring-blue-300 font-medium rounded-lg text-5xl p-[1rem] w-[5rem] flex justify-center items-center bg-gray-100 me-2 mb-[.5rem] IconNameServices'+ numbservices +'" value="'+ iconClass +'"><i class="fas fa-'+ iconClass +'"></i></button>';
                                });

                                htmlServices += '\
                                </div> \
                                <button type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-base inline-flex items-center px-3 py-2.5 text-center mr-2 closeModall" value="save"> Save </button> \
                                <button type="button" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-cyan-200 border border-gray-200 font-medium inline-flex items-center rounded-lg text-base px-3 py-2.5 text-center closeModall" data-modal-toggle="delete-user-modal"> Close </button> \
                            </div> \
                        </div> \
                    </div>';
                CheckTogle ("services_Toggle", "putservices", htmlServices);

                if (aExperiences.hasOwnProperty("experience")) {
                    htmlExperiences = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description">'+aExperiences.experience.description+'</textarea> \
                                <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aExperiences, function (index, element) {                     
                        htmlExperiences += experienceFields ("experience", index, element);
                        var pattern = /\d+/g;
                        valexp = index.match(pattern);
                        if (valexp !== null) {
                            for (let i = 0; i < valexp.length; i++) {
                                expCount.push(valexp[i]);
                            }
                        }
                    });
                    htmlExperiences += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="experienceAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlExperiences = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"></textarea> \
                                <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlExperiences += experienceFields ("experience", "", "");
                    htmlExperiences += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="experienceAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("experience_Toggle", "putexperience", htmlExperiences);

                if (aSkills.hasOwnProperty("skills")) {
                    htmlSkills = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description">'+aSkills.skills.description+'</textarea> \
                                <label for="skillsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="skillsCompleteProjects" name="skills[completeProjects]" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Complete Projects" value="'+aSkills.skills.completeProjects+'" /> \
                                <label for="skillsCompleteProjects" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Complete Projects</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aSkills, function (index, element) {                     
                        htmlSkills += skillsFields("skills", index, element);
                        var pattern = /\d+/g;
                        valskl = index.match(pattern);
                        if (valskl !== null) {
                            for (let i = 0; i < valskl.length; i++) {
                                sklCount.push(valskl[i]);
                            }
                        }
                    });
                    htmlSkills += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="skillsAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlSkills = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"></textarea> \
                                <label for="skillsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <input autocomplete="off" id="skillsCompleteProjects" name="skills[completeProjects]" type="number" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Complete Projects" /> \
                                <label for="skillsCompleteProjects" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Complete Projects</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlSkills += skillsFields("skills", "", "");
                    htmlSkills += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="skillsAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("skills_Toggle", "putskills", htmlSkills);

                if (aProjects.hasOwnProperty("projects")) {
                    htmlProject = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description">'+aProjects.projects.description+'</textarea> \
                                <label for="projectsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    $.each(aProjects, function (index, element) {                     
                        htmlProject += projectsFields("projects", index, element);
                        var pattern = /\d+/g;
                        valprj = index.match(pattern);
                        if (valprj !== null) {
                            for (let i = 0; i < valprj.length; i++) {
                                prjCount.push(valprj[i]);
                            }
                        }
                    });
                    htmlProject += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="projectsAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                } else {
                    htmlProject = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate pt-1" placeholder="Description"></textarea> \
                                <label for="projectsDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlProject += projectsFields("projects", "", "");
                    htmlProject += '\
                    <div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="projectsAdd" class="text-2xl"><i class="fas fa-plus-circle" style="color: #238722;"></i></button> \
                        </div> \
                    </div>';
                }
                CheckTogle ("projects_Toggle", "putprojects", htmlProject);

            }
        });
    }

    var pathname = window.location.pathname;
    pathArr = pathname.split('/');
    fileName = pathArr[pathArr.length-1];

    if (fileName == "portfolio.php") {
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
            var checked = element.hasOwnProperty("Continue") ? 'checked' : '';


            var eduWork = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                    <div class="flex justify-end items-center h-20"> \
                        <div class="relative w-full"> \
                            <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate pt-1" placeholder="Education Description">'+eduDesc+'</textarea> \
                            <label for="'+ nameVar +'Description" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Education Description</label> \
                        </div> \
                    </div> \
                    <div class="flex items-center"> \
                        <div class="relative w-full"> \
                            <input autocomplete="off" id="'+ nameVar +'degree" name="'+ nameVar +'[educationDegree]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Degree" value="'+ eduDegree +'" /> \
                            <label for="'+ nameVar +'degree" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Degree</label> \
                        </div> \
                    </div> \
                    <div class="flex justify-end items-center"> \
                        <div class="relative w-full"> \
                            <input autocomplete="off" id="'+ nameVar +'institute" name="'+ nameVar +'[educationInstitute]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Institution Name" value="'+ eduInstitute +'" /> \
                            <label for="'+ nameVar +'institute" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Institution Name</label> \
                        </div> \
                    </div> \
                </div> \
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                    <div class="flex items-center"> \
                        <div class="relative w-full"> \
                            <input autocomplete="off" id="'+ nameVar+'from" name="'+ nameVar +'[educationFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="From" value="'+ eduFrom +'" /> \
                            <label for="'+ nameVar+'from" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                        </div> \
                    </div> \
                    <div class="flex items-center"> \
                        <div class="relative w-full"> \
                            <input autocomplete="off" id="'+ nameVar+'to" name="'+ nameVar +'[educationTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="To" value="'+ eduTo +'" /> \
                            <label for="'+ nameVar+'to" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                        </div> \
                    </div>';

                if (nameVar+'Continue' == 'educationContinue')
                    eduWork += '<div class="flex items-center"> \
                        <div class="relative w-full"> \
                            <div class="inline-flex items-center float-left"> \
                                <label class="relative flex p-3 rounded-full cursor-pointer"> \
                                    <input type="checkbox" name="education[Continue]" id="educationContinue" class="before:content[""] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-green-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-green-500 before:opacity-0 before:transition-opacity checked:border-green-900 checked:bg-green-700 checked:before:bg-green-900 hover:before:opacity-10" '+ checked +' /> \
                                    <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100"> \
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1"> \
                                            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path> \
                                        </svg> \
                                    </span> \
                                </label> \
                                <label class="mt-px font-light text-gray-700 cursor-pointer select-none" for="educationContinue"> \
                                    <p class="flex font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900"> Continue </p> \
                                </label> \
                            </div> \
                        </div> \
                    </div>';
                eduWork += '</div>';
                return(eduWork);
        }

        PortFolioData.then(function ()
        {
            disbaleToDate('educationContinue', 'educationto', 'Continue');

            $(document).on("click", "#educationContinue", function() {
                disbaleToDate('educationContinue', 'educationto', 'Continue');
            });

            $(document).on("click", "#education_Toggle", function() {
                DataCheck ();
            });
            $(document).on("click", "#educationAdd", function(){
                makeRandomNumb(eduCount, aEducation);
                numbedu = aEducation.hasOwnProperty("education") ? eduCount[eduCount.length-1] : "1";
                nameVar = "education"+numbedu;
                html = '<div class="forDeleteeducation">';
                html += educationFields(nameVar, "", "");
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAddeducation" class="text-2xl"><i class="fas fa-trash" style="color: #ca1c1c;"></i></button> \
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
                        <input autocomplete="off" id="'+ nameVar +'serviceName" name="'+ nameVar +'[serviceName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Service Name" value="'+srvServiceName+'" /> \
                        <label for="'+ nameVar +'serviceName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm validate">Service Name</label> \
                    </div> \
                    <div class="text-black focus:shadow-lg focus-=:bg-dark focus:ring-blue-300 font-medium rounded-lg text-5xl p-[1rem] w-[5rem] flex justify-center items-center bg-gray-100 ms-2"><i id="iconClass'+ nameVar +'"></i><i id="removeIconiconNameVal'+ nameVar +'" class="fas fa-'+ srvIconName +'" data-iconName="'+ srvIconName +'"></i></div> \
                </div> \
                <button type="button" class="relative left-0 bg-rose-500 text-white max-w-full rounded-md px-2 mt-2 hover:bg-rose-700 transition" id="openModal" style="width: max-content; background-color: #374151; height: 45px; padding: 10px 30px 10px 30px;"> Select Icon </button> \
                <input type="hidden" class="validate iconNameVal'+nameVar+'" name="'+nameVar+'[iconName]" id="iconNameVal'+nameVar+'" value="'+ srvIconName +'" > \
            </div>');
        }

        PortFolioData.then(function () {
            $(document).on("click", "#services_Toggle", function() {
                DataCheck ();
            });
            
            $(document).on("click", "#servicesAdd", function(){
                makeRandomNumb(srvCount, aServices);
                numbservices = aServices.hasOwnProperty("services") ? srvCount[srvCount.length-1] : "1";
                nameVar = "services"+numbservices;
                html = '<div class="forDeleteservices">';
                html += servicesFields(nameVar, "", "");
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAddservices" class="text-2xl"><i class="fas fa-trash" style="color: #ca1c1c;"></i></button> \
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

            var checked = element.hasOwnProperty("CurrentlyWorking") ? 'checked' : '';

            var expWork = '<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'position" name="'+ nameVar +'[position]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Position" value="'+expPosition+'" /> \
                        <label for="'+ nameVar +'position" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Position</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'companyName" name="'+ nameVar +'[companyName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Company Name" value="'+expCompanyName+'" /> \
                        <label for="'+ nameVar +'companyName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm validate">Company Name</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center h-20"> \
                    <div class="relative w-full"> \
                        <textarea autocomplete="off" id="'+ nameVar +'jobDescription" name="'+ nameVar +'[jobDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate pt-1" placeholder="Job Description">'+expJobDescription+'</textarea> \
                        <label for="'+ nameVar +'jobDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm validate">Job Description</label> \
                    </div> \
                </div> \
            </div> \
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                <div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar+'jobFrom" name="'+ nameVar +'[jobFrom]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="From" value="'+expJobFrom+'" /> \
                        <label for="'+ nameVar+'jobFrom" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">From</label> \
                    </div> \
                </div> \
                <div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar+'jobTo" name="'+ nameVar +'[jobTo]" type="date" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="To" value="'+expJobTo+'" /> \
                        <label for="'+ nameVar+'jobTo" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">To</label> \
                    </div> \
                </div>';
                if (nameVar+'CurrentlyWorking' == 'experienceCurrentlyWorking')
                expWork += '<div class="flex items-center"> \
                    <div class="relative w-full"> \
                        <div class="inline-flex items-center float-left"> \
                            <label class="relative flex p-3 rounded-full cursor-pointer"> \
                                <input type="checkbox" name="experience[CurrentlyWorking]" id="experienceCurrentlyWorking" class="before:content[""] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-green-200 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-green-500 before:opacity-0 before:transition-opacity checked:border-green-900 checked:bg-green-700 checked:before:bg-green-900 hover:before:opacity-10" '+ checked +' /> \
                                <span class="absolute text-white transition-opacity opacity-0 pointer-events-none top-2/4 left-2/4 -translate-y-2/4 -translate-x-2/4 peer-checked:opacity-100"> \
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5" viewBox="0 0 20 20" fill="currentColor" stroke="currentColor" stroke-width="1"> \
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path> \
                                    </svg> \
                                </span> \
                            </label> \
                            <label class="mt-px font-light text-gray-700 cursor-pointer select-none" for="experienceCurrentlyWorking"> \
                                <p class="flex font-sans text-base antialiased font-medium leading-relaxed text-blue-gray-900"> Currently Working </p> \
                            </label> \
                        </div> \
                    </div> \
                </div>';

            expWork += '</div>';
            return(expWork);
        }

        PortFolioData.then(function ()
        {
            disbaleToDate('experienceCurrentlyWorking', 'experiencejobTo', 'Currently Working');

            $(document).on("click", "#experienceCurrentlyWorking", function() {
                disbaleToDate('experienceCurrentlyWorking', 'experiencejobTo', 'Currently Working');
            });

            $(document).on("click", "#experience_Toggle", function() {
                DataCheck ();
            });
            
            $(document).on("click", "#experienceAdd", function(){
                makeRandomNumb(expCount, aExperiences);
                numbexp = aExperiences.hasOwnProperty("experience") ? expCount[expCount.length-1] : "1";
                nameVar = "experience"+numbexp;
                html = '<div class="forDeleteexperience">';
                html += experienceFields(nameVar, "", "");
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAddexperience" class="text-2xl"><i class="fas fa-trash" style="color: #ca1c1c;"></i></button> \
                        </div> \
                    </div> \
                </div>';
        
                $("#putexperience").append(html);
                // numbexp = numbexp+1;
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
                        <input autocomplete="off" id="'+ nameVar +'skillName" name="'+ nameVar +'[skillName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Skill Name" value="'+sklSkillName+'" /> \
                        <label for="'+ nameVar +'skillName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Name</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'skillPercentage" name="'+ nameVar +'[skillPercentage]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Skill Percentage" value="'+sklSkillPercentage+'" /> \
                        <label for="'+ nameVar +'skillPercentage" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Skill Percentage</label> \
                    </div> \
                </div> \
            </div>');
        }

        PortFolioData.then(function () {
            $(document).on("click", "#skills_Toggle", function() {
                DataCheck ();
            });
            
            $(document).on("click", "#skillsAdd", function(){
                makeRandomNumb(sklCount, aSkills);
                numbskills = aSkills.hasOwnProperty("skills") ? sklCount[sklCount.length-1] : "1";
                nameVar = "skills"+numbskills;
                html = '<div class="forDeleteskills">';
                html += skillsFields(nameVar, "", "");
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAddskills" class="text-2xl"><i class="fas fa-trash" style="color: #ca1c1c;"></i></button> \
                        </div> \
                    </div> \
                </div>';
        
                $("#putskills").append(html);
                // numbskills = numbskills+1;
            });
            $(document).on("click", "#delAddskills", function(){
                $(this).closest(".forDeleteskills").remove();
            });
        })
        // Skills Code Ends

        // Projects Code Start
        function projectsFields (nameVar, index, element) {
            len = Object.keys(element).length
            console.log(element)
            var nameVar = (len > 0) ? index : nameVar;
            var prjProjectsName = (len > 0) ? element.projectsName : "";
            var prjProjectsType = (len > 0) ? element.projectsType : "";
            var prjPrev_Image = (len > 0) ? element.imageName : "";
            return('<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 p-4"> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'projectsName" name="'+ nameVar +'[projectsName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Projects Name" value="'+prjProjectsName+'" /> \
                        <label for="'+ nameVar +'projectsName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Projects Name</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'projectsType" name="'+ nameVar +'[projectsType]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Projects Type" value="'+prjProjectsType+'" /> \
                        <label for="'+ nameVar +'projectsType" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Project Type</label> \
                    </div> \
                </div> \
                <div class="flex justify-end items-center"> \
                    <div class="relative w-full"> \
                        <input autocomplete="off" id="'+ nameVar +'projectsImage" name="'+ nameVar +'" type="file" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 validate" /> \
                        <input name="'+ nameVar +'[imageName]" type="hidden" value="'+prjPrev_Image+'" /> \
                    </div> \
                </div> \
            </div>');
        }

        PortFolioData.then(function () {
            $(document).on("click", "#projects_Toggle", function() {
                DataCheck ();
            });
            
            $(document).on("click", "#projectsAdd", function(){
                makeRandomNumb(prjCount, aProjects);
                numbproj = aProjects.hasOwnProperty("projects") ? prjCount[prjCount.length-1] : "1";
                nameVar = "projects"+numbproj;
                html = '<div class="forDeleteprojects">';
                html += projectsFields(nameVar, "", "");
                html += '<div class="grid grid-cols-1 md:grid-cols-1 lg:grid-cols-1 gap-4 p-4 h-8"> \
                        <div class="flex justify-end items-center"> \
                            <button type="button" id="delAddprojects" class="text-2xl"><i class="fas fa-trash" style="color: #ca1c1c;"></i></button> \
                        </div> \
                    </div> \
                </div>';
        
                $("#putprojects").append(html);
                // numbproj = numbproj+1;
            });
            $(document).on("click", "#delAddprojects", function(){
                $(this).closest(".forDeleteprojects").remove();
            });
        })
        // Projects Code Ends        
    }

    // PortFolio Form Submittion
    $(document).on("submit", "#portFolio_Form_Submit", function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
      
        var inputFields = $("#portFolio_Form_Submit input.validate");
        var textareaFields = $("#portFolio_Form_Submit textarea.validate");
        var IconInputFields = $("#portFolio_Form_Submit input.validate:hidden");

        isEmpty = false;

        if (inputFields.length > 0) {
            isEmpty = false;
            inputFields.each(function() {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false;
                }
            });
        }
        
        if (isEmpty == false)
        if (textareaFields.length > 0) {
            isEmpty = false;
            textareaFields.each(function() {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false;
                }
            });
        }

        if (isEmpty == false)
        if (IconInputFields.length > 0) {
            isEmpty = false;
            IconInputFields.each(function() {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false;
                }
            });
        }

        
        if (isEmpty === false)
        {
            $('#submitButton').prop('disabled', true);
            $('#submitButton').addClass('bg-gray-400');

            $.ajax({
                url: "../vendor/Process.php?action=portFolio_Submit",
                type: "POST",
                data: formdata,
                cache: false,
                processData: false,
                contentType: false,
                success: function(result){
                    inputValue = $("#portfolioUrl").val();
                    if(result == 1){
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'Your Data has been Submitted!',
                            input: "text",
                            inputLabel: "Please save this URL to visit your PortFolio",
                            inputValue,
                            showConfirmButton: true,
                            didOpen: function() {
                                document.querySelector('.swal2-input').select();
                            }
                        })
                    }
                    else if (result == 0) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Warning...',
                            text: 'Insertion Fail!'
                        })
                    }
                    else if (result == "projectImg") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Upload Project Image!'
                        })
                    }
                    else if (result == "invalid Service Img") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Upload Valid Format of Image JPG, JPEG, PNG!'
                        })
                    }
                    $('#submitButton').prop('disabled', false);
                    $('#submitButton').removeClass('bg-gray-400');
                }
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Warning...',
                text: 'Please Fill All Fields Carefully!'
            });
        }
    });
    // PortFolio Form Code End

    // Login Code Start
    // Show Hide Password
    $(document).on("click", "#showLoginPass", function(){
        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
            $("#showLoginPass").removeClass();
            $("#showLoginPass").addClass("fas fa-eye absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        } else {
            $("#password").attr("type", "password");
            $("#showLoginPass").removeClass();
            $("#showLoginPass").addClass("fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        }
    });
    // Login Code End

    service_icon_Id = '';
    service_TagId = '';

    // icon modal
    $(document).on("click", "#openModal", function(){
        $("#modelConfirm").css("display", "block");
        $("body").addClass("overflow-y-hidden");

        service_icon_Id = $(this).next('input[type="hidden"]').attr("id");
        service_TagId = $(this).prev("div").find("i").attr("id");
    });


    $(document).on("click", ".closeModall", function(){
        $("#modelConfirm").css("display", "none");
        $("body").removeClass("overflow-y-hidden");
        check = $(this).val();
        
        if (check !== "save") {
            $("#"+service_icon_Id).removeAttr("value");
            PrevIcon = $("#removeIcon"+service_icon_Id).data("iconname");
            
            if (PrevIcon !== ""){
                $("#"+service_icon_Id).val(PrevIcon);
                $("#removeIcon"+service_icon_Id).css("display", "block");
            }
             
            $("#"+service_TagId).removeClass();
        } else {
            $("#removeIcon"+service_icon_Id).css("display", "none");
        }
    });

    $(document).on("click", ".IconNameServices", function(){
        icon = $(this).val();
        $("#"+service_icon_Id).val(icon);
        $("#"+service_TagId).removeClass();
        if ($("#"+service_icon_Id).val().trim() === "") {
            $("#removeIcon"+service_icon_Id).remove();
        }
        $("#"+service_TagId).addClass("fas fa-" + icon);
    });

    // Profile Form Submittion
    $(document).on("submit", "#profile_Form_Submit", function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $('#submitBtnProf').prop('disabled', true);
        $('#submitBtnProf').addClass('bg-gray-400');

        $.ajax({
            url: "../vendor/Process.php?action=profile_Submit",
            type: "POST",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
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
                        text: 'Insertion Fail!'
                    })
                }
                else if (result == "fill") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Please Fill All Fields Carefully!'
                    });
                }
                else if (result == "imgError") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Please Upload Valid Format of Image JPG, JPEG, PNG!'
                    });
                }
                else if (result == "cvError") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Please Upload Valid Format of Resume PDF!'
                    });
                }
                $('#submitBtnProf').prop('disabled', false);
                $('#submitBtnProf').removeClass('bg-gray-400');
            }
        });
    });

    $(document).on("click", "#copyBtn", function(){
        var textToCopy = $(".copyTxt").text();
        navigator.clipboard.writeText(textToCopy).then(function() {
            $("#copyStatus").text("Text copied!");
            setTimeout(function() {
                $("#copyStatus").text("");
            }, 1500);
        })
    });

    // Passwords Form Submittion
    $(document).on("submit", "#pass_Form_Submit", function(event) {
        event.preventDefault();
        var formdata = new FormData(this);
        $('#chngPass').prop('disabled', true);
        $('#chngPass').addClass('bg-gray-400');
      
        $.ajax({
            url: "../vendor/Process.php?action=password_Submit",
            type: "POST",
            data: formdata,
            cache: false,
            processData: false,
            contentType: false,
            success: function(result){
                if(result == 1){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Password Updated Successfully!',
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
                else if (result == 0) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Insertion Fail!'
                    })
                }
                else if (result == "conf_pass") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Password not Matched!'
                    });
                }
                else if (result == "curr_pass") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Invalid Current Password!'
                    });
                }
                else if (result == "fill") {
                    Swal.fire({
                        icon: 'error',
                        title: 'Warning...',
                        text: 'Please Fill All Fields Carefully!'
                    });
                }
                $('#chngPass').prop('disabled', false);
                $('#chngPass').removeClass('bg-gray-400');
            }
        });
    });

    $(document).on("click", "#showCurrPass", function(){
        if ($("#currentPass").attr("type") === "password") {
            $("#currentPass").attr("type", "text");
            $("#showCurrPass").removeClass();
            $("#showCurrPass").addClass("fas fa-eye absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        } else {
            $("#currentPass").attr("type", "password");
            $("#showCurrPass").removeClass();
            $("#showCurrPass").addClass("fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        }
    });

    $(document).on("click", "#showNewPass", function(){
        if ($("#newPass").attr("type") === "password") {
            $("#newPass").attr("type", "text");
            $("#showNewPass").removeClass();
            $("#showNewPass").addClass("fas fa-eye absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        } else {
            $("#newPass").attr("type", "password");
            $("#showNewPass").removeClass();
            $("#showNewPass").addClass("fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        }
    });

    $(document).on("click", "#showConfPass", function(){
        if ($("#conf_pass").attr("type") === "password") {
            $("#conf_pass").attr("type", "text");
            $("#showConfPass").removeClass();
            $("#showConfPass").addClass("fas fa-eye absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        } else {
            $("#conf_pass").attr("type", "password");
            $("#showConfPass").removeClass();
            $("#showConfPass").addClass("fas fa-eye-slash absolute top-1/2 right-1 transform -translate-y-1/2 text-gray-400 showPass");
        }
    });

    var table = $('#viewUsers').DataTable({
        responsive: true
    })
    .columns.adjust()
    .responsive.recalc();
});