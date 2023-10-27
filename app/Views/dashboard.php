<?= $this->extend('template/layout') ?>
<?= $this->section('content') ?>

<div class="main-content bg-white">
    <h5 class="card-title mb-3"><i class='bx bxs-dashboard'></i><i class='bx bx-chevron-right'></i>Dashboard</h5>

    <h1 class="h2">Selamat Datang <?= session()->get('nama'); ?></h1>


    <div class="row align-items-start">
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/home_admin';" class="btn btn-primary" type="button"><!--<span data-feather="globe" class="text-white mb-0"></span>-->Home</button>
            </div>
        </div>
        <!-- <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/lembaga_admin';" class="btn btn-primary" type="button">Profil</button>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/klien_admin';" class="btn btn-primary" type="button">Klien</button>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/lokasi_admin';" class="btn btn-primary" type="button">Lokasi</button>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/contact_admin';" class="btn btn-primary" type="button">Contact</button>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/galeri_admin';" class="btn btn-primary" type="button">Galeri</button>
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="d-grid gap-2">
                <button onclick="window.location.href='<?= base_url(); ?>/team_admin';" class="btn btn-primary" type="button">Team</button>
            </div>
        </div>
    </div> -->

        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Data User
    </button> -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Data User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row my-3">
                            <div class="col-md">
                                <table id="data1" class="table table-avatar bg-grey text-black" style="width:100%">
                                    <thead class="table-dark">
                                        <tr>

                                            <th scope="col">Nama</th>

                                            <th scope="col">Usernama</th>

                                            <!-- <th scope="col">Aksi</th> -->

                                            <!-- <th scope="col">Header</th> -->

                                            <!-- <th scope="col">Header</th> -->

                                        </tr>

                                    </thead>



                                    <tbody>

                                        <?php foreach ($users as $u) : ?>

                                            <tr>

                                                <td><?= $u['nama']; ?></td>

                                                <td><?= $u['username']; ?></td>

                                                <!-- <td>

                                                <a href="<?= base_url(); ?>/edit/<?= $u['id_user']; ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-edit fa-sm text-white-50"></i> Ubah</a>

                                                <form action="<?= base_url(); ?>/user/<?= $u['id_user']; ?>" method="post" class="d-inline">

                                                    <?= csrf_field(); ?>

                                                    <input type="hidden" name="_method" value="DELETE">

                                                    <button type="submit" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" onclick="return confirm('Apakah Anda Yakin ?');"><i class="fas fa-edit fa-sm text-white-50"></i> Hapus</a> </button>

                                                </form>

                                            </td> -->



                                            </tr>



                                        <?php endforeach ?>



                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>


        <?= $this->endSection() ?>