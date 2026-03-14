<?php
if (isset($_GET['sirket_adi'])) {
  $sirket = $_GET['sirket_adi'];
  $musteri = $_GET['musteri_isim'];
}
?>
  <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
</head>
<div class="app">
  <header class="app__header">
  <img src="https://flexsafe.com.tr/dimg/27839logo-esnek-bariyer.png" width="200" height="50" alt="flexsafe" >
     <div class="app__select">
        <div class="app__numbs">
           <a href="#" class="app__numb active">
              1
           </a>
           <p>Ürün Seçim İşlemleri</p>
        </div>
        <div class="app__numbs">
           <a href="diger.php" class="app__numb">
              2
           </a>
           <p>Ürün Bilgi İşlemleri</p>
        </div>
     </div>
  </header>
  <div class="container">
  <div class="row">
  <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2456527296_esnek_bariyer_x2s.jpg">
            </div>
            <div class="card__price">
               <b><small>Triple Esnek Aktif Alan Bariyeri</small></b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2456527296_esnek_bariyer_x2s.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2065120126_esnek_bariyer_sd.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Double Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2065120126_esnek_bariyer_sd.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2046920139_esnek_bariyer_dw.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b><small>Double Plus Aktif Alan Bariyeri</small></b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2046920139_esnek_bariyer_dw.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2011731505_esnek_bariyer_e.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b><small>Aktif Alan Height Plus Bariyer</small></b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2011731505_esnek_bariyer_e.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2008330401_esnek_bariyer_dwq.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Double Yaya Yolu Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2008330401_esnek_bariyer_dwq.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2729024465_esnek_bariyer_s.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Triple Yaya Yolu Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2729024465_esnek_bariyer_s.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2172328216_esnek_bariyer_aq.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Uzun Koruma Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2172328216_esnek_bariyer_aq.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2359524629_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Quintet Koruma Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2359524629_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2115929892_esnek_bariyer_dww.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Çeviren Bariyer</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2115929892_esnek_bariyer_dww.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2430326168_esnek_bariyer_2512020909_esnek_bariyer_2w.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>L - F Tünel Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2430326168_esnek_bariyer_2512020909_esnek_bariyer_2w.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/3025229037_esnek_bariyer_fw.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Double Çeviren Bariyer</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/3025229037_esnek_bariyer_fw.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2642423266_esnek_bariyer_sq.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Triple Çeviren Bariyer</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2642423266_esnek_bariyer_sq.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2972130804_esnek_bariyer_aq.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Bariyer ve Sınırlandırıcı</b>
               <small>Ürün Stokta Yok</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="https://flexsafe.com.tr/dimg/urun/2972130804_esnek_bariyer_aq.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2940223023_esnek_bariyer_qs.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b><small>Triple Aktif Alan Bariyeri ve Sınırlandırıcı</small></b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2940223023_esnek_bariyer_qs.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2473229389_esnek_bariyer_wdq.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Double Aktif Alan Bariyeri ve Sınırlandırıcı</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2473229389_esnek_bariyer_wdq.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2760522657_esnek_bariyer_s2.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Duba</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2760522657_esnek_bariyer_s2.jpg&urun=duba" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2664528186_esnek_bariyer_s1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Uzun Duba</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2664528186_esnek_bariyer_s1.jpg&urun=duba" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2706121501_esnek_bariyer_s1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Bodur Duba</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2706121501_esnek_bariyer_s1.jpg&urun=duba" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2815220125_esnek_bariyer_e1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Sınırlandırma Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2815220125_esnek_bariyer_e1.jpg&urun=sinirlandirici_tek" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2601823370_esnek_bariyer_s.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b><small>Triple Yaya Yolu Bariyeri ve Tekmelik</small></b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2601823370_esnek_bariyer_s.jpg&urun=tokmak" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/3027222786_esnek_bariyer_s.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>U - F Tünel Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/3027222786_esnek_bariyer_s.jpg&urun=tunel" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   <div class="col-md-4">
    <div class="card active">
      <div class="card__select">
         <div class="card__header">
            <div class="card__icon">
              <img class="img-fluid" width="140" height="100" src="https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" alt="Flexsafe, güvenlik bariyeri, esnek bariyer, Trafik Bariyeri,Yaya Yolu Bariyerleri,Yüksek Koruma Bariyerleri,Makine Ekipman Koruma Bariyerleri,Kolon/Köşe Koruma Bariyerleri">
            </div>
            <div class="card__price">
               <b>Esnek Aktif Alan Bariyeri</b>
               <small>Ürün Stokta</small>
            </div>
         </div>
         <div class="card__btn">
            <a href="duba.php?sirket_adi=<?php echo $sirket ?>&musteri_isim=<?php echo $musteri; ?>&resim_id=https://flexsafe.com.tr/dimg/urun/2986730632_esnek_bariyer_esnek-bariyer-1.jpg" class="btn btn--secondary">Ürünü Seç</a>
         </div>
      </div>
      </div>
   </div>
   
</div>
</div>
   </main>
 <br>
  <div align="center">
    <h5>Flexsafe Esnek Bariyer Sistemleri San. Tic. Ltd. Şti.</h5>
  </div>
</div>
  
 

<style>
  @import url("https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,700&display=swap");
:root {
  --clr-100: #73747d;
  --clr-200: #171b42;
  --clr-primary: #e3f06a;
  --light-bg: #f0f1fa;
  --fw-400: 400;
  --fw-600: 600;
  --fw-700: 700;
}

*,
*::before,
*::after {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

html,
body {
  width: 100%;
  height: 100vh;
}
.grid-container {
  display: grid;
}
body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.5;
  color: var(--clr-100);
  background-color: #ebecf3;
  display: grid;
  place-items: center;
}

a {
  text-decoration: none;
}

.app {
  max-width: 50em;
  width: 100%;
  margin: 0 auto;
  background-color: #fff;
  padding: 3.5em 7em;
  border-radius: 18px;
  box-shadow: 0 30px 45px -15px rgba(0, 0, 0, 0.2);
}

.app__header {
  text-align: center;
}

.app__header h2 {
  font-size: 1.375rem;
  color: var(--clr-200);
  font-weight: var(--fw-700);
}

.app__select {
  margin-top: 3rem;
  max-width: 60%;
  width: 100%;
  margin-left: auto;
  margin-right: auto;
  display: grid;
  grid-template-columns: 1fr 1fr;
}

.app__numb {
  display: inline-block;
  width: 36px;
  height: 36px;
  padding: 6px;
  border-radius: 50%;
  background-color: var(--light-bg);
  color: var(--clr-200);
}

.app__numb.active {
  background-color: var(--clr-primary);
  color: white;
}

.app__select {
  position: relative;
  z-index: 0;
}

.app__select::before {
  content: "";
  width: 50%;
  height: 2px;
  display: inline-block;
  background: #ebecf3;
  position: absolute;
  top: 18px;
  left: 70px;
  z-index: -1;
}

.app__numbs p {
  margin: 1em 0;
  font-size: 0.875rem;
}

.cards {
  padding: 5em 0;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 1em;
}

.card {
  flex: 0 0 198px;
  border: 1px solid #edeef4;
  border-radius: 16px;
  position: relative;
  cursor: pointer;
}

.card::before {
  content: "";
  position: absolute;
  top: 0;
  z-index: -1;
  left: 0;
  right: 0;
  bottom: 10;
  opacity: 0;
  border-radius: 16px;
  box-shadow: 0 14px 14px -10px rgba(157, 234, 74, 0.5);
  transition: opacity 450ms ease-in-out;
}

.card:hover::before {
  opacity: 1;
}

.card.active::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  opacity: 1;
  box-shadow: 0 14px 14px -10px rgba(28, 121, 5, 0.5);
}

.card__select {
  display: flex;
  flex-direction: column;
  padding: 35px 30px;
  height: 283px;
  justify-content: space-between;
}

.card__price {
  padding-left: 0.4em;
}

.card__price b {
  color: var(--clr-200);
  font-weight: var(--fw-700);
}

.card__price small {
  display: block;
}

.btn {
  display: inline-block;
  border: none;
  outline: none;
  background: transparent;
  padding: 0.4em 1.2em;
  font-size: 0.875rem;
  font-weight: var(--fw-400);
  color: var(--clr-primary);
}

.btn--primary {
  color: var(--clr-primary);
  background: white;
  border: 1px solid var(--clr-primary);
  border-radius: 4px;
}

.btn--secondary {
  background: var(--clr-primary);
  color: white;
  padding: 0.5em 1.2em;
  border-radius: 4px;
}
</style>