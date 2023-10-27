<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<div class="main-content bg-white">
    <h5 class="card-title mb-3"><i class='bx bxs-dashboard'></i><i class='bx bx-chevron-right'></i><?= $modulTitle ?></h5>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a type="button" class="btn btn-sm btn-success" href="<?= base_url().'/'.$modulName ?>/create">
               Tambah
            </a>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md">
            <table id="datatable" class="table table-avatar bg-grey text-black mydatatable" style="width:100%">
                <thead class="table">
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Uraian</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($bkus as $bku) : ?>
                        <tr>
                            <td><?= $bku['tanggal']; ?></td>
                            <td><?= $bku['uraian']; ?></td>
                            <td>
                                <a href="<?= base_url($modulName.'/read/'.$bku['bku_id']) ?>" class="btn btn-sm btn-outline-secondary">Lihat</a>
                                <a href="<?= base_url($modulName.'/update/'.$bku['bku_id']) ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>
                                <a href="#" data-href="<?= base_url($modulName.'/delete/'.$bku['bku_id']) ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" onclick="confirmToDelete(this)"><i class="fas fa-edit fa-sm text-white-50"></i> Hapus</a>
                                
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="confirm-dialog" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h5 class="modal-title" id="exampleModalLabel">Anda yakin?</h5>
        <p>Data akan terhapus selamanya</p>
      </div>
      <div class="modal-footer">
        <a href="#" role="button" id="delete-button" class="btn btn-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
      </div>
    </div>
  </div>
</div>

<script>
new DataTable('.datatable');
function confirmToDelete(el){
    $("#delete-button").attr("href", el.dataset.href);
    $("#confirm-dialog").modal('show');
}
</script>

<?= $this->endSection() ?>