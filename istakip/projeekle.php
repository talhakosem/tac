<?php 
include 'header.php';
/*
if (yetkikontrol()!="yetkili") {
  header("location:index.php?durum=izinsiz");
  exit;
}
*/
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

           <center> <label>Başlangıç Tarihi 
            <?php 
            date_default_timezone_set('Etc/GMT-3');
            echo "<mark>".date('d-m-Y')."</mark>" ?>
          </label></center> <br> <br>
          <input type="hidden" value="<?php date_default_timezone_set('Etc/GMT-3'); echo time() ?>" class="form-control" required name="proje_baslama_tarihi">


          <div class="form-row">
            <div class="form-group col-md-4">
              <label>İsim Soyisim</label>
              <input type="text" class="form-control" required name="musteri_isim" placeholder="Müşteri İsim Soyisim">
            </div>
            <div class="form-group col-md-4">
              <label>E-Posta</label>
              <input type="email" class="form-control" name="musteri_mail" placeholder="Müşteri E-Mail">
            </div>
            <div class="form-group col-md-4">
              <label>Telefon Numarası</label>
              <input type="number" class="form-control" name="musteri_telefon" placeholder="Müşteri Telefon Numarası">
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-4">
              <label>Firma İsmi</label>
              <input type="text" class="form-control" required name="firma_baslik" placeholder="Proje Başlığı">
            </div>
             <div class="form-group col-md-4">
              <label>Proje Başlığı</label>
              <input type="text" class="form-control"  name="proje_baslik" placeholder="Proje Başlığı">
            </div>
            <div class="form-group col-md-4">
              <label>İş Kapasitesi ($)</label>
              <input type="number" class="form-control"  name="proje_ucret" placeholder="Projenizin Ücretini Girin">
            </div>
          </div>


          <div class="form-row">

            <div class="form-group col-md-6">
              <label>Aciliyet</label>
              <select  name="proje_aciliyet" class="form-control">
                <?php foreach (aciliyet() as $key => $value): ?>
                  <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php endforeach ?>
              </select>
            </div> 
            <div class="form-group col-md-6">
              <label>Proje Durumu</label>
              <select  name="proje_durum" class="form-control">
                <?php foreach (durum2() as $key => $value): ?>
                  <option value="<?php echo $key ?>"><?php echo $value ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <textarea class="ckeditor" name="proje_detay" id="editor"></textarea>
            </div>
          </div>
        </div>

            <input type="hidden" name="kullanici_id" value="<?php echo $kullanicicek['kul_id']; ?>">
        <div class="text-center">
          <button type="submit" name="projeekle" class="btn btn-primary btn-lg"><i class="fa fa-save"></i> Kaydet</button>
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
    $("#proje_dosya").fileinput({
      'theme': 'explorer-fas',
      'showUpload': false,
      'showCaption': true,
      showDownload: true,
      allowedFileExtensions: ["jpg", "png", "jpeg","mp4","zip","rar"],
    });
  });
</script>
