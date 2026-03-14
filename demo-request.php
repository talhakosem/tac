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
    <title>Esnek Bariyer Demo Talebi</title>
    <!-- SEO Meta Tags-->
    <meta name="description" content="Re-Flexible Esnek bariyer sistemleri olarak ücretsiz demo hizmeti sunmaktayız. Bu sayede satın almadan önce ürünleri deneme fırsatı sunmaktayız.">
    <meta name="author" content="Esnek Bariyer Sistemleri">
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
    <link rel="stylesheet" media="screen" href="vendor/leaflet/dist/leaflet.css"/>
    <link rel="stylesheet" media="screen" href="vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css"/>
    <link rel="stylesheet" media="screen" href="vendor/filepond/dist/filepond.min.css"/>
    <!-- Main Theme Styles + Bootstrap-->
    <link rel="stylesheet" media="screen" href="css/theme.min.css">
  </head>
  <!-- Body-->
  <body>
    <!-- Page loading spinner-->

    <main class="page-wrapper">
      <!-- Navbar-->
 
   <?php include "menuler.php" ?>
      <!-- Page container-->
      <div class="container mt-5 mb-md-4 py-5">
        <div class="row">
          <!-- Page content-->
          <div class="col-lg-12">
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-2 pt-lg-3" aria-label="Breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Anasayfa</a></li>
                <li class="breadcrumb-item active" aria-current="page">Demo Talebi</li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="mb-4">
              <h1 class="h2 mb-0">Demo Talebi</h1>
              <div class="progress d-lg-none mb-4" style="height: .25rem;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 33%" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
   
            <!-- Location-->
       <form action="ileti-gonder.php" method="POST" enctype="multipart/form-data">
            <!-- Contacts-->
            <section class="card card-body border-0 shadow-sm p-4 mb-4" id="contacts">
              <h2 class="h4 mb-4"><i class="fi-phone text-primary fs-5 mt-n1 me-2"></i>İletişim</h2>
              <div class="row">
                 <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-phone">İsim Soyisim <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  required>
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-email">Email <span class="text-danger">*</span></label>
                  <input class="form-control" type="email" name="email" required>
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-phone">Telefon <span class="text-danger">*</span></label>
                  <input class="form-control" type="number" name="phone" required>
                </div>
                <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-phone">Şirket İsmi <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" name="company" required>
                </div>
                <div class="col-6 mb-3 pb-3">
                  <label class="form-label" for="ab-site">Website</label>
                  <input class="form-control" type="text" name="website" >
                </div>
                <div class="col-6 mb-3 pb-3">
                  <label class="form-label" for="ab-site">Sektör</label>
                  <input class="form-control" type="text" name="sektor" >
                </div>
               
              </div>
            </section>

                 <section class="card card-body border-0 shadow-sm p-4 mb-4" id="location">
              <h2 class="h4 mb-4"><i class="fi-map-pin text-primary fs-5 mt-n1 me-2"></i>Lokasyon</h2>
              <div class="row">
                <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-city">Şehir <span class="text-danger">*</span></label>
                  <select class="form-select" id="ab-city" required name="city">
                    <option value="" disabled>Choose city</option>
                    <option value="Berlin" selected>Berlin</option>
                    <option value="Hamburg">Hamburg</option>
                    <option value="Munich">Munich</option>
                    <option value="Frankfurt am Main">Frankfurt am Main</option>
                    <option value="Stuttgart">Stuttgart</option>
                    <option value="Cologne">Cologne</option>
                  </select>
                </div>
                 <div class="col-sm-6 mb-3">
                  <label class="form-label" for="ab-zip">İlçe <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" required name="ilce">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4 mb-3">
                  <label class="form-label">Mahalle<span class="text-danger">*</span></label>
                  <input class="form-control" type="text" required name="mahalle">
                </div>
               
                <div class="col-sm-4 mb-3">
                  <label class="form-label">Sokak <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" required name="sokak">
                </div>
                 <div class="col-sm-4 mb-3">
                  <label class="form-label">No <span class="text-danger">*</span></label>
                  <input class="form-control" type="text" required name="no">
                </div>
              </div>
            </section>


            <!-- Description-->
            <section class="card card-body border-0 shadow-sm p-4 mb-4" id="description">
              <h2 class="h4 mb-4"><i class="fi-edit text-primary fs-5 mt-n1 me-2"></i>Açıklama</h2>
              <label class="form-label" >Açıklama <span class="text-danger">*</span></label>
             
              <div class="row mb-4">
                <div class="col-md-12 mb-md-0 mb-3">
                  <textarea class="form-control" rows="6" placeholder="Lütfen esnek bariyeri denemek istediğiniz alan ile ilgili bize bilgi verin." name="message"></textarea>
                </div>
           <!--  <div class="col-md-3">
                  <input class="file-uploader bg-secondary" type="file" name="resim_yolu" accept="image/png, image/jpeg" data-label-idle="&lt;i class=&quot;d-inline-block fi-cloud-upload fs-2 text-muted mb-2&quot;&gt;&lt;/i&gt;&lt;br&gt;&lt;span&gt;Alan resmi&lt;/span&gt;" data-style-panel-layout="compact" data-image-preview-height="160" data-image-crop-aspect-ratio="1:1" data-image-resize-target-width="200" data-image-resize-target-height="200">
                </div> -->
              </div>

<div class="mb-4">
    <label class="form-label d-block fw-bold mb-2 pb-1">Toplam yaptırmak istediğiniz ölçü</label>
    <div class="btn-group btn-group-sm" role="group" aria-label="Choose number of rooms">
        <input class="btn-check" type="radio" id="rooms-5" name="olcum" value="50m+">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="rooms-5">50m+</label>
        <input class="btn-check" type="radio" id="rooms-10" name="olcum" value="100m+">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="rooms-10">100m+</label>
        <input class="btn-check" type="radio" id="rooms-20" name="olcum" value="200m+">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="rooms-20">200m+</label>
        <input class="btn-check" type="radio" id="rooms-50" name="olcum" value="500m+">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="rooms-50">500m+</label>
        <input class="btn-check" type="radio" id="rooms-100" name="olcum" value="1km+">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="rooms-100">1km+</label>
    </div>
</div>

<div class="mb-4">
    <label class="form-label d-block fw-bold mb-2 pb-1">Kullanılan Forklift Tonajları</label>
    <div class="btn-group btn-group-sm" role="group" aria-label="Choose forklift tonnage">
        <input class="btn-check" type="radio" id="ton-1-2" name="forklift_tonaji" value="1-2">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="ton-1-2">1-2 Ton</label>
        <input class="btn-check" type="radio" id="ton-2-5-3" name="forklift_tonaji" value="2-3">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="ton-2-5-3">2.5-3 Ton</label>
        <input class="btn-check" type="radio" id="ton-4-5" name="forklift_tonaji" value="4-5">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="ton-4-5">4-5 Ton</label>
        <input class="btn-check" type="radio" id="ton-7-10" name="forklift_tonaji" value="7-10">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="ton-7-10">7-10 Ton</label>
        <input class="btn-check" type="radio" id="ton-15-25" name="forklift_tonaji" value="15-25">
        <label class="btn btn-outline-secondary px-sm-3 px-2 fw-normal" for="ton-15-25">15-25 Ton</label>
    </div>
</div>

       
           
              
            </section>           

        <input type="hidden" name="link" value="/">
        <input type="hidden" name="geldigiyer" value="demo">
            <!-- Action buttons -->
            <section class="d-sm-flex justify-content-between pt-2">

                              <button class="btn btn-lg btn-primary d-block w-100" type="submit" name="iletial">Talep Gönder</button>
</section>

 </form>
          </div>
          <!-- Progress of completion-->
   
        </div>
      </div>
    </main>
    <!-- Footer-->
<?php include  "footer.php" ?>
    <!-- Back to top button--><a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/leaflet/dist/leaflet.js"></script>
    <script src="vendor/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
    <script src="vendor/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>
    <script src="vendor/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.js"></script>
    <script src="vendor/filepond-plugin-image-crop/dist/filepond-plugin-image-crop.min.js"></script>
    <script src="vendor/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.min.js"></script>
    <script src="vendor/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.min.js"></script>
    <script src="vendor/filepond/dist/filepond.min.js"></script>
    <script src="vendor/cleave.js/dist/cleave.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
</html>