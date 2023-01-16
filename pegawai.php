<?php
include "header.php";
include "menu.php";
ini_set("display_errors", "On");
include("connect.php");
?>


<div class="page-wrapper">
  <!-- ============================================================== -->
  <!-- Container fluid  -->
  <!-- ============================================================== -->
  <div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor m-b-0 m-t-0">DATA CALON PEGAWAI</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Data Pegawai</li>
        </ol>
      </div>

    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-block">
            <p align="left"><a class='btn btn-primary' href="tambahpegawai.php">Tambah Data Calon Pegawai</a></p>
            <div class="table-responsive">
              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama </th>
                    <th>No. Telepon</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  <?php

                  $sql = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY id_pegawai DESC");

                  $no = 1;

                  while ($row = mysqli_fetch_array($sql)) { ?>

                    <tr class='td' bgcolor='#FFF'>

                      <td><?php echo $no; ?></td>
                      <td><?php echo $row['nama']; ?></td>
                      <td><?php echo $row['telepon']; ?></td>
                      <td>
                        <?php

                        if (empty($row['foto'])) {
                          echo '<img src="images/user.png" width="50">';
                        } else {
                          echo '<img src="images/pemilik/' . $row['foto'] . '" width="50">';
                        }

                        ?>
                      </td>

                      <?php


                      print("
                                                <td>
                                                <a class='btn btn-warning' href=editpegawai.php?idk=$row[id_pegawai]>
                                                Ubah
                                                </a>
                                                <a class='btn btn-danger' href=javascript:KonfirmasiHapus('deletepegawai.php?idk','$row[id_pegawai]')>
                                                Hapus
                                                </a>
                                                <a class='btn btn-primary' href=inputdetailpegawai.php?idk=$row[id_pegawai]>
                                                Input Detail Calon Pegawai
                                                </a>
                                                </td>
                                              </tr>");


                      $no++;

                      ?>
                    </tr>
                  <?php } ?>


                </tbody>
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>




  <script type="text/javascript">
    $(function() {
      $("#datatable").dataTable();
    });
  </script>
  <?php
  include "footer.php";
  ?>