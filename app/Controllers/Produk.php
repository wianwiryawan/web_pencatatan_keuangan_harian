<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $M_produk;

    public function __construct()
    {
        $this->M_produk = new ProdukModel();
    }

    // Menampilkan data produk
    public function lihatData()
    {
        $data = [
            'produk' => $this->M_produk->findAll()
        ];
        return view('halaman_produk/data_produk', $data);
    }

    public function lihatDataStafDesainer()
    {
        $data = [
            'produk' => $this->M_produk->findAll()
        ];
        return view('halaman_stafdesainer/halaman_produk/data_produk', $data);
    }

    //Menambah data produk
    public function tambahData()
    {
        $data = [
            'produk' => $this->M_produk->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_produk/tambah_data', $data);
    }

    //Menambah data produk
    public function tambahDataStafDesainer()
    {
        $data = [
            'produk' => $this->M_produk->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_stafdesainer/halaman_produk/tambah_data', $data);
    }

    // Menyimpan data produk
    public function simpanData()
    {
        // Validasi input
        if (!$this->validate([
            'nama_produk' => [
                'rules' => 'required|is_unique[tb_produk.nama_produk]',
                'errors' => [
                    'required' => 'Nama produk harus diisi.',
                    'is_unique' => 'Produk sudah ada.'
                ]
            ],
            'garis_leher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Garis leher harus diisi.'
                ]
            ],
            'motif' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis motif harus diisi.'
                ]
            ],
            'bahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis bahan harus diisi.'
                ]
            ], 'gambar' => [
                'rules' => 'max_size[gambar,2048]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (maks. 2MB).',
                    'mime_in' => 'Tipe file bukan gambar.',
                    'is_image' => 'Tipe file bukan gambar.'
                ]
            ]
        ])) {
            if (session()->get('role') == 1) {
                return redirect()->to('produk/tambahData')->withInput();
            } elseif (session()->get('role') == 2) {
                return redirect()->to('produk/tambahDataStafDesainer')->withInput();
            }
        };

        // Ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default_produk.png';
        } else {
            // Ambil nama file
            $namaGambar = $fileGambar->getRandomName();
            // Pindahkan gambar ke folder /img
            $fileGambar->move('img/produk', $namaGambar);
        }

        $this->M_produk->save([
            'nama_produk' => $this->request->getVar('nama_produk'),
            'garis_leher' => $this->request->getVar('garis_leher'),
            'motif' => $this->request->getVar('motif'),
            'bahan' => $this->request->getVar('bahan'),
            'file_path' => $namaGambar
        ]);

        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);

        if (session()->get('role') == 1) {
            return redirect()->to('produk/lihatData');
        } elseif (session()->get('role') == 2) {
            return redirect()->to('produk/lihatDataStafDesainer');
        }
    }

    // Edit data produk
    public function editData($id)
    {
        $data = [
            'produk' => $this->M_produk->where('id', $id)->first(),
            'validation' => \Config\Services::validation()
        ];
        if (session()->get('role') == 1) {
            return view('halaman_produk/edit_data', $data);
        } elseif (session()->get('role') == 2) {
            return view('halaman_stafdesainer/halaman_produk/edit_data', $data);
        }
    }

    // Update data produk
    public function updateData($id)
    {
        $oldproduk = $this->M_produk->where('id', $id)->first();
        if ($oldproduk['nama_produk'] == $this->request->getVar('nama_produk')) {
            $rule_produk = 'required';
        } else {
            $rule_produk = 'required|is_unique[tb_produk.nama_produk]';
        }

        // Validasi input
        if (!$this->validate([
            'nama_produk' => [
                'rules' => $rule_produk,
                'errors' => [
                    'required' => 'Nama produk harus diisi.',
                    'is_unique' => 'Produk sudah ada.'
                ]
            ],
            'garis_leher' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Garis leher harus diisi.'
                ]
            ],
            'motif' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis motif harus diisi.'
                ]
            ],
            'bahan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis bahan harus diisi.'
                ]
            ], 'gambar' => [
                'rules' => 'max_size[gambar,4000]|is_image[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar (maks. 2MB).',
                    'mime_in' => 'Tipe file bukan gambar.',
                    'is_image' => 'Tipe file bukan gambar.'
                ]
            ]
        ])) {
            return redirect()->to('produk/editData/' . $this->request->getVar('id'))->withInput();
        };

        // Ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        // Apakah ada gambar baru?
        if ($fileGambar->getError() == 4) {
            $namaGambar = $this->request->getVar('gambarLama');
        } else {
            // Ambil nama file
            $namaGambar = $fileGambar->getRandomName();

            // Pindahkan gambar ke folder /img
            $fileGambar->move('img/produk', $namaGambar);

            // Cek jika file gambar default_produkk.png
            if ($this->request->getVar('gambarLama') != 'default_produk.png') {
                // Hapus gambar
                unlink('img/produk/' . $this->request->getVar('gambarLama'));
            }
        }

        $this->M_produk->save([
            'id' => $id,
            'nama_produk' => $this->request->getVar('nama_produk'),
            'garis_leher' => $this->request->getVar('garis_leher'),
            'motif' => $this->request->getVar('motif'),
            'bahan' => $this->request->getVar('bahan'),
            'file_path' => $namaGambar
        ]);

        $success = "Data berhasil diedit";
        session()->setFlashdata('success', $success);

        if (session()->get('role') == 1) {
            return redirect()->to('produk/lihatData');
        } elseif (session()->get('role') == 2) {
            return redirect()->to('produk/lihatDataStafDesainer');
        }
    }

    // Delete data produk
    public function deleteData($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->M_produk->find($id);

        // Cek jika file gambar default_profile.png
        if ($data['file_path'] != 'default_produk.png') {
            // Hapus gambar
            unlink('img/produk/' . $data['file_path']);
        }

        $this->M_produk->delete($id);

        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);

        if (session()->get('role') == 1) {
            return redirect()->to('produk/lihatData');
        } elseif (session()->get('role') == 2) {
            return redirect()->to('produk/lihatDataStafDesainer');
        }
    }
}
