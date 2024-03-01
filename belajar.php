<?php
require 'functionbelajar.php';
$jadwal = query("SELECT * FROM jadwal");

if(isset ($_POST["cari"])) {
  $jadwal = cari ($_POST["keyword"]);
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <link rel="stylesheet" type="text/css" href="fontawesome/css/all.min.css">

    <title>jadwal</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-info fixed-top">
      <a class="navbar-brand" href="#">SELAMAT DATANG ADMIN | <b>SMK PUTRA GUNUNGHALU</b></a>
     
        <form class="form-inline my-2 my-lg-0 ml-auto">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="icon ml-4">
            <h5>
                <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
                <i class="fas fa-bell mr-3" data-toggle="tooltip" title="Notifikasi"></i>
               <a href="logout.php"><i class="fas fa-sign-out-alt mr-3"data-toggle="tooltip" title="Sign Out"></i></a>
            </h5>
        </div>
      </div>
    </nav>

    <div class="row no-gutters mt-5">
        <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
            <ul class="nav flex-column ml-3 mb-5">
              <li class="nav-item">
                <a class="nav-link active text-white" href="dasboard.php"><i class="fas fa-tachometer-alt mr-2"></i>Dasboard</a><hr class="bg-secondary">
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="siswa.php"><i class="fas fa-user-graduate mr-2"></i>Daftar Siswa</a><hr class="bg-secondary">
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="guru.php"><i class="fas fa-chalkboard-teacher mr-2"></i>Daftar Guru</a><hr class="bg-secondary">
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="pegawai.php"><i class="fas fa-user-edit mr-2"></i>Daftar Pegawai</a><hr class="bg-secondary">
              </li>
                <li class="nav-item">
                <a class="nav-link text-white" href="belajar.php"><i class="fas fa-calendar-alt mr-2"></i>Jadwal Belajar</a><hr class="bg-secondary">
              </li>
              <li class="nav-item">
                <a class="nav-link text-white" href="nilai.php"><i class="fas fa-paper-plane mr-2"></i>Nilai Siswa</a><hr class="bg-secondary">
              </li>
            </ul>
        </div>
        <div class="col-md-10 p-5 pt-2">
            <h3><i class="fas fa-calendar-alt mr-2"></i>JADWAL BELAJAR</h3><hr>

            <?php  
               if(isset($_POST["submit"])) {
                if(tambah($_POST) > 0) {
                  echo "
                    <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'belajar.php'
                    </script>
                    ";
                }else {
                  echo "
                    <script>
                    alert('data gagal ditambahkan');
                    document.location.href = 'belajar.php'
                    </script>
                    ";
                }
              }

               ?>
            <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#tambah_data">
            TAMBAH DATA JADWAL PELAJARAN <i class="fas fa-plus-square mr-2"></i>
            </button>
            <form action="" method="post">
              <input type="text" name="keyword" size="25" autofocus="" autocomplete="off" placeholder="mencari data pencarian">
              <button type="submit" name="cari">Cari</button>
            </form>
            <br>
            <!-- Modal -->
            <div class="modal fade" id="tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">HUBUNGI KAMI</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form class="form-group" action="" method="post">
                      <ul>
                         <li><label for="mata_pelajaran">Mata Pelajaran</label></li>
                              <input type="text" name="mata_pelajaran" class="form-control" id="mata_pelajaran" placeholder="masukan mata_pelajaran anda">
                          <li><label for="kode_mp">Kode MP</label></li>
                              <input type="text" name="kode_mp" class="form-control" id="kode_mp" placeholder="masukan kode mp pelajaran anda">
                          <li><label for="guru_mengajar">Guru Mengajar</label></li>
                              <input type="text" name="guru_mengajar" class="form-control" id="guru_mengajar" placeholder="masukan tempat tanggal lahir anda">
                          <li><label for="gambar">Gambar</label></li>
                              <input type="text" name="gambar" class="form-control" id="gambar" placeholder="masukan nama gambar anda"></li>          
                      </ul>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">RESET</button>
                    <button type="submit" name="submit" class="btn btn-primary">KIRIM</button> 
                </form>
                </div>
                </div>
              </div>
            </div>
            <table class="table table-striped table-bordered text-center">
              <thead>
                <tr>
                  <th scope="col">NO</th>
                  <th scope="col">MATA PELAJARAN</th>
                  <th scope="col">KODE MP</th>
                  <th scope="col">GURU MENGAJAR</th>
                  <th colspan="3" scope="col">AKSI</th>
                </tr>
               <?php $i= 1; ?>
                <?php foreach($jadwal as $jdl) : ?>
                <tr>
                  <td><?= $i; ?></td>
                  <td><?= $jdl["mata_pelajaran"]; ?></td>
                  <td><?= $jdl["kode_mp"]; ?></td>
                  <td><?= $jdl["guru_mengajar"]; ?></td>
                  <td><a href="detailbelajar.php? id=<?= $jdl["id"];?>" class="btn btn-primary mt-2 text-center">Detail</a></td>
                  <td><a href="ubahbelajar.php? id=<?= $jdl["id"];?>" ><i class="fas fa-edit bg-info text-white p-2 rounded" data-toggle="tooltip" title="edit"></i></a></td>
                  <td><a href="hapusbelajar.php? id=<?= $jdl["id"];?>" onclick= "return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash-alt bg-success text-white p-2 rounded" data-toggle="tooltip" title="Delete"></i></a></td>
                </tr>
                <?php $i++; ?>
                <?php endforeach; ?>
            </table>
           
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>

