  <?php
  include 'nedmin/netting/baglan.php';
  include 'nedmin/production/fonksiyon.php';

  $ayarsor=$db->prepare("SELECT * FROM ayar");
  $ayarsor->execute();
  $ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

  $urunsor=$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
  $urunsor->execute(array(
    'urun_id' => $_GET['urun_id']
  ));
  $uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
  $urun_id = $uruncek['urun_id'];
  
  
             
            $hitsay = $db->prepare("UPDATE urun SET gosterim=gosterim+1 where urun_id = ?");
            $hitsay->execute([$urun_id]); 
            
  
  ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $uruncek['urun_ad']; ?> - <?php echo $ayarcek['ayar_title']; ?></title>
    <meta name="description" content="<?php echo $uruncek['urun_keyword']; ?>" />
    <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>" />
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ayarcek['ayar_ikon'] ?>">

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/lightgallery/css/lightgallery-bundle.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/flatpickr/dist/flatpickr.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body>
    <!-- Page loading spinner-->

    <main class="page-wrapper">
      <!-- Sign In Modal-->
    
             <?php include "menuler.php" ?>

      <!-- Page content-->
      <!-- Review modal-->
      <div class="modal fade" id="modal-review" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header d-block position-relative border-0 pb-0 px-sm-5 px-4">
              <h3 class="modal-title mt-4 text-center">Leave a review</h3>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 px-4">
              <form class="needs-validation" novalidate>
                <div class="mb-3">
                  <label class="form-label" for="review-name">Name <span class='text-danger'>*</span></label>
                  <input class="form-control" type="text" id="review-name" placeholder="Your name" required>
                  <div class="invalid-feedback">Please let us know your name.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="review-email">Email <span class='text-danger'>*</span></label>
                  <input class="form-control" type="email" id="review-email" placeholder="Your email address" required>
                  <div class="invalid-feedback">Please provide a valid email address.</div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="review-rating">Rating <span class='text-danger'>*</span></label>
                  <select class="form-control form-select" id="review-rating" required>
                    <option value="" selected disabled hidden>Choose rating</option>
                    <option value="5 stars">5 stars</option>
                    <option value="4 stars">4 stars</option>
                    <option value="3 stars">3 stars</option>
                    <option value="2 stars">2 stars</option>
                    <option value="1 star">1 star</option>
                  </select>
                  <div class="invalid-feedback">Please rate the property.</div>
                </div>
                <div class="mb-4">
                  <label class="form-label" for="review-text">Review <span class='text-danger'>*</span></label>
                  <textarea class="form-control" id="review-text" rows="5" placeholder="Your review message" required></textarea>
                  <div class="invalid-feedback">Please write your review.</div>
                </div>
                <button class="btn btn-primary d-block w-100 mb-4" type="submit">Submit a review</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- Page header-->

      <!-- Gallery-->
   
      <!-- Post content-->
      <section class="container mb-5 pb-1" style="margin-top:100px">
        <div class="row">
          <div class="col-md-6 mb-md-0 mb-4">

                <div class="row g-2 g-md-3 gallery" data-thumbnails="true" style="min-width: 30rem;">
       <?php
$urun_id = $uruncek['urun_id'];

$urunfotosor = $db->query("SELECT * FROM urunfoto WHERE urun_id = '$urun_id'");

$fotos = $urunfotosor->fetchAll(PDO::FETCH_ASSOC);
?>

<?php if (!empty($fotos)): ?>
  <?php foreach ($fotos as $key => $foto): ?>
    <?php if ($key == 0): ?>
      <div class="col-8">
        <a class="gallery-item rounded rounded-md-3" href="<?php echo $foto['urunfoto_resimyol']; ?>" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;<?php echo $foto['foto_aciklama']; ?>&lt;/h6&gt;">
          <img src="<?php echo $foto['urunfoto_resimyol']; ?>" alt="Gallery thumbnail">
        </a>
      </div>
    <?php elseif ($key == 1 || $key == 2): ?>
      <?php if ($key == 1): ?>
        <div class="col-4">
      <?php endif; ?>
        <a class="gallery-item rounded rounded-md-3 <?php echo $key == 1 ? 'mb-2 mb-md-3' : ''; ?>" href="<?php echo $foto['urunfoto_resimyol']; ?>" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;<?php echo $foto['foto_aciklama']; ?>&lt;/h6&gt;">
          <img src="<?php echo $foto['urunfoto_resimyol']; ?>" alt="Gallery thumbnail">
        </a>
      <?php if ($key == 2): ?>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  <?php endforeach; ?>
<?php endif; ?>

 
        </div>
            <!-- Overview-->
            <div class="mb-4 pb-md-3 mt-3">
              <h3 class="h4"><?php echo $uruncek['urun_ad'] ?></h3>
              <p class="mb-1"><?php echo $uruncek['urun_aciklamaust'] ?></p>
            </div>
        
        
            <!-- Post meta-->
            <div class="mb-lg-5 mb-md-4 pb-lg-2 py-4 border-top">
              <ul class="d-flex mb-4 list-unstyled fs-sm">
                <li class="me-3 pe-3 border-end">ID: <b>6810132<?php echo $uruncek['urun_id'] ?></b></li>
                <li class="me-3 pe-3">Goruntulenme: <b> <?php echo 543+$uruncek['gosterim'] ?></b></li>
              </ul>
            </div>
            <!-- Reviews-->
          </div>
          <!-- Sidebar-->
          <aside class="col-lg-4 col-md-5 ms-lg-auto pb-1">
            <!-- Contact card-->
            <div class="card shadow-sm mb-4">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between"><a class="text-decoration-none" href="contact">
                    <h5 class="mb-1">Cihan AKKAYA</h5>
                    <div class="mb-1"><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span><span class="ms-1 fs-sm text-muted">(45 reviews)</span>
                    </div>
                    <p class="text-body">Ürün Yöneticisi</p></a>
                  <div class="ms-4 flex-shrink-0"><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" href="<?php echo $ayarcek['ayar_facebook'] ?>"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle ms-2 mb-2" href="<?php echo $ayarcek['ayar_linkedin'] ?>"><i class="fi-linkedin"></i></a></div>
                </div>
                <ul class="list-unstyled border-bottom mb-4 pb-4">
                  <li><a class="nav-link fw-normal p-0" href="tel:<?php echo $ayarcek['ayar_gsm'] ?>"><i class="fi-phone mt-n1 me-2 align-middle opacity-60"></i><?php echo $ayarcek['ayar_gsm'] ?></a></li>
                  <li><a class="nav-link fw-normal p-0" href="mailto:<?php echo $ayarcek['ayar_mail'] ?>"><i class="fi-mail mt-n1 me-2 align-middle opacity-60"></i><?php echo $ayarcek['ayar_mail'] ?></a></li>
                </ul>
                <!-- Contact form-->
                <form class="needs-validation" novalidate action="ileti-gonder.php" method="POST">
                  <h6>Görüşme Talebi</h6>
                  <div class="mb-3">
                    <input class="form-control" type="text" placeholder="İsminiz*" required name="name">
                    <div class="invalid-feedback">Lütfen isminizi giriniz.</div>
                  </div>
                  <div class="mb-3">
                    <input class="form-control" type="email" placeholder="Email*" required name="email">
                    <div class="invalid-feedback">Lütfen şirket mail adresinizi giriniz!</div>
                  </div>
                  <input class="form-control mb-3" type="tel" placeholder="Telefon" name="phone">
                  <div class="input-group mb-3">
                    <input class="form-control date-picker rounded pe-5" type="text" placeholder="Müsaitlik olduğunuz zaman " data-datepicker-options="{&quot;altInput&quot;: true, &quot;altFormat&quot;: &quot;F j, Y&quot;, &quot;dateFormat&quot;: &quot;Y-m-d&quot;}" name="available"><i class="fi-calendar position-absolute top-50 end-0 translate-middle-y me-3"></i>
                  </div>
                  <textarea class="form-control mb-3" rows="3" placeholder="Mesajınız" style="resize: none;" name="message"></textarea>
                  <div class="form-check mb-4">
                    <input class="form-check-input" id="form-submit" type="checkbox" checked name="tanitim_istegi">
                    <label class="form-check-label fs-sm" for="form-submit">Tac Bariyer'dan haberleri ve tanıtımları e-postama gönderin.</label>
                  </div>
                  <button class="btn btn-lg btn-primary d-block w-100" type="submit" name="iletial">Talep Gönder</button>
                      <input type="hidden" name="link" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
                      <input type="hidden" name="geldigiyer" value="talep">
                </form>
              </div>
            </div>
            <!-- Location (Map)-->
          </aside>
        </div>
      </section>
      <!-- Recently viewed-->

<?php 
            $kategori_id = $uruncek['kategori_id'];
            $katesor = $db->query("SELECT * FROM kategori where kategori_id = '$kategori_id'");
            $katecek = $katesor->fetch(PDO::FETCH_ASSOC);

             ?>
      <section class="container mb-5 pb-2 pb-lg-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h2 class="h3 mb-0">Benzer Ürünler</h2><a class="btn btn-link fw-normal p-0" href="category-<?php echo $katecek['kategori_seourl'] ?>">Hepsini Gör<i class="fi-arrow-long-right ms-2"></i></a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
          <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
           


            <?php 
            $benzersor = $db->query("SELECT * FROM urun where kategori_id = '$kategori_id'");
            while($benzercek = $benzersor->fetch(PDO::FETCH_ASSOC)) {    ?>
               <?php 
                $urun_id = $benzercek['urun_id'];
                $urunfotosor = $db->query("SELECT * FROM urunfoto where urun_id = '$urun_id'");
                $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
                 ?>

            <!-- Item-->
           <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover">
                  <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-info">New</span></div>
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                  </div><a href="bariyer-<?=$benzercek["urun_seourl"].'-'.$benzercek["urun_id"]?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="Image"></a>
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">Esnek bariyer</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="bariyer-<?php echo $benzercek['urun_seourl'] ?>"><?php echo $benzercek['urun_ad'] ?></a></h3>
                  <p class="mb-2 fs-sm text-muted"><?php echo $benzercek['urun_madde1'] ?></p>
                </div>
              </div>
            </div>
            <!-- Item-->
          <?php } ?>
          </div>
        </div>
      </section>
    </main>
    <!-- Footer-->
<?php include "footer.php" ?>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/lightgallery/lightgallery.min.js"></script>
    <script src="vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js"></script>
    <script src="vendor/lightgallery/plugins/zoom/lg-zoom.min.js"></script>
    <script src="vendor/lightgallery/plugins/thumbnail/lg-thumbnail.min.js"></script>
    <script src="vendor/flatpickr/dist/flatpickr.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>