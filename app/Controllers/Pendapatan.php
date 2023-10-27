<?php

namespace App\Controllers;
use CodeIgniter\Model\BkuModel;

class Pendapatan extends BaseController
{
    
    public function __construct(){
        $this->modulName = 'pendapatan';
        $this->modulTitle = 'Pendapatan';
        $this->bkuModel = new \App\Models\BkuModel();
        $this->bkuRinciModel = new \App\Models\BkuRinciModel();
        $this->validation =  \Config\Services::validation();
    }
    
    public function index()
    {
        $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'bkus' => $this->bkuModel->getPendapatan(),
        ];
        return view('pendapatan/pendapatan_list', $data);
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
                "jenis" => 'pendapatan',
                "uraian" => $this->request->getPost('uraian')
            ]);
            $insertId = $this->bkuModel->insertID();
            
            $v_rekening_kode=$this->request->getPost('v_rekening_kode');
            $v_rekening_nama=$this->request->getPost('v_rekening_nama');
            $v_nilai=$this->request->getPost('v_nilai');
            
            if($v_rekening_kode){
	            foreach($v_rekening_kode as $key=>$row){
		            $this->bkuRinciModel->insert([
		                "bku_id" => $insertId,
		                "jenis" => 'pendapatan',
		                "buku" => 'banpol',
		                "rekening_kode" => $row,
		                "rekening_nama" => $v_rekening_nama[$key],
		                "penerimaan" => $v_nilai[$key],
		                "pengeluaran" => 0
		            ]);
	            }
            }
            
            return redirect($this->modulName);
        }
		
        echo view('pendapatan/pendapatan_create', $data);
    }
    
    public function read($id)
	{
		$getPendapatanRinci=$this->bkuRinciModel->getBkuRinci($id);
		$tot_pendapatan=0;
		$printPendapatanRinci='';
		if($getPendapatanRinci){
			foreach($getPendapatanRinci as $row){
				$printPendapatanRinci.='<tr id=tr'.str_replace(".","",$row['rekening_kode']).'>';
				$printPendapatanRinci.='<td>
												<a role="button" id="btnDelRincian" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
												<input type="hidden" name="v_rekening_kode[]" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_rekening_nama[]" value="'.$row['rekening_nama'].'">
											</td>
											<td>'.$row['rekening_nama'].'</td>
											<td>
											<input required type="text" name="v_nilai[]" id="nilai'.$row['rekening_kode'].'" class="nilai'.$row['rekening_kode'].'" value="'.$row['penerimaan'].'">
											</td>';
				$printPendapatanRinci.='</tr>';
			}
		}
		
	    $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'pendapatan' => $this->bkuModel->where('bku_id', $id)->first(),
            'pendapatanRinci' => $printPendapatanRinci
        ];
		
		if(!$data['pendapatan']){
			throw PageNotFoundException::forPageNotFound();
		}
		echo view('pendapatan/pendapatan_read', $data);
    }
    
    public function update($id)
    {
    	$getPendapatanRinci=$this->bkuRinciModel->getBkuRinci($id);
		$tot_pendapatan=0;
		$printPendapatanRinci='';
		if($getPendapatanRinci){
			foreach($getPendapatanRinci as $row){
				$printPendapatanRinci.='<tr id=tr'.str_replace(".","",$row['rekening_kode']).'>';
				$printPendapatanRinci.='<td>
												<a role="button" id="btnDelRincian" data-id="'.$row['rekening_kode'].'">
													<i class="bx bxs-trash-alt"></i>
												</a>&nbsp;&nbsp;
												<input type="hidden" name="v_rekening_kode[]" value="'.$row['rekening_kode'].'">
												<input type="hidden" name="v_rekening_nama[]" value="'.$row['rekening_nama'].'">
											</td>
											<td>'.$row['rekening_nama'].'</td>
											<td>
											<input required type="text" name="v_nilai[]" id="nilai'.$row['rekening_kode'].'" class="nilai'.$row['rekening_kode'].'" value="'.$row['penerimaan'].'">
											</td>';
				$printPendapatanRinci.='</tr>';
			}
		}
		
        $data = [
            'modulName' => $this->modulName,
            'modulTitle' => $this->modulTitle,
            'pendapatan' => $this->bkuModel->where('bku_id', $id)->first(),
            'pendapatanRinci' => $printPendapatanRinci
        ];
        
        $this->validation->setRules([
            'tanggal' => 'required'
        ]);
        $isDataValid = $this->validation->withRequest($this->request)->run();
        
        if($isDataValid){
            $this->bkuModel->update($id, [
                "tanggal" => $this->request->getPost('tanggal'),
                "uraian" => $this->request->getPost('uraian')
            ]);
            
            $this->bkuRinciModel->where('bku_id', $id)->delete();
            
            $v_rekening_kode=$this->request->getPost('v_rekening_kode');
            $v_rekening_nama=$this->request->getPost('v_rekening_nama');
            $v_nilai=$this->request->getPost('v_nilai');
            
            if($v_rekening_kode){
	            foreach($v_rekening_kode as $key=>$row){
		            $this->bkuRinciModel->insert([
		                "bku_id" => $id,
		                "jenis" => 'pendapatan',
		                "buku" => 'banpol',
		                "rekening_kode" => $v_rekening_kode[$key],
		                "rekening_nama" => $v_rekening_nama[$key],
		                "penerimaan" => $v_nilai[$key],
		                "pengeluaran" => 0
		            ]);
	            }
            }
            
            return redirect($this->modulName);
        }

        echo view('pendapatan/pendapatan_update', $data);
    }
    
    public function delete($id){
        $this->bkuModel->delete($id);
        $this->bkuRinciModel->where('bku_id', $id)->delete();
        return redirect($this->modulName);
    }
    
    public function readRincian()
    {
        $db = db_connect();
        $rekening = $db->query('select kode,uraian from rekening where parent=4')->getResult();
        $print = '<div class="table-responsive"><table id="data-table" class="table table-striped table-bordered nowrap">
				<thead>
					<tr>
						<th width="250px">Sub Rincian Objek Kode</th>
						<th>Sub Rincian Objek</th>
					</tr>
				</thead>
				<tbody>';
		foreach ($rekening as $row) {
			$print .= '<tr>
					<td>' . $row->kode . '</td>
					<td>
						<a role="button" class="pendapatanList" id="pendapatanList" data-uraian="' . $row->uraian . '" data-id="' . $row->kode . '" style="color:#007bff;">' . $row->uraian . '</a>
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
