<?php

@ob_start();
@session_start();
include 'baglan.php';
include '../fonksiyonlar.php';

//Site ayarlarını veritabanından çekme işlemi
$ayarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarsor->execute();
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);




if (isset($_GET['api_key'])) {
  if ($_GET['api_key']==$api_key) {
    $api=true;
  } else {
   echo json_encode(['durum' => 'no', 'mesaj' => "API Bilgileriniz Hatalıdır"]);
   $api=false;
   exit;
 }
} else {
  $api=false;
}


/********************************************************************************/

/*Oturum Açma İşlemi Giriş*/
if (isset($_POST['oturumac'])) {

	if (isset($_POST['kul_mail']) AND isset($_POST['kul_sifre'])) {
    $kul_mail=guvenlik($_POST['kul_mail']);
    $kul_sifre=$_POST['kul_sifre'];
    $kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kul_mail=:mail and kul_sifre=:sifre");
    $kullanicisor->execute(array(
      'mail'=> $kul_mail,
      'sifre'=> $kul_sifre
    ));
    $sonuc=$kullanicisor->rowCount();
    if ($sonuc==1) {
      $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
      $_SESSION['kul_mail']=$kul_mail; 
      $_SESSION['kul_id']=$kullanicicek['kul_id'];

      $ipkaydet=$db->prepare("UPDATE kullanicilar SET
        ip_adresi=:ip_adresi, 
        session_mail=:session_mail WHERE 
        kul_mail=:kul_mail
        ");

      $kaydet=$ipkaydet->execute(array(
        'ip_adresi' => $_SERVER['REMOTE_ADDR'], 
        'session_mail' => $kul_mail,
        'kul_mail' => $kul_mail
      ));

      if ($api) {

        echo json_encode([
          'durum' => 'ok',
          'bilgiler' => $kullanicicek
        ]);
      } else {
        header("location:../index.php");
      }

      exit;
    } else {
      if ($api) {
       echo json_encode([
        'durum' => 'no',
        'mesaj' => 'Giriş Bilgileriniz Hatalı'
      ]);
     } else {
      header("location:../login?durum=hata");
    }
  }
} else {
 echo json_encode([
  'durum' => 'no',
  'mesaj' => 'Mail veya Şifre Parametreleri Boş'
]);
}

exit;
}
/*Oturum Açma İşlemi Giriş*/


/*******************************************************************************/

if (isset($_POST['genelayarkaydet'])) {
  if (yetkikontrol()!="yetkili") {
    header("location:../index.php");
    exit;
  }


  $genelayarkaydet=$db->prepare("UPDATE ayarlar SET
   site_baslik=:baslik,
   site_aciklama=:aciklama,
   site_sahibi=:sahip,
   mail_onayi=:mail_onayi,
   duyuru_onayi=:duyuru_onayi where id=1
   ");

  $ekleme=$genelayarkaydet->execute(array(
   'baslik' => guvenlik($_POST['site_baslik']),
   'aciklama' => guvenlik($_POST['site_aciklama']),
   'sahip' => guvenlik($_POST['site_sahibi']),
   'mail_onayi' => guvenlik($_POST['mail_onayi']),
   'duyuru_onayi' => guvenlik($_POST['duyuru_onayi'])
 ));


  if ($_FILES['site_logo']['error']=="0") {
    $yuklemeklasoru = '../dosyalar';
    @$gecici_isim = $_FILES['site_logo']["tmp_name"];
    @$dosya_ismi = $_FILES['site_logo']["name"];
    $benzersizsayi1=rand(100000,999999);
    $isim=tum_bosluk_sil($benzersizsayi1.$dosya_ismi);
    @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
    $son_eklenen_id=$db->lastInsertId();

    $genelayarkaydet=$db->prepare("UPDATE ayarlar SET
      site_logo=:site_logo where id=1
      ");

    $genelayarkaydet->execute(array(
      'site_logo' => $isim
    ));

  }

  if ($ekleme) {
   header("location:../ayarlar?durum=ok");
 } else {
   header("location:../ayarlar?durum=no");
   exit;
 }            
}

/*******************************************************************************/

//Proje Ekleme Bölümü
if (isset($_POST['projeekle'])) {


  $projeekle=$db->prepare("INSERT INTO proje SET
   firma_baslik=:firma_baslik,
   proje_baslik=:baslik,
   musteri_isim=:musteri_isim,
   musteri_mail=:musteri_mail,
   musteri_telefon=:musteri_telefon,
   proje_detay=:detay,
   proje_durum=:durum,
   proje_ucret=:proje_ucret,
   proje_aciliyet=:aciliyet,
    kullanici_id=:kullanici_id,
   proje_baslama_tarihi=:proje_baslama_tarihi
   ");

  $ekleme=$projeekle->execute(array(
   'firma_baslik' => $_POST['firma_baslik'],
   'baslik' => $_POST['proje_baslik'],
   'musteri_isim' => $_POST['musteri_isim'],
   'musteri_mail' => $_POST['musteri_mail'],
   'musteri_telefon' => $_POST['musteri_telefon'],
   'detay' => $_POST['proje_detay'],
   'durum' => $_POST['proje_durum'],
   'proje_ucret' => $_POST['proje_ucret'],
   'aciliyet' => $_POST['proje_aciliyet'],
   'kullanici_id' => $_POST['kullanici_id'],
   'proje_baslama_tarihi' => $_POST['proje_baslama_tarihi']
 ));

  if ($_FILES['proje_dosya']['error']=="0") {
    $yuklemeklasoru = '../dosyalar';
    @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
    @$dosya_ismi = $_FILES['proje_dosya']["name"];
    $benzersizsayi1=rand(100000,999999);
    $isim=tum_bosluk_sil($benzersizsayi1.$dosya_ismi);
    @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   
    $son_eklenen_id=$db->lastInsertId();
    $dosyayukleme=$db->prepare("UPDATE proje SET
     dosya_yolu=:dosya_yolu WHERE proje_id=:proje_id ");

    $yukleme=$dosyayukleme->execute(array(
     'dosya_yolu' => $isim,
     'proje_id' => $son_eklenen_id
   ));
  }

  if ($ekleme) {

    if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../projeler?durum=ok");
   }


   exit;
 } else {
  if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız', 'hata' => implode(",", $projeekle->errorInfo())]);
  } else {
   header("location:../projeler?durum=no");
 }
 exit;
}
exit;
}


/********************************************************************************/



//Aksiyon Ekleme Bölümü
if (isset($_POST['aksiyonekle'])) {

 $proje_id=$_POST['proje_id'];




  $aksiyonekle=$db->prepare("INSERT INTO aksiyon SET
   aksiyon_tarihi=:aksiyon_tarihi,
   baslik=:baslik,
   detay=:detay,
   proje_id=:proje_id
   ");

  $ekleme=$aksiyonekle->execute(array(
   'aksiyon_tarihi' => $_POST['aksiyon_tarihi'],
   'baslik' => $_POST['baslik'],
   'detay' => $_POST['detay'],
   'proje_id' => $_POST['proje_id']
 ));

  if ($ekleme) {

    if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../projeduzenle.php?proje_id=$proje_id?durum=ok");
   }
   exit;
 } 
} 



/********************************************************************************/



/********************************************************************************/



//Aksiyon Ekleme Bölümü
if (isset($_POST['giderekle'])) {

 $sip_id=$_POST['sip_id'];

  $giderekle=$db->prepare("INSERT INTO gider SET
   gider_tarihi=:gider_tarihi,
   baslik=:baslik,
   detay=:detay,
   fiyat=:fiyat,
   isim=:isim,
   sip_id=:sip_id
   ");

  $ekleme=$giderekle->execute(array(
   'gider_tarihi' => $_POST['gider_tarihi'],
   'baslik' => $_POST['baslik'],
   'detay' => $_POST['detay'],
   'fiyat' => $_POST['fiyat'],
   'isim' => $_POST['isim'],
   'sip_id' => $_POST['sip_id']
 ));

  if ($ekleme) {

    if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../siparisduzenle.php?sip_id=$sip_id?durum=ok");
   }
   exit;
 } 
} 



/********************************************************************************/


if (isset($_POST['projeguncelle'])) {


  $projeguncelle=$db->prepare("UPDATE proje SET
   
   musteri_isim=:musteri_isim,
   musteri_mail=:musteri_mail,
   musteri_telefon=:musteri_telefon,
   proje_baslik=:proje_baslik,
   proje_ucret=:proje_ucret,
   proje_durum=:proje_durum,
   proje_aciliyet=:proje_aciliyet,
   proje_detay=:proje_detay
    WHERE proje_id={$_POST['proje_id']}");

  $guncelle=$projeguncelle->execute(array(

   'musteri_isim' => $_POST['musteri_isim'],
   'musteri_mail' => $_POST['musteri_mail'],
   'musteri_telefon' => $_POST['musteri_telefon'],
   'proje_baslik' => $_POST['proje_baslik'],
   'proje_ucret' => $_POST['proje_ucret'],
   'proje_durum' => $_POST['proje_durum'],
   'proje_aciliyet' => $_POST['proje_aciliyet'],
   'proje_detay' => $_POST['proje_detay']
  ));
  if ($_FILES['proje_dosya']['error']=="0") {

    $yuklemeklasoru = '../dosyalar';
    @$gecici_isim = $_FILES['proje_dosya']["tmp_name"];
    @$dosya_ismi = $_FILES['proje_dosya']["name"];
    $benzersizsayi1=rand(10,1000);
    $isim=tum_bosluk_sil($benzersizsayi1.$dosya_ismi);
    @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   

    $dosyayukleme=$db->prepare("UPDATE proje SET
      dosya_yolu=:dosya_yolu WHERE proje_id=:proje_id ");

    $yukleme=$dosyayukleme->execute(array(
      'dosya_yolu' => $isim,
      'proje_id' => $_POST['proje_id']
    ));

  };

  if ($guncelle) {

   if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../projeler?durum=ok");
   }


   exit;
 } else {
   if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız', 'hata' => implode(",", $projeguncelle->errorInfo())]);
  } else {
   header("location:../projeler?durum=no");
 }
 exit;
}
exit;
}

/********************************************************************************/
      //www.aksoyhlc.net tarafından hazırlanmıştır

if (isset($_POST['siparisekle'])) {
  
  /*
  if (yetkikontrol()!="yetkili" AND !$api) {
    header("location:../index.php");
    exit;
  }
  */
  $siparisekle=$db->prepare("INSERT INTO siparis SET
    musteri_isim=:isim,
    kullanici_id=:kullanici_id,
    musteri_mail=:mail,
    musteri_telefon=:telefon,
    sip_baslik=:baslik,
    sip_teslim_tarihi=:teslim_tarihi,
    sip_aciliyet=:aciliyet,
    sip_durum=:durum,
    sip_ucret=:ucret,
    sip_alinan_ucret=:sip_alinan_ucret,
    sip_detay=:detay,
    yuzde=:yuzde,
    sip_baslama_tarih=:sip_baslama_tarih
    ");

  $ekleme=$siparisekle->execute(array(
    'isim' => $_POST['musteri_isim'],
    'kullanici_id' => $_POST['kullanici_id'],
    'mail' => $_POST['musteri_mail'],
    'telefon' => $_POST['musteri_telefon'],
    'baslik' => $_POST['sip_baslik'],
    'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
    'aciliyet' => $_POST['sip_aciliyet'],
    'durum' => $_POST['sip_durum'],
    'ucret' => $_POST['sip_ucret'],
    'sip_alinan_ucret' => $_POST['sip_alinan_ucret'],
    'detay' => $_POST['sip_detay'],
    'yuzde' => $_POST['yuzde'],
    'sip_baslama_tarih' => $_POST['sip_baslama_tarih']
  ));

  if ($_FILES['sip_dosya']["error"]=="0") {
   $yuklemeklasoru = '../dosyalar';
   @$gecici_isim = $_FILES['sip_dosya']["tmp_name"];
   @$dosya_ismi = $_FILES['sip_dosya']["name"];
   $benzersizsayi1=rand(10,1000);
   $isim1=$benzersizsayi1.$dosya_ismi;
   $isim=tum_bosluk_sil($isim1);
   move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");



   $son_eklenen_id=$db->lastInsertId();

   $dosyayukleme=$db->prepare("UPDATE siparis SET
    dosya_yolu=:dosya_yolu WHERE sip_id=:sip_id ");

   $yukleme=$dosyayukleme->execute(array(
    'dosya_yolu' => $isim,
    'sip_id' => $son_eklenen_id
  ));
 }


 if ($ekleme) {

   if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../siparisler?durum=ok");
   }

   exit;
 } else {
  if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız', 'hata' => implode(",", $siparisekle->errorInfo())]);
  } else {
   header("location:../siparisler?durum=no");
 }
 exit;
}
exit;
}


/********************************************************************************/


if (isset($_POST['siparisguncelle'])) {
  if (yetkikontrol()!="yetkili" AND !$api) {
    header("location:../index.php");
    exit;
  }


  if (isset($_POST['sip_id'])) {
  $kayitsor=$db->prepare("SELECT * FROM siparis where sip_id=:id");
  $kayitsor->execute(array(
    'id' => guvenlik($_POST['sip_id'])
  ));
  $kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC);

$son_alinan = $kayitcek['sip_alinan_ucret']+ $_POST['sip_alinan_ucret'];


} else {
  header("location:siparisler");
} 




  $siparisguncelle=$db->prepare("UPDATE siparis SET
    musteri_isim=:isim,
    musteri_mail=:mail,
    musteri_telefon=:telefon,
    sip_baslik=:baslik,
    sip_teslim_tarihi=:teslim_tarihi,
    sip_aciliyet=:aciliyet,
    sip_durum=:durum,
    sip_detay=:detay,
    sip_ucret=:ucret,
    sip_alinan_ucret=:sip_alinan_ucret,

    yuzde=:yuzde
    WHERE sip_id={$_POST['sip_id']}");

  $guncelle=$siparisguncelle->execute(array(
    'isim' => $_POST['musteri_isim'],
    'mail' => $_POST['musteri_mail'],
    'telefon' => $_POST['musteri_telefon'],
    'baslik' => $_POST['sip_baslik'],
    'teslim_tarihi' => $_POST['sip_teslim_tarihi'],
    'aciliyet' => $_POST['sip_aciliyet'],
    'durum' => $_POST['sip_durum'],
    'detay' => $_POST['sip_detay'],
    'ucret' => $_POST['sip_ucret'],
    'sip_alinan_ucret' => $son_alinan,

    'yuzde' => $_POST['yuzde']
  ));


  if ($_FILES['sip_dosya']['error']=="0") {

    $yuklemeklasoru = '../dosyalar';
    @$gecici_isim = $_FILES['sip_dosya']["tmp_name"];
    @$dosya_ismi = $_FILES['sip_dosya']["name"];
    $benzersizsayi1=rand(10,1000);
    $isim1=$benzersizsayi1.$dosya_ismi;
    $isim=tum_bosluk_sil($isim1);
    @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");   


    if ($_POST['dosya_sil']=="sil") {
      $dosya_yolu="";
    } else {
      $dosya_yolu=$isim;
    };

    $dosyayukleme=$db->prepare("UPDATE siparis SET
      dosya_yolu=:dosya_yolu WHERE sip_id=:sip_id ");

    $yukleme=$dosyayukleme->execute(array(
      'dosya_yolu' => $dosya_yolu,
      'sip_id' => $_POST['sip_id']
    ));

  }

  if ($guncelle) {

   if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../siparisler?durum=ok");
   }

   exit;
 } else {
  if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız', 'hata' => implode(",", $siparisguncelle->errorInfo())]);
  } else {
   header("location:../siparisler?durum=no");
 }
 exit;
}
exit;
}


/********************************************************************************/


if (isset($_POST['profilguncelle'])) {
  if (yetkikontrol()!="yetkili" AND !$api) {
    header("location:../index.php");
    exit;
  }

  if ($api) {
    $_SESSION['kul_id']=guvenlik($_GET['kul_id']);
  }


  $profilguncelle=$db->prepare("UPDATE kullanicilar SET
    kul_isim=:isim,
    kul_mail=:mail,
    kul_telefon=:telefon,
    kul_unvan=:unvan,
    WHERE kul_id=:kul_id");
  $ekleme=$profilguncelle->execute(array(
    'isim' => $_POST['kul_isim'],
    'mail' => $_POST['kul_mail'],
    'telefon' => $_POST['kul_telefon'],
    'unvan' => $_POST['kul_unvan'],
    'kul_id' => $_SESSION['kul_id']
  ));

  if (strlen($_POST['kul_sifre'])>2) {

    $profilguncelle=$db->prepare("UPDATE kullanicilar SET
      kul_sifre=:kul_sifre,
      WHERE kul_id=:kul_id");
    $ekleme=$profilguncelle->execute(array(
      'kul_sifre' => sifreleme($_POST['kul_sifre']),
      'kul_id' => $_SESSION['kul_id']
    ));

  }


  if ($_FILES['kul_logo']['error']==0) {
   $yuklemeklasoru = '../dosyalar';
   @$gecici_isim = $_FILES['kul_logo']["tmp_name"];
   @$dosya_ismi = $_FILES['kul_logo']["name"];
   $benzersizsayi=rand(10000,99999).rand(10000,99999);
   $isim=tum_bosluk_sil($benzersizsayi.$dosya_ismi);
   @move_uploaded_file($gecici_isim, "$yuklemeklasoru/$isim");      

   $profilguncelle=$db->prepare("UPDATE kullanicilar SET
    kul_logo=:logo WHERE kul_id=:kul_id");
   $ekleme=$profilguncelle->execute(array(
    'kul_id' => $_SESSION['kul_id'],
    'logo' => $isim
  ));
 }

 if ($ekleme) {
   if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../profil?durum=ok");
   }
 } else {
  if ($api) {
   echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız','hata' => implode(",",$profilguncelle->errorInfo())]);
 } else {
  header("location:../profil?durum=no");
}
}
exit;


}


/********************************************************************************/



if (isset($_POST['siparissilme'])) {



  $sil=$db->prepare("DELETE from siparis where sip_id=:id");
  $kontrol=$sil->execute(array(
    'id' => guvenlik($_POST['sip_id'])
  ));

  if ($kontrol) {
   if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../siparisler?durum=ok");
   }
   exit;
 } else {
   if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız','hata' => implode(",",$sil->errorInfo())]);
  } else {
    header("location:../siparisler?durum=no");
  }
  exit;

}
}


/********************************************************************************/


if (isset($_POST['projesilme'])) {

  $sil=$db->prepare("DELETE from proje where proje_id=:id");
  $kontrol=$sil->execute(array(
    'id' => guvenlik($_POST['proje_id'])
  ));

  if ($kontrol) {
//echo "kayıt başarılı";
    if ($api) {
     echo json_encode(['durum' => 'ok']);
   } else {
     header("location:../projeler?durum=ok");
   }
   exit;
 } else {
//echo "kayıt başarısız";
  if ($api) {
    echo json_encode(['durum' => 'no','mesaj' => 'İşlem Başarısız','hata' => implode(",",$sil->errorInfo())]);
  } else {
    header("location:../projeler?durum=no");
  }
  exit;

}
}


/********************************************************************************/





if (isset($_POST['projeleri_getir'])) {
  if(!$api){
    echo json_encode(['durum' => 'no','mesaj'=>'API Bilgileriniz Eksik']);
  } else {

    if (isset($_POST['sirala'])) {
      $order="ORDER BY ".guvenlik($_POST['sirala']);
    } else {
      $order="";
    }

    if (isset($_POST['limit'])) {
      $limit="LIMIT ".guvenlik($_POST['limit']);
    } else {
      $limit="";
    }


    $x=$db->prepare("SELECT * FROM proje $order $limit");
    $x->execute();
    $sonuc=$x->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['durum' => 'ok', 'projeler' => $sonuc],JSON_NUMERIC_CHECK | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

  }
}


if (isset($_POST['siparisleri_getir'])) {
  if(!$api){
    echo json_encode(['durum' => 'no','mesaj'=>'API Bilgileriniz Eksik']);
  } else {

   if (isset($_POST['sirala'])) {
    $order="ORDER BY ".guvenlik($_POST['sirala']);
  } else {
    $order="";
  }

  if (isset($_POST['limit'])) {
    $limit="LIMIT ".guvenlik($_POST['limit']);
  } else {
    $limit="";
  }

  $x=$db->prepare("SELECT * FROM siparis $order $limit");
  $x->execute();
  $sonuc=$x->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode(['durum' => 'ok', 'siparisler' => $sonuc],JSON_NUMERIC_CHECK | JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

}
}








?>
