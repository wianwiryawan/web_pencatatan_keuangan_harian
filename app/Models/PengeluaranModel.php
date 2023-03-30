<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = "tb_pengeluaran";
    protected $allowedFields = ['id_kategori', 'keterangan', 'nominal', 'tgl_transaksi'];
    protected $useTimestamps = true;

    // Join tabel pengeluaran dengan kategori pengeluaran
    function getAll()
    {
        $builder = $this->db->table('tb_pengeluaran');
        $builder->join('tb_kategori_pengeluaran', 'tb_kategori_pengeluaran.id_kategori = tb_pengeluaran.id_kategori');
        $query = $builder->get();
        return $query->getResult();
    }

    // Mengambil 1 baris data berdasarkan id
    function getId($id)
    {
        $builder = $this->db->table('tb_pengeluaran');
        $builder->join('tb_kategori_pengeluaran', 'tb_kategori_pengeluaran.id_kategori = tb_pengeluaran.id_kategori');
        $query = $builder->getWhere(['id' => $id]);
        return $query->getResult();
    }

    // Data total pengeluaran bulanan
    function getSumByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT SUM(nominal) AS nominal FROM tb_pengeluaran WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->nominal;
    }

    // Data total pengeluaran tahunan
    function getSumByYear()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT SUM(nominal) AS nominal FROM tb_pengeluaran WHERE YEAR(tgl_transaksi) = '$year'";
        $result = $this->db->query($sql);
        return $result->getRow()->nominal;
    }

    // Nominal dalam satu bulan
    function getNominalByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, nominal FROM tb_pengeluaran WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year' GROUP BY tgl_transaksi ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Nominal dalam satu tahun setiap bulannya
    function getNominalByYear()
    {
        $year = date('Y');
        $sql = "SELECT tgl_transaksi, MONTHNAME(tgl_transaksi) AS month, SUM(nominal) AS nominal FROM tb_pengeluaran WHERE YEAR(tgl_transaksi) = '$year' GROUP BY MONTH(tgl_transaksi) ORDER BY tgl_transaksi;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Nominal dalam satu tahun setiap bulannya
    function getCountKategoryByMonth()
    {
        $month = date('m');
        $year = date('Y');
        $sql = "SELECT nama_kategori, COUNT(*) AS kategori FROM tb_pengeluaran JOIN tb_kategori_pengeluaran ON tb_kategori_pengeluaran.id_kategori = tb_pengeluaran.id_kategori WHERE MONTH(tgl_transaksi) = '$month' AND YEAR(tgl_transaksi) = '$year' GROUP BY nama_kategori;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Nominal dalam satu tahun setiap bulannya
    function getCountKategoryByYear()
    {
        $year = date('Y');
        $sql = "SELECT nama_kategori, COUNT(*) AS kategori FROM tb_pengeluaran JOIN tb_kategori_pengeluaran ON tb_kategori_pengeluaran.id_kategori = tb_pengeluaran.id_kategori WHERE YEAR(tgl_transaksi) = '$year' GROUP BY nama_kategori;";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Mengambil data berdasarkan rentang tanggal
    function getDataByDate($tgl_awal, $tgl_akhir)
    {
        $sql = "SELECT * FROM tb_pengeluaran JOIN tb_kategori_pengeluaran ON tb_kategori_pengeluaran.id_kategori = tb_pengeluaran.id_kategori WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tgl_transaksi";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Mengambil total nominal berdasarkan rentang tanggal
    function getDataTotalByDate($tgl_awal, $tgl_akhir)
    {
        $sql = "SELECT SUM(nominal) AS total FROM tb_pengeluaran WHERE tgl_transaksi BETWEEN '$tgl_awal' AND '$tgl_akhir';";
        $result = $this->db->query($sql);
        return $result->getResult();
    }
}
