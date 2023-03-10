<?php
include "header.php";
include "menu.php";
ini_set("display_errors", "Off");
include("connect.php");
?>


<div class="page-wrapper">

  <div class="container-fluid">

    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">TAMBAH DATA CALON PEGAWAI</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Tambah Data Calon Pegawai</li>
        </ol>
      </div>

    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">


            <form action="" method="post" enctype="multipart/form-data" id="frm-mhs">
              <div class="form-group">
                <label>Nama Pegawai</label>
                <input type="text" id="nama_pegawai" class="form-control" name="nama_pegawai" class="required" />
              </div>
              <div class="form-group">
                <label>Nomor Telepon</label>
                <input type="text" id="telepon" class="form-control" name="telepon" class="required" />
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea id="alamat" class="form-control" name="alamat" rows="5" cols="50" class="required"></textarea>
              </div>
              <div class="form-group">
                <label for="exampleInputFile">Foto</label>
                <input type="file" name="fupload">
              </div>
              <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Simpan" />
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

              $add_kelas = "INSERT INTO pegawai(nama,telepon,alamat,foto,status) VALUES ('$nama','$telepon','$alamat','$nama_file','y')";
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

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/jquery.validate.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#frm-mhs').validate({
        rules: {
          nama_pemilik: {
            minlength: 2,
            required: true
          },
          nama_kos: {
            minlength: 2,
            required: true
          },
          alamat: {
            required: true
          },
          telepon: {
            digits: true,
            maxlength: 15,
            required: true
          }
        },
        messages: {
          nama_pemilik: {
            required: "* Kolom nama pemilik harus diisi",
            minlength: "Kolom nama pemilik harus terdiri dari minimal 2 digit"
          },
          nama_kos: {
            required: "* Kolom nama kos harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit"
          },
          alamat: {
            required: "* Kolom alamat harus diisi"
          },
          telepon: {
            required: "* Kolom telepon harus diisi",
            minlength: "Kolom nama kos harus terdiri dari minimal 2 digit",
            maxlength: "Kolom telepon harus maximal 15 digit"
          }
        }
      });
    });
  </script>

  <?php
  include "footer.php";
  ?>