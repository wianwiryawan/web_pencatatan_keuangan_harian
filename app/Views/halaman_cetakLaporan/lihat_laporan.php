<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Laporan Keuangan Tanggal <?= $tgl_awal; ?> - <?= $tgl_akhir; ?></title>

    <style>
        table,
        td,
        th {
            border: 1px solid #333;
        }

        table {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            padding: 2px;
        }

        th {
            background-color: #ccc;
        }

        .line-title {
            border: 0;
            border-style: unset;
            border-top: 3px solid;
        }
    </style>

</head>

<body>
    <div class="container-fluid">
        <!-- Page Heading -->
        <table style="width: 100%;">
            <tr>
                <td align="center">
                    <span style="line-height: 2.0; font-weight: bold;">LAPORAN KEUANGAN TOKO AJSTORE46 <br> <small>Tanggal <?= $tgl_awal; ?> - <?= $tgl_akhir; ?></small> <br> <small>Desa Kalibeber, Kecamatan Mojotengah, Kabupaten Wonosobo, Jawa Tengah</small></span>
                </td>
            </tr>
        </table>
        <hr class="line-title">

        <!-- Start of Data Pemasukan -->
        <h2>Data Penjualan Produk</h2>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Ukuran</th>
                    <th>Terjual (Pcs)</th>
                    <th>Harga (Rp.)</th>
                    <th>Total (Rp.)</th>
                </tr>
            </thead>
            <tfoot>
                <?php foreach ($sumDataPenjualan as $sum => $value) : ?>
                    <?php $total_penjualan = $value->total;  ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th><?= $value->total_qty; ?> pcs</th>
                        <th>-</th>
                        <th>Rp. <?= number_format($value->total, 0, ',', '.'); ?></th>
                    </tr>
                <?php endforeach; ?>
            </tfoot>
            <tbody>
                <?php foreach ($penjualan as $p => $value) : ?>
                    <tr>
                        <td align="center"><?= $value->tgl_transaksi; ?></td>
                        <td><?= $value->nama_produk; ?></td>
                        <td align="center"><?= $value->ukuran; ?></td>
                        <td align="center"><?= $value->qty_produk; ?></td>
                        <td align="center"><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                        <td align="center"><?= number_format(($value->qty_produk * $value->nominal), 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of Data Pemasukan -->

        <!-- Start of Data Pengeluaran -->
        <h2>Data Pengeluaran</h2>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Kategori</th>
                    <th>Nama Pengeluaran</th>
                    <th>Nominal (Rp.)</th>
                </tr>
            </thead>
            <tfoot>
                <?php foreach ($sumDataPengeluaran as $sum => $value) : ?>
                    <?php $total_pengeluaran = $value->total;  ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp. <?= number_format($value->total, 0, ',', '.'); ?></th>
                    </tr>
                <?php endforeach; ?>
            </tfoot>
            <tbody>
                <?php foreach ($pengeluaran as $p => $value) : ?>
                    <tr>
                        <td align="center"><?= $value->tgl_transaksi; ?></td>
                        <td align="center"><?= $value->nama_kategori; ?></td>
                        <td><?= $value->keterangan; ?></td>
                        <td align="center"><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of Data Pengeluaran -->

        <!-- Start of Data Keuntungan -->
        <h2>Data Keuntungan</h2>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Keterangan</th>
                    <th>Nominal Month to Date (Rp.)</th>
                    <th>Nominal Year to Date (Rp.)</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th align="left">Keuntungan</th>
                    <th>Rp. <?= number_format($total_penjualan - $total_pengeluaran, 0, ',', '.') ?></th>
                    <th>Rp. <?= number_format($penjualan_tahunan - $pengeluaran_tahunan, 0, ',', '.') ?></th>
                </tr>
            </tfoot>
            <tbody>
                <tr>
                    <td>Pendapatan</td>
                    <td align="center">Rp. <?= number_format($total_penjualan, 0, ',', '.') ?></td>
                    <td align="center">Rp. <?= number_format($penjualan_tahunan, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Biaya</td>
                    <td align="center">Rp. <?= number_format($total_pengeluaran, 0, ',', '.') ?></td>
                    <td align="center">Rp. <?= number_format($pengeluaran_tahunan, 0, ',', '.') ?></td>
                </tr>
            </tbody>
        </table>
        <!-- End of Data Keuntungan -->

        <!-- Start of Data Piutang -->
        <h2>Data Piutang</h2>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Nominal (Rp.)</th>
                </tr>
            </thead>
            <tfoot>
                <?php foreach ($sumPiutang as $sum => $value) : ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp. <?= number_format($value->total, 0, ',', '.'); ?></th>
                    </tr>
                <?php endforeach; ?>
            </tfoot>
            <tbody>
                <?php foreach ($piutang as $p => $value) : ?>
                    <tr>
                        <td align="center"><?= $value->tgl_transaksi; ?></td>
                        <td><?= $value->keterangan; ?></td>
                        <td align="center">
                            <?php if ($value->status == '1') {
                                echo "Lunas";
                            } else {
                                echo "Belum Lunas";
                            } ?>
                        </td>
                        <td align="center"><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of Data Piutang -->

        <!-- Start of Data Hutang -->
        <h2>Data Hutang</h2>
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tanggal Transaksi</th>
                    <th>Keterangan</th>
                    <th>Status</th>
                    <th>Total (Rp.)</th>
                </tr>
            </thead>
            <tfoot>
                <?php foreach ($sumHutang as $sum => $value) : ?>
                    <tr>
                        <th colspan="3">Total</th>
                        <th>Rp. <?= number_format($value->total, 0, ',', '.'); ?></th>
                    </tr>
                <?php endforeach; ?>
            </tfoot>
            <tbody>
                <?php foreach ($hutang as $p => $value) : ?>
                    <tr>
                        <td align="center"><?= $value->tgl_transaksi; ?></td>
                        <td><?= $value->keterangan; ?></td>
                        <td align="center">
                            <?php if ($value->status == '1') {
                                echo "Lunas";
                            } else {
                                echo "Belum Lunas";
                            } ?>
                        </td>
                        <td align="center"><?= number_format($value->nominal, 0, ',', '.'); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- End of Data Hutang -->
</body>
<script type="text/javascript">
    window.print();
</script>

</html>