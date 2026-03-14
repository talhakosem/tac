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
  <link rel="stylesheet" media="screen" href="vendor/nouislider/dist/nouislider.min.css"/>
  <link rel="stylesheet" media="screen" href="vendor/tiny-slider/dist/tiny-slider.css"/>
  <!-- Main Theme Styles + Bootstrap-->
  <link rel="stylesheet" media="screen" href="css/theme.min.css">
</head>
<!-- Body-->
<body>

  <main class="page-wrapper">
    <!-- Sign In Modal-->
    <?php include "menuler.php" ?>
    <!-- Page content-->
    <!-- Hero-->
<section class="container pt-5 my-5 pb-lg-4">
  <div class="row pt-0 pt-md-2 pt-lg-0">
    <div class="col-xl-5 col-lg-6 col-md-7 order-md-1 pe-lg-0 mb-3 text-md-start text-center">
      <h2 class="display-4 mt-lg-5 mb-md-4 mb-3 pt-md-4 pb-lg-2">Esnek bariyer <br> Re~Flexible</h2>
      <p class="position-relative lead me-lg-n5">Esnek bariyerlerimiz, geleneksel demir bariyerlerin aksine, sürekli onarım maliyetini ortadan kaldırır. Daha sürdürülebilir ve dayanıklı olan bu bariyerler, uzun ömürlü kullanım sağlar. 
        <strong>Esnek bariyerlerimizi keşfedin ve maliyetlerinizi düşürün!</strong>
      </p>
    </div>

    <!-- Search property form group-->
    <div class="col-xl-3 col-lg-5 col-md-5 order-md-2 mb-4 video-container">
      <video width="400" height="420" controls="controls" autoplay muted loop>
        <source src="goz/esnek-bariyer.mov" type="video/mp4" />
        Tarayıcınız video etiketini desteklemiyor.
      </video>
    </div>
  </div>
</section>

<style>
  @media (min-width: 1200px) {
    .video-container {
      margin-left: 250px;
    }
  }
</style>


    <!-- Services-->
    <section class="container mb-5 mt-n3 mt-lg-0">
      <div class="col-12">
        <div class="row">
          <?php 
          $say=0;
          $katesor = $db->query("SELECT * FROM kategori where kategori_ust != '0' limit 7");
          while($katecek = $katesor->fetch(PDO::FETCH_ASSOC)) { $say++; ?>

            <div class="<?php if ($say < '4') { echo "col-lg-4 col-md-6"; }else{ echo "col-md-6 col-lg-3"; } ?> mt-2">
              <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="<?php echo $katecek['kate_resimyol'] ?>" width="256" alt="esnek bariyer">
                <div class="card-body">
                  <h2 class="h4 card-title"><?php echo $katecek['kategori_ad'] ?></h2>
                  <p class="card-text fs-sm"><?php echo $katecek['kategori_desc'] ?></p>
                </div>
                <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="category-<?php echo $katecek['kategori_seourl'] ?>">İncele</a></div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
    <hr class="mt-n1 mb-5 d-md-none">
    <!-- Top offers (carousel)-->
    <section class="container mb-5 pb-md-4">
      <div class="d-flex align-items-center justify-content-between mb-3">
        <h2 class="h3 mb-0">En Çok Tercih Edilen Ürünler</h2><a class="btn btn-link fw-normal p-0" href="esnek-bariyerler">Tüm Ürünler<i class="fi-arrow-long-right ms-2"></i></a>
      </div>
      <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
        <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">
          <!-- Item-->


          <?php 
          $onesor = $db->query("SELECT * FROM urun where urun_onecikar='1'");
          while ($onecek = $onesor->fetch(PDO::FETCH_ASSOC)) { ?>

            <?php 
            $urun_id = $onecek['urun_id'];
            $urunfotosor = $db->query("SELECT * FROM urunfoto where urun_id = '$urun_id'");
            $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
            ?>
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">
                <div class="card-img-top card-img-hover">
              
                  <div class="content-overlay end-0 top-0 pt-3 pe-3">
                    
                  </div><a href="bariyer-<?=$onecek["urun_seourl"].'-'.$onecek["urun_id"]?>"><img src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt="Image"></a>
                </div>
                <div class="card-body position-relative pb-3">
                  <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">Esnek bariyer</h4>
                  <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="bariyer-<?=$onecek["urun_seourl"].'-'.$onecek["urun_id"]?>"><?php echo $onecek['urun_ad'] ?></a></h3>
                  <p class="mb-2 fs-sm text-muted"><?php echo $onecek['urun_madde1'] ?></p>
                </div>
              </div>
            </div>
            <!-- Item-->
          <?php } ?>

        </div>
      </div>
    </section>
    <!-- Recently added-->
    <section class="container pb-4 pt-1 mb-5">
      <div class="d-flex align-items-end align-items-lg-center justify-content-between mb-4 pb-md-2">
        <div class="d-flex w-100 align-items-center justify-content-between justify-content-lg-start">
          <h2 class="h3 mb-0 me-md-4">Blog</h2>


          <ul class="nav nav-tabs d-none d-md-flex ps-lg-2 mb-0">
           <?php  
           $kategorisor=$db->prepare("SELECT * FROM kategori WHERE kategori_durum=:durum AND kategori_ust='47' AND kategori_id NOT IN (54, 55) ORDER BY kategori_sira");
           $kategorisor->execute(array(
             'durum' => 1
           ));

           while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {
             $kategori_id=$kategoricek['kategori_id'];  
             ?>
             <li class="nav-item"><a class="nav-link fs-sm mb-2 mb-md-0" href="blog?kategori=<?php echo $kategoricek['kategori_seourl'] ?>"><?php echo $kategoricek['kategori_ad'] ?></a></li>
           <?php } ?>
         </ul>

       </div><a class="btn btn-link fw-normal d-none d-lg-block p-0" href="blog">Hepsini gör<i class="fi-arrow-long-right ms-2"></i></a>
     </div>
     <div class="row g-4">

      <?php 
      $blogsor = $db->prepare("SELECT * FROM yazi WHERE yazi_onecikar = :yazi_onecikar ORDER BY yazi_id DESC LIMIT 1");
      $blogsor->execute(['yazi_onecikar' => 1]);
      while ($blogcek = $blogsor->fetch(PDO::FETCH_ASSOC)) { 
        ?>
        <div class="col-md-6">
          <div class="card bg-size-cover bg-position-center border-0 overflow-hidden h-100" style="background-image: url(<?php echo htmlspecialchars($blogcek['blog_resimyol']); ?>);">
            <span class="img-gradient-overlay"></span>
            <div class="card-body content-overlay pb-0">
              <div class="d-flex">
                <span class="badge bg-info fs-sm">
                  <?php 
                  echo ($blogcek['kategori_id']);
                  ?>
                </span>
              </div>
            </div>
            <div class="card-footer content-overlay border-0 pt-0 pb-4">
              <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5">
                <a class="text-decoration-none text-light pe-2" href="blog-<?php echo $blogcek['yazi_seourl'] ?>">
                  <h3 class="h5 text-light mb-1"><?php echo $blogcek['yazi_ad']; ?></h3>
                  <div class="fs-sm opacity-70"><i class="fi-map-pin me-1"></i><?php echo htmlspecialchars($blogcek['yazi_description']); ?></div>
                </a>
                <div class="btn-group ms-n2 ms-sm-0 mt-3">
                  <a class="btn btn-primary px-3" href="blog-<?php echo $blogcek['yazi_seourl'] ?>" style="height: 2.75rem;">Blog Oku</a>
                  <button class="btn btn-primary btn-icon border-end-0 border-top-0 border-bottom-0 border-light fs-sm" type="button"><i class="fi-heart"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php  }  ?>

      <div class="col-md-6">

        <?php 
    // SQL sorgusu ve PDO kullanımı
        $blog2sor = $db->prepare("SELECT * FROM yazi WHERE yazi_onecikar = :yazi_onecikar ORDER BY yazi_id DESC LIMIT 2 OFFSET 1");
        $blog2sor->execute(['yazi_onecikar' => 1]);
        while ($blog2cek = $blog2sor->fetch(PDO::FETCH_ASSOC)) { 
          ?>
          <div class="card bg-size-cover bg-position-center border-0 overflow-hidden mb-4" style="background-image: url(<?php echo htmlspecialchars($blog2cek['blog_resimyol']); ?>);"><span class="img-gradient-overlay"></span>
            <div class="card-body content-overlay pb-0"><span class="badge bg-info fs-sm">
              <?php 
              echo ($blog2cek['kategori_id']);
              ?>

            </span></div>
            <div class="card-footer content-overlay border-0 pt-0 pb-4">
              <div class="d-sm-flex justify-content-between align-items-end pt-5 mt-2 mt-sm-5"><a class="text-decoration-none text-light pe-2" href="blog-<?php echo $blog2cek['yazi_seourl'] ?>">
                <h3 class="h5 text-light mb-1"><?php echo $blog2cek['yazi_ad'] ?></h3>
                <div class="fs-sm opacity-70"><i class="fi-map-pin me-1"></i><?php echo $blog2cek['yazi_description']; ?></div></a>
                <div class="btn-group ms-n2 ms-sm-0 mt-3"><a class="btn btn-primary px-3" href="blog-<?php echo $blog2cek['yazi_seourl'] ?>" style="height: 2.75rem;">Blok Oku</a>
                  <button class="btn btn-primary btn-icon border-end-0 border-top-0 border-bottom-0 border-light fs-sm" type="button"><i class="fi-heart"></i></button>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

      </div>


    </div>
  </section>
  <!-- Property cost calculator-->
  <section class="container mb-5 pb-2 pb-lg-4">
    <div class="row align-items-center">
      <div class="col-md-5"><img class="d-block mx-md-0 mx-auto mb-md-0 mb-4 rounded-sm" src="goz/re-flexible-kesif.jpeg" width="416" alt="Illustration"></div>
      <div class="col-xxl-6 col-md-7 text-md-start text-center">
        <h2>Keşif Talebinde Bulunun</h2>
        <p class="pb-3 fs-lg">Fabrikanız için keşif talebinde bulunmak istiyorsanız, aşağıdaki formu doldurabilirsiniz. Yeni Keşif Talep Hizmetimiz ile fabrikanızda ihtiyacınızı belirlemek için uzman ekibimizle yanınızdayız.</p><a class="btn btn-lg btn-primary" href="#kesif-talebi" data-bs-toggle="modal"><i class="fi-send me-2"></i>Keşif Talebi</a>
      </div>
    </div>
  </section>


  <!-- Cities (carousel)-->

  <!-- CTA carousel-->
  <section class="container pt-4 pb-5 py-sm-5">


    <!-- Slide 1-->
    <div>

      <div class="card card-body p-sm-5 h-100">
        <div class="row align-items-center py-3 py-sm-0">
          <div class="col-md-4 col-xl-3 mb-4 pb-3 mb-md-0 pb-md-0 text-center text-md-start">
            <h2>Ek Ürün</h2>
            <p class="fs-lg  opacity-70 pb-md-4">Sadece ihtiyacınız olanı alın!</p><a class="btn btn-primary" href="category-ek-urun">Hepsini Gör<i class="fi-chevron-right fs-sm ms-2"></i></a>
          </div>
          <div class="col-md-8 col-xl-9">
            <div class="row row-cols-2 row-cols-lg-4 gy-4 gx-3 gx-sm-4">




              <?php 
              $yedeksor = $db->query("SELECT * FROM urun where kategori_id='56' limit 4");
              while($yedekcek = $yedeksor->fetch(PDO::FETCH_ASSOC)) {  ?>


                <?php 
                $urun_id = $yedekcek['urun_id'];
                $urunfotosor = $db->query("SELECT * FROM urunfoto where urun_id = '$urun_id'");
                $urunfotocek = $urunfotosor->fetch(PDO::FETCH_ASSOC);
                ?>


                <a class="col text-decoration-none" href="bariyer-<?php echo $yedekcek['urun_seourl']."-".$yedekcek['urun_id'] ?>"><img class="d-block mb-2 mx-auto" src="<?php echo $urunfotocek['urunfoto_resimyol'] ?>" width="168" alt="<?php echo $yedekcek['urun_ad'] ?>">


                  <div class="fw-bold text-center pt-1"><?php echo $yedekcek['urun_ad'] ?></div></a>

                <?php } ?>


              </div>
            </div>
          </div>
        </div>


      </section>
      <!-- Mobile app CTA-->

      <!-- Partners (carousel)
      <section class="container mb-5 pb-2 pb-lg-4">
        <h2 class="h3 mb-4 text-center text-md-start">Our partners</h2>
        <div class="tns-carousel-wrapper tns-nav-outside tns-nav-outside-flush">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 6, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:2}, &quot;500&quot;:{&quot;items&quot;:4}, &quot;992&quot;:{&quot;items&quot;:5, &quot;gutter&quot;: 16}, &quot;1200&quot;:{&quot;items&quot;:6, &quot;gutter&quot;: 24}}}">
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/01_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/01_gray.svg" alt="Logo" width="196"></a></div>
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/02_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/02_gray.svg" alt="Logo" width="196"></a></div>
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/03_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/03_gray.svg" alt="Logo" width="196"></a></div>
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/04_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/04_gray.svg" alt="Logo" width="196"></a></div>
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/05_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/05_gray.svg" alt="Logo" width="196"></a></div>
            <div><a class="swap-image" href="#"><img class="swap-to" src="img/real-estate/brands/06_color.svg" alt="Logo" width="196"><img class="swap-from" src="img/real-estate/brands/06_gray.svg" alt="Logo" width="196"></a></div>
          </div>
        </div>
      </section>
      <section class="container mb-5 pb-2 pb-lg-4">
        <h2 class="h3 mb-4 pb-3 text-center text-md-start">Top real estate agents</h2>
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;mode&quot;: &quot;gallery&quot;, &quot;controlsContainer&quot;: &quot;#agents-carousel-controls&quot;, &quot;nav&quot;: false}">
            <div>
              <div class="row align-items-center">
                <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/01.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/02.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                  <div class="card border-0 shadow-sm ms-sm-n5">
                    <blockquote class="blockquote card-body">
                      <h4 style="max-width: 22rem;">&quot;I will select the best accommodation for you&quot;</h4>
                      <p class="d-sm-none d-lg-block">Amet libero morbi venenatis ut est. Iaculis leo ultricies nunc id ante adipiscing. Vel metus odio at faucibus ac. Neque id placerat et id ut. Scelerisque eu mi ullamcorper sit urna. Est volutpat dignissim nec.</p>
                      <footer class="d-flex justify-content-between">
                        <div class="pe-3"><a class="text-decoration-none" href="real-estate-vendor-properties.html">
                            <h6 class="mb-0">Floyd Miles</h6>
                            <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                        <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                          <div class="text-muted fs-sm mt-1">45 reviews</div>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="row align-items-center">
                <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/02.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/03.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                  <div class="card border-0 shadow-sm ms-sm-n5">
                    <blockquote class="blockquote card-body">
                      <h4 style="max-width: 22rem;">&quot;I don't say no, I just figure out a way to make it work&quot;</h4>
                      <p class="d-sm-none d-lg-block">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
                      <footer class="d-flex justify-content-between">
                        <div class="pe-3"><a class="text-decoration-none" href="real-estate-vendor-properties.html">
                            <h6 class="mb-0">Guy Hawkins</h6>
                            <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                        <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                          <div class="text-muted fs-sm mt-1">16 reviews</div>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div class="row align-items-center">
                <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/03.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/01.jpg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                  <div class="card border-0 shadow-sm ms-sm-n5">
                    <blockquote class="blockquote card-body">
                      <h4 style="max-width: 22rem;">&quot;Over 10 years of experience as a real estate agent&quot;</h4>
                      <p class="d-sm-none d-lg-block">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae.</p>
                      <footer class="d-flex justify-content-between">
                        <div class="pe-3"><a class="text-decoration-none" href="real-estate-vendor-properties.html">
                            <h6 class="mb-0">Kristin Watson</h6>
                            <div class="text-muted fw-normal fs-sm mb-3">Imperial Property Group Agent</div></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-facebook"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-twitter"></i></a><a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="#"><i class="fi-linkedin"></i></a></div>
                        <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                          <div class="text-muted fs-sm mt-1">24 reviews</div>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tns-carousel-controls justify-content-center justify-content-md-start my-2 mt-md-4" id="agents-carousel-controls">
          <button class="mx-2" type="button"><i class="fi-chevron-left"></i></button>
          <button class="mx-2" type="button"><i class="fi-chevron-right"></i></button>
        </div>
      </section> -->
    </main>
    <!-- Footer-->


    <?php include "footer.php" ?>
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/nouislider/dist/nouislider.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
  </body>
  </html>