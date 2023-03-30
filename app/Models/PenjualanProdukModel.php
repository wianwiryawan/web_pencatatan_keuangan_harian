<?php

namespace App\Models;

use CodeIgniter\Model;

class PenjualanProdukModel extends Model
{
    protected $table = "tb_penjualan_produk";
    protected $allowedFields = ['id_produk', 'nama_produk', 'ukuran', 'nominal', 'qty_produk', 'tgl_transaksi'];
    protected $useTimestamps = true;

    // Join tb_penjualan_produk dengan tb_ukuran_produk
    function getAll()
    {
        $builder = $this->db->table('tb_penjualan_produk');
        $builder->join('tb_ukuran_produk', 'tb_ukuran_produk.id_ukuran = tb_penjualan_produk.ukuran');
        $query = $builder->get();
        return $query->getResult();
    }

    // Mengambil 1 baris data berdasarkan id
    function getId($id)
    {
        $builder = $this->db->table('tb_penjualan_produk');
        $builder->join('tb_ukuran_produk', 'tb_ukuran_produk.id_ukuran = tb_penjualan_produk.ukuran');
        $query = $builder->getWhere(['id' => $id]);
        return $query->getResult();
    }

    // Data total pendapatan bulanan
    function getSumByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT SUM(nominal * qty_produk) AS nominal FROM tb_penjualan_produk WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->nominal;
        // return $result->getResult();
    }

    // Data total pendapatan tahunan
    function getSumByYear()
    {
        $year = date('Y');
        $sql = "SELECT SUM(nominal * qty_produk) AS nominal FROM tb_penjualan_produk WHERE YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->nominal;
        // return $result->getResult();
    }

    // Data total produk terjual bulanan
    function getSumProductByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT SUM(qty_produk) AS qty_produk FROM tb_penjualan_produk WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->qty_produk;
    }

    // Data produk terjual setiap harinya
    function getProductByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, sum(qty_produk) AS qty_produk FROM tb_penjualan_produk  WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year' GROUP BY tgl_transaksi ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Data produk terjual setiap harinya1
    function getProductByMonth1()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT nama_produk, qty_produk FROM tb_penjualan_produk  WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year' ORDER BY nama_produk";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Data produk terjual setiap bulannya
    function getProductByYear()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, MONTHNAME(tgl_transaksi) AS month, sum(qty_produk) AS qty_produk FROM tb_penjualan_produk WHERE YEAR(tgl_transaksi) = '2022' GROUP BY MONTH(tgl_transaksi) ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Data total produk terjual tahunan
    function getSumProductByYear()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT SUM(qty_produk) AS qty_produk FROM tb_penjualan_produk WHERE YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->qty_produk;
    }

    // Nominal dalam satu bulan
    function getNominalByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, qty_produk, nominal FROM tb_penjualan_produk WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year' GROUP BY tgl_transaksi ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Nominal dalam satu tahun setiap bulannya
    function getNominalByYear()
    {
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, MONTHNAME(tgl_transaksi) AS month, SUM(nominal * qty_produk) AS nominal FROM tb_penjualan_produk WHERE YEAR(tgl_transaksi) = '$year' GROUP BY MONTH(tgl_transaksi) ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Mengambil data berdasarkan rentang tanggal
    function getDataByDate($tgl_awal, $tgl_akhir)
    {
        $sql = "SELECT * FROM tb_penjualan_produk JOIN tb_ukuran_produk ON tb_ukuran_produk.id_ukuran = tb_penjualan_produk.ukuran WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_transaksi";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Mengambil total produk & nominal berdasarkan rentang tanggal
    function getDataTotalByDate($tgl_awal, $tgl_akhir)
    {
        $sql = "SELECT SUM(qty_produk) AS total_qty, SUM(qty_produk * nominal) AS total FROM tb_penjualan_produk WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir';";
        $result = $this->db->query($sql);
        return $result->getResult();
    }
}
