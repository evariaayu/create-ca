<?php
include('session.php');

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
		if(isset($_POST['serialNumber'])){
			
			$con = mysqli_connect("localhost","root","","csr");

			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			$sql="SELECT pubKey,privKey,signature FROM root where username='root'";
			$result_query=mysqli_query($con,$sql);


			// Associative array
			$row=mysqli_fetch_array($result_query,MYSQLI_ASSOC);
			//echo $row["pubKey"].$row["privKey"].$row["signature"];

			

			$CAPrivKey = new Crypt_RSA();
			$CAPubKey = new Crypt_RSA();
			$CAPrivKey->loadKey($row["privKey"]);
			$CAPubKey->loadKey($row["pubKey"]);
			
			//echo $row["pubKey"].$row["privKey"].$row["signature"];
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
			$ca=$issuer->loadX509($row["signature"]);
			$serialNumber = $_POST['serialNumber'];
			
			$sql="SELECT digitalsign FROM csr_request where serialNumber='$serialNumber'";
			$result_query=mysqli_query($con,$sql);

			$row=mysqli_fetch_array($result_query,MYSQLI_ASSOC);
			$csr = $row['digitalsign'];
			$subject = new File_X509();
			$subject->setPublicKey($CAPubKey);
			$subject->loadCSR($csr);
			$x509 = new File_X509();
			$x509->setStartDate('-1 month');
			$x509->setEndDate('+1 year');
			
			
			$x509->setSerialNumber(chr($serialNumber));
			$result = $x509->sign($issuer, $subject);
			$fileca = $x509->saveX509($result);
			$sql="UPDATE csr_request set status='1' where serialNumber='$serialNumber'";
			$result_query=mysqli_query($con,$sql);
			// Free result set
			// mysqli_free_result($result_query);

			mysqli_close($con);
			// echo $fileca;
			$myfile = fopen("ca".'.crt',"w") or die("Unable to open file!");
			fwrite($myfile, $fileca);
			fclose($myfile);


			$file = "ca".'.crt';
			

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
    <title>Signing CSR</title>

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
            
            <li><a href="csr_sign.php" aria-expanded="false">Signin CSR</a></li>
            <li><a href="create-ca.php" aria-expanded="false">Request CA</a></li>
            <li><a href="crl_create.php">Revoke Certificate</a></li> 
            <li><a href="crl_update.php">Update Revoke Certificate</a></li> 
            <!-- <li><a href="logout.php" aria-expanded="false">Log Out</a></li> -->
        </ul>

        <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php" aria-expanded="false">Log Out</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"><?php echo $login_session ?></span> 
            <ul class="dropdown-menu" role="menu">
              <li class="divider"></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<br>
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Signing CA</h3>
  </div>
  <div class="panel-body">
    <form action="" method="post">
  <div class="form-group">
    <label for="namaperusahaan">Sign CSR</label>
    <select name="serialNumber">
    <?php 
    	$con = mysqli_connect("localhost","root","","csr");

		// Check connection
		if (mysqli_connect_errno())
		{
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$sql="SELECT serialNumber,organizationName FROM csr_request where status=0";
		$result_query=mysqli_query($con,$sql);


		// Associative array
		$row=mysqli_fetch_all($result_query,MYSQLI_ASSOC);
		foreach ($row as $rows) {
			print_r($rows);
			echo "<option value=".$rows["serialNumber"].">".$rows["organizationName"]."</option>";
		}
     ?>
     </select>
    <!-- <textarea class="form-control" placeholder="Masukkan CSR perusahaan" name="csr">
  	</textarea> -->
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


