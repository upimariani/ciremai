<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-check"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User</span>
                            <span class="info-box-number">

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="far fa-smile"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Pendaki</span>
                            <span class="info-box-number"></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>


                <!-- /.col -->
            </div>
            <?php
            if ($this->session->userdata('success')) {
            ?>
                <div class="callout callout-success">
                    <h5>Success!</h5>

                    <p><?= $this->session->userdata('success') ?></p>
                </div>
            <?php
            }
            ?>

            <!-- Main row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-text-width"></i><strong>
                                    Analisis Perhitungan Metode JNQ</strong><br>

                            </h3>
                        </div>
                        <div class="col-md-12">
                            <!-- Info Boxes Style 2 -->
                            <div class="info-box mb-3 bg-warning">
                                <span class="info-box-icon"><i class="fas fa-wave-square"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">PORTER</span>
                                    <span class="info-box-number">
                                        <p>

                                            <?php
                                            //diambil dari total detail
                                            $jml_penelitian_porter = $jasa['jml_porter']->jml_porter;

                                            //waktu pendakian 3 hari
                                            $waktu_pelayanan_porter = 4320;


                                            //tingkat intensitas fasilitas pelayanan
                                            $tngkt_intensitas_porter = 0;
                                            $tngkt_intensitas_porter = round($jml_penelitian_porter / $waktu_pelayanan_porter, 5) * 100;

                                            //rata-rata jumlah pelanggan antri dalam sistem
                                            $rata_sistem_porter = 0;
                                            $rata_sistem_porter = $jml_penelitian_porter / ($waktu_pelayanan_porter - $jml_penelitian_porter);

                                            //rata-rata jumlah pelanggan antri dalam antrian 
                                            $rata_antrian_porter = 0;
                                            $rata_antrian_porter = ($jml_penelitian_porter * $jml_penelitian_porter) / $waktu_pelayanan_porter * ($waktu_pelayanan_porter - $jml_penelitian_porter);

                                            //rata - rata waktu yang dihabiskan seorang pelanggan dalam sistem
                                            $ws_porter = 0;
                                            $ws_porter = (1 / ($waktu_pelayanan_porter - $jml_penelitian_porter)) * 60;

                                            //rata-rata waktu yang dihabiskan seorang pelanggan dalam antrian
                                            $wq_porter = 0;
                                            $wq_porter = $jml_penelitian_porter / ($waktu_pelayanan_porter * ($waktu_pelayanan_porter - $jml_penelitian_porter));

                                            ?>

                                            <?= $tngkt_intensitas_porter ?>
                                            <br>
                                            <?= $rata_sistem_porter ?>
                                            <br>
                                            <?= $rata_antrian_porter ?>
                                            <br>
                                            <?= $ws_porter ?>
                                            <br>
                                            <?= $wq_porter ?>

                                        </p>
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-success">
                                <span class="info-box-icon"><i class="fas fa-pager"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">GUIDE</span>
                                    <p>

                                        <?php
                                        //diambil dari total detail
                                        $jml_penelitian_guide = $jasa['jml_guide']->jml_guide;

                                        //waktu pendakian 3 hari
                                        $waktu_pelayanan_guide = 4320;


                                        //tingkat intensitas fasilitas pelayanan
                                        $tngkt_intensitas_guide = 0;
                                        $tngkt_intensitas_guide = round($jml_penelitian_guide / $waktu_pelayanan_guide, 5) * 100;

                                        //rata-rata jumlah pelanggan antri dalam sistem
                                        $rata_sistem_guide = 0;
                                        $rata_sistem_guide = $jml_penelitian_guide / ($waktu_pelayanan_guide - $jml_penelitian_guide);

                                        //rata-rata jumlah pelanggan antri dalam antrian 
                                        $rata_antrian_guide = 0;
                                        $rata_antrian_guide = ($jml_penelitian_guide * $jml_penelitian_guide) / $waktu_pelayanan_guide * ($waktu_pelayanan_guide - $jml_penelitian_guide);

                                        //rata - rata waktu yang dihabiskan seorang pelanggan dalam sistem
                                        $ws_guide = 0;
                                        $ws_guide = (1 / ($waktu_pelayanan_guide - $jml_penelitian_guide)) * 60;

                                        //rata-rata waktu yang dihabiskan seorang pelanggan dalam antrian
                                        $wq_guide = 0;
                                        $wq_guide = $jml_penelitian_guide / ($waktu_pelayanan_guide * ($waktu_pelayanan_guide - $jml_penelitian_guide));

                                        ?>

                                        <?= $tngkt_intensitas_guide ?>
                                        <br>
                                        <?= $rata_sistem_guide ?>
                                        <br>
                                        <?= $rata_antrian_guide ?>
                                        <br>
                                        <?= $ws_guide ?>
                                        <br>
                                        <?= $wq_guide ?>

                                    </p>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                            <div class="info-box mb-3 bg-danger">
                                <span class="info-box-icon"><i class="fas fa-ruler"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">
                                        <h4>ALAT</h4>
                                    </span>
                                    <div class="row">
                                        <table class="table">
                                            <tr>
                                                <th>Nama Alat</th>
                                                <th>Tingkat Intensitas Alat</th>
                                                <th>Rata - Rata Sistem</th>
                                                <th>Rata - Rata Antrian</th>
                                                <th>Rata - Rata waktu yang dihabiskan dalam sistem</th>
                                                <th>Rata - Rata waktu yang dihabiskan dalam antrian</th>
                                            </tr>
                                            <?php
                                            foreach ($alat['alat'] as $key => $value) {
                                                //diambil dari total detail
                                                $jml_penelitian_alat = $value->jml_alat;

                                                //waktu pendakian 3 hari
                                                $waktu_pelayanan_alat = 4320;


                                                //tingkat intensitas fasilitas pelayanan
                                                $tngkt_intensitas_alat = 0;
                                                $tngkt_intensitas_alat = round($jml_penelitian_alat / $waktu_pelayanan_alat, 5) * 100;

                                                //rata-rata jumlah pelanggan antri dalam sistem
                                                $rata_sistem_alat = 0;
                                                $rata_sistem_alat = $jml_penelitian_alat / ($waktu_pelayanan_alat - $jml_penelitian_alat);

                                                //rata-rata jumlah pelanggan antri dalam antrian 
                                                $rata_antrian_alat = 0;
                                                $rata_antrian_alat = ($jml_penelitian_alat * $jml_penelitian_alat) / $waktu_pelayanan_alat * ($waktu_pelayanan_alat - $jml_penelitian_alat);

                                                //rata - rata waktu yang dihabiskan seorang pelanggan dalam sistem
                                                $ws_alat = 0;
                                                $ws_alat = (1 / ($waktu_pelayanan_alat - $jml_penelitian_alat)) * 60;

                                                //rata-rata waktu yang dihabiskan seorang pelanggan dalam antrian
                                                $wq_alat = 0;
                                                $wq_alat = $jml_penelitian_alat / ($waktu_pelayanan_alat * ($waktu_pelayanan_alat - $jml_penelitian_alat));
                                            ?>
                                                <tr>
                                                    <td><?= $value->nama_alat ?></td>
                                                    <td><?= round($tngkt_intensitas_alat, 3) ?></td>
                                                    <td><?= round($rata_sistem_alat, 3) ?></td>
                                                    <td><?= round($rata_antrian_alat, 3) ?></td>
                                                    <td><?= round($ws_alat, 3) ?></td>
                                                    <td><?= round($wq_alat, 3) ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->

                            <!-- /.card -->
                        </div>
                    </div>
                </div>


                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->