CREATE DATABASE IF NOT EXISTS `db_old_dulcendo_events` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `db_old_dulcedo_events`;

-- --------------------------------------------------------

--
-- Table structure for table `applicant`
--

CREATE TABLE `applicant` (
  `id` int(11) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `gender` enum('f','m') NOT NULL,
  `birthDate` date NOT NULL,
  `instagramUsername` varchar(100) NOT NULL,
  `postalCode` varchar(8) NOT NULL,
  `email` varchar(250) NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = no / 1 = yes',
  `aboutUs` int(11) NOT NULL,
  `otherSource` varchar(100) DEFAULT NULL,
  `profileImg` varchar(250) NOT NULL,
  `cell` varchar(10) NOT NULL,
  `guardian_firstname` varchar(50) DEFAULT NULL,
  `guardian_lastname` varchar(50) DEFAULT NULL,
  `guardian_address` varchar(50) DEFAULT NULL,
  `guardian_phone` varchar(10) DEFAULT NULL,
  `guardian_phone2` varchar(10) DEFAULT NULL,
  `guardian_email` varchar(50) DEFAULT NULL,
  `relation` varchar(50) DEFAULT NULL,
  `talent_agency` varchar(1) DEFAULT 'n',
  `modelling_agency` varchar(1) DEFAULT 'n',
  `actra` varchar(1) DEFAULT 'n',
  `uda` varchar(1) DEFAULT 'n',
  `theater` varchar(1) DEFAULT 'n',
  `height` varchar(5) DEFAULT NULL,
  `bust` varchar(5) DEFAULT NULL,
  `waist` varchar(5) DEFAULT NULL,
  `hips` varchar(5) DEFAULT NULL,
  `idEvent` int(11) NOT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1 = step 1 / 2 = finalist'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicant`
--

INSERT INTO `applicant` (`id`, `lastname`, `firstname`, `gender`, `birthDate`, `instagramUsername`, `postalCode`, `email`, `newsletter`, `aboutUs`, `otherSource`, `profileImg`, `cell`, `guardian_firstname`, `guardian_lastname`, `guardian_address`, `guardian_phone`, `guardian_phone2`, `guardian_email`, `relation`, `talent_agency`, `modelling_agency`, `actra`, `uda`, `theater`, `height`, `bust`, `waist`, `hips`, `idEvent`, `status`) VALUES
(40, 'Rivest', 'Oli', 'm', '1993-11-28', '', 'H3c0r2', 'olivier.rivest@hotmail.com', 1, 3, NULL, 'resources/pictures/applicant/40/Rivest40_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(41, 'Langlois', 'Roxanne', 'f', '1994-12-18', 'Roxannelangloisc', 'J5y1a7', 'roxanne.l.c@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/41/Langlois41_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(42, 'Desrochers', 'Émilie', 'f', '1998-12-22', 'emiliedesrochers', 'J6e7k6', 'emilie-desrochers@hotmail.fr', 1, 6, NULL, 'resources/pictures/applicant/42/Desrochers42_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(43, 'Girard', 'Catherine', 'f', '2000-05-29', 'cathgirardl', 'J0k2m0', 'girardcatherine9@gmail.com', 1, 1, NULL, 'resources/pictures/applicant/43/Girard43_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(44, 'Santana', 'Francisco', 'm', '2000-03-23', 'Cocosantanaguervara', 'J0k2n0', 'co.santana@hotmail.com', 1, 5, NULL, 'resources/pictures/applicant/44/Santana44_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(45, 'Vézina', 'Gabriel', 'm', '1996-07-16', 'Gabrielvezina', 'J0K 2E0', 'gabriel.vezina18@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/45/Vézina45_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(46, 'Andrea', 'Theodore', 'f', '1997-03-01', 'Misthe0r', 'J6e4b2', 'ciel1888@live.ca', 1, 5, NULL, 'resources/pictures/applicant/46/Andrea46_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(47, 'Bryan', 'Theodore', 'm', '1995-12-30', '', 'J6e4b2', 'maratoki@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/47/Bryan47_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(48, 'Fernando', 'Jose santana carvajal guevara', 'm', '2000-03-23', '', 'J0k2n0', 'XxfernandoSPxX@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/48/Fernando48_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(49, 'Grenier', 'Daryann', 'f', '2002-04-06', 'daryann._grenier', 'J0K 2X0', 'daryann.grenier@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/49/Grenier49_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(50, 'Lisa', 'Fanning', 'f', '1997-07-27', '', 'Jok2k0', 'lisa@live.ca', 1, 1, NULL, 'resources/pictures/applicant/50/Lisa50_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(51, 'Brisson', 'Camille', 'f', '2000-03-24', 'camillebrisson', 'J5y4e4', 'micce@live.ca', 1, 1, NULL, 'resources/pictures/applicant/51/Brisson51_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(52, 'Brisson', 'Camille', 'f', '2000-03-24', 'camillebrisson', 'J5y4e4', 'micce@live.ca', 1, 1, NULL, 'resources/pictures/applicant/52/Brisson52_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(53, 'C. Kastner', 'Charles', 'm', '1995-10-25', 'German.men_kastner', 'J6e3z1', 'charleskastner_prso@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/53/C.Kastner53_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(54, 'Desrochers', 'Meggan', 'f', '1999-09-07', '', 'Jok2ro', 'meg.1999@live.ca', 1, 1, NULL, 'resources/pictures/applicant/54/Desrochers54_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(55, 'Courtemanche lachapelle', 'Alix ', 'm', '1997-11-08', 'god_xila', 'J5w1n8', 'xila_c.l@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/55/Courtemanchelachapelle55_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(56, 'Douste', 'Mariana', 'f', '1999-05-09', 'mariana.douste', 'J6E1T4', 'marianadouste9@gmail.com', 1, 1, NULL, 'resources/pictures/applicant/56/Douste56_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(57, 'Fortin', 'Emilie', 'f', '1999-06-26', '_emilie17_', 'J6E 9E4', 'mimi-soccer5@hotmail.com', 1, 4, NULL, 'resources/pictures/applicant/57/Fortin57_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(58, 'Voynnet', 'Léa', 'f', '1999-12-02', '', 'J5Y 3V6', 'lvoynnet@yahoo.com', 1, 1, NULL, 'resources/pictures/applicant/58/Voynnet58_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(59, 'Gariépy', 'Mariane', 'f', '1998-10-24', 'mariane87', 'J6e6b7', 'mariane2498@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/59/Gariépy59_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(60, 'Laporte', 'Amelie', 'f', '1999-05-01', 'amelielaporte_', 'J6e 4b2', 'amelie-blanche@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/60/Laporte60_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(61, 'Champagne', 'Yoann', 'm', '2017-04-16', 'yoann champagne', 'J0k1k0', 'yoannchampagne10@gmail.com', 1, 6, NULL, 'resources/pictures/applicant/61/Champagne61_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(62, 'Laforce', 'Lydia', 'f', '2017-01-27', '', 'J0K 1S0', 'lydia_laforce@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/62/Laforce62_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(63, 'Racicot', 'Samuel', 'm', '1990-07-18', 'Samuel_racicot', 'J3y 2s6', 'samuel_racicot@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/63/Racicot63_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(64, 'Clermont de Foy', 'Carolane', 'f', '2002-09-19', '', 'J5T 2E5', 'carolanec19@gmail.com', 1, 5, NULL, 'resources/pictures/applicant/64/ClermontdeFoy64_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(65, 'Bossé', 'Maggie', 'f', '2017-06-17', 'maggieb07', 'J0K 3A0', 'maggiebosse07@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/65/Bossé65_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(66, 'Horan', 'Gabriel', 'm', '1999-01-09', 'g.a.b.i.s.h', 'J0k1a0', 'gabrielhoran@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/66/Horan66_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(67, 'Bénard', 'Julyann', 'f', '1998-06-16', 'Julyannbenard', 'J6e 8m9', 'julyann_benard@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/67/Bénard67_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(68, 'Plante', 'Denis', 'm', '1960-07-01', '', 'Jok1x0', 'plad6001@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/68/Plante68_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(69, 'Aubin', 'Helene', 'f', '1959-03-07', '', 'J0k2m0', 'heleneau@hotmail.ca', 1, 5, NULL, 'resources/pictures/applicant/69/Aubin69_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(70, 'Arbour purcell', 'Yoan', 'm', '2003-02-06', 'Yo_hp', 'J0k3e0', 'yoanarbourp@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/70/Arbourpurcell70_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(71, 'Purcell', 'Kymie', 'f', '1999-10-27', 'kymiea11', 'J0k3e0', 'kymieap9@icloud.com', 1, 5, NULL, 'resources/pictures/applicant/71/Purcell71_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(72, 'Dionne', 'William', 'm', '1998-03-08', 'Le__flingue', 'J0k1w0', 'wildionne@live.fr', 1, 0, 'Affiches des Galeries', 'resources/pictures/applicant/72/Dionne72_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(73, 'Lareau', 'Maxym', 'f', '1998-05-03', 'maxelareau', 'J6E 3L3', 'maxymelareau@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/73/Lareau73_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(74, 'Desfossés', 'Benoit', 'm', '1999-09-09', 'Unclebenzzz', 'J6e6s8', 'benoit.des99@icloud.com', 1, 5, NULL, 'resources/pictures/applicant/74/Desfossés74_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(75, 'Martel laroche', 'Chloe', 'f', '1990-06-02', '', 'J0k1b0', 'chloemartel-laroche@hotmail.fr', 1, 0, 'En p de sonne', 'resources/pictures/applicant/75/Martellaroche75_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(76, 'GABRIEL', 'Gabriel', 'm', '1996-07-16', '', 'J0k1s0', 'gab.16@hotmail.ca', 1, 5, NULL, 'resources/pictures/applicant/76/GABRIEL76_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(77, 'Goyet', 'Félyxantoine', 'm', '1999-12-20', 'felyxantoine_goyet', 'J6e1y7', 'labombe-fa@live.fr', 1, 5, NULL, 'resources/pictures/applicant/77/Goyet77_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(78, 'Harnais-Gagnon', 'Samuel', 'm', '2000-03-07', '', 'J0K1S0', 'gagnonsamuel584@gmail.com', 1, 2, NULL, 'resources/pictures/applicant/78/Harnais-Gagnon78_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(79, 'Mcumbe', 'Byaombe', 'm', '1998-03-13', 'byao_mc13', 'J0K 3E0', 'skwa13@hotmail.com', 1, 5, NULL, 'resources/pictures/applicant/79/Mcumbe79_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(80, 'Haché', 'Lindsay', 'f', '1998-09-10', 'lindsayhache', 'J0k1s0', 'lindsou@hotmail.ca', 1, 1, NULL, 'resources/pictures/applicant/80/Haché80_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(81, 'Desrosiers ', 'Raphaelle', 'f', '1998-07-02', 'Raphaelle Desrosiers', 'Jok 3A0', 'raphidou007@live.ca', 1, 2, NULL, 'resources/pictures/applicant/81/Desrosiers81_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(82, 'Audegond', 'Zhéa', 'f', '2000-05-08', 'zhea_xx', 'J6E 5W4', 'zhea08@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/82/Audegond82_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(83, 'Massicotte', 'Karolyne', 'f', '2000-12-09', '', 'J0k2t0', 'melanie.jamika@hotmail.com', 1, 5, NULL, 'resources/pictures/applicant/83/Massicotte83_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(84, 'Penasse', 'Jordan', 'm', '1998-01-07', 'jordanpenasse', 'J0k2Y0', 'jordanpenasse@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/84/Penasse84_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(85, 'Natural', 'Karim', 'm', '1999-11-25', 'Natural tj', 'J6E4H2', 'abdulkarim.natural@yahoo.com', 1, 1, NULL, 'resources/pictures/applicant/85/Natural85_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(86, 'Uwase', 'Anick', 'f', '2001-11-25', 'nicknick_nandy', 'J6E4H2', 'uwaseanick.nandy@yahoo.com', 1, 5, NULL, 'resources/pictures/applicant/86/Uwase86_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(87, 'Mukusi', 'Winnie nisha', 'f', '1992-07-22', 'super_diva_ninisha', 'J6E 4H2', 'muwinnie@gmail.com', 1, 5, NULL, 'resources/pictures/applicant/87/Mukusi87_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(88, 'Yesica nathalia', 'Arbelaez cortez', 'f', '2002-11-02', 'Jesica.arbelaez', 'J6E8W1', 'jaquesrobitaille@me.com', 1, 1, NULL, 'resources/pictures/applicant/88/Yesicanathalia88_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(89, 'Robitaille', 'Jacques', 'm', '1951-04-22', '', 'J0K2M0', 'jacquesrobitaille@me.com', 1, 1, NULL, 'resources/pictures/applicant/89/Robitaille89_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(90, 'Raphael', 'Purdy', 'm', '2001-08-23', 'Raphaël Purdy', 'J0k3e0', 'raphaelp2723@gmail.com', 1, 5, NULL, 'resources/pictures/applicant/90/Raphael90_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(91, 'Arbelaez cortez', 'Luz dary ', 'f', '1997-03-02', '', 'J6E8w1', 'jacquesrobitaille@me.com', 1, 1, NULL, 'resources/pictures/applicant/91/Arbelaezcortez91_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(92, 'Arbelaez cortez', 'Luz dary ', 'f', '1997-03-02', '', 'J6E8w1', 'jacquesrobitaille@me.com', 1, 1, NULL, 'resources/pictures/applicant/92/Arbelaezcortez92_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(93, 'Malango', 'Mcumbr', 'f', '1994-04-23', 'malangomc', 'J0k3e0 0', 'cool-m.m@hotmail.com', 1, 5, NULL, 'resources/pictures/applicant/93/Malango93_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(94, 'Sarrazin', 'Alice', 'f', '1999-11-23', 'alicesarrazin_', 'Jo1c0', 'alicesarrazin57@gmail.com', 1, 1, NULL, 'resources/pictures/applicant/94/Sarrazin94_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(95, 'Deguire', 'Bianca', 'f', '2001-05-10', 'Bibi_deguire21', 'J5m1e3', 'biancahddeguire@gmail.com', 1, 0, 'Centre dachar', 'resources/pictures/applicant/95/Deguire95_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(96, 'Corfield', 'Beldandy', 'f', '2000-09-04', 'Beldandycorfield', 'Jok 2mo', 'beldandycc@gmail.com', 1, 0, 'Centre d\'achat ', 'resources/pictures/applicant/96/Corfield96_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(97, 'Mondor', 'Catherine', 'f', '2001-09-27', 'catherine_mondor', 'J0K 1E0', 'catherine.mondor1@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/97/Mondor97_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(98, 'Beaucage', 'Thomas', 'm', '2001-08-17', 'thomas_beaucage', 'J6E 8M9', 'mouki2000@gmail.com', 1, 0, 'On m\'a abordé', 'resources/pictures/applicant/98/Beaucage98_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(99, 'Kazamwali', 'Queen veronique', 'f', '2002-02-20', 'Kaz.queen', 'H3s1w9', 'queenveronique0001@cssamares.qc.ca', 1, 5, NULL, 'resources/pictures/applicant/99/Kazamwali99_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(100, 'Painchaud', 'Nadia', 'f', '1974-06-05', '', 'J0k3l0', 'nadiapainchaud@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/100/Painchaud100_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(101, 'Kassouati', 'Myriam', 'f', '2008-01-23', '', 'Jok3l0', 'mkassouati@gmail.com', 1, 1, NULL, 'resources/pictures/applicant/101/Kassouati101_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(102, 'Kassouati', 'Sara', 'f', '2012-06-27', '', 'Jok3lo', 'mKassouati@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/102/Kassouati102_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(103, 'Diagana', 'Bocar', 'm', '1984-09-24', '', 'J0k3e0', 'diaguis2001@yahoo.fr', 1, 1, NULL, 'resources/pictures/applicant/103/Diagana103_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(104, 'Loubier', 'Olivier', 'm', '1997-05-26', '', 'J6e2l3', 'loyeraph@hotmail.fr', 1, 1, NULL, 'resources/pictures/applicant/104/Loubier104_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(105, 'Loubier', 'Olivier', 'm', '1998-01-25', 'Olivier Loubier', 'Jok1c0', 'olivierloubier@gmail.com', 1, 1, NULL, 'resources/pictures/applicant/105/Loubier105_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(106, 'Rowan', 'Elise', 'f', '1984-07-01', '', 'H2t1k5', 'elise_rowan@yahoo.ca', 1, 6, NULL, 'resources/pictures/applicant/106/Rowan106_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(107, 'Dudemaine', 'Magali', 'f', '1980-03-16', '', 'J0k3L0', 'magou99@hotmail.com', 1, 1, NULL, 'resources/pictures/applicant/107/Dudemaine107_faceShot.jpg', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 13, 1),
(108, 'Martin', 'Arnaud', 'm', '1985-05-07', 'noInstagram', 'terber', 'test@test.com', 1, 6, NULL, 'resources/pictures/applicant/108/Martin108_faceShot.png', '5555555555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', '0.0', '.', NULL, NULL, 10, 2),
(111, 'Martin', 'Arnaud', 'm', '1985-05-16', '', 'H1H 1H1', 'asasa', 1, 0, NULL, 'resources/pictures/applicant/111/Martin111_faceShot.jpg', '555 555 55', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 10, 1),
(112, 'Sainjour', 'Josue kenan', 'm', '2017-12-05', 'Josks', 'H1E 1M5', 'jsainjour@hotmail.com', 1, 6, NULL, 'resources/pictures/applicant/112/Sainjour112_faceShot.jpg', '514-638-61', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', NULL, NULL, NULL, NULL, 14, 1),
(113, 'Bélisle', 'Maïka', 'f', '2001-09-26', 'maikabelisle26', 'G9H 4T9', 'belislema01@ecole.csriveraine.qc.ca', 1, 1, NULL, 'resources/pictures/applicant/113/Bélisle113_faceShot.jpg', '819-995-04', 'sdfasd', 'fasdfas', 'dfasdf', NULL, NULL, NULL, NULL, 'n', 'n', 'n', 'n', 'n', '0.0', '.', NULL, NULL, 14, 2);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description_en` varchar(400) DEFAULT NULL,
  `description_fr` varchar(400) DEFAULT NULL,
  `date` date NOT NULL,
  `partnerName` varchar(100) NOT NULL,
  `partnerLogo` varchar(150) DEFAULT NULL,
  `eventTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description_en`, `description_fr`, `date`, `partnerName`, `partnerLogo`, `eventTheme`) VALUES
(1, 'dulcedoT', 'vewvewvewvvvd', '', '2017-05-18', 'Image motion', NULL, 1),
(10, 'Model search', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', '2017-05-15', 'Model search', NULL, 1),
(13, 'Galeries Joliette', 'Les Galeries Joliette makes place for fashion and beauty and recognise talent and diversity.', 'Les Galeries Joliette font de la place pour la mode et la beauté et reconnaissent le talent et la diversité.', '2017-05-26', 'Galeries Joliette', 'resources/pictures/eventsLogo/13/GaleriesJoliette13_logo.png', 2),
(14, 'Galeries St-Hyacinthe', 'Bienvenue au Model Search Dulcedo aux Galeries St-Hyacinthe!', 'Welcome to the Model Search Dulcedo at Galeries St-Hyacinthe!', '2017-10-14', 'Galeries St-Hyacinthe', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE `sources` (
  `id` int(11) NOT NULL,
  `name_en` varchar(50) NOT NULL,
  `name_fr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`id`, `name_en`, `name_fr`) VALUES
(1, 'Social Networks', 'Réseaux Sociaux'),
(2, 'Web', 'Web'),
(3, 'Radio', 'Radio'),
(4, 'Newspapers', 'Journaux'),
(5, 'Posters', 'Affiches'),
(6, 'Word of mouth', 'Bouche à oreille');

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`) VALUES
(1, 'funky_yellow'),
(2, 'galerie_joliette');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicant`
--
ALTER TABLE `applicant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sources`
--
ALTER TABLE `sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicant`
--
ALTER TABLE `applicant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `sources`
--
ALTER TABLE `sources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
