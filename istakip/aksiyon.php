<?php 
include 'header.php';


if (isset($_GET['proje_id'])) {
  $kayitsor=$db->prepare("SELECT * FROM proje where proje_id=:id");
  $kayitsor->execute(array(
    'id' => guvenlik($_GET['proje_id'])
  ));
  $kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC);
}


?>

<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="container-fluid p-2">


<center>
<form action="islemler/islem.php" method="POST">
      <input type="hidden" value="<?php 
                    date_default_timezone_set('Etc/GMT-3'); date_default_timezone_set('Etc/GMT-3'); echo time() ?>" class="form-control" required name="aksiyon_tarihi">

  <div class="col-lg-9 text-center" >
  <div class="form-group">
    <label>Başlık</label>
    <input type="text" name="baslik" class="form-control" placeholder="Başlık Giriniz">
    <small class="form-text text-muted">Ayrıntılı bilgiyi aşağıya giriniz.</small>
  </div>
  <div class="form-group">
    <label>Detay Bilgi</label>
    <input type="text" name="detay" class="form-control" placeholder="Detaylı bilgi alanı.">
  </div>
  <input type="hidden" name="proje_id" value="<?php echo $kayitcek["proje_id"] ?>">
  <button type="submit" name="aksiyonekle" class="btn btn-primary btn-lg">Ekle</button>
  </div>
</form>
</center>
</div>


  <?php include 'footer.php' ?>
