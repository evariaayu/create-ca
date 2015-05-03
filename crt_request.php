<!DOCTYPE html>

<html>
<hrad>
	<title>MAKE CERTIFICATE</title>
</hrad>

<form method="POST" action>
	Nama Organisasi: <input type="text" name="orname"><br>

	<input type="submit" value="Submit">
</form>
<?php
include('File/X509.php');
include('Crypt/RSA.php');

$privKey = new Crypt_RSA();
extract($privKey->createKey());
$privKey->loadKey($privatekey);

$x509 = new File_X509();
$x509->setPrivateKey($privKey);
$x509->setDNProp('id-at-organizationName', 'phpseclib demo cert');

$csr = $x509->signCSR();

// echo $x509->saveCSR($csr);
?>

</html>


