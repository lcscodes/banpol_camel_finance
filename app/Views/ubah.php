<?= $this->extend('template/footer') ?>



<?= $this->section('content') ?>





<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

        <h1 class="h2">Ubah Customer</h1>

    </div>

    <form action="<?= base_url(); ?>/update/<?= $customer['cust_id']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="cust_id" value="<?= (old('cust_id')) ? old('cust_id') : $customer['cust_id']; ?>">
        <div class="form-group row pb-2">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="cust_no" value="<?= (old('cust_no')) ? old('cust_no') : $customer['cust_no']; ?>" placeholder="No Customer">
            </div>
        </div>

        <div class="form-group row pb-2">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Nama Customer</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-sm" name="cust_nama" value="<?= (old('cust_nama')) ? old('cust_nama') : $customer['cust_nama']; ?>" id=" colFormLabelSm" placeholder="Nama Customer">
            </div>
        </div>

        <div class="form-group row pb-2">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Alamat Customer</label>
            <div class="col-sm-10">
                <input type="text" name="cust_alamat" class="form-control form-control-sm" value="<?= (old('cust_alamat')) ? old('cust_alamat') : $customer['cust_alamat']; ?>" id="colFormLabelSm" placeholder="Alamat Customer">
            </div>
        </div>

        <div class="form-group row pb-2">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">No Telepon Customer</label>
            <div class="col-sm-10">
                <input type="text" name="cust_telp" value="<?= (old('cust_telp')) ? old('cust_telp') : $customer['cust_telp']; ?>" class="form-control form-control-sm" id="colFormLabelSm" placeholder="No Telepon Customer">
            </div>
        </div>

        <div class="form-group row pb-2">
            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Status Customer</label>
            <div class="col-sm-10">
                <select name="cust_status" class="form-control">
                    <option value="<?= (old('cust_status')) ? old('cust_status') : $customer['cust_status']; ?>"><?= (old('cust_status')) ? old('cust_status') : $customer['cust_status']; ?></option>
                    <option value="Iya">Iya</option>
                    <option value="Tidak">Tidak</option>
                </select>
            </div>
        </div>



        <br>

        <button class="col-2 btn btn-primary" type="submit">Ubah</button>
        <button onclick="window.location.href='<?= base_url(); ?>/dashboard';" class="col-2 btn btn-primary" type="button">Batal</button>

    </form>









</main>

</div>

</div>



<?= $this->endSection() ?>