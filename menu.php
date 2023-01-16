<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">

            <?php
            if ($_SESSION["status"] == "admin") {
            ?>

                <ul id="sidebarnav">

                    <li> <a class="waves-effect waves-dark" href="halutama.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                    </li>

                    <li> <a class="waves-effect waves-dark" href="pegawai.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Data Calon Pegawai</span></a>
                    </li>

                    <li> <a class="waves-effect waves-dark" href="kriteria.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Bobot Kriteria</span></a>
                    </li>

                    <li> <a class="waves-effect waves-dark" href="perhitungan.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Hasil Nilai Topsis</span></a>
                    </li>

                    <li> <a class="waves-effect waves-dark" href="logout.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Logout</span></a>
                    </li>


                </ul>

            <?php
            }
            ?>



        </nav>
        <!-- End Sidebar navigation -->
    </div>

</aside>