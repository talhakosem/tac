<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2VC5D5R2LX"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2VC5D5R2LX');
</script>


      <!-- keşif Modal-->
      <div class="modal fade" id="kesif-talebi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
          <div class="modal-content">
            <div class="modal-body px-0 py-2 py-sm-0">
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
              <div class="row mx-0 align-items-center">
                <div class="col-md-6 border-end-md p-4 p-sm-5">
                  <h2 class="h3 mb-4 mb-sm-5">Re-Flexible<br>Esnek Bariyer Sürdürülebilir Çözüm</h2>
                  <ul class="list-unstyled mb-4 mb-sm-5">
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Daha az bariyer maliyeti</span></li>
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Daha az forklift hasar maliyeti</span></li>
                    <li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Daha az zaman kaybı</span></li>
                  </ul><img class="d-block mx-auto" src="img/signin-modal/signup.svg" width="344" alt="Illustartion">
                </div>
                <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5"><a class="btn btn-outline-primary w-100 mb-3" href="mailto:<?php echo $ayarcek['ayar_mail'] ?>">Tıkla ve mail at</a><a class="btn btn-outline-primary w-100 mb-3" href="tel:<?php echo $ayarcek['ayar_tel'] ?>">Tıkla ve ara</a>
                  <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3">veya</div>
                    <hr class="w-100">
                  </div>

                  <form class="needs-validation" novalidate action="ileti-gonder" method="POST">
                    <div class="mb-4">
                      <input class="form-control" type="text" id="signup-name" placeholder="İsim Soyisim" required name="name">
                    </div>

                    <div class="mb-4">
                      <input class="form-control" type="number" placeholder="Telefon no" required name="phone">
                    </div>

                    <div class="mb-4">
                      <input class="form-control" type="email" id="signup-email" placeholder="Email" required name="email">
                    </div>

                    <div class="mb-4">
                      <input class="form-control" type="text" placeholder="Şirket ismi" required name="company">
                    </div>

                    <div class="mb-4">
                      <input class="form-control" type="text"  placeholder="Şirket adresiniz" required name="co_location">
                    </div>
                    
                    

                      <input type="hidden" name="link" value="<?php echo $_SERVER['REQUEST_URI']; ?>">

                      <input type="hidden" name="geldigiyer" value="kesif">
                 


                    <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" id="gizlilik" required>
                      <label class="form-check-label" for="gizlilik">Re-Flexible <a href='#'>Gizlilik Politikasını</a> onaylıyorum.</label>
                      <hr style="border: 0; height: 1px; background-color: #666276; margin: 20px 20px;">

                      <input class="form-check-input" type="checkbox" id="agree-to-terms" name="tanitim_istegi">
                      <label class="form-check-label" for="agree-to-terms">Tarafıma kampanya ve duyuru maillerinin atılmasını onaylıyorum.</label>
                    </div>
                    <button class="btn btn-primary btn-lg w-100" name="iletial" type="submit">Talep Gönder</button>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Navbar-->
      <header class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-scroll-header>
        <div class="container"><a class="navbar-brand me-3 me-xl-4" href="/">
          <img class="d-block" src="<?php echo $ayarcek['ayar_logo'] ?>" width="150" alt="Re-Flexible Esnek Bariyer Logo"></a>
          <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button><a class="btn btn-primary btn-sm ms-2 order-lg-3" href="#kesif-talebi" data-bs-toggle="modal"><i class="fi-plus me-2"></i>Keşif Talebi</span></a>
          <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
              <!-- Demos switcher-->
              <li class="nav-item dropdown me-lg-2"><a class="nav-link align-items-center pe-lg-4" href="demo-request"><i class="fi-layers me-2"></i>Demo Talebi<span class="d-none d-lg-block position-absolute top-50 end-0 translate-middle-y border-end" style="width: 1px; height: 30px;"></span></a>

              </li>
              <!-- Menu items-->
              <li class="nav-item dropdown active"><a class="nav-link" href="/">Anasayfa</a></li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kategoriler</a>
                <ul class="dropdown-menu">
                  <?php
                  $katesor=$db->query("SELECT * FROM kategori where kategori_ust != '0' order by kategori_sira asc ");
                  while($katecek=$katesor->fetch(PDO::FETCH_ASSOC)) {  ?>
                    <li><a class="dropdown-item" href="category-<?php echo $katecek['kategori_seourl'] ?>"><?php echo $katecek['kategori_ad'] ?></a></li>
                  <?php } ?>
                </ul>
              </li>
              <li class="nav-item "><a class="nav-link " href="re-flexible">Neden Re-Flexible</a></li>

       

             </li>
             <li class="nav-item "><a class="nav-link " href="contact">İletişim</a></li>
           </ul>
         </div>
       </div>
     </header>

<?php 
// Türkçe locale'ını tanımlama
setlocale(LC_TIME, 'tr_TR.UTF-8');
// Sayfanın karakter setini UTF-8 olarak ayarlama
header('Content-Type: text/html; charset=UTF-8');
 ?>
 
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <?php 
  if ($_GET['durum']=="no") {?>
    <script>
      Swal.fire(
        'Hata',
        'Hata oluşmuştur lütfen bize iletişim sayfasından ulaşın.',
        'error'
        )
      </script>
    <?php } elseif ($_GET['durum']=="gonderildi") {?>
      <script>
        Swal.fire(
          'Başarı',
          'Talebiniz Tarafımıza Gönderilmiştir',
          'success'
          )
        </script>
      <?php } elseif ($_GET['durum']=="bot") {?>
        <script>
          Swal.fire(
            'Bot tespit edildi',
            'Bot alarmı verildi lütfen bize iletişim sayfasından ulaşın.',
            'error'
            )
          </script>
        <?php } ?>

