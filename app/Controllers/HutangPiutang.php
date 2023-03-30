<?php

namespace App\Controllers;

use App\Models\HutangPiutangModel;
use CodeIgniter\Validation\FileRules;

class HutangPiutang extends BaseController
{
    protected $M_h_p;

    public function __construct()
    {
        $this->M_h_p = new HutangPiutangModel();
    }

    // Menampilkan data hutang & piutang
    public function lihatData()
    {
        $h_p = $this->M_h_p->findAll();
        $data = [
            'h_p' => $h_p
        ];
        return view('halaman_admin/data_hutang_piutang/data_hutang_piutang', $data);
    }

    // Menampilkan halaman tambah data
    public function tambahData()
    {
        $data = [
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_hutang_piutang/tambah_data', $data);
    }

    // Menyimpan data hutang piutang
    public function simpanData()
    {
        // Validasi input
        if (!$this->validate([
            'nama_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama transaksi harus diisi.'
                ]
            ],
            'nominal' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'integer' => 'Nominal harus berupa angka.'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal transaksi harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('hutangpiutang/tambahData')->withInput();
        }

        $this->M_h_p->save([
            'kategori' => $this->request->getVar('kategori'),
            'keterangan' => $this->request->getVar('nama_transaksi'),
            'nominal' => $this->request->getVar('nominal'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi'),
            'status' => $this->request->getVar('status')
        ]);
        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);
        return redirect()->to('hutangpiutang/tambahData');
    }

    // Edit data
    public function editData($id)
    {
        $data = [
            'data' => $this->M_h_p->where('id', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/data_hutang_piutang/edit_data', $data);
    }

    // Update data
    public function updateData($id)
    {
        // Validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama transaksi harus diisi.'
                ]
            ],
            'nominal' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nominal harus diisi.',
                    'integer' => 'Nominal harus berupa angka.'
                ]
            ],
            'tgl_transaksi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal transaksi harus diisi.'
                ]
            ]
        ])) {
            return redirect()->to('hutangpiutang/editData/' . $this->request->getVar('id'))->withInput();
        }

        $this->M_h_p->save([
            'id' => $id,
            'kategori' => $this->request->getVar('kategori'),
            'keterangan' => $this->request->getVar('nama'),
            'nominal' => $this->request->getVar('nominal'),
            'tgl_transaksi' => $this->request->getVar('tgl_transaksi'),
            'status' => $this->request->getVar('status')
        ]);
        $success = "Data berhasil diedit";
        session()->setFlashdata('success', $success);
        return redirect()->to('hutangpiutang/lihatData');
    }

    // Edit status dari hutang & piutang
    public function editDataStatus($id)
    {
        $data = $this->M_h_p->where('id', $id)->first();
        if ($data['status'] == 1) {
            $this->M_h_p->save([
                'id' => $id,
                'status' => 0
            ]);
        } else {
            $this->M_h_p->save([
                'id' => $id,
                'status' => 1
            ]);
        }
        $success = "Status berhasil diubah";
        session()->setFlashdata('success', $success);
        return redirect()->to('hutangpiutang/lihatData');
    }

    // Hapus data
    public function hapusData($id)
    {
        $this->M_h_p->delete($id);
        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);
        return redirect()->to('hutangpiutang/lihatData');
    }
}
