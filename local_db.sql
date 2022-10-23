-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2021 at 02:58 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `local_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `pokedex`
--

CREATE TABLE `pokedex` (
  `id` int(11) NOT NULL,
  `pokemon_no_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokedex`
--

INSERT INTO `pokedex` (`id`, `pokemon_no_id`, `user_id`) VALUES
(52, 1, 8),
(53, 2, 8),
(54, 3, 8),
(55, 11, 8),
(56, 5, 8),
(57, 8, 8),
(58, 7, 8),
(59, 10, 8),
(60, 9, 8),
(61, 4, 8),
(62, 6, 8),
(63, 4, 5),
(64, 5, 5),
(65, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pokemon`
--

CREATE TABLE `pokemon` (
  `pokemon_img` varchar(255) NOT NULL,
  `pokemon_icon` varchar(255) NOT NULL,
  `pokemon_no` int(255) NOT NULL,
  `pokemon_name` varchar(2000) NOT NULL,
  `type` varchar(2000) NOT NULL,
  `description` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pokemon`
--

INSERT INTO `pokemon` (`pokemon_img`, `pokemon_icon`, `pokemon_no`, `pokemon_name`, `type`, `description`) VALUES
('1.png', '1.png', 1, 'Bulbasaur', 'Grass', 'Bulbasaur can be seen napping in bright sunlight. There is a seed on its back. By soaking up the sun’s rays, the seed grows progressively larger.'),
('2.png', '2.png', 2, 'Ivysaur', 'Grass/Poison', 'There is a bud on this Pokémon’s back. To support its weight, Ivysaur’s legs and trunk grow thick and strong. If it starts spending more time lying in the sunlight, it’s a sign that the bud will bloom into a large flower soon.'),
('3.png', '3.png', 3, 'Venusaur', 'Grass/Poison', 'There is a large flower on Venusaur’s back. The flower is said to take on vivid colors if it gets plenty of nutrition and sunlight. The flower’s aroma soothes the emotions of people.'),
('4.png', '4.png', 4, 'Charmander', 'Fire', 'The flame that burns at the tip of its tail is an indication of its emotions. The flame wavers when Charmander is enjoying itself. If the Pokémon becomes enraged, the flame burns fiercely.'),
('5.png', '5.png', 5, 'Charmeleon', 'Fire', 'Charmeleon mercilessly destroys its foes using its sharp claws. If it encounters a strong foe, it turns aggressive. In this excited state, the flame at the tip of its tail flares with a bluish white color.'),
('6.png', '6.png', 6, 'Charizard\r\n', 'Fire/Flying', 'Charizard flies around the sky in search of powerful opponents. It breathes fire of such great heat that it melts anything. However, it never turns its fiery breath on any opponent weaker than itself.'),
('7.png', '7.png', 7, 'Squirtle', 'Water', 'Squirtle’s shell is not merely used for protection. The shell’s rounded shape and the grooves on its surface help minimize resistance in water, enabling this Pokémon to swim at high speeds.'),
('8.png', '8.png', 8, 'Wartortle', 'Water', 'Its tail is large and covered with a rich, thick fur. The tail becomes increasingly deeper in color as Wartortle ages. The scratches on its shell are evidence of this Pokémon’s toughness as a battler.'),
('9.png', '9.png', 9, 'Blastoise', 'Water', 'Blastoise has water spouts that protrude from its shell. The water spouts are very accurate. They can shoot bullets of water with enough accuracy to strike empty cans from a distance of over 160 feet.'),
('10.png', '10.png', 10, 'Caterpie', 'Insect', 'Caterpie has a voracious appetite. It can devour leaves bigger than its body right before your eyes. From its antenna, this Pokémon releases a terrifically strong odor.'),
('011.png', '11.png', 11, 'Metapod', 'Bug', 'The shell covering this Pokémon’s body is as hard as an iron slab. Metapod does not move very much. It stays still because it is preparing its soft innards for evolution inside the hard shell.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(5, 'melvin', '827ccb0eea8a706c4c34a16891f84e7b', 'Melvin Salonga'),
(8, 'edrian', '81dc9bdb52d04dc20036dbd8313ed055', 'Edrian');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokedex`
--
ALTER TABLE `pokedex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pokemon_no_id` (`pokemon_no_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`pokemon_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokedex`
--
ALTER TABLE `pokedex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `pokemon_no` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pokedex`
--
ALTER TABLE `pokedex`
  ADD CONSTRAINT `pokedex_ibfk_1` FOREIGN KEY (`pokemon_no_id`) REFERENCES `pokemon` (`pokemon_no`),
  ADD CONSTRAINT `pokedex_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
