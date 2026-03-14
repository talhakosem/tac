<?php 
include 'header.php';



?>
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<!-- Begin Page Content -->
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card shadow br-1">
        <div class="card-body">
          <form action="islemler/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate>
            
            <center><label>Başlangıç Tarihi 
              <?php 
              date_default_timezone_set('Etc/GMT-3');
              echo "<mark>".date('d-m-Y')."</mark>" ?>
            </label></center><br><br>
            
              
            <center><label>Tahmini Bitiş Tarihi 
            <?php
date_default_timezone_set('Etc/GMT-3');

// İş günü sayacı
$isGunSayaci = 0;

// Mevcut tarih
$currentDate = date('d-m-Y');

// İş günü eklemek için döngüyü çalıştır
while ($isGunSayaci < 30) {
    // Mevcut tarihi bir gün ileri al
    $currentDate = date('d-m-Y', strtotime($currentDate . ' +1 day'));

    // Eğer mevcut tarih bir iş günü ise sayacı artır
    if (!isWeekend($currentDate)) {
        $isGunSayaci++;
    }
}

// Sonuç olarak elde edilen tarihi ekrana yazdır
echo "<mark>" . $currentDate . "</mark>";

// İş günü kontrolü fonksiyonu
function isWeekend($date) {
    $weekDay = date('w', strtotime($date));
    return ($weekDay == 0 || $weekDay == 6); // Pazar veya Cumartesi ise true döner
}
?>

            </label></center><br><br>
            
            
            <input type="hidden" value="<?php date_default_timezone_set('Etc/GMT-3'); echo time() ?>" class="form-control" required name="sip_baslama_tarih">
            

            <div class="form-row">
              <div class="form-group col-md-4">
                <label>İsim Soyisim</label>
                <input type="text" class="form-control" required name="musteri_isim" placeholder="Müşteri İsim Soyisim">
              </div>
              <div class="form-group col-md-4">
                <label>E-Posta</label>
                <input type="email" class="form-control" name="musteri_mail" placeholder="Müşteri E-Mail">
              </div>
              <input type="hidden" name="sip_teslim_tarihi" value="<? echo $currentDate ?>">
              <div class="form-group col-md-4">
                <label>Telefon Numarası</label>
                <input type="number" class="form-control" name="musteri_telefon" placeholder="Müşteri Telefon Numarası">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label>Sipariş Başlığı</label>
                <input type="text" class="form-control" required name="sip_baslik" placeholder="Sipariş Başlığı">
              </div>
              <div class="form-group col-md-6">
                <label>Sipariş Tamamlanma Yüzdesi</label>
                <input type="number" min="0" max="100" value="0" class="form-control" required name="yuzde" placeholder="Sipariş Tamamlanma Yüzdesi">
              </div>
            </div>
            <div class="form-row">

              <div class="form-group col-md-6">
                <label for="input1">Ücret (TL)</label>
                <input type="number" id="input1"  oninput="writeHalf()" class="form-control" required name="sip_ucret" placeholder="Siparişinizin Ücretini Girin">
              </div>
              
            
    

              <div class="form-group col-md-6">
                <label for="input2">Alınan Ücret (Varsa)</label>
                <input type="number" id="input2" class="form-control"  name="sip_alinan_ucret" >
              </div>

     <script>
        function writeHalf() {
            const input1Value = parseFloat(document.getElementById('input1').value);
            if (!isNaN(input1Value)) {
                const halfValue = input1Value / 2;
                document.getElementById('input2').value = halfValue.toFixed(2);
            } else {
                document.getElementById('input2').value = '';
            }
        }
    </script>

            </div>
            
            
       
    
    
            <div class="form-row">

            
                <input type="hidden" class="form-control"  name="sip_teslim_tarihi" value="<?php echo $currentDate ?>" placeholder="Teslim Tarihi">
            

              <div class="form-group col-md-6">
                <label>Aciliyet</label>
                <select  name="sip_aciliyet" class="form-control">
                  <?php foreach (aciliyet() as $key => $value): ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                  <?php endforeach ?>
                </select>
              </div> 
              <div class="form-group col-md-6">
                <label>Sipariş Durumu</label>
                <select  name="sip_durum" class="form-control">
                  <?php foreach (durum() as $key => $value): ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-12">
                <textarea class="ckeditor" name="sip_detay" id="editor"></textarea>
              </div>
            </div>
            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kul_id']; ?>">
            <div class="text-center">
              <button type="submit" name="siparisekle" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Kaydet</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End of Main Content -->
<?php include 'footer.php' ?>

<!--İşlem sonucu açılan bildirim popupunu otomatik kapatma giriş-->
<script type="text/javascript">
  $('#islemsonucu').modal('show');
  setTimeout(function() {
    $('#islemsonucu').modal('hide');
  }, 3000);
</script>
<!--İşlem sonucu açılan bildirim popupunu otomatik kapatma çıkış-->
<script>
  $(document).ready(function () {
    $("#sip_dosya").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>
