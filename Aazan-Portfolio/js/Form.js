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


    // URL to fetch the list of free icons from FontAwesome website
    var apiUrl = 'https://fontawesome.com/icons?d=gallery&m=free';

    // Specify the API endpoint for user data
// const  = 'https://api.example.com/users/123';

// Make a GET request using the Fetch API
fetch(apiUrl)
  .then(response => {
    if (!response.ok) {
      throw new Error('Network response was not ok');
    }
    return response.json();
  })
  .then(data => {
    // Handle successful response
    console.log(data);
  })
  .catch(error => {
    // Handle error
    console.error('Error fetching data:', error);
  });


// fetch(apiUrl)
//   .then(response => {
//     if (!response.ok) {
//       throw new Error('Network response was not ok');
      
//     }
    
//     console.log('response azaaaan',response.json);
//     return response.json();
//   })
//   .then(userData => {
//     // Process the retrieved user data
//     console.log('User Data:', userData);
//   })
//   .catch(error => {
//     console.error('Error:', error);
//   });

    // Fetch HTML content using AJAX
    // $.ajax({
    //     url: url,
    //     method: 'GET',
    //     dataType: 'html',
    //     success: function(response) {
    //         // Create a jQuery object from the response HTML
    //         var $html = $(response);
            
    //         // Initialize an empty array to store icons
    //         var icons = [];

    //         // Find all elements with class 'icon-container'
    //         $html.find('.icon-container').each(function() {
    //             // Extract icon name and class
    //             var Icon_name = $(this).find('span').eq(0).text().trim();
    //             var Icon_class = $(this).find('span').eq(1).text().trim();
    //             icons.push({name: Icon_name, class: Icon_class});
    //         });

    //         // Output the list of icons as JSON
    //         console.log(JSON.stringify(icons));
    //     },
    //     error: function(xhr, status, error) {
    //         console.error('Error fetching data:', error);
    //     }
    // });



    // PortFolio Form Code
    function CheckTogle (check, target, html) {
        let toggle = $('#'+check).prop('checked');
        if (toggle === true) {
            $("#"+target).html(html);
        } else {
            $("#"+target).html("");
        }
    }

    function makeRandomNumb(Arr, ArrCount)
    {
        while (true) {
            randNumb = Math.floor(Math.random() * (100 - 1 + 1)) + 1;
            randNumb = randNumb.toString().padStart(2);
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
                                        <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description">'+ aEducation.education.description +'</textarea> \
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
                                    <button type="button" id="educationAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                                </div> \
                            </div>';

                } else {
                    htmlEducation = ' \
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="educationDescription" name="education[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description"></textarea> \
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
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description">'+aServices.services.description+'</textarea> \
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
                                <button type="button" id="servicesAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                            </div> \
                        </div>';    
                } else {
                    htmlServices = '\
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                            <div class="flex justify-end items-center"> \
                                <div class="relative w-full"> \
                                    <textarea autocomplete="off" id="servicesDescription" name="services[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description"></textarea> \
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
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description">'+aExperiences.experience.description+'</textarea> \
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
                            <button type="button" id="experienceAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlExperiences = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="experienceDescription" name="experience[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description"></textarea> \
                                <label for="experienceDescription" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Description</label> \
                            </div> \
                        </div> \
                    </div>';
                    htmlExperiences += experienceFields ("experience", "", "");
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
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description">'+aSkills.skills.description+'</textarea> \
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
                            <button type="button" id="skillsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                    
                } else {
                    htmlSkills = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="skillsDescription" name="skills[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description"></textarea> \
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
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description">'+aProjects.projects.description+'</textarea> \
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
                            <button type="button" id="projectsAdd" class="text-2xl"><i class="fa-solid fa-circle-plus"></i></button> \
                        </div> \
                    </div>';
                } else {
                    htmlProject = '\
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-1 gap-4 p-4"> \
                        <div class="flex justify-end items-center"> \
                            <div class="relative w-full"> \
                                <textarea autocomplete="off" id="projectsDescription" name="projects[description]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm leading-5 validate" placeholder="Description"></textarea> \
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
                        <textarea autocomplete="off" id="'+ nameVar +'Description" name="'+ nameVar +'[educationDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Education Description">'+eduDesc+'</textarea> \
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
                </div> \
            </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#education_Toggle", function() {
            DataCheck ();
        });
        makeRandomNumb(eduCount, aEducation);
        numbedu = aEducation.hasOwnProperty("education") ? eduCount[eduCount.length-1] : 1;
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
                    <input autocomplete="off" id="'+ nameVar +'iconName" name="'+ nameVar +'[iconName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Icon Name" value="'+srvIconName+'" /> \
                    <label for="'+ nameVar +'iconName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm">Icon Name</label> \
                </div> \
            </div> \
            <div class="flex justify-end items-center"> \
                <div class="relative w-full"> \
                    <input autocomplete="off" id="'+ nameVar +'serviceName" name="'+ nameVar +'[serviceName]" type="text" class="peer placeholder-transparent h-10 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Service Name" value="'+srvServiceName+'" /> \
                    <label for="'+ nameVar +'serviceName" class="absolute left-0 -top-3.5 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-sm validate">Service Name</label> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#services_Toggle", function() {
            DataCheck ();
        });
        makeRandomNumb(srvCount, aServices);
        numbservices = aServices.hasOwnProperty("services") ? srvCount[srvCount.length-1] : 1;
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
                    <textarea autocomplete="off" id="'+ nameVar +'jobDescription" name="'+ nameVar +'[jobDescription]" class="peer placeholder-transparent h-11 w-full border-b-2 border-teal-400 focus:outline-none focus:borer-teal-600 text-base bg-gray-100 text-sm validate" placeholder="Job Description">'+expJobDescription+'</textarea> \
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
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#experience_Toggle", function() {
            DataCheck ();
        });
        makeRandomNumb(expCount, aExperiences);
        numbexp = aExperiences.hasOwnProperty("experience") ? expCount[expCount.length-1] : 1;
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
        makeRandomNumb(sklCount, aSkills);
        numbskills = aSkills.hasOwnProperty("skills") ? sklCount[sklCount.length-1] : 1;
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
                    <input name="'+ nameVar +'[prev_Image]" type="hidden" value="'+prjPrev_Image+'" /> \
                </div> \
            </div> \
        </div>');
    }

    PortFolioData.then(function () {
        $(document).on("click", "#projects_Toggle", function() {
            DataCheck ();
        });
        makeRandomNumb(prjCount, aProjects);
        numbproj = aProjects.hasOwnProperty("projects") ? prjCount[prjCount.length-1] : 1;
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
      
        var inputFields = $("#portFolio_Form_Submit input.validate");
        var textareaFields = $("#portFolio_Form_Submit textarea.validate");
       
        if (inputFields.length > 0) {
            isEmpty = false;
            inputFields.each(function() {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false;
                }
            });
        }
        
        if (textareaFields.length > 0) {
            isEmpty = false;
            textareaFields.each(function() {
                if ($(this).val().trim() === "") {
                    isEmpty = true;
                    return false;
                }
            });
        }

        if (isEmpty === false) {
            $.ajax({
                url: "../vendor/Process.php?action=portFolio_Submit",
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
                    else if (result == "projectImg") {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Please Upload Project Image!'
                        })
                    }
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
    $(document).on("click", "#showPass", function(){
        if ($("#password").attr("type") === "password") {
            $("#password").attr("type", "text");
        } else {
            $("#password").attr("type", "password");
        }
    });
    // Login Code End
});