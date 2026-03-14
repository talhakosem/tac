<?php

include 'header.php'; 

// Veritabanından verileri çek
$kategorisor = $db->prepare("SELECT * FROM listekaydet WHERE liste_id=:id");
$kategorisor->execute(array(
  'id' => $_GET['liste_id']
));

$kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC);

// Gerekli değişkenleri atama
$geldigiyer = $kategoricek['geldigiyer'];
$name = $kategoricek['name'];
$email = $kategoricek['email'];
$phone = $kategoricek['phone'];
$company = $kategoricek['company'];
$co_location = $kategoricek['co_location'];
$available = $kategoricek['available'];
$message = $kategoricek['message'];
$website = $kategoricek['website'];
$sektor = $kategoricek['sektor'];
$city = $kategoricek['city'];
$ilce = $kategoricek['ilce'];
$mahalle = $kategoricek['mahalle'];
$sokak = $kategoricek['sokak'];
$no = $kategoricek['no'];
$forklift_tonaji = $kategoricek['forklift_tonaji'];
$olcum = $kategoricek['olcum'];

// Mail içeriği hazırlama
if ($geldigiyer == "kesif") {

  $SiteAdi = "Tac Bariyer Keşif Talebi";
  $MailIcerigiHazirla = "İsim Soyisim : " . $name . 
                        " <br/>Mail Adresi : " . $email . 
                        " <br/>Telefon Numarası : " . $phone . 
                        " <br/>Şirketi : " . $company . 
                        " <br> Şirket Adresi: " . $co_location;

} elseif($geldigiyer == "talep") {

  $SiteAdi = "Tac Bariyer Görüşme Talebi";
  $MailIcerigiHazirla = "İsim Soyisim : " . $name . 
                        " <br/>Mail Adresi : " . $email . 
                        " <br/>Telefon Numarası : " . $phone . 
                        " <br/>Talep Tarihi : " . $available . 
                        " <br> Mesaj : " . $message;

} elseif($geldigiyer == "demo") {

  $SiteAdi = "Tac Bariyer Demo Talebi";
  $MailIcerigiHazirla = "İsim Soyisim : " . $name . 
                        " <br/>Mail Adresi : " . $email . 
                        " <br/>Telefon Numarası : " . $phone . 
                        " <br> Mesaj : " . $message . 
                        " <br> Website : " . $website . 
                        " <br> Sektör : " . $sektor .
                        " <br> Adres : " . $city . " - " . $ilce ." - ".$mahalle." - ". $sokak . " - ". $no .
                        " <br> Forklift Tonajı : " . $forklift_tonaji .
                        " <br> İstenilen Metre : " . $olcum;

} else {
  $SiteAdi = "Tac Bariyer Talebi";
  $MailIcerigiHazirla = "Bu talep türü bilinmiyor.";
}

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2><?php echo $SiteAdi; ?></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />
            <?php echo $MailIcerigiHazirla; ?>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
