-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2015 at 03:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `csr`
--

-- --------------------------------------------------------

--
-- Table structure for table `csr_request`
--

CREATE TABLE IF NOT EXISTS `csr_request` (
`serialNumber` int(11) NOT NULL,
  `organizationName` varchar(45) DEFAULT NULL,
  `commonName` varchar(45) DEFAULT NULL,
  `organizationalUnitName` varchar(45) DEFAULT NULL,
  `countryName` varchar(45) DEFAULT NULL,
  `stateOrProvinceName` varchar(45) DEFAULT NULL,
  `emailAddress` varchar(45) DEFAULT NULL,
  `localityName` varchar(45) DEFAULT NULL,
  `username` varchar(45) NOT NULL,
  `digitalsign` varchar(1500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `csr_request`
--

INSERT INTO `csr_request` (`serialNumber`, `organizationName`, `commonName`, `organizationalUnitName`, `countryName`, `stateOrProvinceName`, `emailAddress`, `localityName`, `username`, `digitalsign`, `status`) VALUES
(1, 'Lab ajk', 'ajk', 'admin lab ajk', 'ID', 'East Java', 'mail@ajk.com', 'SUrabaya', 'root', NULL, 0),
(2, 'IF', 'Teknik Informatika', 'TC', 'ID', 'East Java', 'mail@if.com', 'SUrabaya', 'root', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `root`
--

CREATE TABLE IF NOT EXISTS `root` (
  `username` varchar(45) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `pubKey` varchar(1500) NOT NULL,
  `privKey` varchar(1500) NOT NULL,
  `signature` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `root`
--

INSERT INTO `root` (`username`, `passwd`, `pubKey`, `privKey`, `signature`) VALUES
('root', 'root', '-----BEGIN PUBLIC KEY----- MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC9regau/CT9tkwIvX9vzOzmCJd zSBnenvFtid+U/MmlUl1qqRYi3Iq2nCS8WuFA2jWpwjnhlxKyrK19BD+OzFxogpk E3SGezTh2QNg7u/COendr3hYd4P1aqhcpA0S3dUlbBRBb8W4RsGDdo2McWL5cz6U S6QscRknXsZApL50TQIDAQAB -----END PUBLIC KEY-----', ' -----BEGIN RSA PRIVATE KEY----- MIICXwIBAAKBgQC9regau/CT9tkwIvX9vzOzmCJdzSBnenvFtid+U/MmlUl1qqRY i3Iq2nCS8WuFA2jWpwjnhlxKyrK19BD+OzFxogpkE3SGezTh2QNg7u/COendr3hY d4P1aqhcpA0S3dUlbBRBb8W4RsGDdo2McWL5cz6US6QscRknXsZApL50TQIDAQAB AoGBAJ290Lba8Tm8IebcTELYDcEflgT4ICiuPdywnat7WU0O/eZzIPXaEfn9a31o dIhLy5Ynl0oj/QDeDT0wWilzRKvQBvyI4/p1bW31nSyCZuzISWkrhn3QLWR7D8t+ RJrN5iBnfB2hm+KYdO8IXdV/1qQ1g57p78AXXUe20/s27lxpAkEA+sY6oCj9AuWK 7RK3OH3RB1JfI7JPxu0BaKJ2qhGXYQWoVXIOg9MDdPmhRdrP+WSPVyj4Nbnoiqvo B+wff6NPewJBAMGhwzlLDTKReixI4gEhmQvvFoLBvAovds9XHhjLce5rQtF9faAQ fB1gs1qyA3PU35LMkXQZBREZEh2FYBAL3NcCQQCHEubZBbriKImgEIin4P0KGJAu Rgk6eMZdecS47ii/lbCJ9Zlj3/DovNzlJ2sGRef/Zo3rQmvC5b1hJwoAUhKpAkEA uabTe3dOLBH3xcYLi3IfP6X5O11tYYaor5ujq7pEfogxBJMBhBrKJZC15luPm9ua kTG6tEnY5c/X4p4iwL/e+QJBAOJ/zHe954VYN1iab+NLLCw9L+pdVXAy7kJ/XiMy Mr4WD1FcrUqEuU8HDZ5/56ircZp8qXYICsm+T2A8ZK8OHIo= -----END RSA PRIVATE KEY-----', ' -----BEGIN CERTIFICATE----- MIICxzCCAjKgAwIBAgIBADALBgkqhkiG9w0BAQUwgYsxFjAUBgNVBAoMDXRlcmF0 YWkgcHV0aWgxHjAcBgNVBAMMFXd3dy50ZXJhdGFpLXB1dGloLmNvbTEdMBsGA1UE CwwUdGVyYXRhaSBwdXRpaCBzaWduZXIxEjAQBgNVBAgMCUVhc3QgSmF2YTERMA8G A1UEBwwIU3VyYWJheWExCzAJBgNVBAYMAklEMB4XDTE1MDQwNTE0MDUwMloXDTE2 MDUwNTE0MDUwMlowgYsxFjAUBgNVBAoMDXRlcmF0YWkgcHV0aWgxHjAcBgNVBAMM FXd3dy50ZXJhdGFpLXB1dGloLmNvbTEdMBsGA1UECwwUdGVyYXRhaSBwdXRpaCBz aWduZXIxEjAQBgNVBAgMCUVhc3QgSmF2YTERMA8GA1UEBwwIU3VyYWJheWExCzAJ BgNVBAYMAklEMIGdMAsGCSqGSIb3DQEBAQOBjQAwgYkCgYEAva3oGrvwk/bZMCL1 /b8zs5giXc0gZ3p7xbYnflPzJpVJdaqkWItyKtpwkvFrhQNo1qcI54ZcSsqytfQQ /jsxcaIKZBN0hns04dkDYO7vwjnp3a94WHeD9WqoXKQNEt3VJWwUQW/FuEbBg3aN jHFi+XM+lEukLHEZJ17GQKS+dE0CAwEAAaM/MD0wCwYDVR0PBAQDAgEGMA8GA1Ud EwEB/wQFMAMBAf8wHQYDVR0OBBYEFEjNrEoSJxClVUiJr/JxQipkVJrNMAsGCSqG SIb3DQEBBQOBgQBHRP+XHCMAG1XpXsObvvYK8lNaqr9Cr7pmwZQUDYqOJPu7EW8h hHgV9yzaUhJueBrUNVxHIQ1tZ0hg2KhZCehSro2upvMJvX+sjtIziWJyMWhZzCjA oLKnMsAHJoYKEBwVY2xw9o0aZpt1h8sR0VLzSMVgqeIGAovwkxJfvzNcpQ== -----END CERTIFICATE-----');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `csr_request`
--
ALTER TABLE `csr_request`
 ADD PRIMARY KEY (`serialNumber`,`username`), ADD KEY `fk_csr_request_root_idx` (`username`);

--
-- Indexes for table `root`
--
ALTER TABLE `root`
 ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `csr_request`
--
ALTER TABLE `csr_request`
MODIFY `serialNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `csr_request`
--
ALTER TABLE `csr_request`
ADD CONSTRAINT `fk_csr_request_root` FOREIGN KEY (`username`) REFERENCES `root` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
