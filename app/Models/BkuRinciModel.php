<?php

namespace App\Models;
use CodeIgniter\Model;

class BkuRinciModel extends Model
{

    protected $table      = 'bku_rinci';
    protected $primaryKey = 'bku_rinci_id';
    protected $allowedFields = ['bku_rinci_id','bku_id', 'jenis', 'buku', 'kegiatan_kode', 'kegiatan_nama', 'rekening_kode', 'rekening_nama', 'penerimaan', 'pengeluaran'];
    
    public function getBkuRinci($bku_id = false)
    {
        return $this->where(['bku_id' => $bku_id])->findAll();
    }
    
    public function getBelanjaRinciNonPajak($bku_id = false)
    {
        return $this->where(['bku_id' => $bku_id,'jenis !=' => 'pajak'])->findAll();
    }
    
    public function getBelanjaRinciPajak($bku_id = false)
    {
        return $this->where(['bku_id' => $bku_id,'jenis' => 'pajak'])->findAll();
    }
  
}
