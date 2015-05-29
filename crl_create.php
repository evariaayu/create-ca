<?php
include('session.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if(isset($_POST['formSubmit']))
  {
    include('File/X509.php');
    include('Crypt/RSA.php');
    if(isset($_POST['serialNumber'])){
       

    $serialNumber = $_POST['serialNumber'];
    $revokereason = $_POST['revokereason'];

    // Load the CA and its private key.
    $pemcakey = file_get_contents('privkeyRoot.crt');
    $cakey = new Crypt_RSA();
    $cakey->loadKey($pemcakey);
    $pemca = file_get_contents('root.crt');
    $ca = new File_X509();
    $ca->loadX509($pemca);
    $ca->setPrivateKey($cakey);

    // Build the (empty) certificate revocation list.
    $crl = new File_X509();
    $crl->loadCRL($crl->saveCRL($crl->signCRL($ca, $crl)));

    // Revoke a certificate.
    $crl->setRevokedCertificateExtension($serialNumber, 'id-ce-cRLReasons', $revokereason);

    // Sign the CRL.
    // $date = date_create();
    
    $crl->setSerialNumber(1, 1000);
    $crl->setEndDate('+3 months');
    $newcrl = $crl->signCRL($ca, $crl);

    // Output it.
    $fileRoot = $crl->saveCRL($newcrl);
    $myfileroot = fopen("mycrl.crl","w") or die("Unable to open file!");
    fwrite($myfileroot, $fileRoot);
    fclose($myfileroot);

      $con = mysqli_connect("localhost","root","","csr");

      // Check connection
      if (mysqli_connect_errno())
      {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $sql="UPDATE csr_request set statusrevoke='1',revokereason='$revokereason',crlsignature='$fileRoot' where serialNumber='$serialNumber'";
      $result_query=mysqli_query($con,$sql);
      mysqli_close($con);

      $file = "mycrl".'.crl';
      

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
    <title>Revoke Certificate</title>

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
            <!-- <li><a href="crt_request.php" aria-expanded="false">Request CSR</a></li> -->
            <li><a href="csr_sign.php" aria-expanded="false">Signin CSR</a></li>
            <li><a href="create-ca.php" aria-expanded="false">Request CA</a></li>
            <li><a href="crl_create.php">Revoke Certificate</a></li>
            <li><a href="crl_update.php">Update Revoke Certificate</a></li> 
            <li><a href="logout.php" aria-expanded="false">Log Out</a></li>
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
	    <h3 class="panel-title">Revoke Certificate</h3>
	  </div>
	  <div class="panel-body">
	    <form action="" method="post">

	    	<div class="form-group">
			    <label for="namaperusahaan">Revoke Certificate</label>
			    <select name="serialNumber">
			    <?php 
			    	$con = mysqli_connect("localhost","root","","csr");

					// Check connection
					if (mysqli_connect_errno())
					{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
					}
					$sql="SELECT serialNumber,organizationName FROM csr_request where statusrevoke=0";
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
			 <div class="form-group">
          <label for="revokereason">The reason for revoking</label>
          <textarea  type="text" class="form-control" name="revokereason"></textarea>
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