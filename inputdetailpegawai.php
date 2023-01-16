<?php
include "header.php";
include "connect.php";
?>

<?php
$id = $_GET['idk'];
$show_kelas = "SELECT * FROM detail WHERE id_pegawai='$id'";
$hasil_kelas = mysqli_query($koneksi, $show_kelas);
$view_kelas = mysqli_fetch_row($hasil_kelas);

?>

<script src="js/jquery.js"></script>
<script src="js/validator.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(document).ready(function() {
    $('form').parsley();
  });
</script>

<div class="container">

  <h1 class="mt-5">Input Detail Calon Pegawai</h1>
  <div class="row">
    <div class="col-lg-12">




      <?php

      if (mysqli_num_rows($hasil_kelas) > 0) {

      ?>

        <div class="table-responsive">
          <br>
          <p align="center">
            <img src="images/sr1-icon-noResult.png"><br><br>
            <strong>Maaf!! Kamar Sudah Terisi</strong>
          </p>


        </div>






      <?php
      } else {
        $q = "SELECT * FROM pegawai WHERE id_pegawai='$id'";
        $a = mysqli_query($koneksi, $q);
        $b = mysqli_fetch_array($a);
        $idpegawai = $b['id_pegawai'];
      ?>



        <div class="table-responsive">
          <form action="" class="form-horizontal" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
            <table class="table" align="left">
              <tr>
                <td>ID Calon Pegawai</td>
                <td><input readonly type="text" class="form-control" name="idpegawai" value="<?php echo $idpegawai; ?>"></td>
              </tr>
              <?php
              $q = mysqli_query($koneksi, "select * from kriteria ORDER BY id_kriteria");
              while ($r = mysqli_fetch_array($q)) {
              ?>
                <tr>
                  <td width="200">
                    <?php echo $r['nama_kriteria']; ?> (<?php echo $r['atribut']; ?>)
                  </td>
                  <td width="200">
                    <div class="form-group">
                      <?php
                      if ($r['type'] == 'input') {
                      ?>
                        <input type="text" class="form-control" required name="kepentingan<?php echo $r['id_kriteria']; ?>" value="">
                      <?php } else { ?>
                        <?php
                        $no = 1;
                        $querykriteria = mysqli_query($koneksi, "SELECT * FROM kriteria,t_kriteria WHERE kriteria.id_kriteria = t_kriteria.id_kriteria AND t_kriteria.id_kriteria='$r[id_kriteria]'");
                        while ($datakriteria = mysqli_fetch_array($querykriteria)) {
                          $no++;
                        ?>
                          <div class="form-check" style="margin-left: -45px !important; padding-left: 0px !important">
                            <div class="radio">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="kepentingan<?php echo $datakriteria['id_kriteria']; ?>" id="exampleRadios<?php echo $datakriteria['id_kriteria'] . $no; ?>" value="<?php echo $datakriteria['nkriteria']; ?>">
                                <label class="form-check-label" for="exampleRadios<?php echo $datakriteria['id_kriteria'] . $no; ?>">
                                  <?php echo $datakriteria['keterangan']; ?>
                                </label>
                              </div>
                            </div>
                          </div>
                      <?php
                        }
                      }
                      ?>
                      <div class="help-block with-errors"></div>
                    </div>
                  </td>
                </tr>
              <?php } ?>

              <tr>
                <td colspan="2"><input id="btn-fblogin" class="btn btn-primary" type="submit" name="submit" value="Submit Data" /></td>
              </tr>
            </table>
          </form>
        </div>

        <?php
        $idpegawai = $_POST['idpegawai'];
        if (isset($_POST["submit"])) {
          for ($i = 1; $i <= 7; $i++) {
            $kepentinganku = $_POST['kepentingan' . $i];
            $nilai = 0;
            switch ($i) {
              case '1':
                if ($kepentinganku > 1 && $kepentinganku < 2) {
                  $nilai = 2;
                } else if ($kepentinganku > 2 && $kepentinganku < 3) {
                  $nilai = 4;
                } else if ($kepentinganku > 3 && $kepentinganku <= 4) {
                  $nilai = 5;
                }

                $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$nilai')";
                $hasil = mysqli_query($koneksi, $query);
                echo ($query);
                break;

              case '3':
                if ($kepentinganku > 310 && $kepentinganku < 400) {
                  $nilai = 2;
                } else if ($kepentinganku > 400 && $kepentinganku < 500) {
                  $nilai = 4;
                } else if ($kepentinganku > 500 && $kepentinganku <= 677) {
                  $nilai = 5;
                }

                $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$nilai')";
                $hasil = mysqli_query($koneksi, $query);
                break;

              case '4':
                if ($kepentinganku > 158 && $kepentinganku < 165) {
                  $nilai = 2;
                } else if ($kepentinganku > 165 && $kepentinganku < 180) {
                  $nilai = 4;
                } else if ($kepentinganku > 180 && $kepentinganku <= 190) {
                  $nilai = 5;
                }

                $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$nilai')";
                $hasil = mysqli_query($koneksi, $query);
                break;

              case '5':
                if ($kepentinganku <= 2) {
                  $nilai = 1;
                } else if ($kepentinganku > 2 && $kepentinganku < 4) {
                  $nilai = 2;
                } else if ($kepentinganku > 4 && $kepentinganku < 6) {
                  $nilai = 3;
                } else if ($kepentinganku > 6 && $kepentinganku < 8) {
                  $nilai = 4;
                } else {
                  $nilai = 5;
                }

                $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$nilai')";
                $hasil = mysqli_query($koneksi, $query);
                break;

              case '7':
                if ($kepentinganku <= 24) {
                  $nilai = 4;
                } else if ($kepentinganku > 24 && $kepentinganku < 30) {
                  $nilai = 3;
                } else if ($kepentinganku >= 30 && $kepentinganku <= 34) {
                  $nilai = 2;
                } else if ($kepentinganku > 40) {
                  $nilai = 1;
                }

                $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$nilai')";
                $hasil = mysqli_query($koneksi, $query);
                break;

              default:
                if ((!empty($kepentinganku))) {
                  $query = "INSERT INTO analisa (id_kriteria, id_pegawai, nilainya) VALUES ('$i', '$idpegawai', '$kepentinganku')";
                  $hasil = mysqli_query($koneksi, $query);
                }
                break;
            }
          }

          $add_kelas = "INSERT INTO detail(id_pegawai,ipk,pendidikan,toefl,tinggi,jumlah_sertifikat,pengalaman_kerja,usia) VALUES 
                ('$idpegawai','$_POST[kepentingan1]','$_POST[kepentingan2]','$_POST[kepentingan3]','$_POST[kepentingan4]','$_POST[kepentingan5]','$_POST[kepentingan6]','$_POST[kepentingan7]')";
          mysqli_query($koneksi, $add_kelas);

          echo '
                <script type="text/javascript">
                  alert ("Data Berhasil Ditambah!");
                </script>
                ';
          echo '<meta http-equiv="refresh" content="1; url=pegawai.php" />';
        }
        ?>


      <?php
      }
      ?>


    </div>

  </div>
</div>