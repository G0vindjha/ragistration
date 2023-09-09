# ragistration

CREATE TABLE `students_details` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `streem` varchar(255) DEFAULT NULL,
  `enrollment` varchar(20) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL
); 
