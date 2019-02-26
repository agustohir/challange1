<?php
session_start(); // Memulai Session
$error=''; // Variabel untuk menyimpan pesan error
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
echo "<script type='text/javascript'>alert('Username atau Password Kosong!')</script>";
}
else
{
// Variabel username dan password
$username=$_POST['username'];
$password=$_POST['password'];
$connection = mysql_connect("localhost", "root", "");
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$db = mysql_select_db("skripsi", $connection);
$query = mysql_query("select * from admin where password='$password' AND username='$username'", $connection);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['kode']=$kode; // Membuat Sesi/session
$_SESSION['username']=$username; // Membuat Sesi/session
header("location: profile.php"); // Mengarahkan ke halaman profil
} else {
echo "<script type='text/javascript'>alert('Username atau password anda salah')</script>";
}
mysql_close($connection); // Menutup koneksi
}
}
?>