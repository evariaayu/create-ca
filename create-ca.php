<?php
include('File/X509.php');
include('Crypt/RSA.php');

// create private key for CA cert
// (you should probably print it out if you want to reuse it)
$CAPrivKey = new Crypt_RSA();
extract($CAPrivKey->createKey());
$CAPrivKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

// echo "the private key for the CA cert (can be discarded):\r\n\r\n";
// echo $privatekey;
// echo "\r\n\r\n";







// create a self-signed cert that'll serve as the CA
$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('id-at-organizationName', 'phpseclib demo CA');

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject = $subject->getDN());

$x509 = new File_X509();
$x509->setStartDate('-1 month');//input sendiri
$x509->setEndDate('+1 year');//input
$x509->setSerialNumber(chr(1));
$x509->makeCA();

$result = $x509->sign($issuer, $subject);
//echo "the CA cert to be imported into the browser is as follows:\r\n\r\n";
//echo $x509->saveX509($result);
//echo "\r\n\r\n";








// create private key / x.509 cert for stunnel / website
$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

$subject = new File_X509();
$subject->setPublicKey($pubKey);
$subject->setDNProp('id-at-organizationName', 'phpseclib demo cert');
$subject->setDomain('www.google.com');

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject);

$x509 = new File_X509();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 year');
$x509->setSerialNumber(chr(1));

$result = $x509->sign($issuer, $subject);
 echo "the stunnel.pem contents are as follows:\r\n\r\n";
 echo $privKey->getPrivateKey();
 echo "\r\n";
 echo $x509->saveX509($result);
 echo "\r\n";