-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 02:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `portfolioformdata`
--

CREATE TABLE `portfolioformdata` (
  `PortFolio_Id` int(11) NOT NULL,
  `about` longtext NOT NULL,
  `contact` longtext NOT NULL,
  `education` longtext NOT NULL,
  `services` longtext NOT NULL,
  `experiences` longtext NOT NULL,
  `skills` longtext NOT NULL,
  `projects` longtext NOT NULL,
  `portfolioUrl` varchar(255) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolioformdata`
--

INSERT INTO `portfolioformdata` (`PortFolio_Id`, `about`, `contact`, `education`, `services`, `experiences`, `skills`, `projects`, `portfolioUrl`, `userId`) VALUES
(1, '{\"aboutDescription\":\"I\'m Aazan Khan Pathan, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor\'s degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.\"}', '{\"Description\":\"Get in touch with me easily using the provided contact information. Whether you have questions, inquiries, or simply want to connect, I\'m here to help and engage with you.\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"I possess a 3-year DAE CIT diploma From Government College of Technology, Hyderabad, Sindh, complemented by a 4-month certification in web development and design. Additionally, I hold a Bachelor\'s degree in Commerce from the University of Sindh Jamshoro and have successfully completed a Microsoft Office short course offered by IMSA.\",\"educationDescription\":\"Completed comprehensive program encompassing key disciplines of commerce including accounting, finance, economics, and business law. Equipped with practical skills and theoretical knowledge essential for diverse career paths in banking, finance, accounting, and entrepreneurship.\",\"educationDegree\":\"Bachelor of Commerce\",\"educationInstitute\":\"UNIVERSITY OF SINDH, JAMSHORO\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education1\":{\"educationDescription\":\"Completed a comprehensive program in web development and design, specializing in HTML, CSS, JavaScript, and UX design. Skilled in crafting engaging websites and applications, proficient in both front-end and back-end development.\",\"educationDegree\":\"Web Development & Designing\",\"educationInstitute\":\"FAITH COLLEGE OF INFORMATION & TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education2\":{\"educationDescription\":\"Successfully completed a comprehensive program merging computer skills with business management principles. Proficient in leveraging technology for efficient business operations. Ready to contribute to diverse business environments with expertise in both computer and management domains.\",\"educationDegree\":\"Diploma in Computer & Business Management - DCBM\",\"educationInstitute\":\"NEW FUTURE CONCEPT\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education3\":{\"educationDescription\":\"Completed rigorous program focusing on core aspects of computer information technology, including software development, network administration, database management. Acquired hands-on experience and theoretical understanding essential for roles in IT support, software development, system administration, and related fields.\",\"educationDegree\":\"Diploma in Computer Information Technology - CIT\",\"educationInstitute\":\"GOVERNMENT COLLEGE OF TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education4\":{\"educationDescription\":\"Completed a comprehensive program specializing in Microsoft Office and office automation tools. Proficient in Word, Excel, PowerPoint, and Outlook for improved productivity. Ready to streamline office tasks and contribute efficiently to administrative roles.\",\"educationDegree\":\"Microsoft Office \\/ Office Automation\",\"educationInstitute\":\"SCHOOL OF VOCATIONAL & TECHNICAL EDUCATION\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education5\":{\"educationDescription\":\"Completed a specialized program focusing on Microsoft Office applications. Proficient in Word, Excel, PowerPoint, and Outlook for enhanced productivity. Equipped with practical skills to streamline office tasks and contribute effectively to various roles requiring Microsoft Office proficiency.\",\"educationDegree\":\"Microsoft Office\",\"educationInstitute\":\"INSTITUTE OF MODERN SCIENCES AND ARTS - IMSA\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"We offer comprehensive web services tailored to your needs, including web design and development, e-commerce solutions, API development, and maintenance support. Our expertise extends to performance optimization, consulting, and technical guidance. Additionally, we specialize in mobile backend development, ensuring seamless integration with your applications.\",\"iconName\":\"fa-solid fa-wand-magic-sparkles\",\"serviceName\":\"Web Design\"},\"services1\":{\"iconName\":\"fa-solid fa-laptop-code\",\"serviceName\":\"Web Development\"},\"services2\":{\"iconName\":\"fa-solid fa-cart-shopping\",\"serviceName\":\"E-commerce Solutions\"}}', '{\"experience\":{\"experience_Toggle\":\"on\",\"description\":\"With a solid foundation as an MIS Assistant in an NGO, I meticulously managed data for a pivotal Nutrition project over 9 months. Currently, I thrive as a skilled Software Engineer, spearheading the development of innovative solutions with precision and expertise.\",\"position\":\"Software Engineer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"Experienced Software Engineer with expertise in PHP, Laravel, JavaScript, jQuery, and MySQL. Proficient in developing robust web applications and dynamic websites. Skilled in leveraging cutting-edge technologies to create efficient and scalable solutions.\",\"jobFrom\":\"2024-02-01\",\"jobTo\":\"2024-03-14\"},\"experience1\":{\"position\":\"Intern - Web Developer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"As an Intern - Web Developer, I honed my skills in web development, gaining practical experience in HTML, CSS, JavaScript, and other relevant technologies. I contributed to the creation of dynamic and user-friendly websites under the guidance of experienced professionals, while also actively learning and adapting to new challenges in the field.\",\"jobFrom\":\"2023-08-01\",\"jobTo\":\"2024-01-31\"},\"experience2\":{\"position\":\"Data Entry Officer \\/ MIS Assistant\",\"companyName\":\"MANAGEMENT & DEVELOPMENT FOUNDATION\",\"jobDescription\":\"As a Data Entry Officer in a nutrition project, I meticulously managed and inputted critical data to support the project\'s objectives. I ensured accuracy and efficiency in data entry processes, contributing to the success of the project while gaining valuable experience in data management and analysis and reporting.\",\"jobFrom\":\"2022-11-01\",\"jobTo\":\"2023-06-30\"}}', '{\"skills\":{\"skills_Toggle\":\"on\",\"description\":\"Discover my versatile skills and expertise. From problem-solving to creativity, I bring a diverse set of abilities to the table. Whether it\'s technical proficiency, effective communication, or strategic thinking, I\'m ready to excel in any task.\",\"completeProjects\":\"10\",\"skillName\":\"Photoshop\",\"skillPercentage\":\"60%\"},\"skills1\":{\"skillName\":\"jQuery\",\"skillPercentage\":\"85%\"}}', '{\"projects\":{\"projects_Toggle\":\"on\",\"description\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia\",\"projectsName\":\"asdsadsd\",\"projectsType\":\"asdasdsad\",\"imageName\":\"8637_1711470799.jpg\"}}', 'http://localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio.php?pId=1', 1),
(2, '{\"aboutDescription\":\"I\'m Amrat, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor\'s degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.\"}', '{\"Description\":\"I\'m Aazan Khan Pathan, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor\'s degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"I possess a 3-year DAE CIT diploma From Government College of Technology, Hyderabad, Sindh, complemented by a 4-month certification in web development and design. Additionally, I hold a Bachelor\'s degree in Commerce from the University of Sindh Jamshoro and have successfully completed a Microsoft Office short course offered by IMSA.\",\"educationDescription\":\"Completed comprehensive program encompassing key disciplines of commerce including accounting, finance, economics, and business law. Equipped with practical skills and theoretical knowledge essential for diverse career paths in banking, finance, accounting, and entrepreneurship.\",\"educationDegree\":\"Bachelor of Commerce\",\"educationInstitute\":\"UNIVERSITY OF SINDH, JAMSHORO\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education1\":{\"educationDescription\":\"Completed a comprehensive program in web development and design, specializing in HTML, CSS, JavaScript, and UX design. Skilled in crafting engaging websites and applications, proficient in both front-end and back-end development.\",\"educationDegree\":\"Web Development & Designing\",\"educationInstitute\":\"FAITH COLLEGE OF INFORMATION & TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education2\":{\"educationDescription\":\"Successfully completed a comprehensive program merging computer skills with business management principles. Proficient in leveraging technology for efficient business operations. Ready to contribute to diverse business environments with expertise in both computer and management domains.\",\"educationDegree\":\"Diploma in Computer & Business Management - DCBM\",\"educationInstitute\":\"NEW FUTURE CONCEPT\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education3\":{\"educationDescription\":\"Completed rigorous program focusing on core aspects of computer information technology, including software development, network administration, database management. Acquired hands-on experience and theoretical understanding essential for roles in IT support, software development, system administration, and related fields.\",\"educationDegree\":\"Diploma in Computer Information Technology - CIT\",\"educationInstitute\":\"GOVERNMENT COLLEGE OF TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education4\":{\"educationDescription\":\"Completed a comprehensive program specializing in Microsoft Office and office automation tools. Proficient in Word, Excel, PowerPoint, and Outlook for improved productivity. Ready to streamline office tasks and contribute efficiently to administrative roles.\",\"educationDegree\":\"Microsoft Office \\/ Office Automation\",\"educationInstitute\":\"SCHOOL OF VOCATIONAL & TECHNICAL EDUCATION\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education5\":{\"educationDescription\":\"Completed a specialized program focusing on Microsoft Office applications. Proficient in Word, Excel, PowerPoint, and Outlook for enhanced productivity. Equipped with practical skills to streamline office tasks and contribute effectively to various roles requiring Microsoft Office proficiency.\",\"educationDegree\":\"Microsoft Office\",\"educationInstitute\":\"INSTITUTE OF MODERN SCIENCES AND ARTS - IMSA\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"We offer comprehensive web services tailored to your needs, including web design and development, e-commerce solutions, API development, and maintenance support. Our expertise extends to performance optimization, consulting, and technical guidance. Additionally, we specialize in mobile backend development, ensuring seamless integration with your applications.\",\"serviceName\":\"Web Design\",\"iconName\":\"fa-solid fa-wand-magic-sparkles\"},\"services1\":{\"serviceName\":\"Web Development\",\"iconName\":\"fa-solid fa-laptop-code\"},\"services2\":{\"serviceName\":\"E-commerce Solutions\",\"iconName\":\"fa-solid fa-cart-shopping\"}}', '{\"experience\":{\"experience_Toggle\":\"on\",\"description\":\"With a solid foundation as an MIS Assistant in an NGO, I meticulously managed data for a pivotal Nutrition project over 9 months. Currently, I thrive as a skilled Software Engineer, spearheading the development of innovative solutions with precision and expertise.\",\"position\":\"Software Engineer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"Experienced Software Engineer with expertise in PHP, Laravel, JavaScript, jQuery, and MySQL. Proficient in developing robust web applications and dynamic websites. Skilled in leveraging cutting-edge technologies to create efficient and scalable solutions.\",\"jobFrom\":\"2024-02-01\",\"jobTo\":\"2024-03-14\"},\"experience1\":{\"position\":\"Intern - Web Developer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"As an Intern - Web Developer, I honed my skills in web development, gaining practical experience in HTML, CSS, JavaScript, and other relevant technologies. I contributed to the creation of dynamic and user-friendly websites under the guidance of experienced professionals, while also actively learning and adapting to new challenges in the field.\",\"jobFrom\":\"2023-08-01\",\"jobTo\":\"2024-01-31\"},\"experience2\":{\"position\":\"Data Entry Officer \\/ MIS Assistant\",\"companyName\":\"MANAGEMENT & DEVELOPMENT FOUNDATION\",\"jobDescription\":\"As a Data Entry Officer in a nutrition project, I meticulously managed and inputted critical data to support the project\'s objectives. I ensured accuracy and efficiency in data entry processes, contributing to the success of the project while gaining valuable experience in data management and analysis and reporting.\",\"jobFrom\":\"2022-11-01\",\"jobTo\":\"2023-06-30\"}}', '{\"skills\":{\"skills_Toggle\":\"on\",\"description\":\"Discover my versatile skills and expertise. From problem-solving to creativity, I bring a diverse set of abilities to the table. Whether it\'s technical proficiency, effective communication, or strategic thinking, I\'m ready to excel in any task.\",\"completeProjects\":\"10\",\"skillName\":\"Photoshop\",\"skillPercentage\":\"60%\"},\"skills1\":{\"skillName\":\"jQuery\",\"skillPercentage\":\"85%\"}}', '{\"projects\":{\"projects_Toggle\":\"on\",\"description\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia\",\"projectsName\":\"asdsadsd\",\"projectsType\":\"asdasdsad\",\"imageName\":\"8637_1711470799.jpg\"}}', 'http://localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio.php?pId=2', 2),
(3, '{\"aboutDescription\":\"Vel quos cupiditate \"}', '{\"Description\":\"Quasi dolore ducimus\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"Nostrud quia do irur\",\"educationDescription\":\"Corrupti non incidi\",\"educationDegree\":\"\",\"educationInstitute\":\"\",\"educationFrom\":\"\",\"educationTo\":\"\"}}', '', '', '', '', 'http://localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio.php?pId=1', 0),
(7, '{\"aboutDescription\":\"Vel quos cupiditate \"}', '{\"Description\":\"Vel quos cupiditate \"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"sdjfhfgdjkhdqiweui\",\"educationDescription\":\"bfskdhfskjdjhfn\",\"educationDegree\":\"sahdkjsjdhh\",\"educationInstitute\":\"dhkjdhs\",\"educationFrom\":\"2024-05-01\",\"educationTo\":\"2024-05-16\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"sdfsdfsdfsdf\",\"serviceName\":\"fdfdfdfdfdf\",\"iconName\":\"walking\"}}', '', '', '{\"projects\":{\"projects_Toggle\":\"on\",\"description\":\"asasas\",\"projectsName\":\"asasas\",\"projectsType\":\"asasassssss\",\"prev_Image\":\"\",\"imageName\":\"1832_1715929419.jpg\"}}', 'http://localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio.php?pId=3', 3),
(8, '{\"aboutDescription\":\"sdfhkdsfhdsfhk\"}', '{\"Description\":\"dhfkjdkjfhdjkf\"}', '', '', '', '', '', 'localhost/new_work/Verge/PortFolio/Aazan-Portfolio/portfolio/portfolio.php?pId=26', 26);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `oldPassword` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `workUrl` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `otp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullName`, `email`, `address`, `mobile`, `password`, `oldPassword`, `profile`, `occupation`, `workUrl`, `resume`, `otp`) VALUES
(1, 'Aazan Khan Pathan', 'aazank517@gmail.com', 'House # 18 Pathan Goth Hussainabad Qasimabad Hyderabad', '03118679523', 'dd154b73da5031b6034510005df80483', 'dd154b73da5031b6034510005df80483', '7153_Profile.PNG', 'A Website & Software Developer', 'https://github.com/aazankp?tab=repositories', '6298_Dashboard.pdf', NULL),
(2, 'Amrat', 'amratkumar060@gmail.com', '46 New Street', '03118699511', '2688fef3a0c96ef25a54d22a0a73ef35', '2688fef3a0c96ef25a54d22a0a73ef35', '10_bg img.jpg', NULL, NULL, NULL, 338347),
(3, 'Shahzaib Khan', 'shahzaib@gmail.com', '21 First Road', '603434343434', 'eb1097ae15b6f80e43f92eb29253eebc', 'eb1097ae15b6f80e43f92eb29253eebc', '3048_1715839005.jpg', 'A Website & Software Developer', NULL, NULL, NULL),
(4, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', '61', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1951_AAZAN.jpg', NULL, NULL, NULL, NULL),
(5, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', '61', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2028_AAZAN.jpg', NULL, NULL, NULL, NULL),
(6, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', '61', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '265_AAZAN.jpg', NULL, NULL, NULL, NULL),
(7, 'Lillian Maddox', 'votetipuz@example.com', '953 Nobel Street', '53', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '8526_Cursor types.jpeg', NULL, NULL, NULL, NULL),
(8, 'Felix Whitfield', 'tenewa@example.com', '37 White Hague Extension', '75', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '10_bg img.jpg', NULL, NULL, NULL, NULL),
(9, 'Alvin Pope', 'ficosu@example.com', '28 South Green Fabien Extension', '14', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '3123_DiriliÅŸ-ErtuÄŸrul-....jpg', NULL, NULL, NULL, NULL),
(10, 'Fallon Mccarthy', 'fypysoc@example.com', '905 First Extension', '43', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '2867_DiriliÅŸ-ErtuÄŸrul-....jpg', NULL, NULL, NULL, NULL),
(11, 'Rashad Mcclure', 'fusikon@example.com', '55 First Extension', '44', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '7235_00e0830cf439d2599b2d21374a7ed2e1.jpg', NULL, NULL, NULL, NULL),
(12, 'Castor Espinoza', 'wipyfujota@example.com', '25 White Milton Drive', '32', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '7975_coding.png', NULL, NULL, NULL, NULL),
(13, 'Germaine Mcfarland', 'rotyqoteta@example.com', '154 South Hague Road', '29', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '983_coding.png', NULL, NULL, NULL, NULL),
(14, 'Cedric Sykes', 'xetovinumy@example.com', '408 South Green Fabien Parkway', '98', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '7107_1712778698.jpg', 'Vel doloremque eaque', 'Voluptas sunt nobis', '5979_Aazan Khan Resume.pdf', NULL),
(15, 'Nelle Duran', 'wuhor@example.com', '733 South Second Drive', '71', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '4324_1712778772.jpg', 'Nam sequi necessitat', 'Voluptatibus ea in s', '1083_Aazan Khan Resume.pdf', NULL),
(16, 'Todd Barton', 'pyfaqi@example.com', '179 New Boulevard', '78', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '1306_1712843545.jpg', 'Sit mollitia cumque ', 'Culpa nisi velit au', '9915_Aazan-CV updated.pdf', NULL),
(17, 'Rylee Osborne', 'retyhij@example.com', '96 East White Hague Road', '92', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '3529_1712843811.jpg', 'Duis perferendis a u', 'Et et praesentium ab', '3123_Aazan Khan Resume.pdf', NULL),
(18, 'Quinlan Valenzuela', 'duvuxul@example.com', '82 East First Freeway', '59', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '8120_1712843891.jpg', 'Ipsa est in facere', 'Sunt est dolorem sun', '5578_Aazan Khan Resume.pdf', NULL),
(19, 'Fatima Cardenas', 'xarix@example.com', '860 White Hague Street', '1', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '446_1712844081.jpg', 'Nobis hic sed qui as', 'Iusto dolor perspici', '8331_Aazan-CV updated.pdf', NULL),
(20, 'Donovan Buchanan', 'defuj@example.com', '305 East Green Cowley Freeway', '78', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '8963_1712844458.jpg', 'Odio similique elit', 'Cupiditate itaque vo', '9625_Aazan-CV updated.pdf', NULL),
(21, 'Gray Jones', 'wuqa@example.com', '60 White Hague Street', '88', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '1945_1712844608.PNG', 'Hic ullam voluptate ', 'Ut provident ullam ', '9633_Aazan-CV updated.pdf', NULL),
(22, 'Martina Stone', 'sahaqiqocy@example.com', '14 Cowley Freeway', '62', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '1680_1712844766.PNG', 'Qui id laudantium a', 'Exercitationem cumqu', '3677_Aazan-CV updated.pdf', NULL),
(23, 'Knox Herring', 'nafe@example.com', '852 Green Fabien Lane', '9', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '158_1712845411.PNG', 'Maxime itaque dolore', 'Eum dolore Nam accus', '5069_Aazan-CV updated.pdf', NULL),
(24, 'Jillian Bray', 'dafev@example.com', '27 South Hague Lane', '1', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '1364_1712845452.PNG', 'Sint lorem eaque des', 'Quia vero et qui imp', '4602_Aazan-CV updated.pdf', NULL),
(25, 'Paloma Rodriguez', 'bugepysoba@example.com', '73 Hague Boulevard', '14', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '', '915_1712845614.PNG', 'Iure omnis nostrum a', 'Omnis qui fuga Volu', '2710_Aazan-CV updated.pdf', NULL),
(26, 'heklo', 'rabsha@gmail.com', 'ahdja', '09203103012', '5d41402abc4b2a76b9719d911017c592', '5d41402abc4b2a76b9719d911017c592', '9520_1716291558.jpg', 'ahdjah', 'web.hr', '1520_Billing System.pdf', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `portfolioformdata`
--
ALTER TABLE `portfolioformdata`
  ADD PRIMARY KEY (`PortFolio_Id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `portfolioformdata`
--
ALTER TABLE `portfolioformdata`
  MODIFY `PortFolio_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
