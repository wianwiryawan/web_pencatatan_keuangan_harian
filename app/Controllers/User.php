<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserRoleModel;
use CodeIgniter\HTTP\Request;

class User extends BaseController
{
    protected $M_user;
    protected $M_user_role;

    public function __construct()
    {
        $this->M_user = new UserModel();
        $this->M_user_role = new UserRoleModel();
    }

    // Lihat data user
    public function lihatData()
    {
        $id = $this->M_user->where('username', session()->get('username'))->first();
        $data = [
            'data' => $this->M_user->getAll(),
            'foto' => $id
        ];

        if (session()->get('role') == 1) {
            return view('halaman_admin/halaman_user/lihat_data', $data);
        } elseif (session()->get('role') == 2) {
            return view('halaman_stafdesainer/halaman_user/lihat_data', $data);
        }
    }

    // Tambah data user
    public function tambahData()
    {
        $data = [
            'role' => $this->M_user_role->findAll(),
            'validation' => \Config\Services::validation()
        ];
        return view('halaman_admin/halaman_user/tambah_data', $data);
    }

    // Simpan data user
    public function simpanData()
    {
        // Validasi input
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'username' => [
                'rules' => 'required|is_unique[tb_user.username]|min_length[4]',
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'min_length' => 'Username minimal 4 karakter.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
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
            return redirect()->to('user/tambahData')->withInput();
        };

        // Ambil gambar
        $fileGambar = $this->request->getFile('gambar');

        if ($fileGambar->getError() == 4) {
            $namaGambar = 'default_profile.jpg';
        } else {
            // Ambil nama file
            $namaGambar = $fileGambar->getRandomName();
            // Pindahkan gambar ke folder /img
            $fileGambar->move('img/user', $namaGambar);
        }

        $password = md5($this->request->getVar('password'));
        $this->M_user->save([
            'nama' => $this->request->getVar('nama_user'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'role' => $this->request->getVar('jabatan'),
            'file_path' => $namaGambar
        ]);
        $success = "Data berhasil diinput";
        session()->setFlashdata('success', $success);
        return redirect()->to('user/tambahData');
    }

    // Edit data user
    public function editData($id)
    {
        $data = [
            'id' => $this->M_user->where('id', $id)->first(),
            'data' => $this->M_user->getId($id),
            'role' => $this->M_user_role->findAll(),
            'validation' => \Config\Services::validation()
        ];
        // dd($data);
        if (session()->get('role') == 1) {
            return view('halaman_admin/halaman_user/edit_data', $data);
        } elseif (session()->get('role') == 2) {
            return view('halaman_stafdesainer/halaman_user/edit_data', $data);
        }
    }

    // Update data user
    public function updateData($id)
    {

        $oldusername = $this->M_user->where('id', $id)->first();
        if ($oldusername['username'] == $this->request->getVar('username')) {
            $rule_username = 'required';
        } else {
            $rule_username = 'required|is_unique[tb_user.username]|min_length[4]';
        }

        // Validasi input
        if (!$this->validate([
            'nama_user' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi.'
                ]
            ],
            'no_telp' => [
                'rules' => 'required|integer',
                'errors' => [
                    'required' => 'Nomor telepon harus diisi.',
                    'integer' => 'Input harus berupa angka.'
                ]
            ],
            'username' => [
                'rules' => $rule_username,
                'errors' => [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah terdaftar.',
                    'min_length' => 'Username minimal 4 karakter.'
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password harus diisi.'
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
            return redirect()->to('user/editData/' . $this->request->getVar('id'))->withInput();
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
            $fileGambar->move('img/user', $namaGambar);

            // Cek jika file gambar default_profile.jpg
            if ($this->request->getVar('gambarLama') != 'default_profile.jpg') {
                // Hapus gambar
                unlink('img/user/' . $this->request->getVar('gambarLama'));
            }
        }

        $password = md5($this->request->getVar('password'));
        $this->M_user->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama_user'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'no_telp' => $this->request->getVar('no_telp'),
            'username' => $this->request->getVar('username'),
            'password' => $password,
            'role' => $this->request->getVar('jabatan'),
            'file_path' => $namaGambar
        ]);
        $success = "Data berhasil diedit";
        session()->setFlashdata('success', $success);
        return redirect()->to('user/lihatData');
    }

    public function deleteData($id)
    {
        // Cari gambar berdasarkan id
        $data = $this->M_user->find($id);

        // Cek jika file gambar default_profile.jpg
        if ($data['file_path'] != 'default_profile.jpg') {
            // Hapus gambar
            unlink('img/user/' . $data['file_path']);
        }
        $this->M_user->delete($id);
        $success = "Data berhasil dihapus";
        session()->setFlashdata('success', $success);
        return redirect()->to('user/lihatData');
    }
}
