<?= $this->extend('template/template') ?>

<?= $this->section('content') ?>

 <div class="container">
      <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
          <div class="col-md-6">
            <nav aria-label="Breadcrumb">
              <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>/home">Home</a></li>
                <li class="breadcrumb-item active">Blog</li>
              </ul>
            </nav>
            <h1 class="text-center">Blog</h1>
          </div>
        </div>
      </div>
    </div>
  </header>

  <div class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-sm-10">
          <form action="#" class="form-search-blog">
            <div class="input-group">
              <div class="input-group-prepend">
                <select id="categories" class="custom-select bg-light">
                  <option>All Categories</option>
                  <option value="travel">Travel</option>
                  <option value="lifestyle">LifeStyle</option>
                  <option value="healthy">Healthy</option>
                  <option value="food">Food</option>
                </select>
              </div>
              <input type="text" class="form-control" placeholder="Enter keyword..">
            </div>
          </form>
        </div>
        <div class="col-sm-2 text-sm-right">
          <button class="btn btn-secondary">Filter <span class="mai-filter"></span></button>
        </div>
      </div>

      <div class="page-section">
    <div class="container">
      
    <?php foreach ($konten as $da) : ?> 
      <div class="row mt-5">
        <div class="col-lg-4 py-3 wow fadeInUp">
          <div class="card-blog">
            <div class="header">
              <div class="post-thumb">
                <img src="<?php echo base_url(); ?>/img/<?= $da['foto_konten']; ?>" alt="">
              </div>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="<?= base_url(); ?>/view/<?= $da['id_konten']; ?>"><?= $da['judul_konten']; ?></a></h5>
              <div class="post-date">Posted on <a href="#"><?= $da['tgl_konten']; ?></a></div>
            </div>
          </div>
        </div>
        <?php endforeach ?>
        
      </div>
    </div>
  </div>
        


      <nav aria-label="Page Navigation">
        <ul class="pagination justify-content-center">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active" aria-current="page">
            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
          </li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>

    </div>
  </div>


<?= $this->endSection() ?>