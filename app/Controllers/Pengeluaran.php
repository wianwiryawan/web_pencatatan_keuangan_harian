<?php

namespace App\Controllers;

use App\Models\KategoriPengeluaranModel;
use App\Models\PengeluaranModel;

class Pengeluaran extends BaseController
{
    protected $M_kat_pengeluaran;
    protected $M_pengeluaran;

    public function __construct()
    {
        $this->M_kat_pengeluaran = new KategoriPengeluaranModel();
        $this->M_pengeluaran = new PengeluaranModel();
    }

    // Menambah data kategori pengeluaran
    public function tambahDataKategori()
    {
        $data = [
            'kategori' => $this->M_kat_pengeluaran->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_pengeluaran/tambah_data_kategori', $data);
    }

    // Menyimpan data kategori
    public function simpanKategori()
    {
        // Validasi input
        if (!$this->validate([
            'kategori_baru' => [
                'rules' => 'required|is_unique[tb_kategori_pengeluaran.nama_kategori]',
                'errors' => [
                    'required' => 'Nama kategori harus diisi.',
                    'is_unique' => 'Kategori sudah ada',
                ]
            ]
        ])) {
            return redirect()->to('pengeluaran/tambahDataKategori')->withInput();
        };

        // Simpan ke database
        $this->M_kat_pengeluaran->save([
            'nama_kategori' => $this->request->getVar('kategori_baru')
        ]);

        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/tambahDataKategori');
    }

    //Edit data kategori
    public function editDataKat($id)
    {
        $data = [
            'data' => $this->M_kat_pengeluaran->where('id_kategori', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_pengeluaran/edit_data_kategori', $data);
    }

    // Update data edit kategori
    public function updateDataKat($id)
    {
        $oldkat = $this->M_kat_pengeluaran->where('id_kategori', $id)->first();
        if ($oldkat['nama_kategori'] == $this->request->getVar('nama_kategori')) {
            $rule_kategori = 'required';
        } else {
            $rule_kategori = 'required|is_unique[tb_kategori_pengeluaran.nama_kategori]';
        }

        // Validasi input
        if (!$this->validate([
            'nama_kategori' => [
                'rules' => $rule_kategori,
                'errors' => [
                    'required' => 'Nama kategori harus diisi.',
                    'is_unique' => 'Kategori sudah ada',
                ]
            ]
        ])) {
            return redirect()->to('pengeluaran/editDataKat/' . $this->request->getVar('id_kategori'))->withInput();
        }

        $this->M_kat_pengeluaran->save([
            'id_kategori' => $id,
            'nama_kategori' => $this->request->getVar('nama_kategori')
        ]);
        $success = "Data berhasil diubah";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/tambahDataKategori');
    }

    // Delete data kategori
    public function deleteDataKat($id)
    {
        $this->M_kat_pengeluaran->delete($id);
        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/tambahDataKategori');
    }

    // Menambah data pengeluaran
    public function tambahData()
    {
        $data = [
            'kategori' => $this->M_kat_pengeluaran->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_pengeluaran/tambah_data', $data);
    }

    // Menyimpan data pengeluaran
    public function simpanPengeluaran()
    {
        // Validasi input
        if (!$this->validate([
            'nama_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengeluaran harus diisi.',
                ]
            ],
            'nominal_pengeluaran' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nominal pengeluaran harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal transaksi harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('pengeluaran/tambahData')->withInput();
        };

        // Simpan ke databbase
        $this->M_pengeluaran->save([
            'id_kategori' => $this->request->getVar('id_kategori'),
            'keterangan' => $this->request->getVar('nama_pengeluaran'),
            'nominal' => $this->request->getVar('nominal_pengeluaran'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi')
        ]);

        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/tambahData');
    }

    // Melihat data pengeluaran
    public function lihatData()
    {
        $data = [
            'pengeluaran' => $this->M_pengeluaran->getAll()
        ];
        return view('halaman_admin/data_pengeluaran/data_pengeluaran', $data);
    }

    // Edit data pengeluaran
    public function editData($id)
    {
        $data = [
            'id' => $this->M_pengeluaran->where('id', $id)->first(),
            'kategori' => $this->M_kat_pengeluaran->findAll(),
            'dataPengeluaran' => $this->M_pengeluaran->getId($id),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_pengeluaran/edit_data', $data);
    }

    // Update data pengeluaran
    public function updateData($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama_pengeluaran' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama pengeluaran harus diisi.',
                ]
            ],
            'nominal_pengeluaran' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nominal pengeluaran harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal transaksi harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('pengeluaran/editData/' . $this->request->getVar('id'))->withInput();
        };

        $this->M_pengeluaran->save([
            'id' => $id,
            'id_kategori' => $this->request->getVar('id_kategori'),
            'keterangan' => $this->request->getVar('nama_pengeluaran'),
            'nominal' => $this->request->getVar('nominal_pengeluaran'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi')
        ]);
        $success = "Data berhasil diubah";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/lihatData');
    }

    // Delete data pengeluaran
    public function deleteData($id)
    {
        $this->M_pengeluaran->delete($id);
        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);
        return redirect()->to('pengeluaran/lihatData');
    }
}
