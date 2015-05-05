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
		if(isset($_POST['organizationName'])){
			
			 
			$organizationName = $_POST['organizationName'];
			$commonName = $_POST['commonName'];
			$organizationalUnitName = $_POST['organizationalUnitName'];
			$countryName = $_POST['countryName'];
			$stateOrProvinceName = $_POST['stateOrProvinceName'];
			$localityName = $_POST['localityName'];
			$emailAddress = $_POST['emailAddress'];
			
			//echo $namaperusahaan;
			$privKey = new Crypt_RSA();
			extract($privKey->createKey());
			$privKey->loadKey($privatekey);

			$x509 = new File_X509();
			$x509->setPrivateKey($privKey);
			$x509->setDNProp('id-at-organizationName', $organizationName);
			$x509->setDNProp('id-at-commonName', $commonName);
			$x509->setDNProp('id-at-organizationalUnitName', $organizationalUnitName);
			$x509->setDNProp('id-at-countryName', $countryName);
			$x509->setDNProp('id-at-stateOrProvinceName', $stateOrProvinceName);
			$x509->setDNProp('id-at-localityName', $localityName);
			$x509->setDNProp('id-emailAddress', $emailAddress);


			$csr = $x509->signCSR();

			//secho $x509->saveCSR($csr);
			$filecsr = $x509->saveCSR($csr);
			$myfile = fopen($organizationName.'.txt',"w") or die("Unable to open file!");
			fwrite($myfile, $filecsr);
			fclose($myfile);
			$file = $organizationName.'.txt';

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
    <title>CSR Request</title>

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
	    <h3 class="panel-title">Request CA</h3>
	  </div>
	  <div class="panel-body">
	    <form action="" method="post">
	    	<div class="form-group">
	   			<label for="commonName">Common Name</label>
	    		<input type="text" class="form-control" name="commonName">
	  		</div>
	  		<div class="form-group">
	   			<label for="organizationName">Organization Name</label>
	    		<input type="text" class="form-control" name="organizationName">
	  		</div>
	  		
	  		<div class="form-group">
	   			<label for="organizationalUnitName">Organizational Unit Name</label>
	    		<input type="text" class="form-control" name="organizationalUnitName">
	  		</div>

	  		<div class="form-group">
	   			<label for="localityName">Locality Name</label>
	    		<input type="text" class="form-control" name="localityName">
	  		</div>

			<div class="form-group">
	   			<label for="stateOrProvinceName">State Or Province Name</label>
	    		<input type="text" class="form-control" name="stateOrProvinceName">
	  		</div>

	  		<div class="form-group">
	   			<label for="countryName">Country Name</label>
	    		<input type="text" class="form-control" name="countryName">
	  		</div>

	  		<div class="form-group">
	   			<label for="emailAddress">Email Address</label>
	    		<input type="text" class="form-control" name="emailAddress">
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


