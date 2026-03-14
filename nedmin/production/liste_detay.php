<?php 

include 'header.php'; 


$kategorisor=$db->prepare("SELECT * FROM listekaydet where liste_id=:id");
$kategorisor->execute(array(
  'id' => $_GET['liste_id']
));

$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Talep Detay</h2>

            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
          







<?php 

include 'header.php'; 

// Veritabanından verileri çek
$kategorisor = $db->prepare("SELECT * FROM listekaydet WHERE liste_id=:id");
$kategorisor->execute(array(
  'id' => $_GET['liste_id']
));

$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Talep Detay</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

            <!-- Talep Detay Bilgileri -->
            <p><strong>Email:</strong> <?php echo $kategoricek['email']; ?></p>
            <p><strong>Şirket:</strong> <?php echo $kategoricek['company']; ?></p>
            <p><strong>Şirket Konumu:</strong> <?php echo $kategoricek['co_location']; ?></p>
            <p><strong>Telefon:</strong> <?php echo $kategoricek['phone']; ?></p>
            <p><strong>Link:</strong> <?php echo $kategoricek['link']; ?></p>
            <p><strong>Adı:</strong> <?php echo $kategoricek['name']; ?></p>
            <p><strong>Mesaj:</strong> <?php echo $kategoricek['message']; ?></p>
            <p><strong>Gizlilik Kontrolü:</strong> <?php echo $kategoricek['privacy_check']; ?></p>
            <p><strong>Tanıtım İsteği:</strong> <?php echo $kategoricek['tanitim_istegi']; ?></p>
            <p><strong>Durum:</strong> <?php echo $kategoricek['available']; ?></p>
            <p><strong>Web Sitesi:</strong> <?php echo $kategoricek['website']; ?></p>
            <p><strong>Sektör:</strong> <?php echo $kategoricek['sektor']; ?></p>
            <p><strong>Şehir:</strong> <?php echo $kategoricek['city']; ?></p>
            <p><strong>İlçe:</strong> <?php echo $kategoricek['ilce']; ?></p>
            <p><strong>Mahalle:</strong> <?php echo $kategoricek['mahalle']; ?></p>
            <p><strong>Sokak:</strong> <?php echo $kategoricek['sokak']; ?></p>
            <p><strong>No:</strong> <?php echo $kategoricek['no']; ?></p>
            <p><strong>Ölçüm:</strong> <?php echo $kategoricek['olcum']; ?></p>
            <p><strong>Resim Yolu:</strong> <?php echo $kategoricek['resim_yolu']; ?></p>
            <p><strong>Geldiği Yer:</strong> <?php echo $kategoricek['geldigiyer']; ?></p>
            <p><strong>Forklift Tonajı:</strong> <?php echo $kategoricek['forklift_tonaji']; ?></p>
            <p><strong>Zaman:</strong> <?php echo $kategoricek['zaman']; ?></p>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>






        </div>
      </div>
    </div>
  </div>


</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
