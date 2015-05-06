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

// echo "the private key for the CA cert (can be discarded):\r\n\r\n";
// echo $privatekey;

// $fileRoot = $x509->saveX509($result);
$myfileprivkey = fopen("privkeyRoot.pem","w") or die("Unable to open file!");
fwrite($myfileprivkey, $privatekey);
fclose($myfileprivkey);

// echo $publickey;
// $fileRoot = $x509->saveX509($result);
$myfilepubkey = fopen("pubkeyroot.pem","w") or die("Unable to open file!");
fwrite($myfilepubkey, $publickey);
fclose($myfilepubkey);


// create a self-signed cert that'll serve as the CA
$subject = new File_X509();
$subject->setDNProp('id-at-organizationName', 'teratai putih');
$subject->setDNProp('id-at-commonName', 'www.teratai-putih.com');
$subject->setDNProp('id-at-organizationalUnitName', 'teratai putih signer');
$subject->setDNProp('id-at-stateOrProvinceName', 'East Java');
$subject->setDNProp('id-at-localityName', 'Surabaya');
$subject->setDNProp('id-at-emailAddress', 'mail@teratai-putih.com');
$subject->setDNProp('id-at-countryName', 'ID');
$subject->setPublicKey($pubKey);

$issuer = new File_X509();
$issuer->setPrivateKey($CAPrivKey);
$issuer->setDN($CASubject = $subject->getDN());

$x509 = new File_X509();
$x509->makeCA();
$x509->setStartDate('-1 month');
$x509->setEndDate('+1 year');
$result = $x509->sign($issuer, $subject);

// echo $x509->saveX509($result);
$fileRoot = $x509->saveX509($result);
$myfileroot = fopen("root.pem","w") or die("Unable to open file!");
fwrite($myfileroot, $fileRoot);
fclose($myfileroot);
?>