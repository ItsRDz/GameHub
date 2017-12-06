-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 22, 2016 at 03:38 PM
-- Server version: 5.5.52-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fsef16g9`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL,
  `ticket_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `game_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `genre` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`game_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `game_name`, `description`, `genre`, `platform`, `image`) VALUES
(1, 'Overwatch', 'In a time of global crisis, an international task force of heroes banded together to restore peace to a war-torn world. This organization, known as Overwatch, ended the crisis and helped maintain peace for a generation, inspiring an era of exploration, innovation, and discovery.', 'Action', 'PC, PlayStation 4, Xbox One', 'images/Overwatch.png'),
(2, 'Inside', 'Inside (stylized as INSIDE) is a puzzle-platformer adventure video game developed and published by Playdead and first released in June 2016. In the game the player controls a young boy in a dystopic world, solving environmental puzzles while avoiding death in a 2.5D sidescrolling fashion, thematically and visually following up on the 2010 monochromatic video game Limbo.', 'Adventure', 'PC, PlayStation 4, Xbox One', 'images/Inside.jpg'),
(4, 'Doom', 'Developed by id software, the studio that pioneered the first-person shooter genre and created multiplayer Deathmatch, DOOM returns as a brutally fun and challenging modern-day shooter experience. Relentless demons, impossibly destructive guns, and fast, fluid movement provide the foundation for intense, first-person combat - whether you''re obliterating demon hordes through the depths of Hell in the single-player campaign, or competing against your friends in numerous multiplayer modes. Expand your gameplay experience using DOOM SnapMap game editor to easily create, play, and share your content with the world.', 'Action', 'PC, PlayStation 4, Xbox One', 'images/Doom.jpg'),
(5, 'Final Fantasy XV', 'Enroute to wed his fiancÃ©e Luna on a road trip with his best friends, Prince Noctis is advised by news reports that his homeland has been invaded and taken over under the false pretense of a peace treaty - and that he, his loved one and his father King Regis, have been slain at the hands of the enemy.', 'Action, Role-Playing', 'PlayStation 4, Xbox One', 'images/FinalFantasy_XV.jpg'),
(6, 'Uncharted 4: A Thief''s End', 'Several years after his last adventure, retired fortune hunter, Nathan Drake, is forced back into the world of thieves.  With the stakes much more personal, Drake embarks on a globe-trotting journey in pursuit of a historical conspiracy behind a fabled pirate treasure.  His greatest adventure will test his physical limits, his resolve, and ultimately what he''s willing to sacrifice to save the ones he loves.', 'Action-Adventure', 'PlayStation 4', 'images/Uncharted_4.jpg'),
(33, 'No Man''s Sky', 'Players participate in a shared universe, with the ability to exchange planet information with other players, though the game is also fully playable offline; this is enabled by the procedural generation system that assures players find the same planet with the same features, lifeforms, and other aspects once given the planet coordinates, requiring no further data to be stored or retrieved from game servers. Nearly all elements of the game are procedurally generated, including star systems, planets and their ecosystems, flora, fauna and their behavioural patterns, artificial structures, and alien factions and their spacecraft.', 'Action-Adventure', 'PC, PlayStation 4', 'images/NoMansSky.jpg'),
(55, 'Planet Coaster', 'Planet Coaster is a construction and management simulation video game. Similar to its spiritual predecessor, the game allows players to build different theme park rides and roller-coasters. These player-created attractions can be shared through a mechanic called "global village".', 'Simulation, Strategy', 'PC', 'images/PlanetCoaster.jpg'),
(84, 'E.T. the Extra-Terrestrial', 'E.T. is an adventure game in which players control an alien (E.T.) from a top-down perspective. The objective of the game is to collect three pieces of an interplanetary telephone. The pieces are found scattered randomly throughout various pits (also referred to as wells). The player is provided with an on-screen energy bar, which decreases when E.T. performs any actions (including moving, teleporting, or falling into a pit, as well as levitating back to the top).', 'Adventure', 'PC', 'images/ET.jpg'),
(85, 'The Adventures of Ninja Nanny', 'No. 11 Downing Street: The Adventures of Ninja Nanny & Sherrloch Sheltie narrates the adventures of Ninja Nanny, a mischievous cow in search of her heritage, and her companion Sherrlock Sheltie. The story leads to animated sequences that introduce a host of unusual fiends and foes as Baron von Moribund trails Ninja Nanny through San Francisco, London, and the Cotswolds. The best part, it''s educational!', 'Adventure', 'PC', 'images/NinjaNanny.jpg'),
(90, 'Dishonored 2', 'The series takes place in the fictional Empire of the Isles with the majority of Dishonored 2 set in the coastal city of Karnaca and is set fifteen years after the events of the first game. After Empress Emily Kaldwin is deposed by an "otherworldly usurper", the player may choose between playing as either Emily or her bodyguard and father Corvo Attano as they attempt to reclaim the throne. Both Emily and Corvo employ their own array of supernatural abilities. They can alternatively decide to forfeit them altogether. There are a multitude of ways to succeed in each given mission, from stealth to purposeful violent conflict.', 'Action-Adventure', 'PC, PlayStation 4, Xbox One', 'images/Dishonored_2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(225) NOT NULL,
  `news_text` longtext NOT NULL,
  `genre` varchar(255) NOT NULL,
  `platform` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_text`, `genre`, `platform`, `image`) VALUES
(3, 'Crash Bandicoot Gets Remastered in the N. Sane Trilogy Collection', 'Crash Bandicoot made an appearance at the PlayStation Experience today with the annoucement of a remaster. The N. Sane Trilogy features sparkly new versions of Crash Bandicoot, Crash Bandicoot 2: Cortex Strikes Back, and Crash Bandicoot: Warped. To mark the 20th anniversary of the series, you can go ahead and download the demo right now. Crash Bandicoot N.Sane Trilogy will release in 2017 for PS4.', 'Adventure', 'PlayStation 4', 'images/crashbandicoot.jpg'),
(5, 'Xbox One Games Playable on Oculus Rift via Streaming App', 'The free Xbox One Streaming app is now available on the Oculus Store, as originally reported in November. It allows Rift owners to occupy one of three â€œimmersive virtual theatres,â€ in order to play Xbox One games on â€œa huge virtual screen,â€ or simply have the screen fill their viewport. It also technically provides the ability to play backwards-compatible Xbox 360 games on the virtual screen, given that it directly streams the Xbox One interface to the headset.', 'Other', 'Xbox One', 'images/Oculus.jpg'),
(6, 'Resident Evil 7', 'A franchise doesnâ€™t survive for more than 20 years without taking a few chances. Case in point: Resident Evil 4, which famously upended series tradition by shifting to an over-the-shoulder camera perspective and a more aggressive play style.\r\n\r\nNow, with the series at another crossroads, Resident Evil 7 biohazard is going full-blown FPS, complete with an optional PlayStation VR mode. Based on the four hours I played last week at Capcomâ€™s US headquarters, I think the new approach injects vitality and confidence into the iconic horror series.\r\n\r\n<iframe width="560" height="315" src="https://www.youtube.com/embed/viyqPAziAaw" frameborder="0" allowfullscreen></iframe>\r\n\r\nEven though I was only able to play on a standard HDTV, itâ€™s easy to see where PlayStation VR will bring a disturbing new dimension to an already stellar-looking title.\r\nResident Evil 7 biohazard releases on PS4 this January 24 â€” after my hands-on play session, Iâ€™ll be counting the days.', 'Action-Adventure', 'PlayStation 4', 'images/residentEvil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE IF NOT EXISTS `reviews` (
  `user_id` int(11) NOT NULL,
  `review_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `review_text` longtext NOT NULL,
  `game_score` int(11) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`user_id`, `review_id`, `game_id`, `date_posted`, `review_text`, `game_score`) VALUES
(15, 1, 1, '2016-12-08 21:50:19', 'If you are a first-person shooter fan generally, and if you enjoy team-based FPS play specifically, not at least trying Overwatch feels criminal. Blizzard always imparts a deep sense of holistic quality into its games, and Overwatch is no exception.', 9),
(15, 2, 2, '2016-12-08 22:56:49', 'A blast for your conception of a classical videogame. Extremely clever in its gameplay design. Don''t underestimate its sparse graphics and sound. It''s all part of the plan.', 9),
(19, 3, 6, '2016-12-09 03:01:29', 'Uncharted 4 undoubtedly keeps up pace with its predecessors, serving as an excellent ending for the series. A lot of action, incredible adventures, humor, and highest levels of audio and graphics in video games - Uncharted 4 has it all. It''s a stellar game.', 9),
(19, 4, 5, '2016-12-09 03:05:24', 'A great game that succeeds in transforming the formula into an open-world, real-time action game. It has its flaws, but it will engage thanks to its graphics and spectacular combats. A new path for a series that is still relevant after 30 years.', 8),
(19, 5, 4, '2016-12-12 17:39:07', 'If you like first person shooters, if you''re an old DOOM fan, or if you just like killing demons, treat yourself to DOOM 2016.', 9),
(19, 6, 3, '2016-12-09 03:07:28', 'Despite the overall feeling of familiarity, Dishonored 2 delivers such an impressive sense of variety and atmosphere that the game sits among the best gaming titles of 2016.', 8),
(19, 7, 33, '2016-12-09 08:22:40', 'No Man''s Sky? More like No Guy Buy! Oooooooooooooooooooooooooohhhhhhhhhhh!!!', 6),
(19, 15, 55, '2016-12-11 06:17:49', 'Planet Coaster is a dream come true to the tycoon game lovers and amusement parks fans. A great presentation, attention to little details and exquisite soundtrack combined with intuitive and deep construction tools give us endless hours of creative gameplay.', 9),
(19, 16, 80, '2016-12-12 02:25:51', 'Worst game ever!!!', 1),
(19, 17, 82, '2016-12-12 03:41:57', 'hyy', 10),
(19, 18, 83, '2016-12-12 06:16:38', 'huehue', 10),
(19, 19, 84, '2016-12-12 06:41:56', 'I don''t care what anyone says, this is the best game ever.', 10),
(19, 20, 85, '2016-12-12 07:04:03', 'Best game since E.T.', 10),
(19, 21, 87, '2016-12-12 17:53:22', 'lala', 9),
(15, 22, 86, '2016-12-12 19:48:55', 'testest', 1),
(15, 23, 90, '2016-12-13 01:11:09', 'In the light of recent sequels, Dishonored 2 is fresh, creative, and simply enjoyable. It''s hard to stop experimenting with new weapons and abilities, which makes it''s hard to stop playing, even when the campaign is finished.', 8),
(15, 24, 91, '2016-12-13 03:11:35', 'Battlefield 1 is better!!!', 2);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE IF NOT EXISTS `support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `notifcation` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `subject`, `description`, `status`, `notifcation`) VALUES
(1, 'Testing the Subject', 'This is a description', 'PENDING', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `notification` tinyint(1) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `user_id`, `subject`, `description`, `created_at`, `notification`, `comment`, `status`) VALUES
(17, 16, 'Help', 'Help me!', '2016-12-12 17:55:44', 0, 'No', 'REPLIED'),
(18, 18, 'Sky is blue?', 'Why is the sky so blue?', '2016-12-12 19:09:16', 0, 'i dunno', 'REPLIED'),
(22, 18, 'test', 'test', '2016-12-12 21:13:05', 0, NULL, 'PENDING'),
(23, 22, 'This is a request for support', 'This is a sample test for support', '2016-12-13 19:34:51', 0, NULL, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` char(40) NOT NULL,
  `first_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(80) NOT NULL,
  `registration_date` date NOT NULL,
  `dob` date DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_type_id`, `username`, `pass`, `first_name`, `last_name`, `email`, `registration_date`, `dob`) VALUES
(15, 3, '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Admin', 'Helper', 'admin@email.com', '2016-11-22', NULL),
(16, 1, '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', '1', 'user1@email.com', '2016-11-22', NULL),
(18, 1, '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User2', 'Bob', 'user2@email.com', '2016-12-06', NULL),
(19, 3, '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'Rich', 'Dep', 'blah@email.com', '2016-12-07', NULL),
(22, 1, '', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'User', '', 'user@email.com', '2016-12-12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL,
  `type_description` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`user_type_id`, `type_name`, `type_description`) VALUES
(1, 'Customer', 'Customer Description'),
(2, 'Agent', 'Agent Description'),
(3, 'Administrator', 'Administrator Description');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
