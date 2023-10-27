<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<div class="main-content bg-white">
    <h5 class="card-title mb-3"><i class='bx bxs-dashboard'></i><i class='bx bx-chevron-right'></i><?= $modulTitle ?><i class='bx bx-chevron-right'></i>Edit</h5>
    <form action="" method="post">
        
        <input type="hidden" name="id" value="<?= $pendapatan['bku_id'] ?>" />
        
        <div class="mb-2 row">
            <label for="inputText" class="col-sm-2 col-form-label">Tanggal</label>
            <div class="col-sm-10">
              <input type="text" class="form-control datepicker" autocomplete="off" name="tanggal" id="tanggal" value="<?= $pendapatan['tanggal'] ?>" required>
            </div>
        </div>

         <div class="mb-2 row">
            <label for="inputText" class="col-sm-2 col-form-label">Uraian</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="uraian" id="uraian" required><?= $pendapatan['uraian'] ?></textarea>
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
                            <td>Rekening</td>
                            <td>Nilai</td>
                        </tr>
                    </thead>
                    <tbody id="rincian">
                    	<?= $pendapatanRinci ?>
                    </tbody>
                </table>
            </div>
        </div>

        <button class="col-2 btn btn-primary" type="submit">Edit</button>
        <button onclick="window.location.href='<?= base_url($modulName) ?>';" class="col-2 btn btn-danger" type="button">Batal</button>

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
    	$('#ModalLabel').html('Rincian Pendapatan');
		$.ajax({
			url: "<?= base_url($modulName.'/readRincian') ?>",
			type: 'POST',
			async: true,
			success: function(res) {
				$('#ModalBody').html(res);
				$('#ModalFooter').html('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>');
			}
		});
		$('#Modal').modal('show');
    });
    // @RINCIAN PILIH PENDAPATAN
    $(document).on('click', '.pendapatanList', function() {
    	rekKode=$(this).attr('data-id');
    	rekUraian=$(this).attr('data-uraian');
    	// console.log("dataid:"+$(this).attr('data-id'));
    	// console.log("datauraian:"+$(this).attr('data-uraian'));
		rekKode = rekKode.replace(/\./g, '');
				$('#nodata_rincian').remove();
				$("#rincian").append('<tr id="tr' + rekKode + '">' +
					'<td>' +
					'<a role="button" id="btnDelRincian" data-id="' + rekKode + '">' +
					'<i class="bx bxs-trash-alt"></i>' +
					'</a>&nbsp;&nbsp;' +
					'<input type="hidden" name="v_rekening_kode[]" value="' + rekKode + '">' +
					'<input type="hidden" name="v_rekening_nama[]" value="' + rekUraian + '">' +
					'</td>' +
					'<td>' +
					rekUraian +
					'</td>' +
					'<td>' +
					'<input required type="text" name="v_nilai[]" id="nilai' + rekKode + '" class="nilai' + rekKode + '" value="">' +
					'</td>' +
					'</tr>');
		$("#Modal").modal('hide');
	})
	
});

// @RINCIAN  HAPUS
$(document).on('click', '#btnDelRincian', function() {
	dataid = $(this).attr('data-id');
	dataid = dataid.replace(/\./g, '');
	$('#tr' + dataid).remove();
})

</script>

<?= $this->endSection() ?>