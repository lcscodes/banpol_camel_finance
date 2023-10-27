<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<div class="main-content bg-white">
    <h5 class="card-title mb-3"><i class='bx bxs-dashboard'></i><i class='bx bx-chevron-right'></i><?= $modulTitle ?><i class='bx bx-chevron-right'></i>Tambah</h5>
    <form action="" method="post">
        
        <div class="mb-2 row">
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control datepicker" autocomplete="off" name="tanggal" id="tanggal" value="<?= date('Y-m-d') ?>" required>
            </div>
        </div>

         <div class="mb-3 row">
            <label for="inputText" class="col-sm-2 col-form-label">Uraian</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="uraian" id="uraian" required></textarea>
            </div>
        </div>
        
         <div class="row">
             <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan=4><button type="button" id="btnAddRincian" class="btn btn-success btn-sm me-2"><i class='bx bx-plus'></i></button> Rincian Belanja </th>
                        </tr>
                        <tr>
                            <td width=100>Action</td>
                            <td>Sub Kegiatan</td>
                            <td>Rekening</td>
                            <td>Nilai</td>
                        </tr>
                    </thead>
                    <tbody id="rincian">
                        <tr id="nodata_rincian">
                            <td colspan=4 class="text-center text-muted"><small>- tidak ada data, klik tombol + untuk menambah data -</small></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
         <div class="mb-2 row">
             <div class="col-sm-12">
                <table class="table table-bordered">
                    <thead>
                         <tr>
                            <th colspan=3><button type="button" id="btnAddPajak" class="btn btn-success btn-sm me-2"><i class='bx bx-plus'></i></button> Pajak </th>
                        </tr>
                        <tr>
                            <td width=100>Action</td>
                            <td>Uraian</td>
                            <td>Nilai</td>
                        </tr>
                    </thead>
                    <tbody id="pajak">
                        <tr id="nodata_pajak">
                            <td colspan=3 class="text-center text-muted"><small>- tidak ada data, klik tombol + untuk menambah data -</small></td>
                        </tr>
                    </tbody>
                </table>
             </div>
        </div>
        

        <button class="col-2 btn btn-primary" type="submit">Simpan</button>
        <button onclick="window.location.href='<?= base_url().'/'.$modulName ?>';" class="col-2 btn btn-danger" type="button">Batal</button>
        

    </form>
</main>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div id="modal-loading" style="position:absolute;z-index:100;width:100%;height:100%;background:white;text-align:center;padding-top:10%;">
			Loading...
		</div>
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">...</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="ModalBody">
        ...
      </div>
      <div class="modal-footer" id="ModalFooter">
         ...
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function(){
	// @RINCIAN TAMBAH
    $("#btnAddRincian").click(function(){
        $('#ModalLabel').html('Rincian Belanja');
        $('#ModalFooter').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
        $.ajax({
			url: "<?= base_url($modulName.'/readKegiatan') ?>",
			type: 'POST',
			async: true,
			success: function(res) {
				$('#ModalBody').html(res);
			}
		});
		$('#Modal').modal('show');
    });
    // @PAJAK TAMBAH
    $("#btnAddPajak").click(function(){
        $('#ModalLabel').html('Pajak');
        $('#ModalFooter').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
        $.ajax({
			url: "<?= base_url($modulName.'/readPajak') ?>",
			type: 'POST',
			async: true,
			success: function(res) {
				$('#ModalBody').html(res);
			}
		});
		$('#Modal').modal('show');
    });
    // @RINCIAN PILIH KEGIATAN
    $(document).on('click', '.kodeKegiatanList', function() {
		var kegiatanKode = $(this).attr('data-id');
		$.ajax({
			url: "<?= base_url($modulName.'/readRincian') ?>",
			type: 'POST',
			async: true,
			data: {
				kegiatanKode: kegiatanKode
			},
			success: function(res) {
				$('#ModalBody').html(res);
				$('#ModalFooter').html('<a role="button" class="btn btn-info btnAddRincian text-white" id="btnAddRincian">Tambah</a><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
			}
		});
	})
	
});
// @RINCIAN CHECK ALL 
function checkAll(ele) {
	var checkboxes = document.getElementsByClassName('rincianList');
	if (ele.checked) {
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = true;
			}
		}
	} else {
		for (var i = 0; i < checkboxes.length; i++) {
			if (checkboxes[i].type == 'checkbox') {
				checkboxes[i].checked = false;
			}
		}
	}
}
// @RINCIAN SIMPAN 
$(document).on('click', '.btnAddRincian', function() {
	var checkboxes = document.getElementsByClassName('rincianList');
	for (var i = 0; i < checkboxes.length; i++) {
		if (checkboxes[i].checked) {
			var getrincian = document.getElementsByClassName('rincian_id' + checkboxes[i].value);
			if (getrincian.length == 0) {
				var tot_belanja = 0;
			
				dataidtr = '';
				dataidtr = checkboxes[i].value;
				dataidtr = dataidtr.replace(/\./g, '');
				$('#nodata_rincian').remove();
				$("#rincian").append('<tr id="tr' + dataidtr + '">' +
					'<td>' +
					'<a role="button" id="btnDelRincian" data-id="' + checkboxes[i].value + '">' +
					'<i class="bx bxs-trash-alt"></i>' +
					'</a>&nbsp;&nbsp;' +
					'<input type="hidden" class="rincian_id' + checkboxes[i].value + '" value="' + checkboxes[i].value + '">' +
					'<input type="hidden" name="v_kegiatan_kode[]" value="' + checkboxes[i].getAttribute("kegiatan-kode") + '">' +
					'<input type="hidden" name="v_kegiatan_nama[]" value="' + checkboxes[i].getAttribute("kegiatan-nama") + '">' +
					'<input type="hidden" name="v_rekening_kode[]" value="' + checkboxes[i].value + '">' +
					'</td>' +
					'<td>' +
					checkboxes[i].getAttribute("kegiatan-nama") +
					'</td>' +
					'<td>' +
					'<input type="hidden" name="v_rekening_nama[]" value="' + checkboxes[i].getAttribute("rekening-nama") + '">' +
					checkboxes[i].getAttribute("rekening-nama") +
					'</td>' +
					'<td>' +
					'<input type="hidden" id="tot_belanja' + checkboxes[i].value + '" class="tot_belanja' + checkboxes[i].value + '" value="' + tot_belanja + '">' +
					'<input required type="text" name="v_nilai[]" id="nilai' + checkboxes[i].value + '" class="nilai' + checkboxes[i].value + '" value="">' +
					'</td>' +
					'</tr>');
			}
		}
	}
	$("#Modal").modal('hide');
})
// @RINCIAN  HAPUS
$(document).on('click', '#btnDelRincian', function() {
	dataid = $(this).attr('data-id');
	dataid = dataid.replace(/\./g, '');
	$('#tr' + dataid).remove();
})

$(document).on('click', '.potonganList', function() {
	uraian_pajak = $(this).attr('data-uraian');
	kode = $(this).attr('data-kode');
	jenis = $(this).attr('data-jenis');
	var getpajak = document.getElementsByClassName('pajak_kode' + kode);
	if (getpajak.length == 0) {
		$('#nodata_pajak').remove();
		apn = '';
		apn += '<tr id="trpj' + kode + '">';
		apn +=		'<td>' +
					'<a role="button" id="btnDelPajak" data-id="' + kode + '">' +
					'<i class="bx bxs-trash-alt"></i>' +
					'</a>&nbsp;&nbsp;' +
					'</td>';
		apn += '	<td>';
		apn += '		<input type="hidden" name="v_pajak_kode[]" class="pajak_kode' + kode + '" value="' + kode + '">';
		apn += '		<input type="hidden" name="v_pajak_jenis[]" value="' + jenis + '">';
		apn += '		<input type="hidden" name="v_pajak_uraian[]" value="' + uraian_pajak + '">' + uraian_pajak;
		apn += '	</td>';
		apn += '	<td>';
		apn += '		<input type="text" name="v_nilai_pajak[]" value="">';
		apn += '	</td>';
		apn += '</tr>';
		$("#pajak").append(apn);
	}
	$("#Modal").modal('hide');
})

$(document).on('click', '#btnDelPajak', function() {
	dataid = $(this).attr('data-id');
	$('#trpj' + dataid).remove();
})

</script>

<?= $this->endSection() ?>