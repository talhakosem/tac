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
    <meta name="msapplication-TileColor" content="#766df4">
    <meta name="theme-color" content="#ffffff">
    <!-- Vendor Styles-->
    <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <body>
    <main class="page-wrapper">

      <!-- Navbar-->
<?php include "menuler.php" ?>
      <!-- Page content-->
      <!-- Breadcrumb-->
      <div class="container mt-5 mb-md-4 pt-5">
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
            <li class="breadcrumb-item active" aria-current="page">İletişim</li>
          </ol>
        </nav>
      </div>
      <!-- Hero-->
      <section class="container mb-5 pb-2 pb-md-4 pb-lg-5">
        <div class="row align-items-md-start align-items-center gy-4">
          <div class="col-lg-5 col-md-6">
            <div class="mx-md-0 mx-auto mb-md-5 mb-4 pb-md-4 text-md-start text-center" style="max-width: 416px;">
              <h1 class="mb-4">İletişime Geçelim!</h1>
              <p class="mb-0 fs-lg text-muted">Daha ayrıntılı bilgi ve tüm detaylar için online bir toplantı düzenleyebiliriz. </p>
            </div><img class="d-block mx-auto" src="img/real-estate/illustrations/contact.svg" alt="Illustration">
          </div>
          <div class="col-md-6 offset-lg-1">
            <div class="card border-0 bg-secondary p-sm-3 p-2">
              <div class="card-body m-1">
                <form class="needs-validation" novalidate>
                  <div class="mb-4">
                    <label class="form-label" for="c-name">Tam İsim</label>
                    <input class="form-control form-control-lg" id="c-name" type="text" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="c-email">Şirket İsmi</label>
                    <input class="form-control form-control-lg" id="c-email" type="text" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="c-email">Email</label>
                    <input class="form-control form-control-lg" id="c-email" type="email" required>
                  </div>
                  <div class="mb-4">
                    <label class="form-label" for="c-message">Mesajınız</label>
                    <textarea class="form-control form-control-lg" id="c-message" rows="4" placeholder="Leave your message" required></textarea>
                  </div>
                  <div class="pt-sm-2 pt-1">
                    <button class="btn btn-lg btn-primary w-sm-auto w-100" type="submit">Formu Gönder</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Contact cards-->
      <section class="container mb-5 pb-2 pb-md-4 pb-lg-5">
        <div class="row g-4">
          <!-- Item-->
          <div class="col-md-4"><a class="icon-box card card-hover h-100" href="mailto:example@email.com">
              <div class="card-body">
                <div class="icon-box-media text-primary rounded-circle shadow-sm mb-3"><i class="fi-mail"></i></div><span class="d-block mb-1 text-body">Mail</span>
                <h3 class="h4 icon-box-title mb-0 opacity-90"><?php echo $ayarcek['ayar_mail'] ?></h3>
              </div></a></div>
          <!-- Item-->
          <div class="col-md-4"><a class="icon-box card card-hover h-100" href="tel:<?php echo $ayarcek['ayar_tel'] ?>">
              <div class="card-body">
                <div class="icon-box-media text-primary rounded-circle shadow-sm mb-3"><i class="fi-device-mobile"></i></div><span class="d-block mb-1 text-body">Telefon</span>
                <h3 class="h4 icon-box-title mb-0 opacity-90"><?php echo $ayarcek['ayar_tel'] ?></h3>
              </div></a></div>
          <!-- Item-->
          <div class="col-md-4"><a class="icon-box card card-hover h-100" href="#">
              <div class="card-body">
                <div class="icon-box-media text-primary rounded-circle shadow-sm mb-3"><i class="fi-linkedin"></i></div><span class="d-block mb-1 text-body">Takip </span>
                <h3 class="h4 icon-box-title mb-0 opacity-90">@re-flexible</h3>
              </div></a></div>
        </div>
      </section>
    </main>
    <!-- Footer-->
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