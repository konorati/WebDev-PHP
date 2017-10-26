-- phpMyAdmin SQL Dump
-- version 4.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 04, 2015 at 02:47 AM
-- Server version: 5.6.23-log
-- PHP Version: 5.6.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `content` varchar(4000) DEFAULT NULL,
  `b_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `username`, `title`, `content`, `b_date`) VALUES
(1, 'admin', 'My First Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis consectetur justo eu tristique vulputate. Aliquam erat volutpat. Sed mattis nisi magna, id tincidunt urna facilisis tempus. Donec vel feugiat purus, eget porta odio. Morbi sit amet scelerisque lacus, vitae consectetur dolor. Quisque porttitor turpis nec est egestas auctor et quis magna. Cras pretium sit amet nibh ut maximus. Ut in mi in odio facilisis dignissim nec nec nulla. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce tincidunt sapien a iaculis molestie. Vivamus suscipit bibendum turpis ac placerat. Pellentesque est lorem, dignissim at consequat quis, volutpat eget erat. Fusce aliquet, lacus molestie aliquet dignissim, sem lacus fringilla ante, in malesuada felis eros non lorem.\r\n\r\nSuspendisse id imperdiet enim. Sed et dictum nisl, ac laoreet arcu. Nullam placerat lorem vel urna condimentum, ut tincidunt dui rutrum. Proin imperdiet lacus semper enim sodales, non faucibus nunc mollis. Donec id metus sollicitudin, auctor metus sit amet, tincidunt sapien. Etiam ultrices a velit at ullamcorper. Etiam non neque sodales tortor finibus pellentesque. Integer vulputate augue in risus ornare pellentesque. Nunc gravida varius congue. Aliquam quis egestas tortor, sit amet faucibus turpis. Mauris a iaculis lacus. Integer et malesuada lacus, quis finibus diam. Cras scelerisque blandit lectus, ut lacinia sapien ullamcorper vitae.\r\n\r\nNulla et rutrum neque. Duis feugiat mi semper elit iaculis aliquet. Etiam eu imperdiet nulla, nec lobortis nisi. Mauris gravida, lorem a tincidunt vestibulum, lorem risus varius massa, ut venenatis felis dui id ligula. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc et quam faucibus, viverra ante et, feugiat purus. Cras tristique scelerisque erat, sit amet dictum orci rhoncus a. Suspendisse iaculis quis lacus sed convallis. Donec at sollicitudin lorem.', '2015-04-27 21:05:15'),
(2, 'KG', 'Another Really Cool Blog', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. In hac habitasse platea dictumst. Etiam libero nibh, luctus vel ipsum ut, consectetur lacinia mauris. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis tellus neque, tempus eget neque in, feugiat molestie sem. Morbi tincidunt nibh eget eleifend maximus. Curabitur sed augue at risus auctor bibendum eu at libero. Sed rhoncus lobortis vulputate.\r\n\r\nCurabitur sit amet magna eu orci laoreet condimentum eu non risus. Sed at orci sit amet tellus tincidunt rhoncus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Sed sed purus vel enim fringilla posuere eu at urna. Suspendisse sit amet felis ipsum. Integer ac tortor ac velit tempor aliquam vel eget libero. Donec tincidunt maximus egestas. Praesent gravida risus in leo condimentum mattis. Vivamus justo lacus, fringilla eget dui eu, interdum imperdiet massa. Phasellus quis auctor turpis. Suspendisse potenti. Aliquam ac venenatis purus. Praesent suscipit tempus aliquet. Duis tincidunt, tortor in convallis molestie, neque turpis volutpat risus, in lobortis neque justo sit amet justo.\r\n\r\nInteger sollicitudin, erat in volutpat condimentum, sapien ipsum consectetur erat, quis tempor tellus massa vitae sapien. In vel luctus augue, ac ultrices nulla. Sed mollis fermentum dictum. Quisque vestibulum justo in diam sodales placerat. Morbi eu nunc eu lacus ultricies malesuada at mattis orci. Vivamus condimentum libero non tellus elementum tempor. Nulla cursus non magna a fermentum. Duis sit amet ante ut quam eleifend porta. Nam commodo rhoncus turpis, sed ullamcorper dolor pharetra in.', '2015-04-28 12:21:24'),
(3, 'admin', 'This is a new Blog!', 'New blog content', '2015-04-29 14:30:26'),
(4, 'admin', 'Blog about stuff', 'This is a new blog about stuff!', '2015-04-29 17:20:00'),
(5, 'kristin', 'New Blog', 'this is a new blog', '2015-04-30 14:26:50');

-- --------------------------------------------------------

--
-- Table structure for table `blogcomment`
--

CREATE TABLE IF NOT EXISTS `blogcomment` (
  `id` int(11) NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `bc_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogcomment`
--

INSERT INTO `blogcomment` (`id`, `blog_id`, `username`, `content`, `bc_date`) VALUES
(7, 1, 'admin', 'I''m adding a comment', '2015-04-28 20:47:22'),
(10, 2, 'admin', 'Cool comment bro', '2015-04-28 20:50:45'),
(11, 1, 'KG', 'I can add a comment too!', '2015-04-28 21:02:50'),
(12, 2, 'KG', 'I know, right', '2015-04-28 21:03:49'),
(13, 3, 'admin', 'This blog doesn''t have much content', '2015-04-29 14:31:20'),
(14, 1, 'kristin', 'mee tooo!!!', '2015-04-29 17:29:08'),
(15, 3, 'admin', 'Hello', '2015-04-29 17:30:25'),
(16, 3, 'joeschmoe', 'Hi, how are you?', '2015-04-30 16:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(1024) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `thumb` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `firstname`, `lastname`, `email`, `admin`, `thumb`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin@admin.com', 1, 'http://api.randomuser.me/portraits/thumb/men/55.jpg'),
('Jax', 'jax', 'Jax', 'Pants', 'jax@pants.com', 0, 'http://api.randomuser.me/portraits/thumb/men/2.jpg'),
('joeschmoe', 'joe', 'Josephine', 'Schmoe', 'joeschmoe@gmail.com', 0, 'http://api.randomuser.me/portraits/thumb/women/15.jpg'),
('KG', 'kg', 'Kristin', 'Greenman', 'kg@email.com', 0, 'http://api.randomuser.me/portraits/thumb/women/30.jpg'),
('kristin', 'kristin', 'Kristin', 'Greenman', 'kg@gmail.com', 0, 'http://api.randomuser.me/portraits/thumb/women/18.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcomment`
--
ALTER TABLE `blogcomment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`), ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `blogcomment`
--
ALTER TABLE `blogcomment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
