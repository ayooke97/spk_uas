<?php

ini_set("display_errors", "Off");
include "header.php";
include "menu.php";

include("connect.php");

?>


<?php

$id = $_GET['idk'];
$show_kelas = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
$hasil_kelas = mysqli_query($koneksi, $show_kelas);
$view_kelas = mysqli_fetch_row($hasil_kelas);

?>


<div class="page-wrapper">

  <div class="container-fluid">

    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">UBAH DATA CALON PEGAWAI</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Ubah Data Calon Pegawai</li>
        </ol>
      </div>

    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">



            <form action="" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label>Id</label>
                <input readonly type="text" class="form-control" name="id_pegawai" value="<?php print($view_kelas[0]); ?>" />
              </div>
              <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama_pegawai" value="<?php print($view_kelas[2]); ?>" />
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" class="form-control" name="telepon" value="<?php print($view_kelas[3]); ?>" />
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" rows="5" cols="50"><?php print($view_kelas[4]); ?></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Foto</label>
                <input type="file" name="fupload">
                <p>
                  <?php

                  if (empty($view_kelas['8'])) {
                    echo '<img src="images/user.png" width="80">';
                  } else {
                    echo '<img src="images/pemilik/' . $view_kelas['5'] . '" width="80">';
                  }

                  ?>
                </p>
              </div>
              <div class="form-group">
                <input class="btn btn-success" type="submit" value="Simpan" />
                <a class="btn btn-warning" href="pegawai.php">Kembali</a>
              </div>

            </form>

            <?php


            $nama = $_POST['nama_pegawai'];
            $telepon = $_POST['telepon'];
            $alamat = $_POST['alamat'];

            $lokasi_file = $_FILES['fupload']['tmp_name'];
            $nama_file   = $_FILES['fupload']['name'];

            if (isset($nama, $telepon)) {
              if ((!$nama) || (!$telepon)) {
                print "<script>alert ('Harap semua data diisi...!!');</script>";
                print "<script> self.history.back('Gagal Menyimpan');</script>";
                exit();
              }

              move_uploaded_file($lokasi_file, "images/pemilik/$nama_file");

              $add_kelas = "UPDATE pegawai SET nama='$nama',telepon='$telepon',alamat='$alamat',foto='$nama_file'
                                      WHERE id_pegawai='$id'";
              mysqli_query($koneksi, $add_kelas);

              echo '
                                      <script type="text/javascript">
                                       
                                             alert ("Data Berhasil Ditambah!");
                                             
                                      </script>
                                      ';
              echo '<meta http-equiv="refresh" content="1; url=pegawai.php" />';
            }

            ?>


          </div>
        </div>
      </div>
    </div>

  </div>

  <?php
  include 'footer.php';
  ?>