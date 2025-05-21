-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2025 at 05:38 AM
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
-- Database: `student_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_list`
--

CREATE TABLE `student_list` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `midname` varchar(225) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(225) NOT NULL,
  `program` varchar(225) NOT NULL,
  `religion` varchar(225) NOT NULL,
  `btype` varchar(5) NOT NULL,
  `height` varchar(20) NOT NULL,
  `beneficiary` varchar(225) NOT NULL,
  `yearlevel` varchar(20) NOT NULL,
  `registered` datetime NOT NULL DEFAULT current_timestamp(),
  `images` varchar(255) NOT NULL,
  `dateUpdate` varchar(255) NOT NULL,
  `updateBy` varchar(255) NOT NULL,
  `username` varchar(10) NOT NULL,
  `ismisID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_list`
--

INSERT INTO `student_list` (`id`, `email`, `firstname`, `midname`, `lastname`, `gender`, `dob`, `address`, `program`, `religion`, `btype`, `height`, `beneficiary`, `yearlevel`, `registered`, `images`, `dateUpdate`, `updateBy`, `username`, `ismisID`) VALUES
(2033, '', 'Anot', '', 'Sky', 'Male', '2025-12-31', 'Cabacnitan,Bilar', 'BSA', '', '', '', '', '1st Year', '2025-04-09 19:19:42', '', '', '', 'sky', 0),
(2035, '', 'Joseph', '', 'Mission', 'Male', '2000-12-12', 'Cabacnitan,Bilar', 'BSCS', '', '', '', '', '4th Year', '2025-04-09 21:30:41', 'itachi.jpg', '', '', 'justine', 0),
(2036, '', 'Dars', '', 'Mission', 'Male', '1999-12-29', 'Cabacnitan,Bilar', 'BSCS', '', '', '', '', '4th Year', '2025-04-09 21:33:17', 'ambot.jpg', '', '', 'dars', 0),
(2038, '', 'Dell', 'Asus', 'Lenovo', 'Male', '2023-12-30', 'Cabacnitan,Bilar', 'BSA', 'other', 'AB+', '5\'10\"', 'James Reid Sr.', '1st Year', '2025-04-09 23:05:15', 'ambot.jpg', '', '', 'dell', 192168),
(2039, '', 'Justin', 'Mission', 'Mission', 'Male', '2024-11-30', 'Cabacnitan,Bilar', 'BSA', 'other', 'AB-', '5\'10\"', 'James Reid Sr.', '1st Year', '2025-04-09 23:23:40', 'itachi.jpg', '', '', 'justin', 192168),
(2044, '', 'Michelle Anne ', 'Salaum', 'Mission', 'Female', '2002-11-14', 'Cabacnitan,Bilar', 'BSA', 'INC', 'AB+', '5\'6\"', 'James Reid Sr.', '1st Year', '2025-04-09 23:47:26', 'covid 19.png', '', '', 'anne2', 192168),
(2045, '', 'vanesa', 'padilla', 'geronimo', 'Female', '2012-12-12', 'vanesa@gmail.com', 'BSCS', 'Roman Catholic', 'AB-', '5\'10\"', 'James Reid Sr.', '4th Year', '2025-04-10 11:31:07', 'covid 19.png', '', '', 'vanesa', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `authcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`id`, `authcode`) VALUES
(1, '$2a$04$Ro8nHDIkz.g.341l7cqU3.I5firDXlmyjdtflgvSTSdLDuyJ.YWAi'),
(2, '$2a$04$wFLpL3cObcvlYSLnzTjLQ.MDh.n/w/DGqHAi1WaVyPa3NPyHuBuuS'),
(3, '$2a$04$wxkWQby1YV.21/RlfUbbdOrWfqrk7ZHUYGbwLoDnzV71iK3/aM9rq'),
(4, '$2a$04$BcZp7DnrwwJZQQSDAAiv/u3vcfRz5jpQVC4xvrjJZdIwUqj6exawK'),
(5, '$2a$04$RtoI8H5WzBgETl6q9UtML.dwX534Nk0n0jFzPHDqw5FOmDC6nNy/O'),
(6, '$2a$04$V5ddgBEo5yk1lfqKTBUKsOZQf/IbeSpCFuywqVlEzFix4s//v8N3G'),
(7, '$2a$04$NXxxu8HTFpwpLe98WyT9POIuN6Ehc/gTMQpZllCP1OirfACkbdBge'),
(8, '$2a$04$2odJ.EnBLgbYfc55o2FoGuRZnRBwcWNLrX.zSp989YapeWHxS.tpi'),
(9, '$2a$04$c6/.w6g1YmEtmGMV.yoLFukMCbxhVOofrJN952/NkhtFstK9zhnkW'),
(10, '$2a$04$z/TDcJBUQfLrbUcIN0Epgur4mxAn0K/4eeSskDwz4CpoBOccWVfVO'),
(11, '$2a$04$YAbSKvLFtYbFmK.TlM4taei07MTzvJh2bUX/Gttl3xfu3gp.tc2sK'),
(12, '$2a$04$r631CpieQvJ0REnj3R/VYulfYxNAqJJoVEzNpRFrr9hQEDrVNugHy'),
(13, '$2a$04$JJLHfyw.PgEo8qzyvZgYb.h8VzZ8lI837T7DUEGGgH45pMHKgeFaq'),
(14, '$2a$04$2VjeH6niTDj6zzEkMIHYSOtEZraxoNzAf9EUpopqcB8Ikp1YjYyeK'),
(15, '$2a$04$fvnjfmAqJ/j2vgiGMvZu8u03Pit3ULbui28oq475gzCLocxPWdCEa'),
(16, '$2a$04$C4xEGFKwhSKOBIQTye.KYONDqDAgsI/C9l4DuKKJIux3HLxuasVP2'),
(17, '$2a$04$lD4jELNGtskDleKPQUdzyOk4U8b8jcq9lkFxU6ENzR.tfsWj2uDgG'),
(18, '$2a$04$CwTiX71pkpIX26XMS4Ds4.LwjYWIE1jeXMys1o.nj1hnqYqtpKqCu'),
(19, '$2a$04$o6gL2m21p0i0l3CoYx5SXuE.iu0zslZoHhEIZLbsfMcIOpIFMeCbO'),
(20, '$2a$04$4ZEAXz5FDsjw3sqzucsAIefszjpUu.QjHXKzjoVf3KF7vQd061AhO'),
(21, '$2a$04$CN4XXTg1mYTnr.WvlIrWm.26nSpfZ7BMPhmw64GnFYGHCpudA6Nv.'),
(22, '$2a$04$kxy93LzQ111ZH4JDWijMJO1kVDp8yuCFisnaoGW46GzeLMX/gPI1a'),
(23, '$2a$04$EzpFyKrtjgHHEeIHkCKLmeUrxyTtssVYbv8SzId.IJuJYcSohfVPa'),
(24, '$2a$04$.kMkLk.wCbpXmE.bIaakgO4Ts4X5urdNyJQnrhX2eIVGcOpeCGn3G'),
(25, '$2a$04$HwF0d.B0jk0.mc9dUEw1ZeAPRVXQHZdw4k6fRuTWkAFcQpwM3ctDi'),
(26, '$2a$04$ZmV2QYS8A4tJllxO1jLjx.QlNw6CjarL95fXbjHdIjbgwhNgvrrDu'),
(27, '$2a$04$OI67aEYVi70DLbjO.rFdHuTODiR0BLp8R6U7BafwDUVAIJS4O1zb6'),
(28, '$2a$04$JjSc699SPqsyV14cjKU2Me3tzKRq0G8/h.h9CSi/gqvdp8c30crgO'),
(29, '$2a$04$Y445geBb4m/X75x01lUBxeflAtgptHEd0ruOgGKOZ0JzRCS/wfq1a'),
(30, '$2a$04$JhVieGWCy5w0THK3TsrRMehNqJ3xLSl2bZ0xg3evCKrpL6Sg8.VAK'),
(31, '$2a$04$izPTCv45gaEAMXDYBjkOLOeHcEn/VE5lWPE9snVOrfiKZrE9KjkTq'),
(32, '$2a$04$ERejPCkH7ITpNfiRYoSi4ONRmPTroEEUqoTMrXgwc5b6vmMdPr14y'),
(33, '$2a$04$P.40mQuPk4BXIJ2iBJF4SOBakdJfOQaQ3vhhThgp6Z03bH59ULik6'),
(34, '$2a$04$4M79y0fSNFB7vnxfmorWTufuY0.pIvFL1U8KBMcxGu/U75ad6mnEG'),
(35, '$2a$04$rHPwC7RS5AcyXnXbhfhSVOruHg7RzYnQMu7TOWI8YECUOpH1xc1vW'),
(36, '$2a$04$SmbKoCBSEAMCVVR7LXhNPumCrl3GJELajGcRp6U1r0cwExPbEIkS.'),
(37, '$2a$04$8pLL.a21T3pBHVIAdqMco.EeInc3eBRaJqS6mPtQTJltgtBervOM.'),
(38, '$2a$04$NlT.5tMdpXh80zuBpN3qeOMC/nHswUIf4HKLX1Tx5K4GIBY4B0rV6'),
(39, '$2a$04$XZi6XjX7IUCyx7Fyvm7XSON6Tj8wsYrIf83XzMhMtLph1vYgECbJ6'),
(40, '$2a$04$LE2e.mvy5SOQhWUumxPyX.P.8KebtqDaShFThUmeqFC44YNmS3Weq'),
(41, '$2a$04$L54KnP40NsoVUh5n3VjGS.o6CzW2fO47XWd8ll7gXgpv.mhmN.VQG'),
(42, '$2a$04$iocM61XUJKOihZRHHkAv4.fPI6X/fSvR9Nk5yES3c.aanHkDZ3ALS'),
(43, '$2a$04$c1IMmyLCuu7hvy9AlQ6OSuBxKK3ZtA/mOaWw8pI08H.xioPbe00xu'),
(44, '$2a$04$Gk3Ieck9ib6UmbttXmFqj.g6R/HIvccn9jz9/pZ5FxTO01/OhFX.6'),
(45, '$2a$04$o93psG2CGbk20JyQvxefV.xYtREoPDrInOYZZq2rjuaAoVEjumVG.'),
(46, '$2a$04$vawIUJmfQFZ/eWEzB7fbjOdAwP2HL4Db8HmU00FEz2Z5/4A3nwTDe'),
(47, '$2a$04$e218DAJj9J3s/8KSCpgaRe3d0Ci7m5IakUScuCIEfE4TskXsjdkWC'),
(48, '$2a$04$jdl9aGUnBkL58SnFXUYIXO0xJ4uTzYPtCQv2.AOC0RQU7SZVj2Lpy'),
(49, '$2a$04$LgXoaI/SHa.Yr3h4dUxJhOb2tBbEtMCOrg8OKGk1qTLzOyP1To1uW'),
(50, '$2a$04$/nRAn6Xvi4WASXqOKgsGPeDnD7ExFu34LG30.0ZUDGPP3Byd6EvNG'),
(51, '$2a$04$bJcd1aNev0HR9Ny.27BQkeX6biweSxhWi1Chwg2MkP6TM790IDOF2'),
(52, '$2a$04$TZcpl3O0IqtA51b/vsxksua/GrSc37W35fY1WGx/K0SNbc3Mf2fLW'),
(53, '$2a$04$jMBRgy8FQ.nVnRI1OaCbLeOqwy51PYH8pmG1hq3/z7dRa/FuaKNCe'),
(54, '$2a$04$r5Gx/dn7R/WiGHBLyf7IjOueT/chdr0Aek0WkcqZFjfGwjYfXGjGi'),
(55, '$2a$04$Olc3yDFXaFXHn1tiufQln.HxSQrRmPmIxn9lPkTjs17/dEzaPGSBm'),
(56, '$2a$04$C1NJx8nDgSYj/3d9II9GS.nlpNzWsYaJVrWXYc./r9jGrL5RBSzBe'),
(57, '$2a$04$gp79Ag9rrszK5R9nfDft2OW9JbhIA4JOatpfsWafT5G1jSg//Y2P6'),
(58, '$2a$04$zQdQax7UnjfF0CuQO5paze60VZ7kyHl4moU4mZOTEmgtQILMolIt.'),
(59, '$2a$04$KQIgSTK/ZKhEGvu40DQjn.JqDSRcO5iS50q2l1Hw4z822enjk1PSy'),
(60, '$2a$04$I0EdSJHkm0Iewr0S5ob5Q.uhRi/GtaAXcWEHv6Y6PF0UKOBqJlsvq'),
(61, '$2a$04$9J9FxSyfdXo3NA36kfRDgezt4yXiRhWCjVoD1BPZ7lSVBaLWqsCO6'),
(62, '$2a$04$zep/JRVJDEV5aIKHC0nHcu9Fgwtpk1wc.7atGOea0mdrhG/XT/Rdy'),
(63, '$2a$04$fVRk5Iza.DwSXpV2SegptOBhS.uZXj/iGLQ09xRH5cQNM3Uqk.SZi'),
(64, '$2a$04$8R31N.yl6YVJPimm0O3TtuS5T5jz.ZU6jrWVausQl7as6Q6B/Vsa.'),
(65, '$2a$04$Fy8ctXiTzWxWZlAbe8PJDOhFp5r6VdKvK0qKEExs.Wig857qmTtJa'),
(66, '$2a$04$z7FLZbCQnIGOHmOF.LkYq.5w0iUH0DtRq356zBWiXyxrY5e7.9bz2'),
(67, '$2a$04$kYPHPObKOkew3mIYkia4EecYKtldq1MRVTEdPbDns2pcpyAgmvIjC'),
(68, '$2a$04$zYlmuVFgyfbMjSa86SEHqeqfMgcDRUJjZFtugmVSm9pyWpmeRJI.2'),
(69, '$2a$04$5709fXO/E3mh76UaJtNs4.GUI8HqZu.uMKAOV7eWRSgLM4I1SN0IC'),
(70, '$2a$04$EHRSrzf916PNJFkVCi6ts.p6rJ0YWBPnkZJWu/qdgWekwecRpoStq'),
(71, '$2a$04$eAKBwtCj5P187YvRX7gK..nAhpRMaGSLKuIrZ8tOdXFUUYOp2LMmS'),
(72, '$2a$04$Xtra6se2CyUALKPk5nkXPuWRf0C00I.cG1e4M1d1rf4sBdB4yYoJe'),
(73, '$2a$04$ate21ZhonMz4cAYLFCprA.laLwZ1TPj7BUwKNn.fs323J9c.4EBuy'),
(74, '$2a$04$RPf.5VOv.cmzD70c6wnco.r5MXCE9TjEG2L96uk6eJWZKy0OohGAa'),
(75, '$2a$04$BwNbdVh6.O6JurQjaUjOPuQuBUB9JYKHPiLHO8P7i4z/w7mcqpzYq'),
(76, '$2a$04$3GL.gi29GHukA25w0j5T6eT9TQh7m8s2MSR98VQpeVsqvwFw9li1C'),
(77, '$2a$04$hmzyxmUNtJBA5UslzeioOOLbIO3HTI10.BPRflU3DVo9DvBs90yQu'),
(78, '$2a$04$YbAHeuA2OxOxF.7ec39IPO1VoXu5ED1TYUbcZFpg.Qbd9/Xkbofv.'),
(79, '$2a$04$LwhXs/SL4keqJr9yQt.cAef7GQcJQU0crgz5LTr6KBGKu4Yqfr2vC'),
(80, '$2a$04$XqfjRSx/zH2i92oWFGw3.uGbzt1mzLjDEQr7/4W7k07MYLjEj/vF2'),
(81, '$2a$04$AxByOLwsO6VJmLGeW.1jduremYIY/w8Oj6xX6TMV9eI4UNl02duCC'),
(82, '$2a$04$gu7UKJZSYFusNlRakeASkOEtpyGc/UNvGIe2oqlGkw6mmAWbFYN7O'),
(83, '$2a$04$0fVVmNEqMn9LJeBERUSOWufKdwv/OOmpymwluDHIK7nQXMmoFHG8i'),
(84, '$2a$04$W7kP8aNhAMF0xT6MmXv/DOMXjYOSrNTMTyVdxhTVjtJ/KoA1Gw/Sa'),
(85, '$2a$04$0eVtImQALZYsh8VVFteoQ.5dOJtyKNHzHmSYKF7yE5zml7PuuMHru'),
(86, '$2a$04$hPeWiFo7WjFB4.8jS43hIO1cyMKhaYE3pfFzJ6BuIxbeIAbNwXDYG'),
(87, '$2a$04$TS7.CaTGWfknVUMe/.axGuDK8ZPGjcH5wpnYhUUkBQVMLhl407bVC'),
(88, '$2a$04$ufzr9bXLuel8hOmpkfrMiutgq.nFfXUayH1eubGB35kikATNgajFK'),
(89, '$2a$04$.To55kU.jONaHDLxCYuew.EZTdvl55jy/54SMt6TuLHmfLstX6Kl2'),
(90, '$2a$04$RLXgKpcL3rfAOErSgLDbxuGkBoVl88x.9x9yFGaWrvk.vlHvE8ohm'),
(91, '$2a$04$IHcUik.NtOkrtqnT9eaKb.m1oe5aFwmUwbZLPacY5W.gjAkbHxVM6'),
(92, '$2a$04$8T4i3PHZXUPsohu0LiGN1ePjLdcCQj365X/rJU9fNYPEUZ6bjxSQW'),
(93, '$2a$04$TkaBpwB7O7PyNbbKVNK/2eVy5sQuuFGDiWPtn5LARZxQbeLD3qM0S'),
(94, '$2a$04$TP4UjLrAf1DTzJUne6Lq5ugADTZnNaV5eQiM/AHDKQTzrVBDNTUFO'),
(95, '$2a$04$r4G3SgQ6bSf1IzVZDrvc5ONih4xAVJDzJaAX2dSjqIay8ssruVyEG'),
(96, '$2a$04$cRexZ3LmIX3YZCSbVl1Qx.D/QMHVh1q/GZhv7xfJbUItaZaLg4Gb.'),
(97, '$2a$04$i1YwiYKCMjSynJRFsX6Vf.Z7zXTsriTIJXVC7KIqTK7vMAOp2EIbe'),
(98, '$2a$04$E9gh3ytTlpYvgtG8kQheg.SqXlJQdxjcxM267TnGlCtfURPqo4AIa'),
(99, '$2a$04$xiLKUViSO56Y4FaUjDcRA..R6qW4ENCYsZZzADYU6bCebHTeW/mRm'),
(100, '$2a$04$Lvf6ZIlJbgyZLtaciwx61OzfrgavF20ubk9DhRFu6TEKK9fGAF2LK');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access` varchar(255) NOT NULL,
  `created` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `access`, `created`, `user_id`) VALUES
(1, 'jose', 'asd123', 'ADMIN', '', 0),
(33, 'shenzaemon', 'asd123', 'USER', 'YES', 0),
(34, 'jometh12', '11122000', 'USER', 'YES', 0),
(35, 'jometh123', '11122000', 'ADMIN', '', 0),
(37, 'sky', 'asd123', 'USER', 'YES', 0),
(38, 'James', 'asd123', 'USER', 'YES', 0),
(39, 'jason', 'asd123', 'ADMIN', '', 0),
(40, 'Bruno', 'asd123', 'ADMIN', '', 0),
(41, 'justine', 'asd123', 'USER', 'YES', 0),
(42, 'dars', 'asd123', 'USER', 'YES', 0),
(43, 'dell', 'asd123', 'USER', 'YES', 0),
(44, 'justin', 'asd123', 'USER', 'YES', 0),
(45, 'anne2', 'asd123', 'USER', 'YES', 0),
(46, 'vanesa', 'vanesa', 'USER', 'YES', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_list`
--
ALTER TABLE `student_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
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
-- AUTO_INCREMENT for table `student_list`
--
ALTER TABLE `student_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2046;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
