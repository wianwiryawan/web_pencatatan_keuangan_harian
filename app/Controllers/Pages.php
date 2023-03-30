<?php

namespace App\Controllers;

use App\Models\PenjualanProdukModel;
use App\Models\PengeluaranModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    protected $M_penjualan;
    protected $M_pengeluaran;
    protected $M_user;

    public function __construct()
    {
        $this->M_penjualan = new PenjualanProdukModel();
        $this->M_pengeluaran = new PengeluaranModel();
        $this->M_user = new UserModel();
    }

    public function admin()
    {
        // Data total penjualan
        $P_bulanan = $this->M_penjualan->getSumByMonth(); // Bulan
        $P_tahunan = $this->M_penjualan->getSumByYear(); // Tahun

        // Data total pengeluaran
        $B_bulanan = $this->M_pengeluaran->getSumByMonth(); // Bulan
        $B_tahunan = $this->M_pengeluaran->getSumByYear(); // Tahun

        // Data total produk terjual
        $P_produk_bulan = $this->M_penjualan->getSumProductByMonth(); //Bulan
        $P_produk_tahun = $this->M_penjualan->getSumProductByYear(); //Tahun

        $nominalPenjualanByMonth = $this->M_penjualan->getNominalByMonth();
        $nominalPengeluaranByMonth = $this->M_pengeluaran->getNominalByMonth();

        $nominalPenjualanByYear = $this->M_penjualan->getNominalByYear();
        $nominalPengeluaranByYear = $this->M_pengeluaran->getNominalByYear();

        $produkByMonth = $this->M_penjualan->getProductByMonth();
        $produkByYear = $this->M_penjualan->getProductByYear();

        $kategoriPengeluaranByMonth = $this->M_pengeluaran->getCountKategoryByMonth();
        $kategoriPengeluaranByYear = $this->M_pengeluaran->getCountKategoryByYear();

        // dd($nominalPenjualanByMonth);
        $data = [
            'P_bulanan' => $P_bulanan,
            'B_bulanan' => $B_bulanan,
            'B_tahunan' => $B_tahunan,
            'P_tahunan' => $P_tahunan,
            'P_produk_bulan' => $P_produk_bulan,
            'P_produk_tahun' => $P_produk_tahun,
            'nominalPenjualanByMonth' => $nominalPenjualanByMonth,
            'nominalPengeluaranByMonth' => $nominalPengeluaranByMonth,
            'nominalPenjualanByYear' => $nominalPenjualanByYear,
            'nominalPengeluaranByYear' => $nominalPengeluaranByYear,
            'produkByMonth' => $produkByMonth,
            'produkByYear' => $produkByYear,
            'kategoriPengeluaranByMonth' => $kategoriPengeluaranByMonth,
            'kategoriPengeluaranByYear' => $kategoriPengeluaranByYear,
        ];
        return view('halaman_admin/index', $data);
    }

    public function stafdesainer()
    {
        // Data total produk terjual
        $P_produk_bulan = $this->M_penjualan->getSumProductByMonth(); //Bulan
        $P_produk_tahun = $this->M_penjualan->getSumProductByYear(); //Tahun

        $produkByMonth = $this->M_penjualan->getProductByMonth();
        $produkByYear = $this->M_penjualan->getProductByYear();
        $data = [
            'P_produk_bulan' => $P_produk_bulan,
            'P_produk_tahun' => $P_produk_tahun,
            'produkByMonth' => $produkByMonth,
            'produkByYear' => $produkByYear,
            'produk' => $this->M_penjualan->getProductByMonth1()
        ];
        return view('halaman_stafdesainer/index', $data);
    }

    public function dataPenjualan()
    {
        return redirect()->to('penjualan/lihatData');
    }

    public function dataPengeluaran()
    {
        return redirect()->to('pengeluaran/lihatData');
    }

    public function dataHutangPiutang()
    {
        return redirect()->to('hutangpiutang/lihatData');
    }

    public function dataProduk()
    {
        return redirect()->to('produk/lihatData');
    }

    public function dataUser()
    {
        return redirect()->to('user/lihatData');
    }


    // Star of StafDesainer
    public function dataProdukStafDesainer()
    {
        return redirect()->to('produk/lihatDataStafDesainer');
    }

    public function dataUserStafDesainer()
    {
        return redirect()->to('user/lihatData');
    }
}
