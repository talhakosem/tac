<?php
ob_start();
session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
//Belirli veriyi seçme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC); ?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- SEO Meta Tags-->
 <title><?php echo $ayarcek['ayar_title']; ?></title>
  <meta name="description" content="<?php echo $ayarcek['ayar_description']; ?>" />
  <meta name="keywords" content="<?php echo $ayarcek['ayar_keywords']; ?>" />

  <meta name="author" content="<?php echo $ayarcek['ayar_author']; ?>" />
    <!-- Viewport-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon and Touch Icons-->
<link rel="shortcut icon" href="<?php echo $ayarcek['ayar_ikon'] ?>" />

    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Page loading styles-->

    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body class="bg-secondary">

    <main class="page-wrapper">
      <!-- Page content-->
      <div class="container-fluid d-flex h-100 align-items-center justify-content-center py-4 py-sm-5">
        <div class="card card-body" style="max-width: 940px"><a class="position-absolute top-0 end-0 nav-link fs-sm py-1 px-2 mt-3 me-3" href="/"><i class="fi-arrow-long-left fs-base me-2"></i>Anasayfa</a>
          <div class="row mx-0 align-items-center">
            <div class="col-md-6 border-end-md p-2 p-sm-5">
              <h2 class="h3 mb-4 mb-sm-5">Hey there!<br>Welcome back.</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
            </div>
            <div class="col-md-6 px-2 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                <form action="nedmin/netting/islem.php" method="POST">
                 <div class="mb-4">
                  <label class="form-label mb-2" for="signin-email">Email address</label>
                  <input class="form-control"  name="kullanici_mail" type="text" id="signin-email" placeholder="Enter your email" required>
                </div>
                <div class="mb-4">
                  <div class="password-toggle">
                    <input class="form-control" name="kullanici_password" type="password" id="signin-password" placeholder="Enter password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                      <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                  </div>
                </div>
                <button class="btn btn-primary btn-lg w-100" name="admingiris" type="submit">Sign in</button>
                   <?php 

             if ($_GET['durum']=="no") {
             
             echo "Kullanıcı Bulunamadı...";

             } elseif ($_GET['durum']=="exit") {
             
             echo "Başarıyla Çıkış Yaptınız.";

             }

             ?>

              </form>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>