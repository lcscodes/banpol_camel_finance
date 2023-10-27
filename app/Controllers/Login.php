<?php

namespace App\Controllers;

use App\Models\LoginModel;

class Login extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('login');
    }
    public function auth()
    {
        $session = session();
        $model = new LoginModel();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $data = $model->where('username', $username)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id_user'       => $data['id_user'],
                    'nama'          => $data['nama'],
                    'username'      => $data['username'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Username not Found');
            return redirect()->to('/');
        }
    }


    public function registrasi()
    {
        //include helper form
        helper(['form']);
        $data = [
            'validation' => \Config\Services::validation()
        ];
        echo view('registrasi', $data);
    }

    public function save()
    {
        //include helper form
        helper(['form']);
        //set rules validation form
        $rules = [
            'nama'          => 'required|min_length[3]|max_length[20]',
            'username'         => 'required|min_length[5]|max_length[50]|is_unique[tb_users.username]',
            'password'      => 'required|min_length[5]|max_length[200]',

        ];

        if ($this->validate($rules)) {
            $model = new LoginModel();
            $data = [
                'nama'     => $this->request->getVar('nama'),
                'username'    => $this->request->getVar('username'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
            return redirect()->to('/');
        } else {
            $data['validation'] = $this->validator;
            echo view('/registrasi', $data);
        }
    }


    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
