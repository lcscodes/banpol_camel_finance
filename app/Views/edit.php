<?= $this->extend('template/footer') ?>

<?= $this->section('content') ?>

<div class="main-content bg-white">
  <h5 class="card-title mb-3"><i class='bx bxs-user'></i><i class='bx bx-chevron-right'></i>User<i class='bx bx-chevron-right'></i>Edit</h5>


  <form action="<?= base_url(); ?>/edit/update/<?= $users['id_user']; ?>" method="post">
    <?= csrf_field(); ?>
    <input type="hidden" name="id" value="<?= (old('id_user')) ? old('id_user') : $users['id_user']; ?>">
    <div class="mb-2 row">
      <label for="inputText" class="col-sm-2 col-form-label">Nama</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" value="<?= (old('nama')) ? old('nama') : $users['nama']; ?>" name="nama" id="inputText">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputText" class="col-sm-2 col-form-label">Username</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" value="<?= (old('username')) ? old('username') : $users['username']; ?>" id="inputText">
      </div>
    </div>
    <div class="mb-2 row">
      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" name="password" value="<?= (old('password')) ? old('password') : $users['password']; ?>" id="inputPassword">
      </div>
    </div>

    <button class="col-2 btn btn-primary" type="submit">Ubah</button>
    <button onclick="window.location.href='<?= base_url(); ?>/user';" class="col-2 btn btn-danger" type="button">Batal</button>
  </form>




  </main>
</div>
</div>

<?= $this->endSection() ?>