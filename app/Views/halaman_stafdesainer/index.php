<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Staf Desainer - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url();  ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url();  ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?= $this->include('halaman_stafdesainer/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?= $this->include('halaman_stafdesainer/topbar'); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Card Produk Terjual -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Produk Terjual Bulan (<?= date('M'); ?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $P_produk_bulan; ?> pcs</div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Produk Terjual Tahun (<?= date('Y'); ?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $P_produk_tahun; ?> pcs</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Start of Table -->
                    <div class="col-xl col-md mb-4">
                        <div class="card border-bottom-info shadow h-100">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-info">Data Produk Terjual (<?= date('M'); ?>)</h6>
                            </div>
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Terjual (pcs)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php foreach ($produk as $p => $value) : ?>
                                                            <tr>
                                                                <td><?= $i++; ?></td>
                                                                <td><?= $value->nama_produk; ?></td>
                                                                <td align="center"><?= $value->qty_produk; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Table -->

                    <!-- Start of Grafik Produk Terjual -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Produk Terjual Harian (<?= date('M'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample2">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="produk_terjual_harian"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample2" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample2">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Produk Terjual Bulanan (<?= date('Y'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample2">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="produk_terjual_bulanan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grafik Produk Terjual -->

                    <!-- Content Row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AJStore <?= date('Y'); ?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin untuk logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika ingin mengakhiri sesi.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="<?php echo site_url('login/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url();  ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url();  ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url();  ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url();  ?>/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url();  ?>/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url();  ?>/js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url();  ?>/js/demo/chart-pie-demo.js"></script>

    <!-- Chart Produk Terjual Harian -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("produk_terjual_harian");
        var data_produk_harian = [];
        var label_tanggal = [];


        <?php foreach ($produkByMonth as $nominal => $value) : ?>
            data_produk_harian.push(<?= $value->qty_produk ?>);
            label_tanggal.push("<?= $value->tgl_transaksi ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal,
                datasets: [{
                    label: "Produk Terjual",
                    data: data_produk_harian,
                    lineTension: 0.3,
                    backgroundColor: "rgba(60, 179, 113, 0.05)",
                    borderColor: "rgba(60, 179, 113, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(60, 179, 113, 1)",
                    pointBorderColor: "rgba(60, 179, 113, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(60, 179, 113, 1)",
                    pointHoverBorderColor: "rgba(60, 179, 113, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        },
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });
    </script>

    <!-- Chart Produk Terjual Bulanan -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("produk_terjual_bulanan");
        var data_produk_bulanan = [];
        var label_tanggal = [];

        <?php foreach ($produkByYear as $nominal => $value) : ?>
            data_produk_bulanan.push(<?= $value->qty_produk ?>);
            label_tanggal.push("<?= $value->month ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal,
                datasets: [{
                    label: "Produk Terjual",
                    data: data_produk_bulanan,
                    lineTension: 0.3,
                    backgroundColor: "rgba(60, 179, 113, 0.05)",
                    borderColor: "rgba(60, 179, 113, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(60, 179, 113, 1)",
                    pointBorderColor: "rgba(60, 179, 113, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(60, 179, 113, 1)",
                    pointHoverBorderColor: "rgba(60, 179, 113, 1)",
                    pointHitRadius: 10,
                    pointBorderWidth: 2,
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'date'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 7
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            maxTicksLimit: 5,
                            padding: 10,
                        },
                        gridLines: {
                            color: "rgb(234, 236, 244)",
                            zeroLineColor: "rgb(234, 236, 244)",
                            drawBorder: false,
                            borderDash: [2],
                            zeroLineBorderDash: [2]
                        },
                    }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });
    </script>

</body>

</html>