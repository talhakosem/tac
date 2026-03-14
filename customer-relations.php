<?php
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';
$ayarsor=$db->prepare("SELECT * FROM ayar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Müşteri İlişkileri / Tac Bariyer</title>
  <!-- SEO Meta Tags-->
  <meta name="description" content="Tac Bariyer, müşteri memnuniyetini ön planda tutarak, her adımda esnek çözümler sunar. Güvenilir ve etkili iletişimle müşteri ilişkilerini güçlendirir, beklentileri aşar.">
  <meta name="author" content="Esnek Bariyer Sistemleri Tac Bariyer">
  <!-- Viewport-->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon and Touch Icons-->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $ayarcek['ayar_ikon'] ?>">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $ayarcek['ayar_ikon'] ?>">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $ayarcek['ayar_ikon'] ?>">
  <meta name="msapplication-TileColor" content="#766df4">
  <meta name="theme-color" content="#ffffff">
  <!-- Page loading styles-->
  <style>
    .page-loading {
      position: fixed;
      top: 0;
      right: 0;
      bottom: 0;
      left: 0;
      width: 100%;
      height: 100%;
      -webkit-transition: all .4s .2s ease-in-out;
      transition: all .4s .2s ease-in-out;
      background-color: #fff;
      opacity: 0;
      visibility: hidden;
      z-index: 9999;
    }
    .page-loading.active {
      opacity: 1;
      visibility: visible;
    }
    .page-loading-inner {
      position: absolute;
      top: 50%;
      left: 0;
      width: 100%;
      text-align: center;
      -webkit-transform: translateY(-50%);
      transform: translateY(-50%);
      -webkit-transition: opacity .2s ease-in-out;
      transition: opacity .2s ease-in-out;
      opacity: 0;
    }
    .page-loading.active > .page-loading-inner {
      opacity: 1;
    }
    .page-loading-inner > span {
      display: block;
      font-size: 1rem;
      font-weight: normal;
      color: #666276;;
    }
    .page-spinner {
      display: inline-block;
      width: 2.75rem;
      height: 2.75rem;
      margin-bottom: .75rem;
      vertical-align: text-bottom;
      border: .15em solid #bbb7c5;
      border-right-color: transparent;
      border-radius: 50%;
      -webkit-animation: spinner .75s linear infinite;
      animation: spinner .75s linear infinite;
    }
    @-webkit-keyframes spinner {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }
    @keyframes spinner {
      100% {
        -webkit-transform: rotate(360deg);
        transform: rotate(360deg);
      }
    }

  </style>
  <!-- Page loading scripts-->
  <script>
    (function () {
      window.onload = function () {
        var preloader = document.querySelector('.page-loading');
        preloader.classList.remove('active');
        setTimeout(function () {
          preloader.remove();
        }, 2000);
      };
    })();

  </script>
  <!-- Vendor Styles-->
  <link rel="stylesheet" media="screen" href="vendor/simplebar/dist/simplebar.min.css"/>
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
</head>
<!-- Body-->
<body class="fixed-bottom-btn">


  <main class="page-wrapper">

    <?php include "menuler.php" ?>
    <!-- Page header--> 
    <section class="container mt-4 pb-lg-5">
      <h1 class="mx-auto mb-4 pb-2 text-center" style="margin-top:150px" >Müşteri İlişkileri</h1>
      <!-- Search form-->


    </section>
    <!-- Page content-->
    <section class="container mb-md-5 mb-4 pb-lg-5">
      <div class="row">
        <!-- Sidebar offcanvas-->
  
        <!-- Content-->
       <div class="col-lg-12">

    <div class="pb-md-2">
        <p>Tac Bariyer olarak, müşteri memnuniyetini ve güvenliğini en ön planda tutuyoruz. Ürettiğimiz esnek bariyerlerle, sadece güvenlik sağlamakla kalmıyor, aynı zamanda uzun ömürlü ve tekrar kullanılabilir çözümler sunuyoruz. Müşterilerimizle kurduğumuz ilişkilerde, karşılıklı güven ve şeffaf iletişime büyük önem veriyoruz.</p>

        <p>Her bir müşterimizin ihtiyaçlarını dikkatle dinliyor ve onlara en uygun çözümleri sunmak için esnek yaklaşımlar geliştiriyoruz. Ürünlerimiz hakkında sorularınızı yanıtlamak, önerilerinizi dinlemek ve her adımda size destek olmak için buradayız. İşbirliğimiz süresince, kaliteli hizmet anlayışımızla yanınızda olmaktan gurur duyuyoruz.</p>

        <p>Müşteri ilişkilerimizde, hızlı geri dönüşler ve proaktif çözümler sunarak, memnuniyetinizi en üst düzeyde tutmayı amaçlıyoruz. Tac Bariyer, yalnızca ürün satışı yapan bir firma değil; aynı zamanda iş ortaklarının başarısını ve güvenliğini önceliklendiren bir iş ortağıdır.</p>

        <p>Siz de bizimle çalışarak, esnek bariyer çözümlerimizden en yüksek verimi alabilir ve iş güvenliğinizi bir üst seviyeye taşıyabilirsiniz. Sizinle uzun vadeli ve sağlıklı bir iş ilişkisi kurmayı dört gözle bekliyoruz.</p>
    </div>
</div>

      </div>
    </section>
    <!-- Contact us-->
    <section class="container mb-5 pb-lg-5">
      <div class="row align-items-sm-center">
        <div class="col-sm-5"><img src="img/real-estate/illustrations/support.svg" alt="Illustration"></div>
        <div class="col-md-6 offset-md-1 col-sm-7 text-sm-start text-center">
          <h2 class="mb-4 pb-md-3">Tüm sorularınız için</h2><a class="btn btn-lg btn-primary" href="contact">İletişim</a>
        </div>
      </div>
    </section>
  </main>
  <!-- Footer-->
  <?php include "footer.php" ?>
  <!-- Filters sidebar toggle button (mobile)-->
  <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#help-sidebar"><i class="fi-sidebar-right me-2"></i>FAQ Links</button>
  <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
  <!-- Vendor scrits: js libraries and plugins-->
  <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/simplebar/dist/simplebar.min.js"></script>
  <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
  <!-- Main theme script-->
  <script src="js/theme.min.js"></script>
</body>
</html>