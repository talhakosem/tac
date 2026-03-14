<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'nedmin/netting/baglan.php';

function guvenlik($Deger){
    $BoslukSil          =   trim($Deger);
    $TaglariTemizle     =   strip_tags($BoslukSil);
    $EtkisizYap         =   htmlspecialchars($TaglariTemizle, ENT_QUOTES);
    $Sonuc              =   $EtkisizYap;
    return $Sonuc;
}



if (isset($_POST['iletial'])) {

if(isset($_POST["name"])){
  $name   = guvenlik($_POST["name"]);
}else{
  $name   = "";
}

if(isset($_POST["phone"])){
  $phone   = guvenlik($_POST["phone"]);
}else{
  $phone   = "";
}

if(isset($_POST["email"])){
  $email   = guvenlik($_POST["email"]);
}else{
  $email   = "";
}

if(isset($_POST["company"])){
  $company   = guvenlik($_POST["company"]);
}else{
  $company   = "";
}


if(isset($_POST["message"])){
  $message   = guvenlik($_POST["message"]);
}else{
  $message   = "";
}

if(isset($_POST["co_location"])){
  $co_location   = guvenlik($_POST["co_location"]);
}else{
  $co_location   = "";
}

if(isset($_POST["link"])){
  $link   = guvenlik($_POST["link"]);
}else{
  $link   = "";
}

if(isset($_POST["tanitim_istegi"])){
  $tanitim_istegi   = guvenlik($_POST["tanitim_istegi"]);
}else{
  $tanitim_istegi   = "";
}

if(isset($_POST["available"])){
  $available   = guvenlik($_POST["available"]);
}else{
  $available   = "";
}

if(isset($_POST["website"])){
  $website = guvenlik($_POST["website"]);
}else{
  $website = "";
}

if(isset($_POST["sektor"])){
  $sektor = guvenlik($_POST["sektor"]);
}else{
  $sektor = "";
}

if(isset($_POST["city"])){
  $city = guvenlik($_POST["city"]);
}else{
  $city = "";
}

if(isset($_POST["ilce"])){
  $ilce = guvenlik($_POST["ilce"]);
}else{
  $ilce = "";
}

if(isset($_POST["mahalle"])){
  $mahalle = guvenlik($_POST["mahalle"]);
}else{
  $mahalle = "";
}

if(isset($_POST["sokak"])){
  $sokak = guvenlik($_POST["sokak"]);
}else{
  $sokak = "";
}

if(isset($_POST["no"])){
  $no = guvenlik($_POST["no"]);
}else{
  $no = "";
}

if(isset($_POST["olcum"])){
  $olcum = guvenlik($_POST["olcum"]);
}else{
  $olcum = "";
}

if(isset($_POST["forklift_tonaji"])){
  $forklift_tonaji = guvenlik($_POST["forklift_tonaji"]);
}else{
  $forklift_tonaji = "";
}

if(isset($_POST["geldigiyer"])){
  $geldigiyer = guvenlik($_POST["geldigiyer"]);
}else{
  $geldigiyer = "";
}

  
	$ayarekle=$db->prepare("INSERT INTO listekaydet SET

    name=:name,
    phone=:phone,
    email=:email,
    company=:company,
    message=:message,
    co_location=:co_location,
    link=:link,
    tanitim_istegi=:tanitim_istegi,
    available=:available,
    website=:website,
    sektor=:sektor,
    city=:city,
    ilce=:ilce,
    mahalle=:mahalle,
    sokak=:sokak,
    no=:no,
    olcum=:olcum,
    geldigiyer=:geldigiyer,
    forklift_tonaji=:forklift_tonaji
	");

	$insert=$ayarekle->execute(array(
   
    'name' => $name,
    'phone' => $phone,
    'email' => $email,
    'company' => $company,
    'message' => $message,
    'co_location' => $co_location,
    'link' => $link,
    'tanitim_istegi' => $tanitim_istegi,
    'available' => $available,
    'website' => $website,
    'sektor' => $sektor,
    'city' => $city,
    'ilce' => $ilce,
    'mahalle' => $mahalle,
    'sokak' => $sokak,
    'no' => $no,
    'olcum' => $olcum,
    'geldigiyer' => $geldigiyer,
    'forklift_tonaji' => $forklift_tonaji

	));

} 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST["iletial"])){


require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';


$SiteEmailHostAdresi = "webmail.tacbariyer.com";
$SiteEmailAdresi = "gonder@tacbariyer.com";
$SiteEmailSifresi = "GKeL^-)1Myez";
$gonder = "info@tacbariyer.com";





if ($geldigiyer =="kesif") {

$SiteAdi = "Tac Bariyer Keşif Talebi";
$MailIcerigiHazirla = "İsim Soyisim : " . $name . 
                      " <br/>Mail Adresi : " . $email . 
                      " <br/>Telefon Numarası : " . $phone . 
                      " <br/>Şirketi : " . $company . 
                      " <br> Şirket Adresi: " . $co_location;
}elseif($geldigiyer == "talep") {
  $SiteAdi = "Tac Bariyer Görüşme Talebi";
  $MailIcerigiHazirla = "İsim Soyisim : " . $name . 
                      " <br/>Mail Adresi : " . $email . 
                      " <br/>Telefon Numarası : " . $phone . 
                      " <br/>Talep Tarihi : " . $available . 
                      " <br> Mesaj : " . $message;

}elseif($geldigiyer == "demo") {
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
}

  
  $MailGonder   = new PHPMailer(true);
  
  try{
    $MailGonder->SMTPDebug      = 0;
    $MailGonder->isSMTP();
    $MailGonder->Host       = $SiteEmailHostAdresi;
    $MailGonder->SMTPAuth     = true;
    $MailGonder->CharSet      = "UTF-8";
    $MailGonder->Username     = $SiteEmailAdresi;
    $MailGonder->Password     = $SiteEmailSifresi;
    $MailGonder->SMTPSecure     = 'tls';
    $MailGonder->Port       = 587;
    $MailGonder->SMTPOptions    = array(
                        'ssl' => array(
                          'verify_peer' => false,
                          'verify_peer_name' => false,
                          'allow_self_signed' => true
                        )
                      );
   
    $MailGonder->setFrom($SiteEmailAdresi, $SiteAdi);
    $MailGonder->addAddress($gonder, $SiteAdi);
    $MailGonder->addReplyTo($email, $name);
    $MailGonder->isHTML(true);
    $MailGonder->Subject = $SiteAdi;
    $MailGonder->MsgHTML($MailIcerigiHazirla);
    $MailGonder->send();
    
    header("Location:$link?durum=gonderildi");
    exit();
  }catch(Exception $e){
    header("Location:$link?durum=gonderilemedi");
    exit();
  }

}


 ?>