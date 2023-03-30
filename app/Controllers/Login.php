<?php

namespace App\Controllers;

class Login extends BaseController
{
    protected $M_user;
    protected $session;

    public function __construct()
    {
        $this->M_user = new \App\Models\UserModel();
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $data = [
            'title' => 'Login Page | AJStore46'
        ];
        return view('halaman_login/login');
    }

    // Login
    public function login()
    {
        $login = $this->request->getPost('login');
        $M_user = new \App\Models\UserModel();

        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            if ($username == '' or $password == '') {
                $err = "Silahkan masukkan username dan password";
            }
            if (empty($err)) {
                $dataUser = $M_user->where('username', $username)->first();
                if ($dataUser == null) {
                    $err = "Username tidak sesuai";
                } elseif ($dataUser['password'] != md5($password)) {
                    $err = "Password tidak sesuai";
                }
            }

            // Jika username & password benar
            if (empty($err)) {
                $dataSesi = [
                    'role' => $dataUser['role'],
                    'username' => $dataUser['username'],
                    'password' => $dataUser['password'],
                    'nama' => $dataUser['nama'],
                    'id' => $dataUser['id'],
                    'no_telp' => $dataUser['no_telp'],
                    'foto_profil' => $dataUser['file_path']
                ];
                session()->set($dataSesi);
                if ($dataUser['role'] == 1) {
                    return redirect()->to('pages/admin');
                }
                if ($dataUser['role'] == 2) {
                    return redirect()->to('pages/stafdesainer');
                }
            }

            // Jika error
            if ($err) {
                session()->setFlashdata('username', $username);
                session()->setFlashdata('error', $err);
                return redirect()->to('login');
            }
        }
        return view('login');
    }

    // Logout
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
