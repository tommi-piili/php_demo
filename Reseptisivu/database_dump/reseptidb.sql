SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: 
--

-- --------------------------------------------------------

--
-- Rakenne taululle `recipe`
--

CREATE TABLE `recipe` (
  `recipeID` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `dateAdded` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `ingredients` varchar(500) NOT NULL,
  `instructions` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Vedos taulusta `recipe`
--

INSERT INTO `recipe` (`recipeID`, `name`, `dateAdded`, `category`, `ingredients`, `instructions`) VALUES
(1, 'Testi', '2025-01-17', 'alkuruoka', 'testi', 'testi'),
(2, 'Testi', '2025-01-17', 'jälkiruoka', 'Testi', 'Testi'),
(3, 'Testi', '2025-01-17', 'pääruoka', 'Testi', 'Testi');

-- --------------------------------------------------------

--
-- Rakenne taululle `user`
--

CREATE TABLE `user` (
  `userID` int NOT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `userpassword` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `birthyear` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`recipeID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `recipeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;
