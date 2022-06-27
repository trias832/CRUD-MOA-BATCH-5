<?php
session_start();

if(!isset($_SESSION['username'])){
    header("location:login.php");
}
include'koneksi.php';
//query untuk menampilkan data
$insert=mysqli_query($conn,"SELECT *FROM daftar_katalog");
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
      <div class="table-responsive">
        <table class="table table-striped mt-5">
          <thead class="thead">
            <tr class="text-white">
              <th scope="col">No</th>
              <th scope="col">ISBN</th>
              <th scope="col">Judul</th>
              <th scope="col">Pengarang</th>
              <th scope="col">Penerbit</th>
              <th scope="col">Aksi</th>
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
              <td class="text-center">
                <a class="btn  " onclick="return confirm('Yakin mau menghapus data ini ?')"
                  href="proses.php?action=hapus&id=<?= $row['id'] ?>"><button class="btn btn-danger" type="button">
                    Hapus</button></a>
                    <!-- Button trigger modal -->
                <Button class="btn btn-warning " type="button" data-toggle="modal"
                  data-target="#exampleModal<?=$row['id']?>"> Update</Button>
                
               

              </td>
            </tr>
             <!-- Modal Update-->
             <div class="modal fade" id="exampleModal<?=$row['id']?>" tabindex="-1"
                  aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update Buku</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form action="proses.php" method="post">
                          <div class="form-group mb-3 col-lg-11">
                          <div class="form-group mb-3 col-lg-11">
                            <input type="hidden" class="form-control" name="id" value="<?=$row['id']?>" required>
                          </div>
                            <label class="form-label">ISBN</label>
                            <input type="text" class="form-control" name="ISBN" value="<?=$row['ISBN']?>" required>
                          </div>
                          <div class="form-group mb-3 col-lg-11">
                            <label class="form-label">Judul</label>
                            <input type="text" class="form-control" name="Judul" value="<?=$row['Judul']?>" required>
                          </div>
                          <div class="form-group mb-3 col-lg-11">
                            <label class="form-label">Pengarang</label>
                            <input type="text" class="form-control" name="Pengarang" value="<?=$row['Pengarang']?>"
                              required>
                          </div>
                          <div class="form-group mb-3 col-lg-11">
                            <label class="form-label">Penerbit</label>
                            <input type="text" class="form-control" name="Penerbit" value="<?=$row['Penerbit']?>"
                              required>
                          </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- end modal -->
            <?php  
    $no+=1;
    endforeach; ?>

          </tbody>
        </table>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#exampleModal">
         Input Buku
        </button>
        <a class="btn btn-danger my-5 btn-md mx-4" href="logout.php">Logout</a>
      </div>
    </div>
  </div>


  <!-- Modal Input -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Input Buku</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="proses.php" method="post">
            <div class="form-group mb-3 col-lg-11">
              <label class="form-label">ISBN</label>
              <input type="text" class="form-control" name="ISBN" placeholder="ISBN" required>
            </div>
            <div class="form-group mb-3 col-lg-11">
              <label class="form-label">Judul</label>
              <input type="text" class="form-control" name="Judul" placeholder="Judul" required>
            </div>
            <div class="form-group mb-3 col-lg-11">
              <label class="form-label">Pengarang</label>
              <input type="text" class="form-control" name="Pengarang" placeholder="Pengarang" required>
            </div>
            <div class="form-group mb-3 col-lg-11">
              <label class="form-label">Penerbit</label>
              <input type="text" class="form-control" name="Penerbit" placeholder="Penerbit" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
          </form>
        </div>
      </div>
    </div>
  </div>

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