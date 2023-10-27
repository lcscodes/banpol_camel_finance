<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        $session = session();
        $data = [
            'session' => $session,
            'title' => 'Home',
            'users' => $this->loginModel->getuser(),

        ];
        return view('dashboard', $data);
    }

    public function user()
    {
        $session = session();
        $data = [
            'session' => $session,
            'title' => 'User',
            'users' => $this->loginModel->getuser(),

        ];
        return view('user', $data);
    }
    public function create()
    {

        $users = $this->loginModel;

        $data = [
            'title' => 'Tambah Data Pegawai',
            'users' => $users->getUser(),
            'validation' => \Config\Services::validation()


        ];
        return view('create', $data);
    }
    public function save()
    {
        //validasi input
        if (!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus Diisi.',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Harus Diisi.',
                    ]
                ]

            ]

        )) {
            return redirect()->to('create')->withInput();
        }

        $this->loginModel->save([
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),



        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');
        return redirect()->to('/user');
    }
    public function delete($id_user)
    {

        $this->loginModel->delete($id_user);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus.');
        return redirect()->to('/user');
    }
    public function edit($id_user)
    {
        $users = $this->loginModel;

        $data = [
            'title' => 'Tambah Data Pegawai',
            'users' => $users->getUser(),
            'validation' => \Config\Services::validation(),
            'users' => $this->loginModel->getuser($id_user),

        ];
        return view('edit', $data);
    }

    public function update($id_user)
    {
        //validasi input
        if (!$this->validate(

            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Nama Harus Diisi.',
                    ]
                ],
                'username' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Username Harus Diisi.',
                    ]
                ],
                'password' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Password Harus Diisi.',
                    ]
                ]

            ]

        )) {
            return redirect()->to('edit' . $this->request->getVar('id'))->withInput();
        }
        $this->loginModel->save([
            'id_user' => $id_user,
            'nama' => $this->request->getVar('nama'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),

        ]);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('/user');
    }
    public function pegawai()
    {
        $session = session();
        $data = [
            'session' => $session,
            'title' => 'User',
            'users' => $this->loginModel->getuser(),
        ];
        return view('user', $data);
    }
}
