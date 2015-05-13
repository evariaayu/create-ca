-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Mei 2015 pada 08.10
-- Versi Server: 5.6.21
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
-- Struktur dari tabel `csr_request`
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
  `status` tinyint(1) NOT NULL,
  `statusrevoke` tinyint(1) DEFAULT NULL,
  `crlsignature` varchar(1500) DEFAULT NULL,
  `revokereason` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `csr_request`
--

INSERT INTO `csr_request` (`serialNumber`, `organizationName`, `commonName`, `organizationalUnitName`, `countryName`, `stateOrProvinceName`, `emailAddress`, `localityName`, `username`, `digitalsign`, `status`, `statusrevoke`, `crlsignature`, `revokereason`) VALUES
(1, 'Lab ajk', 'ajk', 'admin lab ajk', 'ID', 'East Java', 'mail@ajk.com', 'SUrabaya', 'root', NULL, 1, NULL, NULL, NULL),
(2, 'IF', 'Teknik Informatika', 'TC', 'ID', 'East Java', 'mail@if.com', 'SUrabaya', 'root', NULL, 0, NULL, NULL, NULL),
(3, 'www.evariaayu.com', 'Evaria Ayu', 'Tech Department', 'Pontianak', 'Kalimantan Barat', 'evariaayu@gmail.com', 'Pontianak', 'root', NULL, 1, NULL, NULL, NULL),
(6, 'sogol ajk', 'www.agus.com', 'koor ajk', 'ID', 'jawa timur', 'sogol@ajk.com', 'surabaya', 'root', '-----BEGIN CERTIFICATE REQUEST-----MIIBzDCCATcCAQAwgZExEjAQBgNVBAoMCXNvZ29sIGFqazEVMBMGA1UEAwwMd3d3LmFndXMuY29tMREwDwYDVQQLDAhrb29yIGFqazELMAkGA1UEBgwCSUQxEzARBgNVBAgMCmphd2EgdGltdXIxETAPBgNVBAcMCHN1cmFiYXlhMRwwGgYJKoZIhvcNAQkBDA1zb2dvbEBhamsuY29tMIGdMAsGCSqGSIb3DQEBAQOBjQAwgYkCgYEAzg548W3Ixnpt0gTp1bt6MWdo5L7NjeKqMEVxU1ofSni4qtFZixXp0X1+xKzZ8AkY/PUD2YulCojDD8p7rDLBr0VI9bMJxQ8GxJGYVA+6HfkN/MFpQ4HsnbRwzR+A0D9PxJJ60+zLlXLyZGvUWhRN/5Ygy4QzkIUs2+D/mSH2DT0CAwEAATALBgkqhkiG9w0BAQUDgYEADlr9vBjb0pRWro6iB9oJEdc5Nv66+EVlp1+Qp6h67d2gpsQbx49sQg/ytDQvjfD6UJ+UXHKh7WZrC8gUgcfbDWxZl6b0rUvKt1T1CD5PN5TLZrfTohDjKQICEH8O2Kko6qX3KWdbhKhoiTHNDxsjMSzpZ84hZg+/tXWGp2tdqWA=-----END CERTIFICATE REQUEST-----', 1, 1, '-----BEGIN X509 CRL-----\r\nMIIBozCCAQ4CAQEwCwYJKoZIhvcNAQEFMIGLMRYwFAYDVQQKDA10ZXJhdGFpIHB1\r\ndGloMR4wHAYDVQQDDBV3d3cudGVyYXRhaS1wdXRpaC5jb20xHTAbBgNVBAsMFHRl\r\ncmF0YWkgcHV0aWggc2lnbmVyMRIwEAYDVQQIDAlFYXN0IEphdmExETAPBgNVBAcM\r\nCFN1cmFiYXlhMQswCQYDVQQGDAJJRBcNMTUwNTA3MDE0NzQ1WhcNMTUwODA3MDE0\r\nNzQ1WjAfMB0CAQYXDTE1MDUwNzAxNDc0NVowCTAHBgNVHRUEAKAvMC0wCgYDVR0U\r\nBAMCAQAwHwYDVR0jBBgwFoAUchbFKMUA8pIhT0jn+6LY7ZXIhQkwCwYJKoZIhvcN\r\nAQEFA4GBAJOYjBotLyoO5eurhFVCwWyEwZRj95XEyQ3IpRLXK0JN98CHWmU2B9eO\r\nFkehJOr2lx9X/N7GXQztiJq120e1FQSWwItHxqcWU2kb6nZeTpJcoLHfn7BI8LGH\r\nwxR0FTEJ8lS3rwM3dpnH3Jpjgkt0Z3uhyU2Eir6NB3QznhYcdLAZ\r\n-----END X509 CRL-----', 'privilege withdrawn'),
(7, 'nina organized', 'nina.com', 'tech', 'ID', 'DKI Jakarta', 'nina@gmail.com', 'jakarta', 'root', '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIByjCCATUCAQAwgY8xFzAVBgNVBAoMDm5pbmEgb3JnYW5pemVkMREwDwYDVQQD\r\nDAhuaW5hLmNvbTENMAsGA1UECwwEdGVjaDELMAkGA1UEBgwCSUQxFDASBgNVBAgM\r\nC0RLSSBKYWthcnRhMRAwDgYDVQQHDAdqYWthcnRhMR0wGwYJKoZIhvcNAQkBDA5u\r\naW5hQGdtYWlsLmNvbTCBnTALBgkqhkiG9w0BAQEDgY0AMIGJAoGBAKVz4rpte6M5\r\nWP0DEpnDiCX9cb7kyrJcIcEVY0WsQZ+YAwcDashZ1AQoTiJEl5Dm3vLWhhaNnJxv\r\n9BR47/9mcwOXMoYPtmsEuReTX17IqzieFOPdHLQqm2oeOyry06FLZ8s7jiCqifII\r\nDRDvJZlxqhzULpnFA9He0N2o9ge96St7AgMBAAEwCwYJKoZIhvcNAQEFA4GBAIys\r\ncpB/ZRRo/hZiQdrWpdlEzzALmMcp4ufR4BXZ4YCNTKFc+K5khx5v1Rr+xRT9JOHc\r\n7LRMwNWJ4Upb5jG7Yetgyh+DTgySbydnm+5OQ1az9pCYPhRB252Tqt6E4Nk4sEWD\r\npc2nznpiF/f9L0FivocHSuZLmDEU1EMU/7EL0wU+\r\n-----END CERTIFICATE REQUEST-----', 0, 0, NULL, NULL),
(8, 'samor', 'sam', 'samUN', 'ID', 'Jatim', 'sam@mail', 'SBY', 'root', '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIBrDCCARcCAQAwcjEOMAwGA1UECgwFc2Ftb3IxDDAKBgNVBAMMA3NhbTEOMAwG\r\nA1UECwwFc2FtVU4xCzAJBgNVBAYMAklEMQ4wDAYDVQQIDAVKYXRpbTEMMAoGA1UE\r\nBwwDU0JZMRcwFQYJKoZIhvcNAQkBDAhzYW1AbWFpbDCBnTALBgkqhkiG9w0BAQED\r\ngY0AMIGJAoGBAL6Eb/A9TcVDif05aS+bCOIp9ju3Ku5pweqdPHecHFj7NUkW6Y+c\r\ngrXQipaxh6Fg3Gh24NEo2lvfBLvOh1ZSzBKR2bCPXqAsPTy0e/fcelc7RpnugbDb\r\nhmyQvEPyCxvHHrKPIXFZhyvHfumUW2cQYcbp9QXj3YeCvzNAeyZrliSzAgMBAAEw\r\nCwYJKoZIhvcNAQEFA4GBAAWIggKLdcVYuJCALV5AkuvQ8Rm76aZTEtvhs9d5yQrU\r\nzNImeBD05OwFYfAvJwv3OoUjFkYIwZqoC5TVHs1Bu3JF9nq8rS7aG1m9amozmNbz\r\nUB5gsk5KxgBONWvhjMPJWmynW+gBv8cTeHWRavTK7ypSebK3/fc6ndJ8/zzhqoU+\r\n-----END CERTIFICATE REQUEST-----', 1, 0, NULL, NULL),
(9, 'Revoke', 'www.revoke.com', 'Tech Dept', 'US', 'Florida', 'revoke@mail.com', 'Minoshita', 'root', '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIBzDCCATcCAQAwgZExDzANBgNVBAoMBlJldm9rZTEXMBUGA1UEAwwOd3d3LnJl\r\ndm9rZS5jb20xEjAQBgNVBAsMCVRlY2ggRGVwdDELMAkGA1UEBgwCVVMxEDAOBgNV\r\nBAgMB0Zsb3JpZGExEjAQBgNVBAcMCU1pbm9zaGl0YTEeMBwGCSqGSIb3DQEJAQwP\r\ncmV2b2tlQG1haWwuY29tMIGdMAsGCSqGSIb3DQEBAQOBjQAwgYkCgYEAwjNtZyv0\r\nYg6meZarBQ1lEB1Rn/WHjnCp1vvKdSP7DoEZbiAuCJr6TuAuAS1RjH/MMGpFZRGK\r\na/S6L9RXdmHWP8Ec9MQgrDXLDmaytGgFRsEljMttWNSY9NUfvAMo4Gt/qwlCuA7y\r\nZxu+3mxtd5XLx2DuvJPtq6p+bCUNI9JsrL0CAwEAATALBgkqhkiG9w0BAQUDgYEA\r\nlL+cPxZSAOpOj2wbFdUIq5lq//3pg8ZoqOkbw/mR/zIYiwUcZWGoY+99DksTHBWY\r\nwGnO6cPjjCjk/+cixhkwLpUUX7wBOJrUIPdM4wQHESTebpeVIIXCZpd68z326sas\r\nCTqD40UK8ZxKdG4AgbCuuvG+v6kEtJ4XLKXPL64j8p8=\r\n-----END CERTIFICATE REQUEST-----', 0, 1, '-----BEGIN X509 CRL-----\r\nMIIBwjCCAS0CAQEwCwYJKoZIhvcNAQEFMIGLMRYwFAYDVQQKDA10ZXJhdGFpIHB1\r\ndGloMR4wHAYDVQQDDBV3d3cudGVyYXRhaS1wdXRpaC5jb20xHTAbBgNVBAsMFHRl\r\ncmF0YWkgcHV0aWggc2lnbmVyMRIwEAYDVQQIDAlFYXN0IEphdmExETAPBgNVBAcM\r\nCFN1cmFiYXlhMQswCQYDVQQGDAJJRBcNMTUwNTA3MDIyMzM2WhcNMTUwODA3MDIy\r\nMzM2WjA+MB0CAQoXDTE1MDUwNzAyMDM1MlowCTAHBgNVHRUEADAdAgEJFw0xNTA1\r\nMDcwMjIzMzZaMAkwBwYDVR0VBACgLzAtMAoGA1UdFAQDAgEBMB8GA1UdIwQYMBaA\r\nFHIWxSjFAPKSIU9I5/ui2O2VyIUJMAsGCSqGSIb3DQEBBQOBgQBdtiYuX4DE4HX2\r\nVeR9tDw6rGA4BhQAhs6kovjsmrTYCAv8LEOgHwdQTjyaf7rtpIQl+gMlCgwjUyaH\r\nQmTYr8zYV/jnLXccbPTXU/khZJlMWeGqcXce1eXigopf2CauEWE9qGu0L2JsVIHu\r\nNB5TtpOdGTRL9udEtJCcfhrBpFHb0w==\r\n-----END X509 CRL-----', 'privilege'),
(10, 'Teratai Putih', 'www.terataiputih.com', 'Teratai Putih Sign Dept', 'ID', 'East Java', 'terataiputih@mail.com', 'Surabaya', 'root', '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIB7jCCAVkCAQAwgbMxFjAUBgNVBAoMDVRlcmF0YWkgUHV0aWgxHTAbBgNVBAMM\r\nFHd3dy50ZXJhdGFpcHV0aWguY29tMSAwHgYDVQQLDBdUZXJhdGFpIFB1dGloIFNp\r\nZ24gRGVwdDELMAkGA1UEBgwCSUQxEjAQBgNVBAgMCUVhc3QgSmF2YTERMA8GA1UE\r\nBwwIU3VyYWJheWExJDAiBgkqhkiG9w0BCQEMFXRlcmF0YWlwdXRpaEBtYWlsLmNv\r\nbTCBnTALBgkqhkiG9w0BAQEDgY0AMIGJAoGBAOZPPmSWn03C0Ole7X4PBGKWGDz4\r\nyqUkxDwoPeBb3ey6UHTSy1atpNGJRtwt4QMfkngqzq5mL3SH+JrO+T657zzVEXLw\r\n1dPjnecJR5hpjpmR/JPw8HZQDsSHBwwFsnCZ2XTnQB1jSWlIobqLGqEy7QsCz2G0\r\nwR7TA7g8KccKcjKNAgMBAAEwCwYJKoZIhvcNAQEFA4GBACASjvev3wHos7W4Y24K\r\nHLiU+7gPW1SHbligDNSMXCZOliHP6pH1FjTU4jWZmIzqHcSu2c/rJHT/e9VAh6Yn\r\nUg3byzEi6FTxY5c+spaw8aPEvJZauSdQbsnIZ7s1yCBFDBr7SiMBQHpVnwiK/Inr\r\ncxjOC93iMTybS60APzGfnjy3\r\n-----END CERTIFICATE REQUEST-----', 0, 1, '-----BEGIN X509 CRL-----\r\nMIIBozCCAQ4CAQEwCwYJKoZIhvcNAQEFMIGLMRYwFAYDVQQKDA10ZXJhdGFpIHB1\r\ndGloMR4wHAYDVQQDDBV3d3cudGVyYXRhaS1wdXRpaC5jb20xHTAbBgNVBAsMFHRl\r\ncmF0YWkgcHV0aWggc2lnbmVyMRIwEAYDVQQIDAlFYXN0IEphdmExETAPBgNVBAcM\r\nCFN1cmFiYXlhMQswCQYDVQQGDAJJRBcNMTUwNTA3MDIwMzUyWhcNMTUwODA3MDIw\r\nMzUyWjAfMB0CAQoXDTE1MDUwNzAyMDM1MlowCTAHBgNVHRUEAKAvMC0wCgYDVR0U\r\nBAMCAQAwHwYDVR0jBBgwFoAUchbFKMUA8pIhT0jn+6LY7ZXIhQkwCwYJKoZIhvcN\r\nAQEFA4GBAGV7hiQ19PL9xB5FwuRvjkku7aO3C2ibsiL0VTup7oabXp6zF4ve8L4Y\r\nYga0AppGoCPnHvidqXXQ6wPVCMvps3edGEO2RDAFWowjPbDUQPOceuV0KAt72YyN\r\nyS1opE4UMNSZd/prC4j9faNXjybPgi+reNqIJsRhTXKT97QPi0zk\r\n-----END X509 CRL-----', 'privilege vioaltion'),
(11, 'bahrul halimi', 'uyung', 'yayasan bahrul halimi', 'ID', 'jawa timur', 'bahrul@uyung.com', 'surabaya', 'root', '-----BEGIN CERTIFICATE REQUEST-----\r\nMIIB2TCCAUQCAQAwgZ4xFjAUBgNVBAoMDWJhaHJ1bCBoYWxpbWkxDjAMBgNVBAMM\r\nBXV5dW5nMR4wHAYDVQQLDBV5YXlhc2FuIGJhaHJ1bCBoYWxpbWkxCzAJBgNVBAYM\r\nAklEMRMwEQYDVQQIDApqYXdhIHRpbXVyMREwDwYDVQQHDAhzdXJhYmF5YTEfMB0G\r\nCSqGSIb3DQEJAQwQYmFocnVsQHV5dW5nLmNvbTCBnTALBgkqhkiG9w0BAQEDgY0A\r\nMIGJAoGBALU3/Imyt48me1JuwRblAHnDVtmPFWrlOsDszVUsQ05/ssEjsmWZ1YnL\r\nt4Ws2hUz5+PWR4cpn+SbwMyQK2F8xS6BKjXc43QkNEY/nU+PcLSgLU7TeMU2WQcA\r\nY89odmRaOMhHoXdZP+IPJXFxyUvOt8JRbShRD+r6C0DNgwV9EnrtAgMBAAEwCwYJ\r\nKoZIhvcNAQEFA4GBADCYo3h2VQKYpGJpUp8wQka9Xx1z/RjLX73vVXzSrCgjYu5G\r\nXXZ76jxB6ZojzCNy5pZVXjoj7wR2znGIKpcDWzRbBVzrTFYNjNCKlxY3beXVW093\r\nvTcMqI1lF4tOcalDoLeK17edbWr5VcarCyuFrYYplG+0STjUbzF9ZKu4v7C9\r\n-----END CERTIFICATE REQUEST-----', 1, 1, '-----BEGIN X509 CRL-----\r\nMIIB4TCCAUwCAQEwCwYJKoZIhvcNAQEFMIGLMRYwFAYDVQQKDA10ZXJhdGFpIHB1\r\ndGloMR4wHAYDVQQDDBV3d3cudGVyYXRhaS1wdXRpaC5jb20xHTAbBgNVBAsMFHRl\r\ncmF0YWkgcHV0aWggc2lnbmVyMRIwEAYDVQQIDAlFYXN0IEphdmExETAPBgNVBAcM\r\nCFN1cmFiYXlhMQswCQYDVQQGDAJJRBcNMTUwNTA3MDI0MDMyWhcNMTUwODA3MDI0\r\nMDMyWjBdMB0CAQoXDTE1MDUwNzAyMDM1MlowCTAHBgNVHRUEADAdAgEJFw0xNTA1\r\nMDcwMjIzMzZaMAkwBwYDVR0VBAAwHQIBCxcNMTUwNTA3MDI0MDMyWjAJMAcGA1Ud\r\nFQQAoC8wLTAKBgNVHRQEAwIBAjAfBgNVHSMEGDAWgBRyFsUoxQDykiFPSOf7otjt\r\nlciFCTALBgkqhkiG9w0BAQUDgYEAyOe/t1vnG83ZN8zIsHaLtO3nzC0W1YqZhdcy\r\nlWR8evE89S5D0SSdDHRNe0X1Gr48Ez5Nt3OsdNk9lcyIU8ALSi1/E+6Bxap+NtKm\r\nvlCZ5VPgYvTL5xCLbeD0IaoY7lrd7Mr1espNSaPBmLZKz2kKS4oIZJjAaJ6quKta\r\nPDurH2Y=\r\n-----END X509 CRL-----', 'privilege withdrawn');

-- --------------------------------------------------------

--
-- Struktur dari tabel `root`
--

CREATE TABLE IF NOT EXISTS `root` (
  `username` varchar(45) NOT NULL,
  `passwd` varchar(45) NOT NULL,
  `pubKey` varchar(1500) NOT NULL,
  `privKey` varchar(1500) NOT NULL,
  `signature` varchar(1500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `root`
--

INSERT INTO `root` (`username`, `passwd`, `pubKey`, `privKey`, `signature`) VALUES
('root', 'root', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDZvnv8A3HK3aFvI+efrjT8Cwjs\r\nfZZJovoqEsubjvnhIYQlxL7OXp3kzCx1mYYltVXlM0uiQJUI78Na3MgtLDUf6XSF\r\nMb+pQOocJXnvZ2CMlf9ys/34MC54Tn9jy5TSxvc6Pb8Aj6ufrSWm0MSB/Fg6a++a\r\np55Hx9+lYPeVh/OsNQIDAQAB\r\n-----END PUBLIC KEY-----', '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXAIBAAKBgQDZvnv8A3HK3aFvI+efrjT8CwjsfZZJovoqEsubjvnhIYQlxL7O\r\nXp3kzCx1mYYltVXlM0uiQJUI78Na3MgtLDUf6XSFMb+pQOocJXnvZ2CMlf9ys/34\r\nMC54Tn9jy5TSxvc6Pb8Aj6ufrSWm0MSB/Fg6a++ap55Hx9+lYPeVh/OsNQIDAQAB\r\nAoGADhBgn7l1Ox4vlCckicrNv03TKLs/3se5EsieABEvEJyClZHspRW1axbI9FuT\r\nL5JT1vcGNpenSKl7272Q7GIDmEqS9H89GNU11/7wG2WodMaH8hSZCguDSrpLqa5m\r\nvv7Yn8Ff9RAhFnVRYsxBpG9fIWTzMmdMRaQSGB6mIuownGECQQDtauHDiyCqeCOJ\r\ny7MuxnxxODXP283cScPImSUECP4HdpZ+wMQWsXaJwOTc3r7dE1BKHPQgWzqsFsnu\r\nJcZ3++gNAkEA6sloRaZJbk7SR16BisyYhUGbUtwngyqKsqEAD4x46Gh5DJpNKLb+\r\n1xStxmRcEXI55Y1DA3D1BJPOpJOqJsviyQJBAJK5eSjV9KwlbyEbqHMB66o06Ny6\r\npLC9TafNLVkfDY8jNMLE8uprZiyf71CowB/0baw/1IeimdH8i3MIGW3RWokCQDAG\r\n7xuAPnkgCoeq31jjLTflCb7TZgnAxApyQK7tjzYLWOepEKuJc2vPwRRaJzMyaIF6\r\negDUNGqxSY4E3sN85XECQDMn9y+ljI8hupdtkPoY3Zb3KnJZv03WwUNvBRXjORQJ\r\n7cqiRfCUfwZbxmIy19SNmb4PK+8iVt8kSLza3k868xI=\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN CERTIFICATE-----\r\nMIICxzCCAjKgAwIBAgIBADALBgkqhkiG9w0BAQUwgYsxFjAUBgNVBAoMDXRlcmF0\r\nYWkgcHV0aWgxHjAcBgNVBAMMFXd3dy50ZXJhdGFpLXB1dGloLmNvbTEdMBsGA1UE\r\nCwwUdGVyYXRhaSBwdXRpaCBzaWduZXIxEjAQBgNVBAgMCUVhc3QgSmF2YTERMA8G\r\nA1UEBwwIU3VyYWJheWExCzAJBgNVBAYMAklEMB4XDTE1MDQwNjE1NTMyN1oXDTE2\r\nMDUwNjE1NTMyN1owgYsxFjAUBgNVBAoMDXRlcmF0YWkgcHV0aWgxHjAcBgNVBAMM\r\nFXd3dy50ZXJhdGFpLXB1dGloLmNvbTEdMBsGA1UECwwUdGVyYXRhaSBwdXRpaCBz\r\naWduZXIxEjAQBgNVBAgMCUVhc3QgSmF2YTERMA8GA1UEBwwIU3VyYWJheWExCzAJ\r\nBgNVBAYMAklEMIGdMAsGCSqGSIb3DQEBAQOBjQAwgYkCgYEA2b57/ANxyt2hbyPn\r\nn640/AsI7H2WSaL6KhLLm4754SGEJcS+zl6d5MwsdZmGJbVV5TNLokCVCO/DWtzI\r\nLSw1H+l0hTG/qUDqHCV572dgjJX/crP9+DAueE5/Y8uU0sb3Oj2/AI+rn60lptDE\r\ngfxYOmvvmqeeR8ffpWD3lYfzrDUCAwEAAaM/MD0wCwYDVR0PBAQDAgEGMA8GA1Ud\r\nEwEB/wQFMAMBAf8wHQYDVR0OBBYEFHIWxSjFAPKSIU9I5/ui2O2VyIUJMAsGCSqG\r\nSIb3DQEBBQOBgQCCK+OdQLRkaD/6+5BNRmnVgJL+T1/zkA6j3QzILXLQP9p5sOw3\r\niGlft5bWvn6ZxjqHZ5/MY1Ft+Jez59QScWZo3yT94AAv4VrB7/51v6rzAayqv0Eh\r\nBwJynrFQ6McxRmqdwGCOmh2Z3i+/C5TlWRuQ5zFQSQTgIqVpp+xFeE+OFQ==\r\n-----END CERTIFICATE-----');

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
MODIFY `serialNumber` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `csr_request`
--
ALTER TABLE `csr_request`
ADD CONSTRAINT `fk_csr_request_root` FOREIGN KEY (`username`) REFERENCES `root` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
