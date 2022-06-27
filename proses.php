<?php
include'koneksi.php';
error_reporting(0);
// Insert
if(isset($_POST['simpan'])){
  extract($_POST);
  $insertData="INSERT INTO daftar_katalog (ISBN, Judul, Pengarang,Penerbit)
  VALUES ('$ISBN', '$Judul','$Pengarang', '$Penerbit')";
     $queryinsert=mysqli_query($conn,$insertData);
     if($queryinsert){
         header("location:index.php");
     }else{
       echo'<script>alert("gagal");</script>';
     }

}

// Update

if(isset($_POST['update'])){
  extract($_POST);
  $queryupdate= "UPDATE daftar_katalog SET ISBN='$ISBN', Judul='$Judul', Pengarang='$Pengarang', Penerbit='$Penerbit' WHERE id='$id'";
     $update=mysqli_query($conn,$queryupdate);
     if($update){
         header("location:index.php");
     }else{
       echo'<script>alert("gagal");</script>';
     }

}

// Delete

if($_GET["action"]=="hapus"){
       
    $id=$_GET['id'];
    mysqli_query($conn,"DELETE FROM daftar_katalog WHERE id='$id'");
    header("location:index.php");
  }

  //login
  session_start();
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE username='".$username."' AND password='".$password."' LIMIT 1 ";
$result = mysqli_query($conn, $sql);
$jumlah = mysqli_num_rows($result);

if($jumlah > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['id'] = $row['id'];
    $_SESSION['username'] = $row['username'];
  

    header("location:index.php");
}else{
    echo "<script>alert('Username atau password salah');location='login.php';</script>";
}
  }
?>