<?php 
$host="localhost"; //Host adınızı girin varsayılan olarak Localhosttur eğer bilginiz yoksa bu şekilde bırakın
$veritabani_ismi="ahsapvad_reflex-istakip"; //Veritabanı İsminiz
$kullanici_adi="ahsapvad_reflex-istakip"; //Veritabanı kullanıcı adınız
$sifre="iJClW^Lj}T1{"; //Kullanıcı şifreniz şifre yoksa 123456789 yazan yeri silip boş bırakın

try {
	$db=new PDO("mysql:host=$host;dbname=$veritabani_ismi;charset=utf8",$kullanici_adi,$sifre);
	//echo "veritabanı bağlantısı başarılı";
}

catch (PDOExpception $e) {
	echo $e->getMessage();
}






?>
