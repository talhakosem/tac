<?php
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail']
));
$say=$kullanicisor->rowCount();
$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

$yazisor=$db->prepare("SELECT * FROM yazi where yazi_seourl=:yazi_seourl");
$yazisor->execute(array(
  'yazi_seourl' => $_GET['sef']
));
$yazicek=$yazisor->fetch(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $yazicek['yazi_ad']; ?> </title>
    <meta name="title" content="<?php echo $yazicek['yazi_ad']; ?>" />
    <meta name="description" content="<?php echo $yazicek['yazi_description']; ?>" />
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

    <!-- Page loading scripts-->

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body>

    <main class="page-wrapper">
      <!-- Sign In Modal-->
  <?php include "menuler.php" ?>
      <!-- Page content-->
      <!-- Page container-->
      <div class="container mt-5 mb-md-4 py-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="blog">Blog</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $yazicek['yazi_ad'] ?></li>
          </ol>
        </nav>
        <!-- Post title + meta--><a class="nav-link d-inline-block fw-normal text-uppercase px-0 mb-2" href="#"> 

          <?php 
          $kategori_id = $yazicek['kategori_id'];
          $katesor = $db->query("SELECT kategori_ad FROM kategori where kategori_id = '$kategori_id'");
          $katecek = $katesor->fetch(PDO::FETCH_ASSOC);
          echo $katecek['kategori_ad']; 
          ?>
          
          </a>
        <h1 class="h2 mb-4"><?php echo $yazicek['yazi_ad'] ?></h1>
        <div class="mb-4 pb-1">
          <ul class="list-unstyled d-flex flex-wrap mb-0 text-nowrap">
            <li class="me-3"><i class="fi-calendar-alt me-2 mt-n1 opacity-60"></i>  
              <?php
              $zaman_dizisi = $yazicek['yazi_zaman'];
              $zaman = strtotime($zaman_dizisi);
              $tarih = strftime("%b %d", $zaman);
              echo $tarih;
              ?>
            </li>
            <li class="me-3 border-end"></li>
            <li class="me-3"><i class="fi-clock me-2 mt-n1 opacity-60"></i>2 min okuma</li>
            <li class="me-3 border-end"></li>
          </ul>
        </div>
        <!-- Post content-->
        <div class="mb-4 pb-md-3"><img class="rounded-3" src="<?php echo $yazicek['blog_resimyol'] ?>" alt="Post image"></div>
        <div class="row">
          <div class="col-lg-2 col-md-1 mb-md-0 mb-4 mt-md-n5">
            <!-- Sharing-->
            <div class="sticky-top py-md-5 mt-md-5">
              <div class="d-flex flex-md-column align-items-center my-2 mt-md-4 pt-md-5">
                <div class="d-md-none fw-bold text-nowrap me-2 pe-1">Paylaş:</div><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle mb-md-2 me-md-0 me-2" href="#" data-bs-toggle="tooltip" title="Share with Facebook"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle mb-md-2 me-md-0 me-2" href="#" data-bs-toggle="tooltip" title="Share with Twitter"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle mb-md-2 me-md-0 me-2" href="#" data-bs-toggle="tooltip" title="Share with LinkedIn"><i class="fi-linkedin"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-8 col-md-10">
            <!-- Author-->
            <div class="mb-4 pb-md-3"><a class="d-flex align-items-center text-body text-decoration-none" href="#"><img class="rounded-circle" src="<?php echo $ayarcek['ayar_ikon'] ?>" width="80" alt="Kristin Watson">
                <div class="ps-3">
                  <h2 class="h6 mb-1">Tac Bariyer</h2><span class="fs-sm">Esnek Bariyer Geliştiricisi</span>
                </div></a></div>
            <!-- Post content-->
            <p><?php echo $yazicek['yazi_detay'] ?></p>
           
            <div class="d-flex align-items-center my-md-5 my-4 py-md-4 py-3 border-top">
              <div class="fw-bold text-nowrap mb-2 me-2 pe-1">Anahtar kelimeler:</div>
              <div class="d-flex flex-wrap">
                <?php
                // "yazi_keyword" içindeki verileri virgülden ayırma
                $keywords = explode(',', $yazicek['yazi_keyword']);
                foreach ($keywords as $keyword) {
                  echo '<a class="btn btn-xs btn-outline-secondary rounded-pill fs-sm fw-normal me-2 mb-2" href="#">' . trim($keyword) . '</a>';
                }
                ?>
              </div>
            </div>
            <!-- Comments-->
          </div>
        </div>
        <!-- Comment form-->
      </div>
    </main>
    <!-- Footer-->
<?php include "footer.php" ?>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
    <!-- Vendor scripts: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>
