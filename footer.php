    <footer class="footer bg-secondary pt-5">
      <div class="container pt-lg-4 pb-4">
        <!-- Links-->
        <div class="row mb-5 pb-md-3 pb-lg-4">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="d-flex flex-sm-row flex-column justify-content-between mx-n2">
              <div class="mb-sm-0 mb-4 px-2"><a class="d-inline-block mb-4" href="#"><img src="<?php echo $ayarcek['ayar_ikon'] ?>" width="116" alt="logo"></a>
                <ul class="nav flex-column mb-sm-4 mb-2">
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="mailto:<?php echo $ayarcek['ayar_mail'] ?>"><i class="fi-mail mt-n1 me-2 align-middle opacity-70"></i><?php echo $ayarcek['ayar_mail'] ?></a></li>
                  <li class="nav-item"><a class="nav-link p-0 fw-normal" href="tel:<?php echo $ayarcek['ayar_gsm'] ?>"><i class="fi-device-mobile mt-n1 me-2 align-middle opacity-70"></i><?php echo $ayarcek['ayar_gsm'] ?></a></li>
                </ul>
                <div class="pt-2">
                  <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" target="blank" href="<?php echo $ayarcek['ayar_facebook'] ?>"><i class="fi-facebook"></i></a>
                  <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" target="blank" href="<?php echo $ayarcek['ayar_instagram'] ?>"><i class="fi-instagram"></i></a>
                  <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" target="blank" href="<?php echo $ayarcek['ayar_linkedin'] ?>"><i class="fi-linkedin"></i></a>
                  <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" target="blank" href="<?php echo $ayarcek['ayar_youtube'] ?>"><i class="fi-youtube"></i></a>
                  <a class="btn btn-icon btn-light-primary btn-xs shadow-sm rounded-circle me-2 mb-2" href="<?php echo $ayarcek['ayar_pinterest'] ?>"><i class="fi-pinterest"></i></a></div>
              </div>
              <div class="mb-sm-0 mb-4 px-2">
                <h4 class="h5">Kategoriler</h4>
                <ul class="nav flex-column">
                  <?php 
                  $katesor = $db->query("SELECT * FROM kategori where kategori_ust != '0' ");
                  while($katecek = $katesor->fetch(PDO::FETCH_ASSOC)) {  ?>

                    <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="category-<?= $katecek['kategori_seourl'] ?>"><?php echo $katecek['kategori_ad'] ?></a></li>
                  <?php } ?>
                </ul>
              </div>
              <div class="px-2">
                <h4 class="h5">Kurumsal</h4>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="re-flexible">Neden Tac Bariyer</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="blog">Blog</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="goals-and-principles">Hedef ve İlkeler</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="customer-relations">Müşteri İlişkileri</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="contact">İletişim</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 offset-xl-1">
            <h4 class="h5">Bloglar</h4>
            <?php 
            $fblogsor = $db->query("SELECT * FROM yazi order by yazi_id desc limit 2");
            while($fblogcek = $fblogsor->fetch(PDO::FETCH_ASSOC)) { 
             ?>

             <article class="d-flex align-items-start" style="max-width: 640px;"><a class="d-none d-sm-block flex-shrink-0 me-sm-4 mb-sm-0 mb-3" href="blog-<?=seo($fblogcek["yazi_seourl"])?>"><img class="rounded-1" src="<?php echo $fblogcek['blog_resimyol'] ?>" width="100" alt="esnek bariyer blog"></a>
              <div>
                <h6 class="mb-1 fs-xs fw-normal text-uppercase text-primary">Esnek Bariyer</h6>
                <h5 class="mb-2 fs-base"><a class="nav-link" href="blog-<?=seo($fblogcek["yazi_seourl"])?>"><?php echo $fblogcek['yazi_ad'] ?></a></h5>
                <p class="mb-2 fs-sm"><?php echo $fblogcek['yazi_description'] ?></p><a class="nav-link nav-link-muted d-inline-block me-3 p-0 fs-xs fw-normal" href="#"><i class="fi-calendar mt-n1 me-1 fs-sm align-middle opacity-70"></i><?php
// Türkçe locale'ını tanımlama
setlocale(LC_TIME, 'tr_TR.UTF-8');

// Sayfanın karakter setini UTF-8 olarak ayarlama
header('Content-Type: text/html; charset=UTF-8');

// Örnek tarih dizisi
$zaman_dizisi = $fblogcek['yazi_zaman'];

// Tarih dizisini strtotime() fonksiyonu ile Unix zaman damgasına dönüştürme
$zaman = strtotime($zaman_dizisi);

// Unix zaman damgasını "Nis 16" formatına dönüştürme
$tarih = strftime("%b %d", $zaman);

// Dönüştürülmüş tarihi yazdırma
echo $tarih;
?>
</a>
            </div>
          </article>
          <hr class="text-dark opacity-10 my-4">
        <?php } ?>
      </div>
    </div>
    <!-- Banner-->
    <div class="bg-dark rounded-3">
      <div class="col-xxl-10 col-md-11 col-10 d-flex flex-md-row flex-column-reverse align-items-md-end align-items-center mx-auto px-0"><img class="flex-shrink-0 mt-md-n5 me-md-5" src="goz/bariyer-png.png" width="240" alt="Finder mobile app">
        <div class="align-self-center d-flex flex-lg-row flex-column align-items-lg-center pt-md-3 pt-5 ps-xxl-4 text-md-start text-center">
          <div class="me-md-5">
            <h4 class="text-light">Demo Talebi</h4>
            <p class="mb-lg-0 text-light">Eğer siz de satın almadan önce denemek isterseniz bizden ücretsiz bir demo talebinde bulunabilirsiniz.</p>
          </div>
          <div class="flex-shrink-0"><a class="btn-market mx-2 ms-sm-0 me-sm-4 mb-3" href="demo-request" style="text-decoration: none;" role="button">Demo Talebi</a></div>
        </div>
      </div>
    </div>
    <div class="text-center fs-sm pt-4 mt-3 pb-2">&copy; Tüm hakları mahfuzdur.</div>
  </div>
</footer>
<a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Yukarı</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>