<?php

ob_start();
session_start();

include 'baglan.php';
include '../production/fonksiyon.php';

if ( isset($_POST['kullanicikaydet']) ) {
	
	$kullanici_adsoyad		=	$_POST['kullanici_adsoyad']; 
	$kullanici_mail			=	$_POST['kullanici_mail']; 
	$kullanici_adres		=	$_POST['kullanici_adres']; 
	$kullanici_gsm			=	$_POST['kullanici_gsm'];

	$kullanici_passwordone	=	trim($_POST['kullanici_passwordone']); 
	$kullanici_passwordtwo	=	trim($_POST['kullanici_passwordtwo']); 

	if ( $kullanici_passwordone	==	$kullanici_passwordtwo ) {

		if (	strlen($kullanici_passwordone)	>=6	) {

			// Başlangıç
			$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
			));

			//dönen satır sayısını belirtir
			$say	=	$kullanicisor->rowCount();

			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password			=	md5($kullanici_passwordone);

				$kullanici_yetki	=	1;

				//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet	=	$db->prepare("INSERT INTO kullanici SET
					kullanici_adsoyad	=:kullanici_adsoyad,
					kullanici_mail		=:kullanici_mail,
					kullanici_password	=:kullanici_password,
					kullanici_adres		=:kullanici_adres,
					kullanici_gsm		=:kullanici_gsm,
					kullanici_yetki		=:kullanici_yetki
					");

				$insert		=	$kullanicikaydet->execute(array(
					'kullanici_adsoyad' 	=> $kullanici_adsoyad,
					'kullanici_mail' 		=> $kullanici_mail,
					'kullanici_password' 	=> $password,
					'kullanici_adres' 		=> $kullanici_adres,
					'kullanici_gsm'		 	=> $kullanici_gsm,
					'kullanici_yetki' 		=> $kullanici_yetki
				));

				if ($insert) {

					header("Location:../../index.php?durum=loginbasarili");

					//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {
					header("Location:../../kayit.php?durum=basarisiz");
				}

			} else {
				header("Location:../../kayit.php?durum=mukerrerkayit");
			}

			// Bitiş
		} else {
			header("Location:../../kayit.php?durum=farklisifre");
		}


	} else {
		header("Location:../../kayit.php?durum=eksiksifre");
	}

}



if ( isset($_POST['sliderkaydet']) ) {

	  

	$uploads_dir = '../../goz/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}



// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {

	  
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../goz/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],		
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
		));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
		));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}


// Slider Düzenleme Bitiş

if ($_GET['slidersil']=="ok") {
	  
	
	$sil=$db->prepare("DELETE from slider where slider_id=:slider_id");
	$kontrol=$sil->execute(array(
		'slider_id' => $_GET['slider_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_GET['slider_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}

}



if (isset($_POST['kategorifotoduzenle'])) {


  $uploads_dir = '../../goz/kategori';
  @$tmp_name = $_FILES['kate_resimyol']["tmp_name"];
  @$name = $_FILES['kate_resimyol']["name"];

  $benzersizsayi4=rand(20000,32000);
  $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

  @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

  $kategori_id=$_POST['kategori_id'];
  $kategori_seourl=seo($_POST['kategori_ad']);

  $duzenle=$db->prepare("UPDATE kategori SET
    kate_resimyol=:logo
    WHERE kategori_id={$_POST['kategori_id']}");
  $update=$duzenle->execute(array(
    'logo' => $refimgyol
  ));

  if ($update) {


    $resimsilunlink=$_POST['eski_yol'];
    unlink("../../$resimsilunlink");

    Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

  } else {

    Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
  }

}


if (isset($_POST['markakaydet'])) {
	  

	$uploads_dir = '../../goz/marka';
	@$tmp_name = $_FILES['marka_resimyol']["tmp_name"];
	@$name = $_FILES['marka_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO marka SET
		marka_ad=:ad,
		marka_sira=:marka_sira,
		marka_durum=:marka_durum,
		marka_resimyol=:marka_resimyol
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['marka_ad'],
		'marka_sira' => $_POST['marka_sira'],
		'marka_durum' => $_POST['marka_durum'],
		'marka_resimyol' => $refimgyol
	));

	if ($insert) {

		Header("Location:../production/marka.php?durum=ok");

	} else {

		Header("Location:../production/marka.php?durum=no");
	}




}



// marka Düzenleme Başla


if (isset($_POST['markaduzenle'])) {

	  
	if($_FILES['marka_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../goz/marka';
		@$tmp_name = $_FILES['marka_resimyol']["tmp_name"];
		@$name = $_FILES['marka_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE marka SET
			marka_ad=:ad,

			marka_sira=:sira,
			marka_durum=:durum,
			marka_resimyol=:resimyol	
			WHERE marka_id={$_POST['marka_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['marka_ad'],
			
			'sira' => $_POST['marka_sira'],
			'durum' => $_POST['marka_durum'],
			'resimyol' => $refimgyol,
		));
		

		$marka_id=$_POST['marka_id'];

		if ($update) {

			$resimsilunlink=$_POST['marka_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/marka-duzenle.php?marka_id=$marka_id&durum=ok");

		} else {

			Header("Location:../production/marka-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE marka SET

			marka_ad=:ad,
			marka_sira=:sira,
			marka_durum=:durum		
			WHERE marka_id={$_POST['marka_id']}");
		$update=$duzenle->execute(array(

			'ad' => $_POST['marka_ad'],
			'sira' => $_POST['marka_sira'],
			'durum' => $_POST['marka_durum']
		));

		$marka_id=$_POST['marka_id'];

		if ($update) {

			Header("Location:../production/marka-duzenle.php?marka_id=$marka_id&durum=ok");

		} else {

			Header("Location:../production/marka-duzenle.php?durum=no");
		}
	}

}


// marka Düzenleme Bitiş

if ($_GET['markasil']=="ok") {
	  
	$sil=$db->prepare("DELETE from marka where marka_id=:marka_id");
	$kontrol=$sil->execute(array(
		'marka_id' => $_GET['marka_id']
	));

	if ($kontrol) {

		$resimsilunlink=$_GET['marka_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/marka.php?durum=ok");

	} else {

		Header("Location:../production/marka.php?durum=no");
	}

}



if (isset($_POST['logoduzenle'])) {

	  

	$uploads_dir = '../../goz';

	@$tmp_name = $_FILES['ayar_logo']["tmp_name"];
	@$name = $_FILES['ayar_logo']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_logo=:logo
		");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if (isset($_POST['fotoduzenle'])) {

	  

	$uploads_dir = '../../goz/hakkimizda';

	@$tmp_name = $_FILES['hakkimizda_foto']["tmp_name"];
	@$name = $_FILES['hakkimizda_foto']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_foto=:foto
		WHERE hakkimizda_id=0");
	$update=$duzenle->execute(array(
		'foto' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		Header("Location:../production/hakkimizda.php?durum=no");
	}

}

if (isset($_POST['stajkaydet'])) {


	$ayarekle=$db->prepare("INSERT INTO stajyer SET
		name=:name,
		email=:email,
		website=:website,
		no=:no,
		message=:message
	");

	$insert=$ayarekle->execute(array(
		'name' => $_POST['name'],
		'email' => $_POST['email'],
		'website' => $_POST['website'],
		'no' => $_POST['no'],
		'message' => $_POST['message']
		

		
	));


	if ($insert) {

		Header("Location:../../bayi-basvurusu.php?durum=ok");

	} else {

		Header("Location:../../bayi-basvurusu.php?durum=no");
	}

}


if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=$_POST['kullanici_password'];

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 5
	));


	$kullanici 	= 	$kullanicisor->fetch(PDO::FETCH_ASSOC);

	$say		=	$kullanicisor->rowCount();

	unset( $kullanici['kullanici_password'] );
	

	if ($say==1) {


		foreach( $kullanici as $key => $value){
			$_SESSION[$key]		=	$value;
		}

// burda sessiona yetkiyi yazmamsizi ki sonra kontrol ediyoruz)))

		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../../login.php?durum=no");
		exit;
	}
	

}




if (isset($_POST['bayigiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=$_POST['kullanici_password'];

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 1
	));


	$kullanici 	= 	$kullanicisor->fetch(PDO::FETCH_ASSOC);

	$say		=	$kullanicisor->rowCount();

	unset( $kullanici['kullanici_password'] );
	

	if ($say==1) {


		foreach( $kullanici as $key => $value){
			$_SESSION[$key]		=	$value;
		}

// burda sessiona yetkiyi yazmamsizi ki sonra kontrol ediyoruz)))

		header("Location:../../fiyat.php");
		exit;



	} else {

		header("Location:../../bayi.php?durum=no");
		exit;
	}
	

}



if (isset($_POST['kullanicigiris'])) {
	
	$kullanici_mail		=	$_POST['kullanici_mail']; 
	$kullanici_password	=	md5($_POST['kullanici_password']); 

	$kullanicisor	=	$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
	));

	$kullanici 	= 	$kullanicisor->fetch(PDO::FETCH_ASSOC);

	$say		=	$kullanicisor->rowCount();

	unset( $kullanici['kullanici_password'] );

	if ( $say == 1 ) {

		foreach( $kullanici as $key => $value){
			$_SESSION[$key]		=	$value;
		}

		header("Location:../../");
		exit;

	} else {
		header("Location:../../?durum=basarisizgiris");
	}


}






if (isset($_POST['genelayarkaydet'])) {
	  
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_author=:ayar_author
		");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_author' => $_POST['ayar_author']
	));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}



if (isset($_POST['iletisimayarkaydet'])) {
	  
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_mail=:ayar_mail,
		ayar_adres=:ayar_adres

		");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_adres' => $_POST['ayar_adres']

	));


	if ($update) {

		header("Location:../production/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
	
}




if (isset($_POST['sosyalayarkaydet'])) {
	  
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_facebook=:ayar_facebook,
		ayar_linkedin=:ayar_linkedin,
		ayar_youtube=:ayar_youtube,
		ayar_pinterest=:ayar_pinterest,
		ayar_instagram=:ayar_instagram

		");

	$update=$ayarkaydet->execute(array(

		'ayar_facebook' => $_POST['ayar_facebook'],
		'ayar_linkedin' => $_POST['ayar_linkedin'],
		'ayar_youtube' => $_POST['ayar_youtube'],
		'ayar_pinterest' => $_POST['ayar_pinterest'],
		'ayar_instagram' => $_POST['ayar_instagram']
		
	));


	if ($update) {

		header("Location:../production/sosyal-ayar.php?durum=ok");

	} else {

		header("Location:../production/sosyal-ayar.php?durum=no");
	}
	
}




if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
	));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if (isset($_POST['kullanicibilgiguncelle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
		
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],

	));


	if ($update) {

		Header("Location:../../hesabim?durum=ok");

	} else {

		Header("Location:../../hesabim?durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {
	  
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	$kontrol=$sil->execute(array(
		'id' => $_GET['kullanici_id']
	));


	if ($kontrol) {


		header("location:../production/kullanici.php?sil=ok");


	} else {

		header("location:../production/kullanici.php?sil=no");

	}


}





if (isset($_POST['hakkimizdakaydet'])) {
	  
	//Tablo güncelleme işlemi kodları...
	$hakkimizdakaydet=$db->prepare("UPDATE hakkimizda SET
		
		hakkimizda_id=:hakkimizda_id,
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_madde1=:hakkimizda_madde1,
		hakkimizda_madde2=:hakkimizda_madde2,
		hakkimizda_madde3=:hakkimizda_madde3,
		hakkimizda_madde4=:hakkimizda_madde4,
		hakkimizda_kalite_baslik=:hakkimizda_kalite_baslik,
		hakkimizda_kalite=:hakkimizda_kalite,
		hakkimizda_misyon_baslik=:hakkimizda_misyon_baslik,
		hakkimizda_misyon=:hakkimizda_misyon,
		hakkimizda_vizyon_baslik=:hakkimizda_vizyon_baslik,
		hakkimizda_vizyon=:hakkimizda_vizyon



		WHERE hakkimizda_id=0");

	$update=$hakkimizdakaydet->execute(array(

		'hakkimizda_id' => $_POST['hakkimizda_id'],
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_madde1' => $_POST['hakkimizda_madde1'],
		'hakkimizda_madde2' => $_POST['hakkimizda_madde2'],
		'hakkimizda_madde3' => $_POST['hakkimizda_madde3'],
		'hakkimizda_madde4' => $_POST['hakkimizda_madde4'],
		'hakkimizda_kalite_baslik' => $_POST['hakkimizda_kalite_baslik'],
		'hakkimizda_kalite' => $_POST['hakkimizda_kalite'],
		'hakkimizda_misyon_baslik' => $_POST['hakkimizda_misyon_baslik'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon'],
		'hakkimizda_vizyon_baslik' => $_POST['hakkimizda_vizyon_baslik'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon']



		
	));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}


if (isset($_POST['kategoriduzenle'])) {
	  
	$kategori_id=$_POST['kategori_id'];
	$kategori_seourl=seo($_POST['kategori_ad']);


	
	
	$kaydet=$db->prepare("UPDATE kategori SET
		kategori_ust=:ust,
		kategori_ad=:ad,
		kategori_desc=:kategori_desc,
		kategori_durum=:kategori_durum,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		WHERE kategori_id={$_POST['kategori_id']}");
	$update=$kaydet->execute(array(
		'ust' => $_POST['kategori_ust'],
		'ad' => $_POST['kategori_ad'],
		'kategori_desc' => $_POST['kategori_desc'],
		'kategori_durum' => $_POST['kategori_durum'],
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
	));

	if ($update) {

		Header("Location:../production/kategori-duzenle.php?durum=ok&kategori_id=$kategori_id");

	} else {

		Header("Location:../production/kategori-duzenle.php?durum=no&kategori_id=$kategori_id");
	}

}


if (isset($_POST['kategoriekle'])) {
	  
	$uploads_dir = '../../goz';
	@$tmp_name = $_FILES['kate_resimyol']["tmp_name"];
	@$name = $_FILES['kate_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");


	$kategori_seourl=seo($_POST['kategori_ad']);

	$kaydet=$db->prepare("INSERT INTO kategori SET
		kategori_ust=:ust,
		kategori_ad=:ad,
		kategori_desc=:kategori_desc,
		kategori_durum=:kategori_durum,	
		kate_resimyol=:kate_resimyol,	
		kategori_seourl=:seourl,
		kategori_sira=:sira
		");
	$insert=$kaydet->execute(array(
		'ust' => $_POST['kategori_ust'],
		'ad' => $_POST['kategori_ad'],
		'kategori_desc' => $_POST['kategori_desc'],	
		'kategori_durum' => $_POST['kategori_durum'],
		'kate_resimyol' => $refimgyol,
		'seourl' => $kategori_seourl,
		'sira' => $_POST['kategori_sira']		
	));

	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}



if ($_GET['siparisdetay_id']=="ok") {

	$sil=$db->prepare("DELETE from siparis_detay where siparisdetay_id=:siparisdetay_id");
	$kontrol=$sil->execute(array(
		'siparisdetay_id' => $_GET['siparisdetay_id']
	));

	if ($kontrol) {

		Header("Location:../../sepet.php?durum=ok");

	} else {

		Header("Location:../../sepet.php?durum=no");
	}

}



if ($_GET['kategorisil']=="ok") {
	  
	$sil=$db->prepare("DELETE from kategori where kategori_id=:kategori_id");
	$kontrol=$sil->execute(array(
		'kategori_id' => $_GET['kategori_id']
	));

	if ($kontrol) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}

if ($_GET['urunsil']=="ok") {
	  
	$sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	$kontrol=$sil->execute(array(
		'urun_id' => $_GET['urun_id']
	));

	if ($kontrol) {

		$resimlerisil=$db->prepare("DELETE from urunfoto where urun_id=:urun_id");
		$bak=$resimlerisil->execute(array(
			'urun_id' => $_GET['urun_id']

		));

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}






if (isset($_POST['urunekle'])) {
	  
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_aciklamaust=:urun_aciklamaust,
		/*urun_detay=:urun_detay,*/
		urun_madde1=:urun_madde1,
		urun_madde2=:urun_madde2,
		urun_madde3=:urun_madde3,
		/*urun_aciklama1=:urun_aciklama1,*/
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,
		duba=:duba,
		duba_1=:duba_1,
		duba_2=:duba_2,
		duba_3=:duba_3,
		duba_4=:duba_4,
		duba_5=:duba_5,
		ray=:ray,
		ray_1=:ray_1,
		ray_2=:ray_2,
		ray_3=:ray_3,
		ray_4=:ray_4,
		madde=:madde,
		madde_1=:madde_1,
		madde_2=:madde_2,
		madde_3=:madde_3,
		madde_4=:madde_4,
		madde_5=:madde_5,
		deger_1=:deger_1,
		deger_2=:deger_2,
		deger_3=:deger_3,
		deger_4=:deger_4,
		deger_5=:deger_5,
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_aciklamaust' => $_POST['urun_aciklamaust'],
		/*'urun_detay' => $_POST['urun_detay'],*/
		'urun_madde1' => $_POST['urun_madde1'],
		'urun_madde2' => $_POST['urun_madde2'],
		'urun_madde3' => $_POST['urun_madde3'],
		/*'urun_aciklama1' => $_POST['urun_aciklama1'],*/
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'duba' => $_POST['duba'],
		'duba_1' => $_POST['duba_1'],
		'duba_2' => $_POST['duba_2'],
		'duba_3' => $_POST['duba_3'],
		'duba_4' => $_POST['duba_4'],
		'duba_5' => $_POST['duba_5'],
		'ray' => $_POST['ray'],
		'ray_1' => $_POST['ray_1'],
		'ray_2' => $_POST['ray_2'],
		'ray_3' => $_POST['ray_3'],
		'ray_4' => $_POST['ray_4'],
		'madde' => $_POST['madde'],
		'madde_1' => $_POST['madde_1'],
		'madde_2' => $_POST['madde_2'],
		'madde_3' => $_POST['madde_3'],
		'madde_4' => $_POST['madde_4'],
		'madde_5' => $_POST['madde_5'],
		'deger_1' => $_POST['deger_1'],
		'deger_2' => $_POST['deger_2'],
		'deger_3' => $_POST['deger_3'],
		'deger_4' => $_POST['deger_4'],
		'deger_5' => $_POST['deger_5'],
		'seourl' => $urun_seourl

	));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}

if (isset($_POST['urunduzenle'])) {
	  
	$urun_id=$_POST['urun_id'];
	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("UPDATE urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_aciklamaust=:urun_aciklamaust,
		/*urun_detay=:urun_detay,*/
		urun_madde1=:urun_madde1,
		urun_madde2=:urun_madde2,
		urun_madde3=:urun_madde3,
		urun_onecikar=:urun_onecikar,
		/*urun_aciklama1=:urun_aciklama1,*/
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,
		duba=:duba,
		duba_1=:duba_1,
		duba_2=:duba_2,
		duba_3=:duba_3,
		duba_4=:duba_4,
		duba_5=:duba_5,
		ray=:ray,
		ray_1=:ray_1,
		ray_2=:ray_2,
		ray_3=:ray_3,
		ray_4=:ray_4,
		madde=:madde,
		madde_1=:madde_1,
		madde_2=:madde_2,
		madde_3=:madde_3,
		madde_4=:madde_4,
		madde_5=:madde_5,
		deger_1=:deger_1,
		deger_2=:deger_2,
		deger_3=:deger_3,
		deger_4=:deger_4,
		deger_5=:deger_5,
		urun_seourl=:seourl		
		WHERE urun_id={$_POST['urun_id']}");
	$update=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_aciklamaust' => $_POST['urun_aciklamaust'],
		/*'urun_detay' => $_POST['urun_detay'],*/
		'urun_madde1' => $_POST['urun_madde1'],
		'urun_madde2' => $_POST['urun_madde2'],
		'urun_madde3' => $_POST['urun_madde3'],
		'urun_onecikar' => $_POST['urun_onecikar'],
		/*'urun_aciklama1' => $_POST['urun_aciklama1'],*/
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],		
		'duba' => $_POST['duba'],
		'duba_1' => $_POST['duba_1'],
		'duba_2' => $_POST['duba_2'],
		'duba_3' => $_POST['duba_3'],
		'duba_4' => $_POST['duba_4'],
		'duba_5' => $_POST['duba_5'],
		'ray' => $_POST['ray'],
		'ray_1' => $_POST['ray_1'],
		'ray_2' => $_POST['ray_2'],
		'ray_3' => $_POST['ray_3'],
		'ray_4' => $_POST['ray_4'],
		'madde' => $_POST['madde'],
		'madde_1' => $_POST['madde_1'],
		'madde_2' => $_POST['madde_2'],
		'madde_3' => $_POST['madde_3'],
		'madde_4' => $_POST['madde_4'],
		'madde_5' => $_POST['madde_5'],
		'deger_1' => $_POST['deger_1'],
		'deger_2' => $_POST['deger_2'],
		'deger_3' => $_POST['deger_3'],
		'deger_4' => $_POST['deger_4'],
		'deger_5' => $_POST['deger_5'],
		'seourl' => $urun_seourl

	));

	if ($update) {

		Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");

	} else {

		Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
	}

}



if ($_GET['yazisil']=="ok") {
	  
	
	$sil=$db->prepare("DELETE from yazi where yazi_id=:yazi_id");
	$kontrol=$sil->execute(array(
		'yazi_id' => $_GET['yazi_id']
	));

	if ($kontrol) {


		$resimsilunlink=$_GET['blog_resimyol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/yazi.php?durum=ok");

	} else {

		Header("Location:../production/yazi.php?durum=no");
	}

}



if (isset($_POST['yaziekle'])) {
	  

	$uploads_dir = '../../goz/yazi';
	@$tmp_name = $_FILES['blog_resimyol']["tmp_name"];
	@$name = $_FILES['blog_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$yazi_seourl=seo($_POST['yazi_ad']);

	$kaydet=$db->prepare("INSERT INTO yazi SET
		
		blog_resimyol=:blog_resimyol,
		yazi_ad=:yazi_ad,
		yazi_detay=:yazi_detay,		
		yazi_description=:yazi_description,
		yazi_keyword=:yazi_keyword,
		yazi_durum=:yazi_durum,
		kategori_id=:kategori_id,
		yazi_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		
		'blog_resimyol' => $refimgyol,
		'yazi_ad' => $_POST['yazi_ad'],
		'yazi_detay' => $_POST['yazi_detay'],
		'yazi_description' => $_POST['yazi_description'],    	
		'yazi_keyword' => $_POST['yazi_keyword'],
		'yazi_durum' => $_POST['yazi_durum'],
		'kategori_id' => $_POST['kategori_id'],
		'seourl' => $yazi_seourl

	));

	if ($insert) {

		Header("Location:../production/yazi.php?durum=ok");

	} else {

		Header("Location:../production/yazi.php?durum=no");
	}

}


if (isset($_POST['yazifotoduzenle'])) {


	$izinli_uz=array('jpg','gif','png','jpeg','webp');

	$eks=strtolower(substr($_FILES['blog_resimyol']["name"],strpos($_FILES['blog_resimyol']["name"],'.')+1));

	if(in_array($eks, $izinli_uz)===false) {
		echo "Bu uzantı kabul edilmiyor";
		exit;
	}


	  

	$uploads_dir = '../../goz/yazi';

	@$tmp_name = $_FILES['blog_resimyol']["tmp_name"];
	@$name = $_FILES['blog_resimyol']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	$yazi_id=$_POST['yazi_id'];
	$yazi_seourl=seo($_POST['yazi_ad']);

	$duzenle=$db->prepare("UPDATE yazi SET
		blog_resimyol=:logo
		WHERE yazi_id={$_POST['yazi_id']}");
	$update=$duzenle->execute(array(
		'logo' => $refimgyol
	));

	if ($update) {


		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/yazi-duzenle.php?durum=ok&yazi_id=$yazi_id");

	} else {

		Header("Location:../production/yazi-duzenle.php?durum=no&yazi_id=$yazi_id");
	}

}


if (isset($_POST['yaziduzenle'])) {
	  


	$yazi_id=$_POST['yazi_id'];
	$yazi_seourl=seo($_POST['yazi_ad']);

	$kaydet=$db->prepare("UPDATE yazi SET

		yazi_ad=:yazi_ad,
		yazi_detay=:yazi_detay,	
		yazi_onecikar=:yazi_onecikar,
		yazi_description=:yazi_description,	
		yazi_keyword=:yazi_keyword,
		yazi_durum=:yazi_durum,
		kategori_id=:kategori_id,
		yazi_seourl=:seourl	
		WHERE yazi_id={$_POST['yazi_id']}");
	$update=$kaydet->execute(array(

		'yazi_ad' => $_POST['yazi_ad'],
		'yazi_detay' => $_POST['yazi_detay'],
		'yazi_onecikar' => $_POST['yazi_onecikar'],
		'yazi_description' => $_POST['yazi_description'],
		'yazi_keyword' => $_POST['yazi_keyword'],
		'yazi_durum' => $_POST['yazi_durum'],
		'kategori_id' => $_POST['kategori_id'],
		'seourl' => $yazi_seourl

	));

	if ($update) {


		Header("Location:../production/yazi-duzenle.php?durum=ok&yazi_id=$yazi_id");

	} else {

		Header("Location:../production/yazi-duzenle.php?durum=no&yazi_id=$yazi_id");
	}

	

}

if ($_GET['yazi_onecikar']=="ok") {

	

	
	$duzenle=$db->prepare("UPDATE yazi SET
		
		yazi_onecikar=:yazi_onecikar
		
		WHERE yazi_id={$_GET['yazi_id']}");
	
	$update=$duzenle->execute(array(


		'yazi_onecikar' => $_GET['yazi_one']
	));



	if ($update) {

		

		Header("Location:../production/yazi.php?durum=ok");

	} else {

		Header("Location:../production/yazi.php?durum=no");
	}

}




if (isset($_POST['yorumlarkaydet'])) {

	$gelen_url=$_POST['gelen_url'];

	$ayarekle=$db->prepare("INSERT INTO yazyorum SET
		yorum_yapan=:yorum_yapan,
		yorum_mail=:yorum_mail,
		yorum_detay=:yorum_detay,
		yazi_id=:yazi_id
		");

	$insert=$ayarekle->execute(array(
		'yorum_yapan' => $_POST['yorum_yapan'],
		'yorum_mail' => $_POST['yorum_mail'],
		'yorum_detay' => $_POST['yorum_detay'],
		'yazi_id' => $_POST['yazi_id']
		
		
	));


	if ($insert) {

		Header("Location:$gelen_url?durum=ok");

	} else {

		Header("Location:$gelen_url?durum=no");
	}

}


if (isset($_POST['yorumkaydet'])) {


	$gelen_url=$_POST['gelen_url'];

	$ayarekle=$db->prepare("INSERT INTO yorumlar SET
		yorum_detay=:yorum_detay,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id

		
		");

	$insert=$ayarekle->execute(array(
		'yorum_detay' => $_POST['yorum_detay'],
		'kullanici_id' => $_POST['kullanici_id'],
		'urun_id' => $_POST['urun_id']

	));


	if ($insert) {

		Header("Location:$gelen_url?durum=ok");

	} else {

		Header("Location:$gelen_url?durum=no");
	}

}


if ($_GET['yazyorumsil']=="ok") {
	  
	$sil=$db->prepare("DELETE from yazyorum where yorum_id=:yorum_id");
	$kontrol=$sil->execute(array(
		'yorum_id' => $_GET['yorum_id']
	));

	if ($kontrol) {

		
		Header("Location:../production/yazyorum.php?durum=ok");

	} else {

		Header("Location:../production/yazyorum.php?durum=no");
	}

}




if (isset($_POST['yorumdankaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$yorumkaydet=$db->prepare("INSERT INTO yorum SET
		
		yorum_id=:yorum_id,
		yorum_ad=:yorum_ad,
		yorum_tel=:yorum_tel,
		yorum_email=:yorum_email,

		yorum_detay=:yorum_detay
		");

	$insert=$yorumkaydet->execute(array(

		'yorum_id' => $_POST['yorum_id'],
		'yorum_ad' => $_POST['yorum_ad'],
		'yorum_tel' => $_POST['yorum_tel'],
		'yorum_email' => $_POST['yorum_email'],
		
		'yorum_detay' => $_POST['yorum_detay']
		
		
		
		

		
	));


	if ($insert) {

		header("Location:../../hakkimizda.php?durum=ok");

	} else {

		header("Location:../../hakkimizda.php?durum=no");
	}
	
}


if (isset($_POST['sepetekle'])) {

	ob_start();

	if( !isset($_SESSION['sepet']) || count($_SESSION['sepet']) == 0 ){
		$_SESSION['sepet']	=	array();
	}

	$sepet_son_bos_urun_index	= 	count($_SESSION['sepet']);

	$_SESSION['sepet'][ $sepet_son_bos_urun_index ]	=	[
		'urun_adet' 	=>	$_POST['urun_adet'],
		'urun_id'		=>	$_POST['urun_id'],
		'urun_fiyat'	=>	$_POST['urun_fiyat']
	];

	if( isset($_POST['secilen']) ){
		$_SESSION['sepet'][ $sepet_son_bos_urun_index ]['urun_varyasyon']	= $_POST['secilen'];
	}

	if( isset($_SESSION['kullanici_id']) ){
		$_SESSION['sepet'][ $sepet_son_bos_urun_index ]['kullanici_id']	= $_SESSION['kullanici_id'];
	}

	if ($_SESSION['sepet']) {
		header("Location:../../sepet?durum=ok");
	} else {
		header("Location:../../sepet?durum=no");
	}
	ob_end_flush();
}




if ($_GET['urun_onecikar']=="ok") {

	  

	
	$duzenle=$db->prepare("UPDATE urun SET
		
		urun_onecikar=:urun_onecikar
		
		WHERE urun_id={$_GET['urun_id']}");
	
	$update=$duzenle->execute(array(


		'urun_onecikar' => $_GET['urun_one']
	));



	if ($update) {

		

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}

if ($_GET['yorum_onay']=="ok") {

	  
	$duzenle=$db->prepare("UPDATE yorumlar SET
		
		yorum_onay=:yorum_onay
		
		WHERE yorum_id={$_GET['yorum_id']}");
	
	$update=$duzenle->execute(array(

		'yorum_onay' => $_GET['yorum_one']
	));



	if ($update) {

		

		Header("Location:../production/yorum.php?durum=ok");

	} else {

		Header("Location:../production/yorum.php?durum=no");
	}

}



if ($_GET['siparis_odeme']=="ok") {
	  

	$duzenleme=$db->prepare("UPDATE siparis SET
		
		siparis_odeme=:siparis_odeme
		
		WHERE siparis_id={$_GET['siparis_id']}");
	
	$update=$duzenleme->execute(array(

		'siparis_odeme' => $_GET['siparis_one']
	));



	if ($update) {

		

		Header("Location:../production/siparis.php?durum=ok");

	} else {

		Header("Location:../production/siparis.php?durum=no");
	}

}



if ($_GET['yorumsil']=="ok") {
	  
	$sil=$db->prepare("DELETE from yorumlar where yorum_id=:yorum_id");
	$kontrol=$sil->execute(array(
		'yorum_id' => $_GET['yorum_id']
	));

	if ($kontrol) {

		
		Header("Location:../production/yorum.php?durum=ok");

	} else {

		Header("Location:../production/yorum.php?durum=no");
	}

}


if ($_GET['yorumdansil']=="ok") {
	  
	$sil=$db->prepare("DELETE from yorum where yorum_id=:yorum_id");
	$kontrol=$sil->execute(array(
		'yorum_id' => $_GET['yorum_id']
	));

	if ($kontrol) {

		
		Header("Location:../production/yorumdan.php?durum=ok");

	} else {

		Header("Location:../production/yorumdan.php?durum=no");
	}

}


if (isset($_POST['bankaekle'])) {
	  
	$kaydet=$db->prepare("INSERT INTO banka SET
		banka_ad=:ad,
		banka_durum=:banka_durum,	
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		");
	$insert=$kaydet->execute(array(
		'ad' => $_POST['banka_ad'],
		'banka_durum' => $_POST['banka_durum'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_iban' => $_POST['banka_iban']		
	));

	if ($insert) {

		Header("Location:../production/banka.php?durum=ok");

	} else {

		Header("Location:../production/banka.php?durum=no");
	}

}


if (isset($_POST['bankaduzenle'])) {
	  

	$banka_id=$_POST['banka_id'];

	$kaydet=$db->prepare("UPDATE banka SET

		banka_ad=:ad,
		banka_durum=:banka_durum,	
		banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_iban=:banka_iban
		WHERE banka_id={$_POST['banka_id']}");
	$update=$kaydet->execute(array(
		'ad' => $_POST['banka_ad'],
		'banka_durum' => $_POST['banka_durum'],
		'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_iban' => $_POST['banka_iban']		
	));

	if ($update) {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");

	} else {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}


	

}


if ($_GET['bankasil']=="ok") {
	  
	$sil=$db->prepare("DELETE from banka where banka_id=:banka_id");
	$kontrol=$sil->execute(array(
		'banka_id' => $_GET['banka_id']
	));

	if ($kontrol) {

		
		Header("Location:../production/banka.php?durum=ok");

	} else {

		Header("Location:../production/banka.php?durum=no");
	}

}




if ($_GET['siparissil']=="ok") {
	
	$sepet_index	= $_GET['sepet_id'];

	if($_SESSION['sepet'][$sepet_index]){
		unset($_SESSION['sepet'][$sepet_index]);
		header("Location:../../sepet.php?durum=ok");

		return;
	}

	header("Location:../../sepet.php?durum=no");

}


//Sipariş İşlemleri

if (isset($_POST['bankasiparisekle'])) {

	$siparis_adres	=	[
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_mail' 	=> $_POST['kullanici_mail'],
		'kullanici_gsm' 	=> $_POST['kullanici_gsm'],
		'kullanici_adres' 	=> $_POST['kullanici_adres']
	];

	$siparis_tip	=	"Banka Havalesi";

	$siparis_query		=	$db->prepare("INSERT INTO siparis SET
		kullanici_id	=:kullanici_id,
		siparis_tip		=:siparis_tip,	
		siparis_banka	=:siparis_banka,
		siparis_toplam	=:siparis_toplam,
		siparis_adres	=:siparis_adres
		");

	$siparis_insert		=	$siparis_query->execute(array(
		'kullanici_id' 		=> isset($_SESSION['kullanici_id']) ? $_SESSION['kullanici_id'] : null,
		'siparis_tip' 		=> $siparis_tip,
		'siparis_banka' 	=> $_POST['siparis_banka'],
		'siparis_toplam'	=> $_POST['siparis_toplam'],		
		'siparis_adres'		=> json_encode($siparis_adres, JSON_UNESCAPED_UNICODE)	
	));

	if ($siparis_insert) {

		//Sipariş başarılı kaydedilirse...
		$siparis_id 	= 	$db->lastInsertId();

		$inserted_row 	= 	$db->query("SELECT * FROM siparis WHERE siparis_id = '{$siparis_id}'")->fetch(PDO::FETCH_ASSOC);
		
		if(empty($_SESSION['siparis'])){
			$_SESSION['siparis'] = [];
		}

		$siparis_count	=	count($_SESSION['siparis']);

		$_SESSION['siparis'][$siparis_count] = [
			'siparis_id'		=>	$inserted_row['siparis_id'],
			'siparis_zaman'		=>	$inserted_row['siparis_zaman'],
			'siparis_tip'		=>	$inserted_row['siparis_tip'],
			'siparis_toplam'	=>	$inserted_row['siparis_toplam'],
			'siparis_adres'		=>	$inserted_row['siparis_adres'],
		];

		foreach( $_SESSION['sepet'] as $sepetcek) {

			$urun_id		=	(int)$sepetcek['urun_id']; 
			$urun_adet		=	(int)$sepetcek['urun_adet'];
			$urun_fiyat		=	$sepetcek['urun_fiyat'];

			$insert_sql	=	"INSERT INTO siparis_detay SET
			siparis_id	=:siparis_id,
			urun_id		=:urun_id,	
			urun_fiyat	=:urun_fiyat,
			urun_adet	=:urun_adet
			";

			$insert_array	=	array(
				'siparis_id' 		=> $siparis_id,
				'urun_id' 			=> $urun_id,
				'urun_fiyat' 		=> $urun_fiyat,
				'urun_adet' 		=> $urun_adet,
			);

			if( $sepetcek['urun_varyasyon'] ){
				$insert_sql 					= 	$insert_sql . ",urun_varyasyon	=:urun_varyasyon ";
				$insert_array['urun_varyasyon'] =  	$sepetcek['urun_varyasyon'];
			}
			
			$siparis_detay_query	=	$db->prepare( $insert_sql );

			$siparis_detay_insert	=	$siparis_detay_query->execute( $insert_array );
		}

		//Sipariş detay kayıtta başarıysa sepeti boşalt

		unset($_SESSION['sepet']);

		header("Location:../../siparislerim?durum=ok");
		exit;

	} else {
		echo "başarısız";

		//Header("Location:../production/siparis.php?durum=no");
	}

}


if(isset($_POST['urunfotosil'])) {
	  
	$urun_id=$_POST['urun_id'];

	echo $checklist = $_POST['urunfotosec'];

	foreach($checklist as $list) {

		$sil=$db->prepare("DELETE from urunfoto where urunfoto_id=:urunfoto_id");
		$kontrol=$sil->execute(array(
			'urunfoto_id' => $list
		));
	}
	$dosya = $_POST['urunfoto_resimyol'];

	foreach ($dosya as $resimyol) {

		unlink("../../$resimyol");

	}

	if ($kontrol) {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=ok");

	} else {

		Header("Location:../production/urun-galeri.php?urun_id=$urun_id&durum=no");
	}


} 




if (isset($_POST['ikonduzenle'])) {

	  

	$uploads_dir = '../../goz';

	@$tmp_name = $_FILES['ayar_ikon']["tmp_name"];
	@$name = $_FILES['ayar_ikon']["name"];

	$benzersizsayi4=rand(20000,32000);
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");

	
	$duzenle=$db->prepare("UPDATE ayar SET
		ayar_ikon=:ayar_ikon
		");
	$update=$duzenle->execute(array(
		'ayar_ikon' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");

		Header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		Header("Location:../production/genel-ayar.php?durum=no");
	}

}


if ($_GET['urun_stok']=="ok") {

	  

	
	$duzenle=$db->prepare("UPDATE urun SET
		
		urun_stok=:urun_stok
		
		WHERE urun_id={$_GET['urun_id']}");
	
	$update=$duzenle->execute(array(


		'urun_stok' => $_GET['urun_sto']
	));



	if ($update) {

		

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}

}

if (isset($_POST['mailayarkaydet'])) {
	
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_smtphost=:smtphost,
		ayar_smtpuser=:smtpuser,
		ayar_smtppassword=:smtppassword,
		ayar_smtpport=:smtpport
		");
	$update=$ayarkaydet->execute(array(
		'smtphost' => $_POST['ayar_smtphost'],
		'smtpuser' => $_POST['ayar_smtpuser'],
		'smtppassword' => $_POST['ayar_smtppassword'],
		'smtpport' => $_POST['ayar_smtpport']
	));

	if ($update) {

		Header("Location:../production/mail-ayarlar.php?durum=ok");

	} else {

		Header("Location:../production/mail-ayarlar.php?durum=no");
	}

}



if (isset($_POST['kullanicisifreguncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
	));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
				));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}





		// Bitiş



			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	}

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}


if (isset($_POST['musterimailleri'])) {
	
	//Tablo güncelleme işlemi kodları...
	$yorumkaydet=$db->prepare("INSERT INTO email SET
		
		musteri_mail=:musteri_mail
		");

	$insert=$yorumkaydet->execute(array(

		
		'musteri_mail' => $_POST['musteri_mail']
		
		
	));


	if ($insert) {

		header("Location:../../index.php?durum=ok");

	} else {

		header("Location:../../index.php?durum=no");
	}
	
}





//Ürün Foto Sil
if(isset($_POST['instafotosil'])) {

	$checklist = $_POST["instagalerisec"];
	foreach($checklist as $list) {
		$cekelim=$db->prepare("SELECT * from instagaleri where galeri_id='".$list."'");
		$cekelim->execute();

		$sil=$db->prepare("DELETE from instagaleri where galeri_id=:list");
		$kontrol=$sil->execute(array('list' => $list));
		while($resim=$cekelim->fetch(PDO::FETCH_ASSOC)){
			$galeri_resimyol=$resim["galeri_resimyol"];
			unlink("../../$galeri_resimyol");
		}
	}
	if ($list) {
		Header("Location:../production/insta-galeri.php?durum=ok");
	} else {
		Header("Location:../production/insta-galeri.php?durum=no");
	}
} 
//Ürün Foto Sil Son





if (isset($_POST['gelenfotoid'])) {
	  

	$galeri_id=$_POST['galeri_id'];


		$hakkimizdakaydet=$db->prepare("UPDATE instagaleri SET
		
		urun_id=:urun_id

		WHERE galeri_id={$_POST['galeri_id']}");

	$update=$hakkimizdakaydet->execute(array(

		'urun_id' => $_POST['urun_id']

	));
	if ($update) {
		header("Location:../production/insta-foto-duzenle.php?durum=ok");

	} else {

		header("Location:../production/insta-foto-duzenle.php?durum=no");
	}
	
}

?>