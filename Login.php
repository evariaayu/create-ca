
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
		$query = mysql_query("select * from user where password='$password' AND username='$username'", $connection);
		$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Membuat Sesi/session
				header("location: create-ca.php"); // Mengarahkan ke halaman profil
				} else {
				$error = "Username atau Password belum terdaftar";
				}
				mysql_close($connection); // Menutup koneksi
	}
}
print_r($error);
?>