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
			//echo $namaperusahaan;
			$privKey = new Crypt_RSA();
			extract($privKey->createKey());
			$privKey->loadKey($privatekey);

			$x509 = new File_X509();
			$x509->setPrivateKey($privKey);
			$x509->setDNProp('id-at-organizationName', $organizationName);
			$x509->setDNProp('id-at-commonName', $commonName);
			$x509->setDNProp('id-at-organizationalUnitName', $organizationalUnitName);
			// $subject->setDN( 
			// 			    array( 
			// 			        'rdnSequence' => array( 
			// 			            array( 
			// 			                array( 
			// 			                    'type' => 'id-at-organizationName', 
			// 			                    'value'=> 'phpseclib demo cert' 
			// 			                ) 
			// 			            ) 
			// 			        ) 
			// 			    ) 
			// 			); 

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
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Request CA <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Signin CA <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
            </ul>
          </li>
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

  <div class="container-fluid">
  </div>
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
	  		</div>
	  		<div class="form-group">
	   			<label for="commonName">Common Name</label>
	    		<input type="text" class="form-control" name="commonName">
	  		</div>
	  		<div class="form-group">
	   			<label for="organizationalUnitName">Organizational Unit Name</label>
	    		<input type="text" class="form-control" name="organizationalUnitName">
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


