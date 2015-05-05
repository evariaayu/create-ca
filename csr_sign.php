<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['formSubmit']))
	{
		// $errorMessage = "";
		
		// if(empty($_POST['formMovie']))
		// {
		// 	$errorMessage .= "<li>You forgot to enter a movie!</li>";
		// }
		// if(empty($_POST['formName']))
		// {
		// 	$errorMessage .= "<li>You forgot to enter a name!</li>";
		// }
		include('File/X509.php');
		include('Crypt/RSA.php');
		if(isset($_POST['csr'])){
			$CAPrivKey = new Crypt_RSA();
			$CAPubKey = new Crypt_RSA();
			$CAPrivKey->loadKey("  -----BEGIN RSA PRIVATE KEY----- MIICXAIBAAKBgQC7SoENp+qVi+HWh/hx5PqGo9BBGRPtJfA1eI8BXqBEP+b8cTgT sJ7/HLWtzSUdRp21MUd8SgSNt6e014SVSb93JZUKNxw3x+VdTetLx/M39st67jAI yxrx/LQxibCFfhcBdxYnE9HYE3I0SEjNaJB1L8PIXbxpoZ+59qc2MbLV7QIDAQAB AoGANrrD0YjDDSZOPVGIcUfXSabvAUbhwsf2VLnBGEZdkPQXfKddGqvfGm96S6qJ 8O8kwMEAwbojcII9eKQN804Uq615D1UxCV1kh9SHYtQorrxlZyfJ8Z4pEXSZiUu1 FQYTu0uhsDlS0MEQur0DZL8D45FaVNEu110Jo7ymS2z4UuUCQQDjPOge8BQ2nSo7 oUe1P/prZGcXW+diARBhTEQosvYKrxAkZ4b81ih4UAtuXAYOiQIO6EJuMTF85OiN m2+be2ETAkEA0v83K+lEfF0F44AK19K1cxJw2OmiH9MvnE073ohRbHi6Kf3o3Kx/ BFQreYfN4gViIpVQqNkTz/d7hUcSngbM/wJACyW+wV3HsBIvszMrQGH+F+yZ/hRd Gnqw4gUKxvBYj5ec9Bw8DAU5gQV0Ohq7lVT1S+Pq9lrlcZoNKn04kWkRDwJBAJwL 3mzeXyUu0w0XBG3rywBo0gbKe3nYAW0yfaWt4bI8c0pdG9wgwuubqG+ALZcMbjCv h3Do4ss6+CJwludCllcCQAZ+8gC3McUCtwqFeHfADX6tteCgD7UegDwMvxu4OuAg FdrlxqoNxzZvia9x0/iNNlmpRKdL0QUdIMAKbCrjhY8= -----END RSA PRIVATE KEY-----");
			$CAPubKey->loadKey(" -----BEGIN PUBLIC KEY----- MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC7SoENp+qVi+HWh/hx5PqGo9BB GRPtJfA1eI8BXqBEP+b8cTgTsJ7/HLWtzSUdRp21MUd8SgSNt6e014SVSb93JZUK Nxw3x+VdTetLx/M39st67jAIyxrx/LQxibCFfhcBdxYnE9HYE3I0SEjNaJB1L8PI XbxpoZ+59qc2MbLV7QIDAQAB -----END PUBLIC KEY-----");
			$csr = $_POST['csr'];
			//echo $namaperusahaan;
			// $privKey = new Crypt_RSA();
			// extract($privKey->createKey());
			// $privKey->loadKey($privatekey);

			// $x509 = new File_X509();
			// $x509->setPrivateKey($privKey);
			// $x509->setDNProp('id-at-organizationName', $namaperusahaan);

			// $csr = $x509->signCSR();
			$issuer = new File_X509();
			$issuer->setPrivateKey($CAPrivKey);
			$ca=$issuer->loadX509("-----BEGIN CERTIFICATE----- MIICPzCCAaqgAwIBAgIBADALBgkqhkiG9w0BAQUwSDEWMBQGA1UECgwNdGVyYXRh aSBwdXRpaDEWMBQGA1UEAwwNdGVyYXRhaSBwdXRpaDEWMBQGA1UECwwNdGVyYXRh aSBwdXRpaDAeFw0xNTA0MDUwMDAwMjhaFw0xNjA1MDUwMDAwMjhaMEgxFjAUBgNV BAoMDXRlcmF0YWkgcHV0aWgxFjAUBgNVBAMMDXRlcmF0YWkgcHV0aWgxFjAUBgNV BAsMDXRlcmF0YWkgcHV0aWgwgZ0wCwYJKoZIhvcNAQEBA4GNADCBiQKBgQC7SoEN p+qVi+HWh/hx5PqGo9BBGRPtJfA1eI8BXqBEP+b8cTgTsJ7/HLWtzSUdRp21MUd8 SgSNt6e014SVSb93JZUKNxw3x+VdTetLx/M39st67jAIyxrx/LQxibCFfhcBdxYn E9HYE3I0SEjNaJB1L8PIXbxpoZ+59qc2MbLV7QIDAQABoz8wPTALBgNVHQ8EBAMC AQYwDwYDVR0TAQH/BAUwAwEB/zAdBgNVHQ4EFgQUZoy1xqcKdJICyO6SNcFR/Iz9 nz4wCwYJKoZIhvcNAQEFA4GBABQJqXsk+PuJ83f6rfbHQJVjtAJrEq7DBB04WQSx GmRZAhJ+WYiH9lfZoJ2+rW8Z9HhcAXDdfvoiXRavKw3f+I3DmWU6WPmIVvzP03fd PnWCkXP9eHADzM1rcSy80ZyGu5b2IuSA/vxwV5mrvgq9ZDn7e/s1hbjVT+CSsHmN eu2i -----END CERTIFICATE-----");
			$subject = new File_X509();
			$subject->setPublicKey($CAPubKey);
			$subject->loadCSR($csr);
			$x509 = new File_X509();
			$x509->setStartDate('-1 month');
			$x509->setEndDate('+1 year');

			$result = $x509->sign($issuer, $subject);
			$fileca = $x509->saveX509($result);
			//echo $fileca;
			// $filecsr = $x509->saveCSR($csr);
			$myfile = fopen("ca".'.txt',"w") or die("Unable to open file!");
			fwrite($myfile, $fileca);
			fclose($myfile);


			$file = "ca".'.txt';

			if (file_exists($file)) {
			    header('Content-Description: File Transfer');
			    header('Content-Type: application/octet-stream');
			    header('Content-Disposition: attachment; filename='.basename($file));
			    header('Expires: 0');
			    header('Cache-Control: must-revalidate');
			    header('Pragma: public');
			    header('Content-Length: ' . filesize($file));
			    readfile($file);
			    exit;
			}
		}
		else
		{
			echo "ga masuk";
		}
		
		

		// if(empty($errorMessage)) 
		// {
		// 	$fs = fopen("mydata.csv","a");
		// 	fwrite($fs,$varName . ", " . $varMovie . "\n");
		// 	fclose($fs);
			
		// 	header("Location: thankyou.html");
		// 	exit;
		// }

	}
	else{
		echo "submit ga kepencet";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<br>
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Signing CA</h3>
  </div>
  <div class="panel-body">
    <form action="" method="post">
  <div class="form-group">
    <label for="namaperusahaan">CSR Perusahaan</label>
    <textarea  rows="4" cols="50" class="form-control" placeholder="Masukkan CSR perusahaan" name="csr">
  	</textarea>
  </div>
    <input type="submit" name="formSubmit" value="Submit" />
</form>
  </div>
</div>
</div>

	
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


