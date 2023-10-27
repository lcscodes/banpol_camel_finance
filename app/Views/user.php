<?= $this->extend('template/footer') ?>



<?= $this->section('content') ?>



<div class="main-content bg-white">
    <h5 class="card-title mb-3"><i class='bx bxs-user'></i><i class='bx bx-chevron-right'></i>User</h5>

    <div class="btn-toolbar mb-2 mb-md-0">

        <div class="btn-group me-2">

            <a type="button" class="btn btn-sm btn-success" href="<?= base_url(); ?>/create">
                Tambah
            </a>

            <!-- <button type="button" class="btn btn-sm btn-success" href="/create">Tambah</button> -->

            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Export</button> -->

        </div>

        <!-- <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">

                <span data-feather="calendar"></span>

                This week

            </button> -->

    </div>


    <div class="row my-3">
        <div class="col-md">
            <table id="data1" class="table table-avatar bg-grey text-black" style="width:100%">
                <thead class="table">
                    <tr>

                        <th scope="col">Nama</th>

                        <th scope="col">Username</th>


                        <th scope="col">Aksi</th>

                        <!-- <th scope="col">Header</th> -->

                        <!-- <th scope="col">Header</th> -->

                    </tr>

                </thead>



                <tbody>

                    <?php foreach ($users as $u) : ?>

                        <tr>

                            <td><?= $u['nama']; ?></td>

                            <td><?= $u['username']; ?></td>


                            <td>

                                <a href="<?= base_url(); ?>/edit/<?= $u['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>

                                <form action="<?= base_url(); ?>/user/<?= $u['id_user']; ?>" method="post" class="d-inline">

                                    <?= csrf_field(); ?>

                                    <input type="hidden" name="_method" value="DELETE">

                                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-edit fa-sm text-white-50"></i> Hapus</a> </button>

                                </form>

                            </td>



                        </tr>



                    <?php endforeach ?>



                </tbody>
            </table>
        </div>
    </div>



    </main>

</div>

</div>



<?= $this->endSection() ?>