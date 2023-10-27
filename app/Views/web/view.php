<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>


<div class="page-section pt-5">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
          <li class="breadcrumb-item"><a href="<?= base_url() ?>/konten">Blog</a></li>
         
          <li class="breadcrumb-item active"><?= (old('judul_konten')) ? old('judul_konten') : $konten['judul_konten']; ?></li>

        </ul>
      </nav>
      
      <div class="row">
        <div class="col-lg-12">
          <div class="blog-single-wrap">
            <div class="header">
              <div class="post-thumb">
                <img src="<?php echo base_url(); ?>/img/<?= (old('foto_konten') ? old('foto_konten') : $konten['foto_konten']); ?>" alt="">
              </div>
               <!-- <div class="meta-header">
                <div class="post-author">
                  by <a href="#">Stephen Doe</a>
                </div>

                
              </div>  -->
            </div>
            <h1 class="post-title"><?= (old('judul_konten')) ? old('judul_konten') : $konten['judul_konten']; ?></h1>
            <div class="post-meta">
              <div class="post-date">
                <span class="icon">
                  <span class="mai-time-outline"></span>
                </span> <a href="#"><?= (old('tgl_konten')) ? old('tgl_konten') : $konten['tgl_konten']; ?></a>
              </div>
               <div class="post-comment-count ml-2">
                <span class="icon">
                  <span class="mai-book-outline"></span>
                </span> <a href="#"><?= (old('nama_kategori')) ? old('nama_kategori') : $konten['nama_kategori']; ?></a>
              </div> 
            </div>
            <div class="post-content">
              <p><?= (old('isi_konten')) ? old('isi_konten') : $konten['isi_konten']; ?></p>
            </div>
          </div>

          

        </div>
        
        <a href="<?= base_url(); ?>/konten ?>" class="btn btn-link"><i class="fas fa-edit fa-sm text-white-50"></i>Kembali...</a>
      </div>

    </div>
  </div>

<!-- main content-->

<?= $this->endSection() ?>