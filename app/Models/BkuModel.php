<?php

namespace App\Models;
use CodeIgniter\Model;

class BkuModel extends Model
{

    protected $table      = 'bku';
    protected $primaryKey = 'bku_id';
    protected $allowedFields = ['bku_id', 'tanggal', 'jenis', 'uraian'];

    public function getBelanja($bku_id = false)
    {
        if ($bku_id == false) {
            return $this->where(['jenis' => 'belanja'])->findAll();
        }
        return $this->where(['bku_id' => $bku_id])->first();
    }
    
    public function getPendapatan($bku_id = false)
    {
        if ($bku_id == false) {
            return $this->where(['jenis' => 'pendapatan'])->findAll();
        }
        return $this->where(['bku_id' => $bku_id])->first();
    }
  
}
