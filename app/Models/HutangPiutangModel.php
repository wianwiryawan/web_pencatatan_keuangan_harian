<?php

namespace App\Models;

use CodeIgniter\Model;

class HutangPiutangModel extends Model
{
    protected $table = "tb_hutang_piutang";
    protected $allowedFields = ['kategori', 'keterangan', 'nominal', 'tgl_transaksi', 'status'];
    protected $useTimestamps = true;

    // Data piutang berdasrkan rentang tanggal
    function getPiutang()
    {
        $sql = "SELECT * FROM tb_hutang_piutang WHERE kategori = 'piutang' AND status = '0'";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Data hutang berdasrkan rentang tanggal
    function getHutang()
    {
        $sql = "SELECT * FROM tb_hutang_piutang WHERE kategori = 'hutang' AND status = '0'";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Total piutang dari rentang tanggal
    function getSumPiutang()
    {
        $sql = "SELECT SUM(nominal) AS total FROM tb_hutang_piutang WHERE kategori = 'piutang' AND status = '0'";
        $result = $this->db->query($sql);
        return $result->getResult();
    }

    // Total Hutang dari rentang tanggal
    function getSumHutang()
    {
        $sql = "SELECT SUM(nominal) AS total FROM tb_hutang_piutang WHERE kategori = 'hutang' AND status = '0'";
        $result = $this->db->query($sql);
        return $result->getResult();
    }
}
