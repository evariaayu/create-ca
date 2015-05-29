
<?php
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['masuk'])) {
	if (empty($_POST['username']) || empty($_POST['password'])) {
			$error = "Username or Password is invalid";
	}
	else
	{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// Membangun koneksi ke database
		$connection = mysql_connect("localhost", "root", "");
		// Mencegah MySQL injection 
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		// Seleksi Database
		$db = mysql_select_db("csr", $connection);
		// SQL query untuk memeriksa apakah karyawan terdapat di database?
		$query = mysql_query("select hak_akses from user where password='$password' AND username='$username'", $connection);
		$rows = mysql_fetch_assoc($query);
		print_r($rows['hak_akses']);
		if (isset($rows)) {
			if($rows['hak_akses']=="admin"){
				$_SESSION['login_user']=$username; // Membuat Sesi/session
				header("location: csr_sign.php"); // Mengarahkan ke halaman requestca	
			}
			else{
				$_SESSION['login_user']=$username; // Membuat Sesi/session
				header("location: crt_request.php"); // Mengarahkan ke halaman requestca
			}
		} 
		else {
			$error = "Username atau Password belum terdaftar";
		}
		mysql_close($connection); // Menutup koneksi
	}
}
print_r($error);
?>