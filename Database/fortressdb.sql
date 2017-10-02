-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 29, 2013 at 07:55 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fortressdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbldownload`
--

CREATE TABLE IF NOT EXISTS `tbldownload` (
  `download_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) NOT NULL,
  `url` varchar(255) NOT NULL,
  `artist` varchar(55) NOT NULL,
  `description` varchar(255) NOT NULL,
  `file_type` varchar(55) NOT NULL,
  `exclusive` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`download_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `tbldownload`
--

INSERT INTO `tbldownload` (`download_id`, `name`, `url`, `artist`, `description`, `file_type`, `exclusive`) VALUES
(13, 'Pretty Girls', 'http://1in.kz/s/music/1312447370_iyaz-feat-travie-mccoy-pretty-girls.mp3', 'Iyaz', 'Travie McCoy - Pretty Girls (Varsity Team Radio Edit) (musiclife.kz) - Iyaz feat. Travie McCoy - Pretty Girls (Varsity Team Radio Edit) (musiclife.kz) ', 'mp3', 0),
(14, 'Big Time Rush', 'http://1in.kz/s/music/1311305905_big-time-rush-feat-iyaz-if-i-ruled-the-world.mp3', 'Iyaz', 'feat. Iyaz - If I Ruled The World (musiclife.kz) - Big Time Rush feat. Iyaz - If I Ruled The World (musiclife.kz)', 'mp3', 0),
(15, 'Numb Encore', 'http://dl1.livemusic.org.ua/download/219916/captcha/13700825856195.mp3/song.mp3', 'Linkin Park', 'Linkin Park Vs. Mike Candys - Numb Encore 2012 (DJ Andrew Malevich Mash Up) - Linkin Park Vs. Mike Candys - Numb Encore 2012 (DJ Andrew Malevich Mash Up)', 'mp3', 0),
(16, 'Get Back', 'http://1in.kz/s/music/1308282654_alexandra-stan-get-back-gazdanov-vs-asap-radio-edit.mp3', 'Alexandra Stan', 'Alexandra Stan - Get Back (Gazdanov Vs ASAP Radio Edit) (musiclife.kz)', 'mp3', 0),
(17, 'Omega El Fuerte', 'http://www.djalfredo.fr/wp-content/uploads/2011/05/Omega-El-Fuerte-Ft.-Alexandra-Stan-Mr-Saxo-Beat-Remix-Outro-Break-Dj-laser-KonKlase.Com_.mp3', 'Alexandra Stan', 'Ft. Alexandra Stan - Mr Saxo Beat Remix Outro Break Dj laser KonKlase.Com - Omega ''El Fuerte'' Ft. Alexandra Stan - Mr Saxo Beat Remix Outro Break Dj laser', 'mp3', 1),
(18, 'One Million', 'http://uploadtak.com/images/l6766_Alexandra_Stan_Ft.mp3', 'Alexandra Stan', 'Ft. Carlprit - One Million - Alexandra Stan Ft. Carlprit - One Million', 'mp3', 1),
(19, 'In The End', 'http://music.layer07.com/LinkinPark-InTheEnd.mp3', 'Linkin Park', 'In The End - Linkin Park mp3', 'mp3', 1),
(20, 'Numb Encore', 'http://dl1.livemusic.org.ua/download/219916/captcha/13700825856195.mp3/song.mp3', 'Linkin Park', 'Linkin Park Vs. Mike Candys - Numb Encore 2012 (DJ Andrew Malevich Mash Up)', 'mp3', 1),
(21, 'Paper Cut', 'http://o5wap.ru/content/mp3/full/8/b/a/Linkin_Park_-_Paper_Cut.mp3', 'Linkin Park', 'Linkin Park - Paper Cut mp3', 'mp3', 1),
(22, 'Breaking the habbit', 'http://dc510.4shared.com/img/1589231262/394f488/dlink__2Fdownload_2FMiBqsHi9_3Ftsid_3D20131107-102759-d4d34e60/preview.mp3', 'Linkin Park', 'Linkin Park - Breaking The Habbit mp3', 'mp3', 0),
(23, 'Burn It Down', 'http://www.eternaldl.pro/xpress-song/album/1391/2/Best/Linkin_Park_-_Burn_It_Down_(www.XPRESS-SONG.com).mp3', 'Linkin Park', 'Linkin Park – Burn It Down (DJ STIFF DUBSTEP Official 2012) ', 'mp3', 0),
(24, 'Hips dont lie', 'http://www.umnet.com/pic/diy/ringtones/4/Bamboo-49460.mp3', 'Shakira', 'Shakira, 2006 World Cup remix - Hips dont lie - Bamboo mp3', 'remix', 0),
(25, 'Get It Started', 'http://promodj.com/download/3464823/Pitbull_feat_Shakira_Get_It_Started_Dj_Biel0_Ramix.mp3', 'Pitbull ', 'Pitbull feat. Shakira - Get It Started (Dj Biel0 Remix) mp3', 'remix', 0),
(26, 'She Wolf', 'http://ilictronix.com/staff/joe/tracks/Shakira-SheWolf(GhostsOfVeniceRemix).mp3', 'Shakira', 'Shakira - She Wolf (Ghosts Of Venice Remix) mp3', 'remix', 0),
(27, 'Mega Mash-Up', 'http://promodj.com/download/1389913/Lady_GaGa_Shakira_Pitbull_Madonna_David_Guetta_ft_Akon_Mega_Mash_Up_Dj_Alex_van_Victor_remix.mp3', 'Lady GaGa', 'Lady GaGa, Shakira, Pitbull, M - Mega Mash-Up Remix ', 'remix', 0),
(28, 'All I Ever Wanted', 'http://promodj.com/download/2323575/Basshunter_All_I_Ever_Wanted_DJ_ANIX_REMIX.mp3', 'Basshunter', 'All I Ever Wanted(DJ ANIX REMIX) mp3', 'remix', 1),
(29, 'I Love Rock and Roll', 'http://mp4.ma/musiques-mp4-ma/trance/basshunter/basshunter-new/mp4.ma_I-Love-Rock-and-Roll-(BassHunter-Remix).mp3', 'Basshunter', 'www.Mp4.Ma .:::. I Love Rock and Roll [BassHunter Remix] mp3', 'remix', 1),
(30, 'When You Leave', 'http://s217.filsh.net/download/EJ8v/Alina%20-%20When%20You%20Leave%20(Numa%20Numa)%20(Basshunter%20Remix)%20(OFFICIAL%20VIDEO).mp3', 'Alina', 'When You Leave (Numa Numa) (Basshunter Remix)', 'remix', 1),
(31, 'Many Men', 'http://dc128.4shared.com/img/1593976503/4dcc4477/dlink__2Fdownload_2FUOwEJEhr_3Ftsid_3D20131107-104312-34f5dfa0/preview.mp3', '50cents ', 'Tupac ft 50cents - Many Men (Tu Pac Remix) mp3', 'remix', 1),
(32, 'Lemonade', 'http://www.youtube.com/watch?v=4eWfRjyp2Nc&list=FL7ampUcbtdKZAJWhapfuxzA&index=15', 'Alexandra Stan', 'By popular demand, Lemonade''s lyrics (ingredients) are on Alexandra''s Facebook page: http://www.facebook.com/AlexandraStan', 'video', 0),
(33, 'International Love', 'http://www.youtube.com/watch?v=CdXesX6mYUE&list=FL7ampUcbtdKZAJWhapfuxzA&index=13', 'Pitbull', 'Music video by Pitbull Featuring Chris Brown performing International Love. (C) 2011 RCA Records', 'video', 0),
(34, 'Apologize', 'http://www.youtube.com/watch?v=fm0T7_SGee4&list=FL7ampUcbtdKZAJWhapfuxzA&index=9', 'One Republic', 'My Vimeo Page holds my newest work', 'video', 0),
(35, 'Beautiful', 'http://www.youtube.com/watch?v=rSOzN0eihsE&list=FL7ampUcbtdKZAJWhapfuxzA&index=8', 'Akon', 'Music video by Akon performing Beautiful. (C) 2008 Universal Records & SRC Records Inc', 'video', 0),
(36, 'Turn Off The Light', 'http://www.youtube.com/watch?v=kOL7aeIDruA&list=FL7ampUcbtdKZAJWhapfuxzA&index=7', 'Nelly Furtado', 'Music video by Nelly Furtado performing Turn Off The Light. (C) 2000 Geffen Records ', 'video', 1),
(37, 'Down', 'http://www.youtube.com/watch?v=oUbpGmR1-QM&list=FL7ampUcbtdKZAJWhapfuxzA&index=6', 'Jay Sean', 'Music video by Jay Sean performing Down. (C) 2009 Cash Money Records Inc. ', 'video', 1),
(38, 'Ride it', 'http://www.youtube.com/watch?v=dvmaJZY2ImE&list=FL7ampUcbtdKZAJWhapfuxzA&index=5', 'Jay Sean', 'Ride it is the first single from Jay Sean''s 2nd album "My own way". Shot in super exclusive Club Movida in London', 'video', 1),
(39, 'Both of Us', 'http://www.youtube.com/watch?v=1sa9qeV6T0o&list=FL7ampUcbtdKZAJWhapfuxzA&index=3', 'B.o.B', 'Both of Us ft. Taylor Swift [Official Video]', 'video', 1),
(40, 'She Wolf', 'http://www.youtube.com/watch?v=7OJNZTqYqxU&list=FL7ampUcbtdKZAJWhapfuxzA&index=4', 'Shakira', 'The first FIFA World Cup™ on the African continent may be scheduled to kick off on 11 June 2010', 'video', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblpost`
--

CREATE TABLE IF NOT EXISTS `tblpost` (
  `post_id` int(100) NOT NULL AUTO_INCREMENT,
  `text` blob NOT NULL,
  `topic_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `created_time` int(100) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tblpost`
--

INSERT INTO `tblpost` (`post_id`, `text`, `topic_id`, `user_id`, `created_time`) VALUES
(1, 0x32204f73636172204177617264732032204772616d6d79204177617264732c2034204e6174696f6e616c204177617264732c2037204e6174696f6e616c2046696c6d66617265204d75736963204469726563746f72204177617264732c2031322054616d696c2046696c6d66617265204d75736963204469726563746f72204177617264732061706172742066726f6d2077696e6e696e67204241465441204177617264732c20476f6c64656e20476c6f62652c20437269746963732043686f6963652041776172642c20536174656c6c69746520417761726420616e64206d616e79206d6f7265, 1, 32, 1383935860),
(2, 0x48697020686f7020616e6420526e42, 3, 34, 1384000109),
(3, 0x4d79206661766f726974652073696e676572732061726520416b6f6e2c20456d696e656d20616e64205368616767792e, 2, 34, 1384000171),
(4, 0x48652069732061206c6567656e642e20486973206d7573696320646972656374696f6e2063616e206d616b6520616e79206d6f7669652075707369646520646f776e21, 1, 34, 1384000221),
(5, 0x55206d666b72732c79206469646e20796120737461727469207520616c2064616d206e6967617a206c796b20736967617a206a75732066697265206e20656e64206c796b206173687a2c6f20776f74206420666b207220752077616974696e2e2e696d6120646f672075206c796b20636174732c696d61206b696b20756120617a206461772e2e6f2073696c7920666b72732c6e6f206a656e742075206e6f2c6966206e6f20687661206a6f696e20726170696e20666f782e2e79657020752073656d2069746120626174616c20666120666b727a2e2e6274206920646e20632069742e2e68656b7a20752c6e20646e742068616b20654d75736963, 5, 34, 1384000621),
(6, 0x6f682069206774206c6f747320616b6f6e2c6265796f6e63e82c726968616e6e612c70696e6b2c7368616b6972612c6a6179207a2c6e6520796f2c75736865722c6b616e796520776573742c6c616479206761206761206c6f6c206920636f756c6420676f206f6e2034657661, 2, 35, 1384000780),
(7, 0x796f7572206769726c2064616e636520667265616b792e7368652061696e742070726574656e64206c796b20796f752e7520696e617274697374696320706c61796120776861742075206b6e7720626f757420646f75676873, 5, 35, 1384000816),
(8, 0x546865792062656c6f6e677320746f207468652073616d652066616d696c792e, 4, 35, 1384000878),
(9, 0x6865617679206d6574616c2e, 3, 35, 1384000900),
(10, 0x47726561742053746f7279206920666f756e64206865726521, 1, 35, 1384001046),
(11, 0x333232333233, 5, 32, 1384540191),
(12, 0x344144465341444653414446, 5, 32, 1384540197),
(13, 0x354153444653444641534446, 5, 32, 1384540204),
(14, 0x3641534441465341, 5, 32, 1384540211),
(15, 0x37464447736467736466, 5, 32, 1384540218),
(16, 0x38676473666773646667, 5, 32, 1384540224),
(17, 0x396466736164667364, 5, 32, 1384540234),
(18, 0x31307366646173646673616466, 5, 32, 1384540240);

-- --------------------------------------------------------

--
-- Table structure for table `tbltopic`
--

CREATE TABLE IF NOT EXISTS `tbltopic` (
  `topic_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `text` blob NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_time` int(100) NOT NULL,
  PRIMARY KEY (`topic_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbltopic`
--

INSERT INTO `tbltopic` (`topic_id`, `name`, `text`, `user_id`, `created_time`) VALUES
(1, 'A.R. Rahman...The Music Storm', 0x46696c6d20436f6d706f7365722c20496e737472756d656e616c6973742c2053696e6765722c205265636f72642050726f64756365722c204d7573696369616e2c2050726f6772616d6d65722e2e, 32, 1383935846),
(2, 'Your favourite singer', 0x77686f20697320596f7572206661766f75726974652073696e6765723f20706f737420697420696e20686572652e, 32, 1383935946),
(3, 'Favourite Music Style', 0x57686174277320596f7572204661766f7572697465204d75736963205374796c653f, 32, 1383935996),
(4, 'Rock or Metal?', 0x576861742061726520746865206b657920646966666572656e636573206265747765656e207468657365206d75736963207374796c65733f, 34, 1384000325),
(5, 'Rap Battle (beef)', 0x57686f7a2077616e7420746f2066696768743f, 34, 1384000586),
(6, 'New members in Music Fortress Club', 0x4e6577206d656d6265727320617265207761726d6c792077656c636f6d652121, 36, 1384687699);

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(55) NOT NULL,
  `permission` int(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`user_id`, `username`, `password`, `name`, `email`, `permission`) VALUES
(32, 'rasan', '81dc9bdb52d04dc20036dbd8313ed055', 'Rasan Samarasinghe', 'rasansmn@gmail.com', 1),
(33, 'biks', '6cdbb7905af35b58860fc9a7a34d1cf3', 'sa dfgd', 'biks@gmail.com', 0),
(34, 'subzero', '81dc9bdb52d04dc20036dbd8313ed055', 'Fame Explorer', 'sub.fame@gmail.com', 0),
(35, 'flames', '81dc9bdb52d04dc20036dbd8313ed055', 'Flames Xox', 'flames_xox@yahoo.com', 0),
(36, 'helloworld', '81dc9bdb52d04dc20036dbd8313ed055', 'Nuwan Fernando', 'helloworld@gmail.com', 0),
(37, 'niki', '81dc9bdb52d04dc20036dbd8313ed055', 'nikini perera', 'niki@nikiya.com', 0);
