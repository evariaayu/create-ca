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
			$myfile = fopen("csr.txt","w") or die("Unable to open file!");
			fwrite($myfile, $filecsr);
			fclose($myfile);

			$con = mysqli_connect("localhost","root","","csr");

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$sql="INSERT INTO csr_request (organizationName,commonName,organizationalUnitName,countryName,stateOrProvinceName,emailAddress,localityName,username,digitalsign,status)
			VALUES('$organizationName','$commonName','$organizationalUnitName','$countryName','$stateOrProvinceName','$emailAddress','$localityName','root','$filecsr','0')";
			$result_query=mysqli_query($con,$sql);
			// echo $sql;
			//mysqli_free_result($result_query);

			mysqli_close($con);
			// $file = "csr.txt";

			// if (file_exists($file)) {
			//     header('Content-Description: File Transfer');
			//     header('Content-Type: application/octet-stream');
			//     header('Content-Disposition: attachment; filename='.basename($file));
			//     header('Expires: 0');
			//     header('Cache-Control: must-revalidate');
			//     header('Pragma: public');
			//     header('Content-Length: ' . filesize($file));
			//     readfile($file);
			//     exit;
			// }

			
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
            <li><a href="crt_request.php" role="button" aria-expanded="false">Request CSR</a></li>
            <li><a href="csr_sign.php" role="button" aria-expanded="false">Signin CSR</a></li>
            <li><a href="#" role="button" aria-expanded="false">Request CA</a></li>
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
	   			<label for="localityName">Locality Name</label>
	    		<input type="text" class="form-control" name="localityName">
	    		<p class="help-block">Enter the city where your company is legally located.</p>
	    		
	  		</div>

			<div class="form-group">
	   			<label for="stateOrProvinceName">State Or Province Name</label>
	    		<input type="text" class="form-control" name="stateOrProvinceName">
	    		<p class="help-block">Enter the state or province where your company is legally located.</p>
	  		</div>

	  		<div class="form-group">
	   			<label for="countryName">Country Name</label>
	    		<input type="text" class="form-control" name="countryName">
	    		<p class="help-block">Enter the country where your company is legally located.</p>
	  		</div>

	  		<div class="form-group">
	   			<label for="emailAddress">Email Address</label>
	    		<input type="email" class="form-control" name="emailAddress">
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


