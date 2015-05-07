<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create CA</title>

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
  <nav class="navbar navbar-static-top navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">OPENCA</a>
      </div>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="crt_request.php" aria-expanded="false">Request CSR</a></li>
            <li><a href="csr_sign.php" aria-expanded="false">Signin CSR</a></li>
            <li><a href="create-ca.php" aria-expanded="false">Request CA</a></li>
            <li><a href="crl_create.php">Revoke Certificate</a></li> 
            
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> 
            <ul class="dropdown-menu" role="menu">
              <li class="divider"></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!--   <div class="container-fluid">
  </div> -->
<br>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Request CA</h3>
	  </div>
	  <div class="panel-body">
	    <form action="" method="post">
	    	
	  		<div class="form-group">
	   			<label for="organizationName">Organization Name</label>
	    		<input type="text" class="form-control" name="organizationName">
	    		<p class="help-block">Enter your company’s legally registered name (i.e. YourCompany, Inc.).</p>
	    		
	  		</div>

	  		<div class="form-group">
	   			<label for="commonName">Common Name</label>
	    		<input type="text" class="form-control" name="commonName">
	    		<p class="help-block">Enter the fully qualified domain name (i.e. www.example.com). You may also enter the IP address (i.e. 192.168.1.200) or the internal server short name (i.e. appserver1).</p>
	  		</div>
	  		
	  		<div class="form-group">
	   			<label for="organizationalUnitName">Organizational Unit Name</label>
	    		<input type="text" class="form-control" name="organizationalUnitName">
	    		<p class="help-block">(Optional) Enter the department within your organization that you want to appear on the SSL Certificate.</p>
	  		</div>

	  		

			<div class="form-group">
	   			<label for="stateOrProvinceName">State Or Province Name</label>
	    		<input type="text" class="form-control" name="stateOrProvinceName">
	    		<p class="help-block">Enter the state or province where your company is legally located.</p>
	  		</div>

	  		<div class="form-group">
	   			<label for="localityName">Locality Name</label>
	    		<input type="text" class="form-control" name="localityName">
	    		<p class="help-block">Enter the city where your company is legally located.</p>
	    		
	  		</div>

	  		<div class="form-group">
	   			<label for="emailAddress">Email Address</label>
	    		<input type="email" class="form-control" name="emailAddress">
	  		</div>

	  		<div class="form-group">
	   			<label for="countryName">Country Name</label>
	    		<input type="text" class="form-control" name="countryName">
	    		<p class="help-block">Enter the country where your company is legally located.</p>
	  		</div>

	    	<input type="submit" name="formSubmit1" value="Submit" />
		</form>
	  </div>
	</div>
</div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['formSubmit1']))
	{
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
			$myfileprivkey = fopen("privkeyRoot.crt","w") or die("Unable to open file!");
			fwrite($myfileprivkey, $privatekey);
			fclose($myfileprivkey);

			// echo $publickey;
			// $fileRoot = $x509->saveX509($result);
			$myfilepubkey = fopen("pubkeyroot.crt","w") or die("Unable to open file!");
			fwrite($myfilepubkey, $publickey);
			fclose($myfilepubkey);

			if(isset($_POST['organizationName']))
			{
			 

				$organizationName = $_POST['organizationName'];
				$commonName = $_POST['commonName'];
				$organizationalUnitName = $_POST['organizationalUnitName'];
				$countryName = $_POST['countryName'];
				$stateOrProvinceName = $_POST['stateOrProvinceName'];
				$localityName = $_POST['localityName'];
				$emailAddress = $_POST['emailAddress'];


			// create a self-signed cert that'll serve as the CA
			$subject = new File_X509();
			$subject->setDNProp('id-at-organizationName', $organizationName);
			$subject->setDNProp('id-at-commonName', $commonName);
			$subject->setDNProp('id-at-organizationalUnitName', $organizationalUnitName);
			$subject->setDNProp('id-at-stateOrProvinceName', $stateOrProvinceName);
			$subject->setDNProp('id-at-localityName', $localityName);
			$subject->setDNProp('id-at-emailAddress', $emailAddress);
			$subject->setDNProp('id-at-countryName', $countryName);
			$subject->setPublicKey($pubKey);
			
			echo $organizationName;


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
			$con = mysqli_connect("localhost","root","","csr");
			
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$sql="UPDATE root set pubKey='$publickey',privKey='$privatekey',signature='$fileRoot' where username='root'";
			$result_query=mysqli_query($con,$sql);
			// echo $sql;
			//mysqli_free_result($result_query);

			mysqli_close($con);

			$myfileroot = fopen("root.crt","w") or die("Unable to open file!");
			fwrite($myfileroot, $fileRoot);
			fclose($myfileroot);

			
		}
		else
		{
			echo "Tidak masuk";
		}
	}
	else
	{
			echo "Error Submit";
	}

}

?>

