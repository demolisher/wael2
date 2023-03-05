-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2023 at 07:58 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `needsapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) DEFAULT NULL,
  `class` varchar(14) DEFAULT NULL,
  `level` varchar(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `level`) VALUES
(1, 'KG 1', 'رياض الأطفال'),
(2, 'KG 2', 'رياض الأطفال'),
(3, 'KG 3', 'رياض الأطفال'),
(4, 'الصف الأول', 'المرحلة الابتدائية'),
(5, 'الصف الثاني', 'المرحلة الابتدائية'),
(6, 'الصف الثالث', 'المرحلة الابتدائية'),
(7, 'الصف الرابع', 'المرحلة الابتدائية'),
(8, 'الصف الخامس', 'المرحلة الابتدائية'),
(9, 'الصف السادس', 'المرحلة الابتدائية'),
(10, 'الأول المتوسط', 'المرحلة المتوسطة'),
(11, 'الثاني المتوسط', 'المرحلة المتوسطة'),
(12, 'الثالث المتوسط', 'المرحلة المتوسطة'),
(13, 'الأول الثانوي', 'المرحلة الثانوية'),
(14, 'الثاني الثانوي', 'المرحلة الثانوية'),
(15, 'الثالث الثانوي', 'المرحلة الثانوية');

-- --------------------------------------------------------

--
-- Table structure for table `compounds`
--

CREATE TABLE `compounds` (
  `id` int(11) NOT NULL,
  `compound` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `compounds`
--

INSERT INTO `compounds` (`id`, `compound`) VALUES
(1, 'مدارس المتقدمة - حي العارض'),
(2, 'مجمع المتقدمة الأهلي والعالمي فرع منطقة الجوف'),
(3, 'مدارس المتقدمة - حي الملقا'),
(4, 'مجمع التضامن التعليمي-حي عليشة'),
(5, 'مجمع شروق المتقدمة التعليمي - فرع الأحساء'),
(6, 'مجمع المتقدمة التعليمي - فرع القادسية'),
(7, 'مجمع الجامعة التطبيقية التعليمي - فرع المونسية'),
(8, 'مجمع المطورون التعليمي - ضاحية لبن'),
(9, 'مجمع علوم الرياض التعليمي - فرع الخليج'),
(10, 'مجمع رواد الابداع التعليمي - فرع البديعة'),
(11, 'مجمع المتقدمة للتعلم الذكي - فرع المغرزات'),
(12, 'مجمع علوم الرياض التعليمي - فرع الصحافة'),
(13, 'مجمع نيار التعليمي - فرع الربيع'),
(14, 'مجمع الابتكارية 1 التعليمي - فرع الملك فيصل'),
(15, 'مجمع الابتكارية 2 التعليمي - فرع اشبيلية'),
(16, 'مجمع المتقدمة التعليمي - فرع العقيق'),
(17, 'مجمع الأمجاد التعليمي - فرع الحمراء'),
(18, 'مجمع الأمجاد التعليمي - حي الحمراء'),
(19, 'مجمع آفاق التعليم التعليمي - فرع الأحساء'),
(20, 'مدارس المتقدمة - حي حطين'),
(21, 'مجمع مدارس الرائد العالمية - حي الوادي'),
(22, 'مجمع المتقدمة التعليمي - فرع النهضة'),
(23, 'مجمع المطورون التعليمي - فرع الخرج'),
(24, 'مجمع المتقدمة التعليمي - فرع جامعة الملك فيصل'),
(25, 'مجمع المتقدمة التعليمي - فرع المصيف'),
(26, 'مجمع المتقدمة التعليمي - فرع عليشة'),
(27, 'مجمع المتقدمة التعليمي - فرع النزهه'),
(28, 'مجمع المتقدمة التعليمي - بحي النزهة'),
(29, 'مجمع التضامن التعليمي - فرع عليشة'),
(30, 'مجمع الرائد التعليمي - فرع الوادي'),
(31, 'مجمع المتقدمة التعليمي - فرع حطين'),
(32, 'مجمع الامجاد التعليمي - فرع الشهداء'),
(33, 'مجمع المتقدمة التعليمي - فرع النرجس'),
(34, 'مجمع المطورون - ضاحية لبن'),
(35, 'مجمع التضامن التعليمي - فرع عليشة');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `gender` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender`) VALUES
(1, 'بنين'),
(2, 'بنات');

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE `levels` (
  `id` int(11) NOT NULL,
  `level` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level`) VALUES
(1, 'رياض الأطفال'),
(2, 'المرحلة الابتدائية'),
(3, 'المرحلة المتوسطة'),
(4, 'المرحلة الثانوية');

-- --------------------------------------------------------

--
-- Table structure for table `needs`
--

CREATE TABLE `needs` (
  `id` int(11) NOT NULL,
  `compound` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL,
  `term` varchar(191) NOT NULL,
  `class` varchar(191) NOT NULL,
  `gender` varchar(191) NOT NULL,
  `subjects` varchar(2000) NOT NULL,
  `comple` varchar(191) NOT NULL,
  `need_code` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `needs`
--

INSERT INTO `needs` (`id`, `compound`, `path`, `level`, `term`, `class`, `gender`, `subjects`, `comple`, `need_code`) VALUES
(52, 'مجمع الأمجاد التعليمي - فرع الحمراء', 'الدبلوما الأمريكية', 'المرحلة الابتدائية', '', '', 'بنين', '', '25', '17-4-2-1'),
(54, 'مجمع الأمجاد التعليمي - فرع الحمراء', 'التحفيظ', 'رياض الأطفال', '', '', 'بنات', '', '25', '17-2-1-2'),
(55, 'مجمع الامجاد التعليمي - فرع الشهداء', 'الدولي', 'المرحلة الثانوية', '', '', 'بنات', '', '25', '32-3-4-2'),
(56, 'مجمع المتقدمة التعليمي - فرع العقيق', 'الدولي', 'المرحلة المتوسطة', '', '', 'بنين', '', '25', '16-3-3-1'),
(57, 'مجمع المتقدمة التعليمي - فرع النهضة', 'الدولي', 'المرحلة المتوسطة', 'الفصل الدراسي الثالث', '', 'بنين', '', '30', '22-3-3-1-3');

-- --------------------------------------------------------

--
-- Table structure for table `paths`
--

CREATE TABLE `paths` (
  `id` int(11) NOT NULL,
  `path` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `paths`
--

INSERT INTO `paths` (`id`, `path`) VALUES
(1, 'العام'),
(2, 'التحفيظ'),
(3, 'الدولي'),
(4, 'الدبلوما الأمريكية'),
(5, 'المصري');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_bg` varchar(100) NOT NULL,
  `font_color` varchar(100) NOT NULL,
  `sub_icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `sub_name`, `sub_bg`, `font_color`, `sub_icon`) VALUES
(1, 'المجمعات', '0a8f74', 'fff', 'fa fa-sitemap text-white'),
(2, 'المسارات', '65c7d0', '2a3f54', 'fa fa-id-badge text-dark'),
(3, 'التخصصات', '038995', 'fff', 'fas fa-book text-white'),
(4, 'المعلمون', 'f7921e', '2a3f54', 'fa fa-user text-dark'),
(5, 'المواد الدراسية', 'ef4b28', 'fff', 'fas fa-address-book text-white'),
(6, 'الاحتياجات', 'a4c92c', '2a3f54', 'fas fa-id-card text-dark');

-- --------------------------------------------------------

--
-- Table structure for table `specs`
--

CREATE TABLE `specs` (
  `id` int(11) NOT NULL,
  `spec` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `specs`
--

INSERT INTO `specs` (`id`, `spec`) VALUES
(1, 'رياضيات'),
(2, 'لغة عربية'),
(3, 'شريعة'),
(4, 'فيزياء'),
(5, 'تربية بدنية'),
(6, 'لغة انجليزية'),
(7, 'أحياء'),
(8, 'تاريخ'),
(9, 'تربية فنية '),
(10, 'حاسب'),
(11, 'جغرافيا'),
(12, 'إعلام تربوي'),
(13, 'فيزياء وكيمياء '),
(14, 'علم نفس'),
(15, 'لغة فرنسية '),
(16, 'لغة ألمانية'),
(17, 'كيمياء'),
(18, 'علم اجتماع'),
(19, 'أصول دين'),
(20, 'وثائق ومكتبات'),
(21, 'صعوبات تعلم'),
(22, 'تربية خاصة'),
(23, 'صحافة ونشر'),
(24, 'علم اجتماع'),
(25, 'التاريخ و الحضارة'),
(26, 'علوم بيولوجية'),
(27, 'تكنولوجيا تعليم'),
(28, 'معلم صف');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`) VALUES
(1, 'اللغة العربية'),
(2, 'الدراسات الإسلامية'),
(3, 'اللغة الإنجليزية'),
(4, 'العلوم'),
(5, 'الرياضيات'),
(6, 'التربية البدنية'),
(7, 'التربية الفنية'),
(8, 'المهارات الرقمية'),
(9, 'المهارات الحياتية'),
(10, 'التفكير الناقد'),
(11, 'الاجتماعيات'),
(12, 'الكيمياء'),
(13, 'الفيزياء'),
(14, 'الأحياء'),
(15, 'علم البيئة'),
(16, 'العلوم الإدارية'),
(17, 'نور البيان'),
(18, 'الروبوت'),
(19, 'الكابستون'),
(20, 'الذكاء الاصطناعي'),
(21, 'اللغة الفرنسية'),
(22, 'اللغة الألمانية'),
(23, 'الجيولوجيا'),
(24, 'التربية الأسرية'),
(25, 'القدرات اللفظية'),
(26, 'القدرات الكمية'),
(27, 'التحصيلي'),
(28, 'معلم صف');

-- --------------------------------------------------------

--
-- Table structure for table `subject_need`
--

CREATE TABLE `subject_need` (
  `id` int(11) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `n_code` varchar(191) NOT NULL,
  `c_code` varchar(191) NOT NULL,
  `l_number` varchar(191) NOT NULL,
  `c_number` varchar(191) NOT NULL,
  `total_no` varchar(191) NOT NULL,
  `need_no` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `subject_need`
--

INSERT INTO `subject_need` (`id`, `subject`, `n_code`, `c_code`, `l_number`, `c_number`, `total_no`, `need_no`) VALUES
(1, 'التربية الأسرية', '52', '4', '3', '7', '21', '0.84'),
(2, 'الجيولوجيا', '52', '4', '7', '2', '14', '0.56'),
(3, 'التربية الأسرية', '52', '5', '3', '2', '6', '0.24'),
(4, 'التربية الفنية', '52', '5', '7', '3', '21', '0.84'),
(5, 'الدراسات الإسلامية', '54', '1', '5', '2', '10', '0.40'),
(6, 'الذكاء الاصطناعي', '54', '1', '4', '2', '8', '0.32'),
(7, 'التربية البدنية', '54', '1', '2', '2', '4', '0.16'),
(8, 'التربية البدنية', '54', '2', '3', '2', '6', '0.24'),
(9, 'الاجتماعيات', '54', '2', '5', '2', '10', '0.40'),
(10, 'القدرات اللفظية', '54', '3', '4', '2', '8', '0.32'),
(11, 'الدراسات الإسلامية', '54', '3', '3', '2', '6', '0.24'),
(12, 'الأحياء', '55', '13', '15', '2', '30', '1.20'),
(13, 'الذكاء الاصطناعي', '55', '13', '5', '2', '10', '0.40'),
(14, 'الذكاء الاصطناعي', '55', '14', '3', '2', '6', '0.24'),
(15, 'التربية الأسرية', '55', '15', '6', '3', '18', '0.72');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `nationality` varchar(191) NOT NULL,
  `speciality` varchar(191) NOT NULL,
  `level` varchar(191) NOT NULL,
  `subject1` varchar(191) NOT NULL,
  `subject2` varchar(191) NOT NULL,
  `subject3` varchar(191) NOT NULL,
  `clsNumber1` varchar(191) NOT NULL,
  `clsNumber2` varchar(191) NOT NULL,
  `clsNumber3` varchar(191) NOT NULL,
  `comple` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `nationality`, `speciality`, `level`, `subject1`, `subject2`, `subject3`, `clsNumber1`, `clsNumber2`, `clsNumber3`, `comple`) VALUES
(126, 'Ahmed', 'فلسطيني', 'تكنولوجيا تعليم', 'المرحلة الثانوية', 'الروبوت', 'العلوم', 'الذكاء الاصطناعي', '8', '9', '7', '24'),
(127, 'Wael', 'تونسي', 'أحياء', 'المرحلة الثانوية', 'الأحياء', '', '', '22', '0', '0', '22');

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE `term` (
  `id` int(11) NOT NULL,
  `term` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`id`, `term`) VALUES
(1, 'الفصل الدراسي الأول'),
(2, 'الفصل الدراسي الثاني'),
(3, 'الفصل الدراسي الثالث');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `pass` varchar(191) NOT NULL,
  `rule` varchar(191) NOT NULL,
  `address` varchar(300) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`, `rule`, `address`, `phone`, `active`) VALUES
(1, 'Wael Amri', 'wael@g.com', '29e615f2edb34f3a4058d269a03a9ade', 'manager', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compounds`
--
ALTER TABLE `compounds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `needs`
--
ALTER TABLE `needs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paths`
--
ALTER TABLE `paths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_need`
--
ALTER TABLE `subject_need`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compounds`
--
ALTER TABLE `compounds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `needs`
--
ALTER TABLE `needs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `paths`
--
ALTER TABLE `paths`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `specs`
--
ALTER TABLE `specs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subject_need`
--
ALTER TABLE `subject_need`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `term`
--
ALTER TABLE `term`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
