<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginModel extends Model
{

    protected $table      = 'tb_users';
    protected $primaryKey = 'id_user';

    protected $allowedFields = ['id_user',  'nama', 'username', 'password'];

    public function getUser($id_user = false)
    {
        if ($id_user == false) {
            return $this->findAll();
        }
        return $this->where(['id_user' => $id_user])->first();
    }
    public function getRow($id_user = false)
    {
        return $this->db->query("SELECT * FROM tb_users WHERE username='$username' AND password='$password'");
        return $this->where(['id_user' => $id_user])->first();
    }
}
