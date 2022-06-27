<?php
$servername="localhost";
$username="root";
$password="";
$db="katalog";
$conn=mysqli_connect($servername,$username,$password,$db);
if(!$conn)
{
    die("Koneksi Database Gagal".mysqli_connect_error());
}

?>