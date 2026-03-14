<?php 
include 'header.php';


if (isset($_GET['sip_id'])) {
  $kayitsor=$db->prepare("SELECT * FROM siparis where sip_id=:sip_id");
  $kayitsor->execute(array(
    'sip_id' => guvenlik($_GET['sip_id'])
  ));
  $kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC);
}


?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="container-fluid p-2">


<center>
<form action="islemler/islem.php" method="POST">
      <input type="hidden" value="<?php 
                    date_default_timezone_set('Etc/GMT-3'); date_default_timezone_set('Etc/GMT-3'); echo time() ?>" class="form-control" required name="gider_tarihi">

  <div class="col-lg-12 text-center" >
  
<center>
     
  <div class=" col-lg-4">
    <label>Başlık</label>
    <input type="text" name="baslik" class="form-control" placeholder="Başlık Giriniz">
    
  </div>
  
  <div class=" col-lg-8 ">
    <label>Detaylı Bilgi</label>
    <input type="text" name="detay" class="form-control" placeholder="Detaylı bilgi alanı.">
  </div>
  
   <div class="col-lg-4 ">
    <label>Harcama Tutarı</label>
    <input type="number" name="fiyat" class="form-control" placeholder="Harcama tutarı">
  </div>
  
    <div class="col-lg-4 ">
    <label>Harcama Yapan</label>
    <input type="text" name="isim" class="form-control" placeholder="Kişi İsmi">
  </div>
  </center>
  
  <br>  <br>
  
  
  <input type="hidden" name="sip_id" value="<?php echo $kayitcek["sip_id"] ?>">
  
  <button type="submit" name="giderekle" class="btn btn-primary btn-lg">Ekle</button>
  </div>
</form>
</center>
</div>


  <?php include 'footer.php' ?>
