<?php
include'koneksi.php';

if(isset($_GET['cari'])){
  $cari=$_GET['cari'];
  //query untuk menampilkan data berdasarkan judul buku yang dicari
  $insert=mysqli_query($conn,"SELECT *FROM daftar_katalog WHERE Judul like '%".$cari."%'");
}else{
  //query untuk menampilkan data
  $insert=mysqli_query($conn,"SELECT *FROM daftar_katalog");

}

while($data=mysqli_fetch_array($insert)){
    $row[]=$data;

}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
    integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  <style>
    .thead {
      background-color: blue;
    }
  </style>
  <title>Katalog Buku</title>

</head>

<body>
  <div class="container-fluid mt-3">
    <div class="container">
      <h1 class="text-center">DAFTAR KATALOG BUKU</h1>
      <!-- cari -->
      <div class="col-md-12  my-3">
            <form action="" method="get" class="input-group">
                <input type="text" class="form-control  mb-2 col-lg-12" name="cari" placeholder="search">
                <button class="btn btn-outline-secondary ml-3 mb-2"  value="cari">Search</button>
            </form>
            </div>
      <!-- end cari -->
      <div class="table-responsive">
        <table class="table table-striped mt-5">
          <thead class="thead">
            <tr class="text-white">
              <th scope="col">No</th>
              <th scope="col">ISBN</th>
              <th scope="col">Judul</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Penerbit</th>
            </tr>
          </thead>
          <tbody>
            <?php
  $no=1;
   foreach($row as $row ): ?>
            <tr>
              <th scope="row"><?=$no?></th>
              <td><?=$row['ISBN']?></td>
              <td><?=$row['Judul']?></td>
              <td><?=$row['Pengarang']?></td>
              <td><?=$row['Penerbit']?></td>
            </tr>
    <?php
    $no+=1;
    endforeach; ?>

          </tbody>
        </table>
      

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>

</html>