<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'tb_users';
    protected $allowedFields = ['id_user', 'nama', 'username', 'password'];

    public function getAkun($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }

    public function hitungJumlahAkun()
    {
        $akun = $this->query('SELECT * FROM user');
        return $akun->getNumRows();
    }
}
