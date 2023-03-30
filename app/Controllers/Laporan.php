<?php

namespace App\Controllers;

use App\Models\PenjualanProdukModel;
use App\Models\PengeluaranModel;
use App\Models\HutangPiutangModel;

class Laporan extends BaseController
{
    protected $M_penjualan;
    protected $M_pengeluaran;
    protected $M_hutang_piutang;

    public function __construct()
    {
        $this->M_penjualan = new PenjualanProdukModel();
        $this->M_pengeluaran = new PengeluaranModel();
        $this->M_hutang_piutang = new HutangPiutangModel();
    }

    public function createLaporan()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_cetakLaporan/create_laporan', $data);
    }

    public function cetakLaporan()
    {
        // Validasi input
        if (!$this->validate([
            'tgl_awal' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal awal harus diisi.'
                ]
            ],
            'tgl_akhir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal akhir harus diisi.',
                ]
            ]
        ])) {
            return redirect()->to('laporan/createLaporan')->withInput();
        }

        $tgl_awal = $this->request->getVar('tgl_awal');
        $tgl_akhir = $this->request->getVar('tgl_akhir');

        $data = [
            'penjualan' => $this->M_penjualan->getDataByDate($tgl_awal, $tgl_akhir),
            'penjualan_tahunan' => $this->M_penjualan->getSumByYear(),
            'pengeluaran' => $this->M_pengeluaran->getDataByDate($tgl_awal, $tgl_akhir),
            'pengeluaran_tahunan' => $this->M_pengeluaran->getSumByYear(),
            'piutang' => $this->M_hutang_piutang->getPiutang(),
            'hutang' => $this->M_hutang_piutang->getHutang(),
            'sumPiutang' => $this->M_hutang_piutang->getSumPiutang(),
            'sumHutang' => $this->M_hutang_piutang->getSumHutang(),
            'sumDataPenjualan' => $this->M_penjualan->getDataTotalByDate($tgl_awal, $tgl_akhir),
            'sumDataPengeluaran' => $this->M_pengeluaran->getDataTotalByDate($tgl_awal, $tgl_akhir),
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir
        ];

        return view('halaman_cetakLaporan/lihat_laporan', $data);
    }
}
