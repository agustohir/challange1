<?php
// Membangun Koneksi dengan Server dengan nama server, user_id dan password sebagai parameter
$connection = mysql_connect("localhost", "root", "");
// Seleksi Database
$db = mysql_select_db("skripsi", $connection);
session_start();// Memulai Session
// Menyimpan Session
$user_check=$_SESSION['username'];
// Ambil nama karyawan berdasarkan username karyawan dengan mysql_fetch_assoc
$ses_sql=mysql_query("select * from admin where username='$user_check'", $connection);
$row = mysql_fetch_assoc($ses_sql);
$login_session =$row['username'];
$loginkode =$row['id'];
$login_status =$row['status'];
if(!isset($login_session)){
echo "<script type='text/javascript'>alert('Username atau password anda salah')</script>";
mysql_close($connection); // Menutup koneksi
header('Location: profile.php'); // Mengarahkan ke Home Page
}
?>