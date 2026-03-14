<?php include'header.php';



?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

  <a href="siparisekle"><button style="float: right;" class="btn btn-primary">Sipariş Ekle</button><a/>
  <h1 class="h3 mb-2 text-gray-800">Siparişler</h1>

  <!-- DataTales Giriş -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Siparişler</h6>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr> 
            <th>No</th>
            <th>İsim</th>
            <th>Siparş Başlığı</th>
            <th>Başlangıç</th>
            <th>Geçen Zaman</th>
            <th>Bitiş Tarihi</th>
            <th>Aciliyet</th>
            
           
            <?php  if ($kullanicicek['kul_yetki']==1) {  ?>
            
            <th>Ücret</th>
            <th>Alınan Para</th>
            <th>Kalan Para</th>
            <th>Net Kar</th>
            <?php  }  ?>
 
               
            <th>Teklif Belgesi</th>
            <th>İşlem</th>

          </tr>
        </thead>
        <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
        <tbody>
         <?php 

         date_default_timezone_set('Etc/GMT-3');
         echo "Bugün: ".date('Y-m-d'); 

         $say=0;
         $kullanici_id=$kullanicicek["kul_id"];
         $siparissor=$db->prepare("SELECT * FROM siparis where sip_durum!=2  ORDER BY sip_id DESC");
         $siparissor->execute();
         while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>

           <tr>
            <td><?php echo $say; ?></td>
            <td><?php echo $sipariscek['musteri_isim']; ?></td>
            <td><?php echo $sipariscek['sip_baslik']; ?></td>
            <td> <?php echo date('d.m.Y', $sipariscek['sip_baslama_tarih']); ?></td>


            <td> 
              <span style="color: red;">
                <b>
                  <?php 
                  $bugun = time();
                  $gecmis = $sipariscek['sip_baslama_tarih'];
                  $fark = $bugun-$gecmis;

                  $dakika = $fark / 60;
                  $saniye_farki = floor($fark - (floor($dakika) * 60));

                  $saat = $dakika / 60;
                  $dakika_farki = floor($dakika - (floor($saat) * 60));

                  $gun = $saat / 24;
                  $saat_farki = floor($saat - (floor($gun) * 24));

                  $yil = floor($gun/365);
                  $gun_farki = floor($gun - (floor($yil) * 365));


                      //echo $yil . ' yıl';
                  echo $gun_farki . ' gün'." - ";
                  echo $saat_farki . ' saat ';
                     // echo $dakika_farki . ' dakika - ';
                      //echo $saniye_farki . ' saniye ';

                  ?>
                </b>
              </span>
            </td>



            <td>
                <?php
// $sipariscek['sip_teslim_tarihi'] değişkeniyle siparişin teslim tarihini alıyoruz
$siparisTeslimTarihi = $sipariscek['sip_teslim_tarihi'];

// Şu anki tarihi alıyoruz
$bugununTarihi = date('Y-m-d');

// Teslim tarihini ve şu anki tarihi DateTime nesnelerine dönüştürüyoruz
$teslimTarihi = new DateTime($siparisTeslimTarihi);
$bugun = new DateTime($bugununTarihi);

// Kalan günü hesaplayıp sonucu alıyoruz
$kalanGun = $bugun->diff($teslimTarihi)->format('%r%a');

// Sonucu ekrana yazdırıyoruz
echo  $siparisTeslimTarihi . "<br>";
echo "<span style='color:Red;font-weight: bold'>Kalan Gün: " . $kalanGun;
?>


</td>
            <td>


              <?php 
            if ($kalanGun<'10') {
              echo '  <span class="badge badge-danger" style="font-size:1rem">Acil</span>';
            } elseif ($kalanGun<'20'){
                echo '  <span class="badge badge-warning" style="font-size:1rem">Hızlan</span>';
            } else {
                echo '  <span class="badge badge-success" style="font-size:1rem">Başladı</span>'; }
          ?>
            
          </td>
                      <?php  if ($kullanicicek['kul_yetki']==1) {  ?>

          <td><?php echo number_format($sipariscek['sip_ucret']); ?></td>

          <td><?php echo number_format($sipariscek['sip_alinan_ucret']); ?></td>
          <td><span style="color:Red;font-weight:bold;"><?php echo number_format($sipariscek['sip_ucret']-$sipariscek['sip_alinan_ucret']); ?></span></td>
          
          <td>  <span style="color:Red;font-weight:bold;">  <?php
            $sip_id = $sipariscek['sip_id'];

// Siparişin toplam alınan ücretini al
$sip_alinan_ucret = $sipariscek['sip_ucret'];

// Siparişe ait giderleri topla
$islem = $db->prepare("SELECT SUM(fiyat) AS toplam_gider FROM gider WHERE sip_id = ?");
$islem->execute([$sip_id]);
$gider_sonuc = $islem->fetch(PDO::FETCH_ASSOC);
$toplam_gider = $gider_sonuc['toplam_gider'];

// Toplam alınan ücretten giderleri çıkar
$net_kar = $sip_alinan_ucret - $toplam_gider;

// $net_kar değişkeni, siparişin net karını tutar
echo number_format($net_kar);
            ?></span></td>
            <? } ?>
          <td>
  <?php 
    if ($sipariscek['dosya_yolu'] != "") {
      echo "<a target='blank' href='dosyalar/" . $sipariscek['dosya_yolu'] . "'> <span class='badge badge-success' style='font-size:1rem'>İndir</span></a>";
    } else {
      echo "Yüklenmedi";
    }
  ?>
</td>

        <td> 
          <?php /* 
          if (yetkikontrol()=="yetkili") { */ ?>
            <div class="d-flex justify-content-center">
                
         <?php  if ($kullanicicek['kul_yetki']==1) {  ?>
             <form action="siparisduzenle.php" method="POST">
              <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
              <button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-edit"></i>
                </span>
              </button>
            </form>
            
         
            
                    <form class="mx-1" action="islemler/islem.php" method="POST" onsubmit="return confirm('Bu siparişi silmek istediğinize emin misiniz?');">
  <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
  <button type="submit" name="siparissilme" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-60">
      <i class="fas fa-trash"></i>
    </span>
  </button>
</form>  
            <? } ?>
               <?php  if ($kullanicicek['kul_yetki']!=1) {  ?>
         <form action="siparisduzenle.php" method="POST">
              <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
              <button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-edit"></i>
                </span>
              </button>
            </form>
            
          <?php } } ?>
         
        </div>
      </td>              
    </tr>
  <?php /* } */ ?>
</tbody>

</table>
</div>
</div>



  <?php  if ($kullanicicek['kul_yetki']==1) {  ?>
  
 <h1 class="h3 mb-2 text-gray-800">Biten Siparişler</h1>

  <!-- DataTales Giriş -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Siparişler</h6>
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr> 
            <th>No</th>
            <th>İsim</th>
            <th>Siparş Başlığı</th>
            <th>Başlangıç</th>
            <th>Geçen Zaman</th>
            <th>Bitiş Tarihi</th>
            
            
            
            <th>Ücret</th>
            <th>Alınan Para</th>
            <th>Kalan Para</th>
            <th>Gider Sonrası</th>
            
            
            <th>Teklif Belgesi</th>
            <th>İşlem</th>

          </tr>
        </thead>
        <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
        <tbody>
         <?php 

         date_default_timezone_set('Etc/GMT-3');
         echo "Bugün: ".date('Y-m-d'); 

         $say=0;
         $siparissor=$db->prepare("SELECT * FROM siparis where sip_durum =2 and kullanici_id=:kul_id ORDER BY sip_id DESC");
         $siparissor->execute(['kul_id' => $kullanici_id]);
         while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>

           <tr>
            <td><?php echo $say; ?></td>
            <td><?php echo $sipariscek['musteri_isim']; ?></td>
            <td><?php echo $sipariscek['sip_baslik']; ?></td>
            <td> <?php echo date('d.m.Y', $sipariscek['sip_baslama_tarih']); ?></td>


            <td> 
              <span style="color: red;">
                <b>
                  <?php 
                  $bugun = time();
                  $gecmis = $sipariscek['sip_baslama_tarih'];
                  $fark = $bugun-$gecmis;

                  $dakika = $fark / 60;
                  $saniye_farki = floor($fark - (floor($dakika) * 60));

                  $saat = $dakika / 60;
                  $dakika_farki = floor($dakika - (floor($saat) * 60));

                  $gun = $saat / 24;
                  $saat_farki = floor($saat - (floor($gun) * 24));

                  $yil = floor($gun/365);
                  $gun_farki = floor($gun - (floor($yil) * 365));


                      //echo $yil . ' yıl';
                  echo $gun_farki . ' gün';
                     // echo $dakika_farki . ' dakika - ';
                      //echo $saniye_farki . ' saniye ';

                  ?>
                </b>
              </span>
            </td>



            <td><?php echo $sipariscek['sip_teslim_tarihi']; ?></td>
            
          <td><?php echo number_format($sipariscek['sip_ucret']); ?></td>

          <td><?php echo number_format($sipariscek['sip_alinan_ucret']); ?></td>
          
          <td><span style="color:Red;font-weight:bold;"><?php echo number_format($sipariscek['sip_ucret']-$sipariscek['sip_alinan_ucret']); ?></span></td>
          
         
         <td>
             
            
            <?php
            $sip_id = $sipariscek['sip_id'];

// Siparişin toplam alınan ücretini al
$sip_alinan_ucret = $sipariscek['sip_ucret'];

// Siparişe ait giderleri topla
$islem = $db->prepare("SELECT SUM(fiyat) AS toplam_gider FROM gider WHERE sip_id = ?");
$islem->execute([$sip_id]);
$gider_sonuc = $islem->fetch(PDO::FETCH_ASSOC);
$toplam_gider = $gider_sonuc['toplam_gider'];

// Toplam alınan ücretten giderleri çıkar
$net_kar = $sip_alinan_ucret - $toplam_gider;

// $net_kar değişkeni, siparişin net karını tutar
echo $net_kar;
            ?></td>




             <td>
  <?php 
    if ($sipariscek['dosya_yolu'] != "") {
      echo "<a target='blank' href='dosyalar/" . $sipariscek['dosya_yolu'] . "'> <span class='badge badge-success' style='font-size:1rem'>İndir</span></a>";
    } else {
      echo "Yüklenmedi";
    }
  ?>
</td>
        <td> 
          <?php /* if (yetkikontrol()=="yetkili") { */ ?>
            <div class="d-flex justify-content-center">
             <form action="siparisduzenle.php" method="POST">
              <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
              <button type="submit" name="duzenleme" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-edit"></i>
                </span>
              </button>
            </form>

         <form class="mx-1" action="islemler/islem.php" method="POST" onsubmit="return confirm('Bu siparişi silmek istediğinize emin misiniz?');">
  <input type="hidden" name="sip_id" value="<?php echo $sipariscek['sip_id'] ?>">
  <button type="submit" name="siparissilme" class="btn btn-danger btn-sm btn-icon-split">
    <span class="icon text-white-60">
      <i class="fas fa-trash"></i>
    </span>
  </button>
</form> 
 
          <?php } ?>
      
        </div>
      </td>              
    </tr>

</tbody>

</table>
</div>





</div>

  <?php  }  ?>

</div>
<!--Datatables çıkış-->
</div>


<?php include'footer.php' ?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
