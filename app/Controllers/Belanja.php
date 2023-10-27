<?php

namespace App\Controllers;
use CodeIgniter\Model\BkuModel;

class Belanja extends BaseController
{
    
    public function __construct(){
        $this->modulName = 'belanja';
        $this->modulTitle = 'Belanja';
        $this->bkuModel = new \App\Models\BkuModel();
        $this->bkuRinciModel = new \App\Models\BkuRinciModel();
        $this->validation =  \Config\Services::validation();
    }
    
    public function index()
    {
        $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'bkus' => $this->bkuModel->getBelanja(),
        ];
        return view('belanja/belanja_list', $data);
    }
    
    public function create()
    {
        $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
        ];
        $this->validation->setRules(['tanggal' => 'required']);
        $isDataValid = $this->validation->withRequest($this->request)->run();

        if($isDataValid){
        	
            $this->bkuModel->insert([
                "tanggal" => $this->request->getPost('tanggal'),
                "jenis" => 'belanja',
                "uraian" => $this->request->getPost('uraian')
            ]);
            $insertId = $this->bkuModel->insertID();
            
            $v_kegiatan_kode=$this->request->getPost('v_kegiatan_kode');
            $v_kegiatan_nama=$this->request->getPost('v_kegiatan_nama');
            $v_rekening_kode=$this->request->getPost('v_rekening_kode');
            $v_rekening_nama=$this->request->getPost('v_rekening_nama');
            $v_nilai=$this->request->getPost('v_nilai');
            
            if($v_kegiatan_kode){
	            foreach($v_kegiatan_kode as $key=>$row){
		            $this->bkuRinciModel->insert([
		                "bku_id" => $insertId,
		                "jenis" => 'belanja',
		                "buku" => 'banpol',
		                "kegiatan_kode" => $row,
		                "kegiatan_nama" => $v_kegiatan_nama[$key],
		                "rekening_kode" => $v_rekening_kode[$key],
		                "rekening_nama" => $v_rekening_nama[$key],
		                "penerimaan" => 0,
		                "pengeluaran" => $v_nilai[$key]
		            ]);
	            }
            }
            
            $v_pajak_kode=$this->request->getPost('v_pajak_kode');
            $v_pajak_uraian=$this->request->getPost('v_pajak_uraian');
            $v_nilai_pajak=$this->request->getPost('v_nilai_pajak');
            
            if($v_pajak_kode){
	            foreach($v_pajak_kode as $key=>$row){
	            	$this->bkuRinciModel->insert([
		                "bku_id" => $insertId,
		                "jenis" => 'pajak',
		                "buku" => $row,
		                "kegiatan_kode" => "",
		                "kegiatan_nama" => "",
		                "rekening_kode" => $row,
		                "rekening_nama" => $v_pajak_uraian,
		                "penerimaan" => 0,
		                "pengeluaran" => $v_nilai_pajak[$key]
		            ]);
	            }
            }
            
            return redirect($this->modulName);
        }
		
        echo view('belanja/belanja_create', $data);
    }
    
    public function read($id)
	{
		$getBelanjaRinciNonPajak=$this->bkuRinciModel->getBelanjaRinciNonPajak($id);
		$tot_belanja=0;
		$printBelanjaRinciNonPajak='';
		if($getBelanjaRinciNonPajak){
			foreach($getBelanjaRinciNonPajak as $row){
				$printBelanjaRinciNonPajak.='<tr id=tr'.str_replace(".","",$row['rekening_kode']).'>';
				$printBelanjaRinciNonPajak.='<td>
												<a role="button" id="btnDelRincian" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
												<input type="hidden" class="rincian_id'.$row['rekening_kode'].'" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_kegiatan_kode[]" value="'.$row['kegiatan_kode'].'">
												<input type="hidden" name="v_kegiatan_nama[]" value="'.$row['kegiatan_nama'].'">
												<input type="hidden" name="v_rekening_kode[]" value="'.$row['rekening_kode'].'">
											</td>
											<td>'.$row['kegiatan_nama'].'</td>
											<td><input type="hidden" name="v_rekening_nama[]" value="'.$row['rekening_nama'].'">'.$row['rekening_nama'].'</td>
											<td>
											<input type="hidden" id="tot_belanja'.$row['rekening_kode'].'" class="tot_belanja'.$row['rekening_kode'].'" value="'.$tot_belanja.'">
											<input required type="text" name="v_nilai[]" id="nilai'.$row['rekening_kode'].'" class="nilai'.$row['rekening_kode'].'" value="'.$row['pengeluaran'].'">
											</td>';
				$printBelanjaRinciNonPajak.='</tr>';
			}
		}
		
		$getBelanjaRinciPajak=$this->bkuRinciModel->getBelanjaRinciPajak($id);
		$printBelanjaRinciPajak='';
		
		if($getBelanjaRinciPajak){
			foreach($getBelanjaRinciPajak as $row){
				$printBelanjaRinciPajak.='<tr id=trpj'.$row['rekening_kode'].'>';
				$printBelanjaRinciPajak.='<td>
												<a role="button" id="btnDelPajak" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
											</td>
											<td>
												<input type="hidden" name="v_pajak_kode[]" class="pajak_kode'.$row['rekening_kode'].'" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_pajak_uraian[]" value="'.$row['rekening_nama'].'">'.$row['rekening_nama'].'
											</td>
											<td><input type="text" name="v_nilai_pajak[]" value="'.$row['pengeluaran'].'"></td>';
				$printBelanjaRinciPajak.='</tr>';
			}
		}
		
	    $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'belanja' => $this->bkuModel->where('bku_id', $id)->first(),
            'belanjaRinciNonPajak' => $printBelanjaRinciNonPajak,
            'belanjaRinciPajak' => $printBelanjaRinciPajak
        ];
		
		if(!$data['belanja']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('belanja/belanja_read', $data);
    }
    
    public function update($id)
    {
    	$getBelanjaRinciNonPajak=$this->bkuRinciModel->getBelanjaRinciNonPajak($id);
		$tot_belanja=0;
		$printBelanjaRinciNonPajak='';
		if($getBelanjaRinciNonPajak){
			foreach($getBelanjaRinciNonPajak as $row){
				$printBelanjaRinciNonPajak.='<tr id=tr'.str_replace(".","",$row['rekening_kode']).'>';
				$printBelanjaRinciNonPajak.='<td>
												<a role="button" id="btnDelRincian" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
												<input type="hidden" class="rincian_id'.$row['rekening_kode'].'" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_kegiatan_kode[]" value="'.$row['kegiatan_kode'].'">
												<input type="hidden" name="v_kegiatan_nama[]" value="'.$row['kegiatan_nama'].'">
												<input type="hidden" name="v_rekening_kode[]" value="'.$row['rekening_kode'].'">
											</td>
											<td>'.$row['kegiatan_nama'].'</td>
											<td><input type="hidden" name="v_rekening_nama[]" value="'.$row['rekening_nama'].'">'.$row['rekening_nama'].'</td>
											<td>
											<input type="hidden" id="tot_belanja'.$row['rekening_kode'].'" class="tot_belanja'.$row['rekening_kode'].'" value="'.$tot_belanja.'">
											<input required type="text" name="v_nilai[]" id="nilai'.$row['rekening_kode'].'" class="nilai'.$row['rekening_kode'].'" value="'.$row['pengeluaran'].'">
											</td>';
				$printBelanjaRinciNonPajak.='</tr>';
			}
		}
		
		$getBelanjaRinciPajak=$this->bkuRinciModel->getBelanjaRinciPajak($id);
		$printBelanjaRinciPajak='';
		if($getBelanjaRinciPajak){
			foreach($getBelanjaRinciPajak as $row){
				$printBelanjaRinciPajak.='<tr id=trpj'.$row['rekening_kode'].'>';
				$printBelanjaRinciPajak.='<td>
												<a role="button" id="btnDelPajak" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
											</td>
											<td>
												<input type="hidden" name="v_pajak_kode[]" class="pajak_kode'.$row['rekening_kode'].'" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_pajak_uraian[]" value="'.$row['rekening_nama'].'">'.$row['rekening_nama'].'
											</td>
											<td><input type="text" name="v_nilai_pajak[]" value="'.$row['pengeluaran'].'"></td>';
				$printBelanjaRinciPajak.='</tr>';
			}
		}
		
        $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'belanja' => $this->bkuModel->where('bku_id', $id)->first(),
            'belanjaRinciNonPajak' => $printBelanjaRinciNonPajak,
            'belanjaRinciPajak' => $printBelanjaRinciPajak
        ];
        
        $this->validation->setRules([
            'tanggal' => 'required'
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        
        if($isDataValid){
            $this->bkuModel->update($id, [
                "tanggal" => $this->request->getPost('tanggal'),
                "jenis" => 'belanja',
                "uraian" => $this->request->getPost('uraian')
            ]);
            
            $this->bkuRinciModel->where('bku_id', $id)->delete();
            
            $v_kegiatan_kode=$this->request->getPost('v_kegiatan_kode');
            $v_kegiatan_nama=$this->request->getPost('v_kegiatan_nama');
            $v_rekening_kode=$this->request->getPost('v_rekening_kode');
            $v_rekening_nama=$this->request->getPost('v_rekening_nama');
            $v_nilai=$this->request->getPost('v_nilai');
            
            if($v_kegiatan_kode){
	            foreach($v_kegiatan_kode as $key=>$row){
		            $this->bkuRinciModel->insert([
		                "bku_id" => $id,
		                "jenis" => 'belanja',
		                "buku" => 'banpol',
		                "kegiatan_kode" => $row,
		                "kegiatan_nama" => $v_kegiatan_nama[$key],
		                "rekening_kode" => $v_rekening_kode[$key],
		                "rekening_nama" => $v_rekening_nama[$key],
		                "penerimaan" => 0,
		                "pengeluaran" => $v_nilai[$key]
		            ]);
	            }
            }
            
            $v_pajak_kode=$this->request->getPost('v_pajak_kode');
            $v_pajak_uraian=$this->request->getPost('v_pajak_uraian');
            $v_nilai_pajak=$this->request->getPost('v_nilai_pajak');
            
            if($v_pajak_kode){
	            foreach($v_pajak_kode as $key=>$row){
	            	$this->bkuRinciModel->insert([
		                "bku_id" => $id,
		                "jenis" => 'pajak',
		                "buku" => $row,
		                "kegiatan_kode" => "",
		                "kegiatan_nama" => "",
		                "rekening_kode" => $row,
		                "rekening_nama" => $v_pajak_uraian,
		                "penerimaan" => 0,
		                "pengeluaran" => $v_nilai_pajak[$key]
		            ]);
	            }
            }
            
            return redirect($this->modulName);
        }

        echo view('belanja/belanja_update', $data);
    }
    
    public function delete($id){
        $this->bkuModel->delete($id);
        $this->bkuRinciModel->where('bku_id', $id)->delete();
        return redirect($this->modulName);
    }
    
    public function readKegiatan()
    {
        $db = db_connect();
        $kegiatan = $db->query('select distinct kode_sub_kegiatan, nama_sub_kegiatan from anggaran')->getResult();
        $print= '<div class="table-responsive"><table id="data-table" class="table table-striped table-bordered nowrap">
				<thead>
					<tr>
						<th>Sub Kegiatan Kode</th>
						<th>Sub Kegiatan Nama</th>
					</tr>
				</thead>
				<tbody id="rincian" class="rincian">';
        foreach($kegiatan as $row){
            $print .= '<tr>
					<td><a role="button" class="kodeKegiatanList text-blue" id="kodeKegiatanList" data-id="' . $row->kode_sub_kegiatan . '">' . $row->kode_sub_kegiatan . '</a></td>
					<td>' . $row->nama_sub_kegiatan . '</td>
				</tr>';
        }
         $print .= '</tbody>
    		</table>
    		</div>
    		<script type="text/javascript">
    		$(document).on({
    			ajaxStart: function() {
    				$("#modal-loading").show();
    			},
    			ajaxStop: function() {
    				$("#modal-loading").hide();
    			}
    		});
    		$(document).ready(function() {	
    		  $("#data-table").DataTable();
    		});
    	  </script>';
        return $print;
    }
    
    public function readRincian()
    {
        $kegiatanKode=$this->request->getPost('kegiatanKode');
        $db = db_connect();
        $rekening = $db->query('select kode_sub_kegiatan,nama_sub_kegiatan, kode_rekening, nama_rekening from anggaran where kode_sub_kegiatan="'.$kegiatanKode.'"')->getResult();
        $print = '<div class="table-responsive"><table id="data-table" class="table table-striped table-bordered nowrap">
				<thead>
					<tr>
						<th width="250px">
						<input type="checkbox" onchange="checkAll(this)" name="rincianListCheckAll"/>
						Sub Rincian Objek Kode
						</th>
						<th>Sub Rincian Objek</th>
					</tr>
				</thead>
				<tbody>';
		foreach ($rekening as $row) {
			$print .= '<tr>
					<td>
					<input type="checkbox" name="rincianList[]" class="rincianList" value="' . $row->kode_rekening . '" kegiatan-kode="' . $row->kode_sub_kegiatan . '" kegiatan-nama="' . $row->nama_sub_kegiatan . '" rekening-nama="' . $row->nama_rekening . '"  combine-kode="' . $row->kode_sub_kegiatan . $row->kode_rekening . '"/>
					' . $row->kode_rekening . '
					</td>
					<td>' . $row->nama_rekening . '</td>
				</tr>';
		}
		$print .= '</tbody>
		</table>
		</div>
		<script type="text/javascript">
		$(document).on({
			ajaxStart: function() {
				$("#modal-loading").show();
			},
			ajaxStop: function() {
				$("#modal-loading").hide();
			}
		});
	  </script>';
        return $print;
    }
    
    public function readPajak()
    {
        $db = db_connect();
        $potongan = $db->query('select kode,uraian,jenis from potongan')->getResult();
        $print = '<div class="table-responsive"><table id="data-table" class="table table-striped table-bordered nowrap">
				<thead>
					<tr>
						<th>Uraian</th>
					</tr>
				</thead>
				<tbody>';
		foreach ($potongan as $row) {
			$print .= '<tr>
						<td>
						<a role="button" class="potonganList" id="potonganList" data-kode="' . $row->kode . '" data-uraian="' . $row->uraian . '" data-jenis="' . $row->jenis . '"  data-id="' . $row->kode . '" style="color:#007bff;">' . $row->uraian . '</a>
						</td>
					</tr>';
		}
		$print .= '</tbody>
		</table>
		</div>
		<script type="text/javascript">
		$(document).on({
			ajaxStart: function() {
				$("#modal-loading").show();
			},
			ajaxStop: function() {
				$("#modal-loading").hide();
			}
		});
	  </script>';
        return $print;
    }
    
    
}
