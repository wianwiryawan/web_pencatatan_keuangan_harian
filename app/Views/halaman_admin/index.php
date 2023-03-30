<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin - Dashboard</title>

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
        <?= $this->include('halaman_admin/sidebar'); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <?= $this->include('halaman_admin/topbar'); ?>
                <!-- Topbar Nama User -->

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="<?php echo base_url('laporan/createLaporan'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                            <i class="fas fa-download fa-sm text-white-50 mr-1"></i>Cetak Laporan</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pendapatan Month to Date (<?= date('M'); ?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($P_bulanan, 0, ',', '.'); ?></div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pendapatan Year to Date (<?= date('Y'); ?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Rp. <?= number_format($P_tahunan, 0, ',', '.'); ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-arrow-up fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pengeluaran Month to Date (<?= date('M'); ?>)</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">(Rp. <?= number_format($B_bulanan, 0, ',', '.'); ?>)</div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Pengeluaran Year to Date (<?= date('Y'); ?>)</div>
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">(Rp. <?= number_format($B_tahunan, 0, ',', '.'); ?>)</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-arrow-down fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Produk Terjual Month to Date (<?= date('M'); ?>)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $P_produk_bulan; ?> pcs</div>
                                        </div>
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Produk Terjual Year to Date (<?= date('Y'); ?>)</div>
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

                    <!-- Start of Grafik Keuangan Harian -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Harian (<?= date('M'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="penjualan_harian"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik pengeluaran Harian (<?= date('M'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="pengeluaran_harian"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grafik Keuangan Harian -->


                    <!-- Start of Grafik Keuangan Bulanan -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Penjualan Bulanan (<?= date('Y'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample1">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="penjualan_bulanan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample1" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample1">
                                    <h6 class="m-0 font-weight-bold text-primary">Grafik Pengeluaran Bulanan (<?= date('Y'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample1">
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <canvas id="pengeluaran_bulanan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grafik Keuangan Bulanan -->

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

                    <!-- Start of Grafik kategori Pengeluaran -->
                    <div class="row">
                        <!-- Start of Grafik kategori Pengeluaran Bulanan -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample4">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kategori Pengeluaran Bulan (<?= date('M'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample4">
                                    <div class="card-body">
                                        <div class="chart-pie">
                                            <canvas id="kategori_pengeluaran_bulanan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Grafik kategori Pengeluaran Bulanan -->

                        <!-- Start of Grafik kategori Pengeluaran Tahunan -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <a href="#collapseCardExample4" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample4">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kategori Pengeluaran Tahun (<?= date('Y'); ?>)</h6>
                                </a>
                                <!-- Card Body -->
                                <div class="collapse hide" id="collapseCardExample4">
                                    <div class="card-body">
                                        <div class="chart-pie">
                                            <canvas id="kategori_pengeluaran_tahunan"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Grafik kategori Pengeluaran Tahunan -->

                    </div>
                    <!-- End of Grafik kategori Pengeluaran -->

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

    <!-- Chart Penjualan Harian -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("penjualan_harian");
        var data_penjualan_harian = [];
        var label_tanggal_pemasukan = [];


        <?php foreach ($nominalPenjualanByMonth as $nominal => $value) : ?>
            data_penjualan_harian.push(<?= $value->qty_produk * $value->nominal ?>);
            label_tanggal_pemasukan.push("<?= $value->tgl_transaksi ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal_pemasukan,
                datasets: [{
                    label: "Pendapatan",
                    data: data_penjualan_harian,
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
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

    <!-- Chart Pengeluaran Harian -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("pengeluaran_harian");
        var data_pengeluaran_harian = [];
        var label_tanggal_pengeluaran = [];

        <?php foreach ($nominalPengeluaranByMonth as $nominal => $value) : ?>
            data_pengeluaran_harian.push(<?= $value->nominal ?>);
            label_tanggal_pengeluaran.push("<?= $value->tgl_transaksi ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal_pengeluaran,
                datasets: [{
                    label: "Pengeluaran",
                    data: data_pengeluaran_harian,
                    lineTension: 0.3,
                    backgroundColor: "rgba(255, 0, 0, 0.05)",
                    borderColor: "rgba(255, 0, 0, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(255, 0, 0, 1)",
                    pointBorderColor: "rgba(255, 0, 0, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(255, 0, 0, 1)",
                    pointHoverBorderColor: "rgba(255, 0, 0, 1)",
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

    <!-- Chart Penjualan Bulanan -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("penjualan_bulanan");
        var data_penjualan_bulanan = [];
        var label_tanggal_pemasukan = [];


        <?php foreach ($nominalPenjualanByYear as $nominal => $value) : ?>
            data_penjualan_bulanan.push(<?= $value->nominal ?>);
            label_tanggal_pemasukan.push("<?= $value->month ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal_pemasukan,
                datasets: [{
                    label: "Pendapatan",
                    data: data_penjualan_bulanan,
                    lineTension: 0.3,
                    backgroundColor: "rgba(78, 115, 223, 0.05)",
                    borderColor: "rgba(78, 115, 223, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointBorderColor: "rgba(78, 115, 223, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                    pointHoverBorderColor: "rgba(78, 115, 223, 1)",
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

    <!-- Chart Pengeluaran Bulanan -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("pengeluaran_bulanan");
        var data_pengeluaran_bulanan = [];
        var label_tanggal_pengeluaran = [];


        <?php foreach ($nominalPengeluaranByYear as $nominal => $value) : ?>
            data_pengeluaran_bulanan.push(<?= $value->nominal ?>);
            label_tanggal_pengeluaran.push("<?= $value->month ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: label_tanggal_pengeluaran,
                datasets: [{
                    label: "Pengeluaran",
                    data: data_pengeluaran_bulanan,
                    lineTension: 0.3,
                    backgroundColor: "rgba(255, 0, 0, 0.05)",
                    borderColor: "rgba(255, 0, 0, 1)",
                    pointRadius: 3,
                    pointBackgroundColor: "rgba(255, 0, 0, 1)",
                    pointBorderColor: "rgba(255, 0, 0, 1)",
                    pointHoverRadius: 3,
                    pointHoverBackgroundColor: "rgba(255, 0, 0, 1)",
                    pointHoverBorderColor: "rgba(255, 0, 0, 1)",
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

    <!-- Chart Kategori Pengeluaran Bulanan -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("kategori_pengeluaran_bulanan");
        var data_kategori_pengeluaran_bulanan = [];
        var label_nama = [];

        <?php foreach ($kategoriPengeluaranByMonth as $nominal => $value) : ?>
            data_kategori_pengeluaran_bulanan.push(<?= $value->kategori ?>);
            label_nama.push("<?= $value->nama_kategori ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: label_nama,
                datasets: [{
                    data: data_kategori_pengeluaran_bulanan,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.8)",
                        "rgba(54, 162, 235, 0.8)",
                        "rgba(255, 206, 86, 0.8)",
                        "rgba(123, 99, 132, 0.8)",
                        "rgba(0, 255, 45, 0.8)",
                        "rgba(66, 235, 0, 0.8)",
                        "rgba(35, 173, 162, 0.8)",
                        "rgba(149, 80, 24, 0.8)",
                        "rgba(134, 148, 164, 0.8)",
                        "rgba(216, 77, 7, 1)",
                        "rgba(234, 37, 17, 0.6)",
                        "rgba(196, 252, 102, 0.4)",
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 0,
                        bottom: 0
                    }
                },
                legend: {
                    display: true
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
                    displayColors: true,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });
    </script>

    <!-- Chart Kategori Pengeluaran Tahunan -->
    <script>
        // Area Chart Example
        var ctx = document.getElementById("kategori_pengeluaran_tahunan");
        var data_kategori_pengeluaran_tahunan = [];
        var label_nama = [];

        <?php foreach ($kategoriPengeluaranByYear as $nominal => $value) : ?>
            data_kategori_pengeluaran_tahunan.push(<?= $value->kategori ?>);
            label_nama.push("<?= $value->nama_kategori ?>");
        <?php endforeach; ?>

        var myLineChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: label_nama,
                datasets: [{
                    data: data_kategori_pengeluaran_tahunan,
                    backgroundColor: [
                        "rgba(255, 99, 132, 0.8)",
                        "rgba(54, 162, 235, 0.8)",
                        "rgba(255, 206, 86, 0.8)",
                        "rgba(123, 99, 132, 0.8)",
                        "rgba(0, 255, 45, 0.8)",
                        "rgba(66, 235, 0, 0.8)",
                        "rgba(35, 173, 162, 0.8)",
                        "rgba(149, 80, 24, 0.8)",
                        "rgba(134, 148, 164, 0.8)",
                        "rgba(216, 77, 7, 1)",
                        "rgba(234, 37, 17, 0.6)",
                        "rgba(196, 252, 102, 0.4)",
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 0,
                        bottom: 0
                    }
                },
                legend: {
                    display: true
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
                    displayColors: true,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                }
            }
        });
    </script>
</body>

</html>