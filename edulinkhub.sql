-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2025 at 07:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edulinkhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category` enum('Admission','Job Exam','Skill-Based') NOT NULL,
  `description` text DEFAULT NULL,
  `pdfLink` varchar(255) NOT NULL,
  `uploadDate` date DEFAULT curdate(),
  `suggestedFor` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`suggestedFor`)),
  `isPaid` tinyint(1) DEFAULT 0,
  `price` decimal(10,2) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `image`, `author`, `category`, `description`, `pdfLink`, `uploadDate`, `suggestedFor`, `isPaid`, `price`, `createdAt`, `updatedAt`) VALUES
(2, 'Job Interview Success', 'https://example.com/images/book2.jpg', 'Prof. Emily Davis', 'Job Exam', 'Master the art of job interviews', 'https://example.com/books/book2.pdf', '2025-07-31', '[\"Job Seekers\", \"Career Changers\"]', 1, 14.99, '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(3, 'Advanced Programming Skills', 'https://example.com/images/book3.jpg', 'Tech Expert', 'Skill-Based', 'Learn advanced programming techniques', 'https://example.com/books/book3.pdf', '2025-07-31', '[\"Developers\", \"Computer Science Students\"]', 0, NULL, '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(4, 'MBA Entrance Preparation', 'https://example.com/images/book4.jpg', 'Business Guru', 'Admission', 'Complete preparation for MBA entrance exams', 'https://example.com/books/book4.pdf', '2025-07-31', '[\"MBA Aspirants\", \"Working Professionals\"]', 1, 24.99, '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(5, 'Data Science Fundamentals', 'https://example.com/images/book5.jpg', 'Data Scientist', 'Skill-Based', 'Introduction to data science concepts', 'https://example.com/books/book5.pdf', '2025-07-31', '[\"Students\", \"Professionals\"]', 1, 12.99, '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(6, 'Quia tenetur consequ', '1755016760_ABOUT-DMALL-BANNER.webp', 'Ducimus fugiat aut', 'Admission', 'Facilis est nemo ut', 'https://www.hyxiv.me', '2025-08-12', '[\"Mollit expedita sit\"]', 1, 56.00, '2025-08-12 16:25:49', '2025-08-12 16:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `book_reviews`
--

CREATE TABLE `book_reviews` (
  `id` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `reviewId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_reviews`
--

INSERT INTO `book_reviews` (`id`, `bookId`, `reviewId`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `exam_units`
--

CREATE TABLE `exam_units` (
  `id` int(11) NOT NULL,
  `university_id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam_units`
--

INSERT INTO `exam_units` (`id`, `university_id`, `unit`, `date`) VALUES
(1, 1, 'Mathematics', '2024-02-20'),
(2, 1, 'Computer Science Fundamentals', '2024-02-22'),
(3, 1, 'English Proficiency', '2024-02-25'),
(4, 2, 'AI Algorithms', '2024-03-05'),
(5, 2, 'Machine Learning', '2024-03-08'),
(6, 2, 'Neural Networks', '2024-03-12'),
(7, 3, 'Robotics Design', '2024-03-15'),
(8, 3, 'Control Systems', '2024-03-18'),
(9, 3, 'Autonomous Systems', '2024-03-22'),
(10, 4, 'Statistics', '2024-01-20'),
(11, 4, 'Data Analysis', '2024-01-23'),
(12, 4, 'Big Data Technologies', '2024-01-26'),
(13, 5, 'Quantum Mechanics', '2024-02-10'),
(14, 5, 'Quantum Algorithms', '2024-02-13'),
(15, 5, 'Quantum Information Theory', '2024-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `fundings`
--

CREATE TABLE `fundings` (
  `id` int(11) NOT NULL,
  `type` enum('scholarship','professor') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `eligibilityCriteria` text DEFAULT NULL,
  `applyDate` date DEFAULT NULL,
  `applicationDeadline` date DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `professor_id` int(11) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fundings`
--

INSERT INTO `fundings` (`id`, `type`, `title`, `description`, `link`, `eligibilityCriteria`, `applyDate`, `applicationDeadline`, `university`, `department`, `professor_id`, `createdAt`, `updatedAt`) VALUES
(1, 'scholarship', 'Excellence in Computer Science', 'This scholarship supports outstanding students pursuing undergraduate degrees in Computer Science. Provides full tuition and a living stipend.', 'https://university.edu/scholarships/excellence-cs', 'Minimum GPA of 3.8, demonstrated financial need, and strong letters of recommendation.', '2023-09-01', '2024-03-15', 'Harvard University', 'Computer Science', NULL, '2025-07-31 16:51:12', '2025-07-31 16:51:12'),
(2, 'scholarship', 'Global Leaders Program', 'Merit-based scholarship for international students showing exceptional leadership potential. Covers tuition and accommodation.', 'https://university.edu/scholarships/global-leaders', 'International student status, leadership experience, and community involvement.', '2023-10-01', '2024-02-28', 'Stanford University', 'International Programs', NULL, '2025-07-31 16:51:12', '2025-07-31 16:51:12'),
(3, 'professor', 'AI Research Grant', 'Funding for professors conducting cutting-edge research in artificial intelligence and machine learning. Provides equipment and research assistant support.', 'https://university.edu/grants/ai-research', 'Tenured or tenure-track faculty position in Computer Science or related field.', '2023-11-01', '2024-04-15', 'MIT', 'Computer Science', NULL, '2025-07-31 16:51:12', '2025-07-31 16:51:12'),
(4, 'professor', 'Quantum Computing Initiative', 'Grant program supporting research in quantum computing and quantum information science. Includes funding for lab equipment and travel.', 'https://university.edu/grants/quantum-initiative', 'Faculty position in Physics, Computer Science, or Engineering with focus on quantum technologies.', '2023-12-01', '2024-05-30', 'Princeton University', 'Physics', 2, '2025-07-31 16:51:12', '2025-07-31 16:51:12'),
(5, 'scholarship', 'Women in STEM Scholarship', 'Supports female students pursuing degrees in science, technology, engineering, and mathematics. Provides mentorship in addition to financial support.', 'https://university.edu/scholarships/women-stem', 'Female student enrolled in STEM program, minimum GPA of 3.5, and demonstrated commitment to community service.', '2023-09-15', '2024-04-01', 'UC Berkeley', 'STEM Programs', NULL, '2025-07-31 16:51:12', '2025-07-31 16:51:12');

-- --------------------------------------------------------

--
-- Table structure for table `professors`
--

CREATE TABLE `professors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `researchInterests` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`researchInterests`)),
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(20) DEFAULT NULL,
  `availability` enum('available','not available') DEFAULT 'available',
  `profileLink` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `professors`
--

INSERT INTO `professors` (`id`, `name`, `image`, `researchInterests`, `contact_email`, `contact_phone`, `availability`, `profileLink`, `createdAt`, `updatedAt`) VALUES
(2, 'Dr. Michael Chen', 'https://example.com/images/michael_chen.jpg', '[\"Quantum Computing\", \"Cryptography\", \"Algorithm Design\"]', 'michael.chen@university.edu', '+1 (555) 987-6543', 'available', 'https://university.edu/faculty/michael-chen', '2025-07-31 16:47:42', '2025-07-31 16:47:42'),
(3, 'Dr. Emily Rodriguez', 'https://example.com/images/emily_rodriguez.jpg', '[\"Bioinformatics\", \"Genomics\", \"Computational Biology\"]', 'emily.rodriguez@university.edu', '+1 (555) 456-7890', 'not available', 'https://university.edu/faculty/emily-rodriguez', '2025-07-31 16:47:42', '2025-07-31 16:47:42'),
(4, 'Dr. James Wilson', 'https://example.com/images/james_wilson.jpg', '[\"Renewable Energy\", \"Sustainable Materials\", \"Environmental Engineering\"]', 'james.wilson@university.edu', '+1 (555) 234-5678', 'available', 'https://university.edu/faculty/james-wilson', '2025-07-31 16:47:42', '2025-07-31 16:47:42'),
(5, 'Dr. Lisa Thompson', '1755014411_2945120.webp', '[\"Cognitive Psychology\",\"Neuroscience\",\"Human-Computer Interaction\"]', 'lisa.thompson@university.edu', '+1 (555) 876-5432', 'available', 'https://university.edu/faculty/lisa-thompson', '2025-07-31 16:47:42', '2025-08-12 16:00:34'),
(6, 'Kabir Ahmed Ridoy', '1755011734_1-intro-photo-final.jpg', '[\"ai\",\"machine learning\"]', 'kabir.cse.bd@gmail.com', '01886807343', 'available', 'https://www.test.com', '2025-08-12 15:15:34', '2025-08-12 15:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `purchased_books`
--

CREATE TABLE `purchased_books` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `bookId` int(11) NOT NULL,
  `purchasedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchased_books`
--

INSERT INTO `purchased_books` (`id`, `userId`, `bookId`, `purchasedAt`) VALUES
(2, 1, 4, '2025-07-31 16:57:07'),
(3, 2, 2, '2025-07-31 16:57:07'),
(4, 4, 3, '2025-07-31 16:57:07'),
(5, 5, 5, '2025-07-31 16:57:07'),
(6, 1, 5, '2025-07-31 16:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `message` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `userId`, `message`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'This book helped me get into my dream college! Highly recommended.', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(2, 2, 'Great resource for job preparation. The tips are practical and effective.', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(3, 4, 'Excellent content for learning programming. Clear explanations and examples.', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(4, 1, 'The MBA preparation guide is comprehensive and well-structured.', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(5, 5, 'Data Science concepts explained in an easy-to-understand manner.', '2025-07-31 16:57:07', '2025-07-31 16:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `programType` enum('undergraduate','postgraduate','Ph.D.') NOT NULL,
  `discipline` varchar(255) NOT NULL,
  `admissionLink` varchar(255) NOT NULL,
  `applicationDate` date DEFAULT NULL,
  `applicationDeadline` date DEFAULT NULL,
  `admitCardDownloadDate` date DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `location`, `programType`, `discipline`, `admissionLink`, `applicationDate`, `applicationDeadline`, `admitCardDownloadDate`, `image`, `createdAt`, `updatedAt`) VALUES
(1, 'Harvard University', 'Cambridge, MA', 'undergraduate', 'Computer Science', 'https://harvard.edu/apply', '2023-09-01', '2023-12-15', '2024-01-15', 'https://example.com/images/harvard.jpg', '2025-07-31 16:49:06', '2025-07-31 16:49:06'),
(2, 'Stanford University', 'Stanford, CA', 'postgraduate', 'Artificial Intelligence', 'https://stanford.edu/admissions', '2023-10-01', '2024-01-20', '2024-02-10', 'https://example.com/images/stanford.jpg', '2025-07-31 16:49:06', '2025-07-31 16:49:06'),
(3, 'MIT', 'Cambridge, MA', 'Ph.D.', 'Robotics', 'https://mit.edu/admissions', '2023-11-01', '2024-02-15', '2024-03-01', 'https://example.com/images/mit.jpg', '2025-07-31 16:49:06', '2025-07-31 16:49:06'),
(4, 'UC Berkeley', 'Berkeley, CA', 'undergraduate', 'Data Science', 'https://berkeley.edu/apply', '2023-09-15', '2023-11-30', '2024-01-05', 'https://example.com/images/berkeley.jpg', '2025-07-31 16:49:06', '2025-07-31 16:49:06'),
(5, 'Princeton University', 'Princeton, NJ', 'postgraduate', 'Quantum Computing', 'https://princeton.edu/admissions', '2023-10-15', '2024-01-10', '2024-02-01', 'https://example.com/images/princeton.jpg', '2025-07-31 16:49:06', '2025-07-31 16:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilePicture` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `emailVerified` tinyint(1) DEFAULT 0,
  `emailVerificationCode` int(11) DEFAULT NULL,
  `isPremium` tinyint(1) DEFAULT 0,
  `premiumExpiresAt` date DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `profilePicture`, `address`, `phoneNumber`, `emailVerified`, `emailVerificationCode`, `isPremium`, `premiumExpiresAt`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'John Doe', 'john@example.com', 'hashed_password_1', 'https://example.com/images/john.jpg', '123 Main St, City', '555-1234', 1, NULL, 1, '2024-12-31', 'user', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(2, 'Jane Smith', 'jane@example.com', 'hashed_password_2', 'https://example.com/images/jane.jpg', '456 Oak Ave, Town', '555-5678', 1, NULL, 0, NULL, 'user', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(3, 'Admin User', 'admin@example.com', 'hashed_password_admin', 'https://example.com/images/admin.jpg', '789 Admin Rd, Capital', '555-9999', 1, NULL, 1, '2025-12-31', 'admin', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(4, 'Mike Johnson', 'mike@example.com', 'hashed_password_3', NULL, '321 Pine St, Village', '555-4321', 0, NULL, 0, NULL, 'user', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(5, 'Sarah Williams', 'sarah@example.com', 'hashed_password_4', 'https://example.com/images/sarah.jpg', '654 Elm Blvd, County', '555-8765', 1, NULL, 1, '2024-06-30', 'user', '2025-07-31 16:57:07', '2025-07-31 16:57:07'),
(6, 'Admin', 'admin@gmail.com', 'asdfasdf', 'admin_profile.jpg', '123 Admin Street, Admin City', '+10000000000', 1, 0, 1, '2030-12-31', 'admin', '2025-08-02 14:32:14', '2025-08-02 14:34:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_title` (`title`),
  ADD KEY `idx_category` (`category`),
  ADD KEY `idx_author` (`author`);

--
-- Indexes for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_book_review` (`bookId`,`reviewId`),
  ADD KEY `idx_book` (`bookId`),
  ADD KEY `idx_review` (`reviewId`);

--
-- Indexes for table `exam_units`
--
ALTER TABLE `exam_units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_university` (`university_id`);

--
-- Indexes for table `fundings`
--
ALTER TABLE `fundings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `professor_id` (`professor_id`),
  ADD KEY `idx_type` (`type`),
  ADD KEY `idx_title` (`title`),
  ADD KEY `idx_deadline` (`applicationDeadline`);

--
-- Indexes for table `professors`
--
ALTER TABLE `professors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name` (`name`),
  ADD KEY `idx_email` (`contact_email`);

--
-- Indexes for table `purchased_books`
--
ALTER TABLE `purchased_books`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_user_book` (`userId`,`bookId`),
  ADD KEY `idx_user` (`userId`),
  ADD KEY `idx_book` (`bookId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user` (`userId`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_name_location` (`name`,`location`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_email` (`email`),
  ADD KEY `idx_role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `book_reviews`
--
ALTER TABLE `book_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `exam_units`
--
ALTER TABLE `exam_units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fundings`
--
ALTER TABLE `fundings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `professors`
--
ALTER TABLE `professors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `purchased_books`
--
ALTER TABLE `purchased_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_reviews`
--
ALTER TABLE `book_reviews`
  ADD CONSTRAINT `book_reviews_ibfk_1` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `book_reviews_ibfk_2` FOREIGN KEY (`reviewId`) REFERENCES `reviews` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exam_units`
--
ALTER TABLE `exam_units`
  ADD CONSTRAINT `exam_units_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `universities` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fundings`
--
ALTER TABLE `fundings`
  ADD CONSTRAINT `fundings_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `purchased_books`
--
ALTER TABLE `purchased_books`
  ADD CONSTRAINT `purchased_books_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchased_books_ibfk_2` FOREIGN KEY (`bookId`) REFERENCES `books` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
