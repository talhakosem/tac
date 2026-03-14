<?php
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
$ayarsor=$db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_seourl=:seourl");
$kategorisor->execute(array(
  'seourl' =>$_GET['sef']));

$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);
$kategori_id=$kategoricek['kategori_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $kategoricek['kategori_ad'] ?> - Tac Bariyer</title>
    <meta name="title" content="<?php echo $kategoricek['kategori_ad'] ?>" />
    <meta name="description" content="<?php echo $kategoricek['kategori_desc']; ?>" />
    <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>" />
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ayarcek['ayar_ikon'] ?>">
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">


    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/leaflet/dist/leaflet.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <link rel="stylesheet" media="screen" href="vendor/nouislider/dist/nouislider.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body class="fixed-bottom-btn">

    <main class="page-wrapper">
      <!-- Sign In Modal-->
<?php include "menuler.php" ?>
      <!-- Page content-->
      <!-- Page container-->
      <div class="container-fluid mt-5 pt-5 p-0">
        <div class="row g-0 mt-n3">
          <!-- Filters sidebar (Offcanvas on mobile)-->
       
          <!-- Page content-->
          <div class="col-lg-12 col-xl-12 position-relative overflow-hidden pb-5 pt-4 px-3 px-xl-4 px-xxl-5">
            <!-- Map popup-->
            <div class="map-popup invisible" id="map">
              <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-x fs-xs"></i></button>
              <div class="interactive-map" data-map-options-json="json/map-options-real-estate-rent.json"></div>
            </div>
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-2" aria-label="Breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo $kategoricek['kategori_ad'] ?></li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4">
              <h1 class="h2 mb-sm-0"><?php echo $kategoricek['kategori_ad'] ?></h1>
            </div>
            <!-- Sorting-->
          
            <!-- Catalog grid-->
            <div class="row g-4 py-4">
              <!-- Item-->


                 <?php 
            
            $benzersor = $db->query("SELECT * FROM urun where kategori_id = '$kategori_id'");
            while($benzercek = $benzersor->fetch(PDO::FETCH_ASSOC)) {    ?>

               <?php 

                $urun_id = $benzercek['urun_id'];
                $urunfotosor = $db->query("SELECT * FROM urunfoto where urun_id = '$urun_id'");
                $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
                 ?>


            <!-- Item-->
           <div class="col-lg-4">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover">
                 
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                  </div><a href="bariyer-<?=$benzercek["urun_seourl"].'-'.$benzercek["urun_id"]?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="Image"></a>
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">Esnek bariyer</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="bariyer-<?php echo $benzercek['urun_seourl']."-".$benzercek['urun_id'] ?>"><?php echo $benzercek['urun_ad'] ?></a></h3>
                  <p class="mb-2 fs-sm text-muted"><?php echo $benzercek['urun_madde1'] ?></p>
                </div>
              </div>
            </div>
            <!-- Item-->
          <?php } ?>
         
          </div>
        </div>
      </div>
    </main>
    <!-- Footer-->
<?php include "footer.php" ?>
    <!-- Filters sidebar toggle button (mobile)-->

    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/leaflet/dist/leaflet.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <script src="vendor/nouislider/dist/nouislider.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>