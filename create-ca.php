<?php
include('File/X509.php');
include('Crypt/RSA.php');

// create private key for CA cert
$CAPrivKey = new Crypt_RSA();
extract($CAPrivKey->createKey());
$CAPrivKey->loadKey($privatekey);

$pubKey = new Crypt_RSA();
$pubKey->loadKey($publickey);
$pubKey->setPublicKey();

echo "the private key for the CA cert (can be discarded):\r\n\r\n";
echo $privatekey;
echo "\r\n\r\n";
echo $publickey;
echo "\r\n\r\n";


// create a self-signed cert that'll serve as the CA
$subject = new File_X509();
$subject->setDNProp('id-at-organizationName', 'teratai putih');
$subject->setDNProp('id-at-commonName', 'teratai putih');
$subject->setDNProp('id-at-organizationalUnitName', 'teratai putih');
$subject->setPublicKey($pubKey);

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject = $subject->getDN());

$x509 = new File_X509();
$x509->makeCA();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 year');
$result = $x509->sign($issuer, $subject);
//echo "the CA cert to be imported into the browser is as follows:\r\n\r\n";
echo $x509->saveX509($result);
//echo "\r\n\r\n";
?>