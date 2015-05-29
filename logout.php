<?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
	header("Location: signin.php"); // Langsung mengarah ke Home index.php
}
?>