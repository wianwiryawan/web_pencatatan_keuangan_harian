<?php

namespace App\Controllers;

use App\Models\PenjualanProdukModel;
use App\Models\ProdukModel;
use App\Models\UkuranModel;
use CodeIgniter\HTTP\Request;

class Penjualan extends BaseController
{
    protected $M_penjualan_produk;
    protected $M_produk;
    protected $M_ukuran;

    // Inisialisasi objek
    public function __construct()
    {
        $this->M_penjualan_produk = new PenjualanProdukModel();
        $this->M_produk = new ProdukModel();
        $this->M_ukuran = new UkuranModel();
    }

    // Menampilkan data penjualan
    public function lihatData()
    {
        $data = [
            'penjualan' => $this->M_penjualan_produk->getAll()
        ];
        return view('halaman_admin/data_penjualan/data_penjualan', $data);
    }

    // Menambah data penjualan
    public function tambahData()
    {
        $dataProduk = $this->M_produk->findAll();
        $dataUkuran = $this->M_ukuran->findAll();
        $data = [
            'produk' => $dataProduk,
            'ukuran' => $dataUkuran,
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_penjualan/tambah_data', $data);
    }

    // Menyimpan data penjualan
    public function simpanData()
    {
        // Validassi input
        if (!$this->validate([
            'jumlah_terjual' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Jumlah terjual harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'nominal_transaksi' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal transaksi harus diisi.'
                ]
            ],
        ])) {
            return redirect()->to('penjualan/tambahData')->withInput();
        };

        $id_produk = $this->request->getVar('id_produk');
        $id_ukuran = $this->request->getVar('id_ukuran');

        $produk = $this->M_produk->where('id', $id_produk)->first();

        // String to integer
        $id_produk = intval($id_produk);
        $id_ukuran = intval($id_ukuran);

        $this->M_penjualan_produk->save([
            'id_produk' => $id_produk,
            'nama_produk' => $produk['nama_produk'],
            'ukuran' => $id_ukuran,
            'qty_produk' => $this->request->getVar('jumlah_terjual'),
            'nominal' => $this->request->getVar('nominal_transaksi'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi')
        ]);

        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);
        return redirect()->to('penjualan/tambahData');
    }

    // Mengedit data penjualan
    public function editData($id)
    {
        $data = [
            'id' => $this->M_penjualan_produk->where('id', $id)->first(),
            'dataPenjualan' => $this->M_penjualan_produk->getId($id),
            'produk' => $this->M_produk->findAll(),
            'ukuran' => $this->M_ukuran->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_penjualan/edit_data', $data);
    }

    // Update data penjualan
    public function updateData($id)
    {
        $id_produk = $this->request->getVar('id_produk');
        $id_ukuran = $this->request->getVar('id_ukuran');

        $produk = $this->M_produk->where('id', $id_produk)->first();

        // String to integer
        $id_produk = intval($id_produk);
        $id_ukuran = intval($id_ukuran);

        $this->M_penjualan_produk->save([
            'id' => $id,
            'id_produk' => $id_produk,
            'nama_produk' => $produk['nama_produk'],
            'ukuran' => $id_ukuran,
            'qty_produk' => $this->request->getVar('jumlah_terjual'),
            'nominal' => $this->request->getVar('nominal_transaksi'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi')
        ]);
        $success = "Data berhasil diubah";
        session()->setFlashdata('success', $success);
        return redirect()->to('penjualan/lihatData');
    }

    // Menghapus data penjualan
    public function hapusData($id)
    {
        $this->M_penjualan_produk->delete($id);
        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);
        return redirect()->to('penjualan/lihatData');
    }
}
