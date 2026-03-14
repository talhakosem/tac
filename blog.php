<?php
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
$ayarsor=$db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC); ?>
<!DOCTYPE html>
<html lang="tr">
  <head>
  <meta charset="utf-8">
    <title><?php echo $ayarcek['ayar_title']; ?></title>
    <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>" />
    <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>" />
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="mask-icon" color="#5bbad5" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body>
    <main class="page-wrapper">

      <!-- Navbar-->
  <?php include "menuler.php" ?>

      <!-- Page content-->
      <!-- Page container-->
      <div class="container mt-5 mb-md-4 py-5">
        <!-- Breadcrumb + page title-->
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">Blog</li>
          </ol>
        </nav>
        <h1 class="d-flex align-items-end justify-content-between mb-4">Esnek Bariyer Gelişmeleri</h1>
        <!-- Sponsored posts carousel-->
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;mode&quot;: &quot;gallery&quot;, &quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#sponsored-news-controls&quot;}">
            <!-- Item-->
              

                 <?php 
          $one = $db->query("SELECT * FROM yazi where yazi_onecikar ='1' ");
          while($cikar = $one->fetch(PDO::FETCH_ASSOC)) { ?>



            <div>
              <article class="row">
                <div class="col-md-7 col-lg-8 mb-lg-0 mb-3 mb-md-0"><a class="d-block position-relative" href="blog-<?=seo($cikar["yazi_seourl"])?>"><span class="badge bg-success position-absolute top-0 end-0 m-3 fs-sm"><?php echo $cikar['kategori_id'] ?></span><img class="rounded-3" src="<?php echo $cikar['blog_resimyol'] ?>" alt="Esnek Bariyer"></a></div>
                <div class="col-md-5 col-lg-4"><a class="fs-sm text-uppercase text-decoration-none" href="#">Esnek Bariyer</a>
                  <h2 class="h5 pt-1"><a class="nav-link" href="blog-<?=seo($cikar["yazi_seourl"])?>"><?php echo $cikar['yazi_ad'] ?></a></h2>
                  <p class="d-md-none d-xl-block mb-4"><?php echo $cikar['yazi_description'] ?></p><a class="d-flex align-items-center text-decoration-none" href="blog-<?=seo($cikar["yazi_seourl"])?>"><img class="rounded-circle" src="<?php echo $ayarcek['ayar_ikon'] ?>" width="48" alt="Tac Bariyer">
                    <div class="ps-2">
                      <h6 class="fs-base text-nav lh-base mb-1"><?php echo $ayarcek['ayar_title'] ?></h6>
                      <div class="d-flex text-body fs-sm"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-60 mt-n1 me-1"></i>
                  <?php
$zaman_dizisi = $cikar['yazi_zaman'];
$zaman = strtotime($zaman_dizisi);
$tarih = strftime("%b %d", $zaman);
echo $tarih;
?>
</span><span><i class="fi-chat-circle opacity-60 mt-n1 me-1"></i>No comments</span></div>
                    </div></a>
                </div>
              </article>
            </div>
            <!-- Item--><?php } ?>
       
          </div>
        </div>
        <!-- Carousel custom controls-->
        <div class="tns-carousel-controls pb-5 pt-2 mt-4 mb-lg-3" id="sponsored-news-controls">
          <button class="me-3" type="button"><i class="fi-chevron-left fs-xs"></i></button>
          <button type="button"><i class="fi-chevron-right fs-xs"></i></button>
        </div>
        <!-- Search bar + filters-->
        <!-- Articles grid-->
        <div class="row row-cols-md-2 row-cols-1 gy-md-5 gy-4 mb-lg-5 mb-4">
          <!-- Article-->

          <?php 
          $sorgu = $db->query("SELECT * FROM yazi");
          while($dondur = $sorgu->fetch(PDO::FETCH_ASSOC)) { ?>


          <article class="col pb-2 pb-md-1"><a class="d-block position-relative mb-3" href="blog-<?=seo($dondur["yazi_seourl"])?>"><span class="badge bg-info position-absolute top-0 end-0 m-3 fs-sm"><?php echo $dondur["kategori_id"] ?></span><img class="d-block rounded-3" src="<?php echo $dondur['blog_resimyol'] ?>" alt="<?php echo $dondur['yazi_ad'] ?>"></a><a class="fs-sm text-uppercase text-decoration-none" href="blog-<?=seo($dondur["yazi_seourl"])?>">Esnek Bariyer</a>
            <h3 class="h5 mb-2 pt-1"><a class="nav-link" href="blog-<?=seo($dondur["yazi_seourl"])?>"><?php echo $dondur['yazi_ad'] ?></a></h3>
            <p class="mb-3"><?php echo $dondur['yazi_description'] ?></p><a class="d-flex align-items-center text-decoration-none" href="blog-<?=seo($dondur["yazi_seourl"])?>"><img class="rounded-circle" src="<?php echo $ayarcek['ayar_ikon'] ?>" width="48" alt="Tac Bariyer">
              <div class="ps-2">
                <h6 class="fs-base text-nav lh-base mb-1">Tac Bariyer Esnek Bariyerleri</h6>
                <div class="d-flex text-body fs-sm"><span class="me-2 pe-1"><i class="fi-calendar-alt opacity-70 mt-n1 me-1 align-middle"></i>

                  <?php

// Örnek tarih dizisi
$zaman_dizisi = $dondur['yazi_zaman'];

// Tarih dizisini strtotime() fonksiyonu ile Unix zaman damgasına dönüştürme
$zaman = strtotime($zaman_dizisi);

// Unix zaman damgasını "Nis 16" formatına dönüştürme
$tarih = strftime("%b %d", $zaman);

// Dönüştürülmüş tarihi yazdırma
echo $tarih;
?>

</span><span><i class="fi-chat-circle opacity-70 mt-n1 me-1 align-middle"></i>0 comments</span></div>
              </div></a>
          </article>
        <?php } ?>


        </div>
        <!-- Pagination-->
      </div>
    </main>
<?php include "footer.php" ?>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>