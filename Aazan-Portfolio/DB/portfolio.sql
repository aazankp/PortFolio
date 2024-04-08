-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 09:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `portfolioformdata`
--

INSERT INTO `portfolioformdata` (`PortFolio_Id`, `about`, `contact`, `education`, `services`, `experiences`, `skills`, `projects`, `userId`) VALUES
(1, '{\"aboutDescription\":\"I\'m Aazan Khan Pathan, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor\'s degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.\"}', '{\"Description\":\"Get in touch with me easily using the provided contact information. Whether you have questions, inquiries, or simply want to connect, I\'m here to help and engage with you.\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"I possess a 3-year DAE CIT diploma From Government College of Technology, Hyderabad, Sindh, complemented by a 4-month certification in web development and design. Additionally, I hold a Bachelor\'s degree in Commerce from the University of Sindh Jamshoro and have successfully completed a Microsoft Office short course offered by IMSA.\",\"educationDescription\":\"Completed comprehensive program encompassing key disciplines of commerce including accounting, finance, economics, and business law. Equipped with practical skills and theoretical knowledge essential for diverse career paths in banking, finance, accounting, and entrepreneurship.\",\"educationDegree\":\"Bachelor of Commerce\",\"educationInstitute\":\"UNIVERSITY OF SINDH, JAMSHORO\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education1\":{\"educationDescription\":\"Completed a comprehensive program in web development and design, specializing in HTML, CSS, JavaScript, and UX design. Skilled in crafting engaging websites and applications, proficient in both front-end and back-end development.\",\"educationDegree\":\"Web Development & Designing\",\"educationInstitute\":\"FAITH COLLEGE OF INFORMATION & TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education2\":{\"educationDescription\":\"Successfully completed a comprehensive program merging computer skills with business management principles. Proficient in leveraging technology for efficient business operations. Ready to contribute to diverse business environments with expertise in both computer and management domains.\",\"educationDegree\":\"Diploma in Computer & Business Management - DCBM\",\"educationInstitute\":\"NEW FUTURE CONCEPT\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education3\":{\"educationDescription\":\"Completed rigorous program focusing on core aspects of computer information technology, including software development, network administration, database management. Acquired hands-on experience and theoretical understanding essential for roles in IT support, software development, system administration, and related fields.\",\"educationDegree\":\"Diploma in Computer Information Technology - CIT\",\"educationInstitute\":\"GOVERNMENT COLLEGE OF TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education4\":{\"educationDescription\":\"Completed a comprehensive program specializing in Microsoft Office and office automation tools. Proficient in Word, Excel, PowerPoint, and Outlook for improved productivity. Ready to streamline office tasks and contribute efficiently to administrative roles.\",\"educationDegree\":\"Microsoft Office \\/ Office Automation\",\"educationInstitute\":\"SCHOOL OF VOCATIONAL & TECHNICAL EDUCATION\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education5\":{\"educationDescription\":\"Completed a specialized program focusing on Microsoft Office applications. Proficient in Word, Excel, PowerPoint, and Outlook for enhanced productivity. Equipped with practical skills to streamline office tasks and contribute effectively to various roles requiring Microsoft Office proficiency.\",\"educationDegree\":\"Microsoft Office\",\"educationInstitute\":\"INSTITUTE OF MODERN SCIENCES AND ARTS - IMSA\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"We offer comprehensive web services tailored to your needs, including web design and development, e-commerce solutions, API development, and maintenance support. Our expertise extends to performance optimization, consulting, and technical guidance. Additionally, we specialize in mobile backend development, ensuring seamless integration with your applications.\",\"iconName\":\"fa-solid fa-wand-magic-sparkles\",\"serviceName\":\"Web Design\"},\"services1\":{\"iconName\":\"fa-solid fa-laptop-code\",\"serviceName\":\"Web Development\"},\"services2\":{\"iconName\":\"fa-solid fa-cart-shopping\",\"serviceName\":\"E-commerce Solutions\"}}', '{\"experience\":{\"experience_Toggle\":\"on\",\"description\":\"With a solid foundation as an MIS Assistant in an NGO, I meticulously managed data for a pivotal Nutrition project over 9 months. Currently, I thrive as a skilled Software Engineer, spearheading the development of innovative solutions with precision and expertise.\",\"position\":\"Software Engineer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"Experienced Software Engineer with expertise in PHP, Laravel, JavaScript, jQuery, and MySQL. Proficient in developing robust web applications and dynamic websites. Skilled in leveraging cutting-edge technologies to create efficient and scalable solutions.\",\"jobFrom\":\"2024-02-01\",\"jobTo\":\"2024-03-14\"},\"experience1\":{\"position\":\"Intern - Web Developer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"As an Intern - Web Developer, I honed my skills in web development, gaining practical experience in HTML, CSS, JavaScript, and other relevant technologies. I contributed to the creation of dynamic and user-friendly websites under the guidance of experienced professionals, while also actively learning and adapting to new challenges in the field.\",\"jobFrom\":\"2023-08-01\",\"jobTo\":\"2024-01-31\"},\"experience2\":{\"position\":\"Data Entry Officer \\/ MIS Assistant\",\"companyName\":\"MANAGEMENT & DEVELOPMENT FOUNDATION\",\"jobDescription\":\"As a Data Entry Officer in a nutrition project, I meticulously managed and inputted critical data to support the project\'s objectives. I ensured accuracy and efficiency in data entry processes, contributing to the success of the project while gaining valuable experience in data management and analysis and reporting.\",\"jobFrom\":\"2022-11-01\",\"jobTo\":\"2023-06-30\"}}', '{\"skills\":{\"skills_Toggle\":\"on\",\"description\":\"Discover my versatile skills and expertise. From problem-solving to creativity, I bring a diverse set of abilities to the table. Whether it\'s technical proficiency, effective communication, or strategic thinking, I\'m ready to excel in any task.\",\"completeProjects\":\"10\",\"skillName\":\"Photoshop\",\"skillPercentage\":\"60%\"},\"skills1\":{\"skillName\":\"jQuery\",\"skillPercentage\":\"85%\"}}', '{\"projects\":{\"projects_Toggle\":\"on\",\"description\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia\",\"projectsName\":\"asdsadsd\",\"projectsType\":\"asdasdsad\",\"imageName\":\"8637_1711470799.jpg\"}}', 1),
(2, '{\"aboutDescription\":\"I\'m Aazan Khan Pathan, and in 2022, Following that, I served as an MIS Assistant at the Management and Development Foundation. Presently, I am employed as a Software Engineer at Verge Systems. I hold a 4-month certificate in web development and design, along with a 3-year DAE CIT diploma and a Bachelor\'s degree in Commerce from the University of Sindh, Jamshoro. My background showcases a blend of business acumen and IT proficiency, highlighting my adaptability across domains.\"}', '{\"Description\":\"Get in touch with me easily using the provided contact information. Whether you have questions, inquiries, or simply want to connect, I\'m here to help and engage with you.\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"I possess a 3-year DAE CIT diploma From Government College of Technology, Hyderabad, Sindh, complemented by a 4-month certification in web development and design. Additionally, I hold a Bachelor\'s degree in Commerce from the University of Sindh Jamshoro and have successfully completed a Microsoft Office short course offered by IMSA.\",\"educationDescription\":\"Completed comprehensive program encompassing key disciplines of commerce including accounting, finance, economics, and business law. Equipped with practical skills and theoretical knowledge essential for diverse career paths in banking, finance, accounting, and entrepreneurship.\",\"educationDegree\":\"Bachelor of Commerce\",\"educationInstitute\":\"UNIVERSITY OF SINDH, JAMSHORO\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education1\":{\"educationDescription\":\"Completed a comprehensive program in web development and design, specializing in HTML, CSS, JavaScript, and UX design. Skilled in crafting engaging websites and applications, proficient in both front-end and back-end development.\",\"educationDegree\":\"Web Development & Designing\",\"educationInstitute\":\"FAITH COLLEGE OF INFORMATION & TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education2\":{\"educationDescription\":\"Successfully completed a comprehensive program merging computer skills with business management principles. Proficient in leveraging technology for efficient business operations. Ready to contribute to diverse business environments with expertise in both computer and management domains.\",\"educationDegree\":\"Diploma in Computer & Business Management - DCBM\",\"educationInstitute\":\"NEW FUTURE CONCEPT\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education3\":{\"educationDescription\":\"Completed rigorous program focusing on core aspects of computer information technology, including software development, network administration, database management. Acquired hands-on experience and theoretical understanding essential for roles in IT support, software development, system administration, and related fields.\",\"educationDegree\":\"Diploma in Computer Information Technology - CIT\",\"educationInstitute\":\"GOVERNMENT COLLEGE OF TECHNOLOGY\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education4\":{\"educationDescription\":\"Completed a comprehensive program specializing in Microsoft Office and office automation tools. Proficient in Word, Excel, PowerPoint, and Outlook for improved productivity. Ready to streamline office tasks and contribute efficiently to administrative roles.\",\"educationDegree\":\"Microsoft Office \\/ Office Automation\",\"educationInstitute\":\"SCHOOL OF VOCATIONAL & TECHNICAL EDUCATION\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"},\"education5\":{\"educationDescription\":\"Completed a specialized program focusing on Microsoft Office applications. Proficient in Word, Excel, PowerPoint, and Outlook for enhanced productivity. Equipped with practical skills to streamline office tasks and contribute effectively to various roles requiring Microsoft Office proficiency.\",\"educationDegree\":\"Microsoft Office\",\"educationInstitute\":\"INSTITUTE OF MODERN SCIENCES AND ARTS - IMSA\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-14\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"We offer comprehensive web services tailored to your needs, including web design and development, e-commerce solutions, API development, and maintenance support. Our expertise extends to performance optimization, consulting, and technical guidance. Additionally, we specialize in mobile backend development, ensuring seamless integration with your applications.\",\"iconName\":\"fa-solid fa-wand-magic-sparkles\",\"serviceName\":\"Web Design\"},\"services1\":{\"iconName\":\"fa-solid fa-laptop-code\",\"serviceName\":\"Web Development\"},\"services2\":{\"iconName\":\"fa-solid fa-cart-shopping\",\"serviceName\":\"E-commerce Solutions\"}}', '{\"experience\":{\"experience_Toggle\":\"on\",\"description\":\"With a solid foundation as an MIS Assistant in an NGO, I meticulously managed data for a pivotal Nutrition project over 9 months. Currently, I thrive as a skilled Software Engineer, spearheading the development of innovative solutions with precision and expertise.\",\"position\":\"Software Engineer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"Experienced Software Engineer with expertise in PHP, Laravel, JavaScript, jQuery, and MySQL. Proficient in developing robust web applications and dynamic websites. Skilled in leveraging cutting-edge technologies to create efficient and scalable solutions.\",\"jobFrom\":\"2024-02-01\",\"jobTo\":\"2024-03-14\"},\"experience1\":{\"position\":\"Intern - Web Developer\",\"companyName\":\"VERGE SYSTEMS\",\"jobDescription\":\"As an Intern - Web Developer, I honed my skills in web development, gaining practical experience in HTML, CSS, JavaScript, and other relevant technologies. I contributed to the creation of dynamic and user-friendly websites under the guidance of experienced professionals, while also actively learning and adapting to new challenges in the field.\",\"jobFrom\":\"2023-08-01\",\"jobTo\":\"2024-01-31\"},\"experience2\":{\"position\":\"Data Entry Officer \\/ MIS Assistant\",\"companyName\":\"MANAGEMENT & DEVELOPMENT FOUNDATION\",\"jobDescription\":\"As a Data Entry Officer in a nutrition project, I meticulously managed and inputted critical data to support the project\'s objectives. I ensured accuracy and efficiency in data entry processes, contributing to the success of the project while gaining valuable experience in data management and analysis and reporting.\",\"jobFrom\":\"2022-11-01\",\"jobTo\":\"2023-06-30\"}}', '{\"skills\":{\"skills_Toggle\":\"on\",\"description\":\"Discover my versatile skills and expertise. From problem-solving to creativity, I bring a diverse set of abilities to the table. Whether it\'s technical proficiency, effective communication, or strategic thinking, I\'m ready to excel in any task.\",\"completeProjects\":\"10\",\"skillName\":\"Photoshop\",\"skillPercentage\":\"60%\"},\"skills1\":{\"skillName\":\"jQuery\",\"skillPercentage\":\"85%\"}}', '{\"projects\":{\"projects_Toggle\":\"on\",\"description\":\"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia\",\"projectsName\":\"asdsadsd\",\"projectsType\":\"asdasdsad\",\"imageName\":\"8637_1711470799.jpg\"}}', 2),
(3, '{\"aboutDescription\":\"Vel quos cupiditate \"}', '{\"Description\":\"Quasi dolore ducimus\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"Nostrud quia do irur\",\"educationDescription\":\"Corrupti non incidi\",\"educationDegree\":\"\",\"educationInstitute\":\"\",\"educationFrom\":\"\",\"educationTo\":\"\"}}', '', '', '', '', 0),
(7, '{\"aboutDescription\":\"sadasdsa\"}', '{\"Description\":\"sadasdsa\"}', '{\"education\":{\"education_Toggle\":\"on\",\"description\":\"sadsdsad\",\"educationDescription\":\"asdasds\",\"educationDegree\":\"asdasd\",\"educationInstitute\":\"asdsad\",\"educationFrom\":\"2024-03-01\",\"educationTo\":\"2024-03-31\"},\"education1\":{\"educationDescription\":\"asdasdssssssssssssssssssss\",\"educationDegree\":\"asddddddfgfgfg\",\"educationInstitute\":\"hghghjhjhj\",\"educationFrom\":\"2024-04-02\",\"educationTo\":\"2024-04-06\"},\"education3\":{\"educationDescription\":\"erwwwwwwwwwrere\",\"educationDegree\":\"rtttttttttttryt\",\"educationInstitute\":\"tytrytyrytyry\",\"educationFrom\":\"2024-03-06\",\"educationTo\":\"2024-04-03\"},\"education14\":{\"educationDescription\":\"dfgfdgdfgfg\",\"educationDegree\":\"dfgdfgdfgdfg\",\"educationInstitute\":\"dfgdfgdfgdfg\",\"educationFrom\":\"2024-04-19\",\"educationTo\":\"2024-04-24\"}}', '{\"services\":{\"services_Toggle\":\"on\",\"description\":\"sdfsdfsdfsdf\",\"iconName\":\"dfdfdfd\",\"serviceName\":\"fdfdfdfdfdf\"}}', '', '', '', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zipcode` int(11) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `DOB` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `workUrl` varchar(255) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `fullName`, `email`, `address`, `zipcode`, `mobile`, `DOB`, `password`, `profile`, `occupation`, `workUrl`, `resume`) VALUES
(1, 'Aazan Khan Pathan', 'aazank517@gmail.com', 'House # 18 Pathan Goth Hussainabad Qasimabad Hyderabad', 71000, '03118679523', '2001-05-08', 'dd154b73da5031b6034510005df80483', '7153_Profile.PNG', 'A Website & Software Developer', 'https://github.com/aazankp?tab=repositories', '6298_Dashboard.pdf'),
(2, 'Shazan Khan', 'kshazan@example.com', '46 New Street', 89269, '03118699511', '2005-12-26', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '10_bg img.jpg', NULL, NULL, NULL),
(3, 'Shahzaib Khan', 'shahzaib@gmail.com', '21 First Road', 77322, '60', '1970-12-26', 'eb1097ae15b6f80e43f92eb29253eebc', '6210_192779187_2991997431021759_4470940711388425728_n.jpg', NULL, NULL, NULL),
(4, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, '61', '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '1951_AAZAN.jpg', NULL, NULL, NULL),
(5, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, '61', '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2028_AAZAN.jpg', NULL, NULL, NULL),
(6, 'Cooper Larson', 'dumazytene@example.com', '42 Old Avenue', 31326, '61', '2011-07-05', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '265_AAZAN.jpg', NULL, NULL, NULL),
(7, 'Lillian Maddox', 'votetipuz@example.com', '953 Nobel Street', 48260, '53', '1989-04-11', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '8526_Cursor types.jpeg', NULL, NULL, NULL),
(8, 'Felix Whitfield', 'tenewa@example.com', '37 White Hague Extension', 66244, '75', '1997-10-22', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '10_bg img.jpg', NULL, NULL, NULL),
(9, 'Alvin Pope', 'ficosu@example.com', '28 South Green Fabien Extension', 87210, '14', '1994-09-14', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '3123_DiriliÅŸ-ErtuÄŸrul-....jpg', NULL, NULL, NULL),
(10, 'Fallon Mccarthy', 'fypysoc@example.com', '905 First Extension', 43544, '43', '1970-05-16', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '2867_DiriliÅŸ-ErtuÄŸrul-....jpg', NULL, NULL, NULL),
(11, 'Rashad Mcclure', 'fusikon@example.com', '55 First Extension', 21269, '44', '2015-04-22', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '7235_00e0830cf439d2599b2d21374a7ed2e1.jpg', NULL, NULL, NULL),
(12, 'Castor Espinoza', 'wipyfujota@example.com', '25 White Milton Drive', 57256, '32', '1987-07-12', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '7975_coding.png', NULL, NULL, NULL),
(13, 'Germaine Mcfarland', 'rotyqoteta@example.com', '154 South Hague Road', 84634, '29', '1974-09-12', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', '983_coding.png', NULL, NULL, NULL);

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
  MODIFY `PortFolio_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
