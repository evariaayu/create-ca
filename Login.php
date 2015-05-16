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
	    <h3 class="panel-title">Sign In</h3>
	  </div>
	  <div class="panel-body">
	    <form action="" method="post">
	    	
	  		<div class="form-group">
	   			<label for="username">Username</label>
	    		<input type="text" class="form-control" name="username">
	    		<p class="help-block">Enter your username</p>
	    		
	  		</div>

	  		<div class="form-group">
	   			<label for="password">Password</label>
	    		<input type="password" class="form-control" name="password">
	    		<p class="help-block">Enter your Password</p>
	  		</div>

	    	<input type="submit" name="formSubmit1" value="Sign In" />
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

			

			if(isset($_POST['username']) && isset($_POST['password']))
			{
			 

				$username = $_POST['username'];
				$password = $_POST['password'];

			$con = mysqli_connect("localhost","root","","csr");
			
			// Check connection
			if (mysqli_connect_errno())
			{
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			$sql="SELECT * FROM user WHERE username='$username' and password='$password'";
			$result_query=mysqli_query($con,$sql);
			// echo $sql;
			//mysqli_free_result($result_query);
			
			if ($result_query==true)
			{
				echo "berhasil";
			}
			else
			{
				echo "gagal";
			}

			mysqli_close($con);
			
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

