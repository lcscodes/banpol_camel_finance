<?= $this->extend('template/footer') ?>



<?= $this->section('content') ?>





 <div class="main-content bg-white">
        <h5 class="card-title mb-3"><i class='bx bxs-user'></i><i class='bx bx-chevron-right'></i>User<i class='bx bx-chevron-right'></i>Tambah</h5>



    <form action="<?= base_url(); ?>/create/save" method="post">

        <div class="mb-2 row">
            <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" id="inputText">
            </div>
        </div>



         <div class="mb-2 row">
            <label for="inputText" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="username" id="inputText">
            </div>
        </div>

  
         <div class="mb-2 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password" id="inputPassword">
            </div>
        </div>




        <button class="col-2 btn btn-primary" type="submit">Tambah</button>
        <button onclick="window.location.href='<?= base_url(); ?>/user';" class="col-2 btn btn-danger" type="button">Batal</button>

    </form>









</main>

</div>

</div>

<?= $this->endSection() ?>