<?php 
ob_start();
session_start();
include 'baglan.php';
if (!empty($_FILES)) {


	$izinli_uz=array('jpg','gif','png','jpeg','heic');

	$eks=strtolower(substr($_FILES['file']["name"],strpos($_FILES['file']["name"],'.')+1));

	if(in_array($eks, $izinli_uz)===false) {
		echo "Bu uzantı kabul edilmiyor";
		exit;
	}

	
	$uploads_dir = '../../dimg/galeri';
	@$tmp_name = $_FILES['file']["tmp_name"];
	@$name = $_FILES['file']["name"];
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);

	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");



	$kaydet=$db->prepare("INSERT INTO instagaleri SET
		galeri_resimyol	=:galeri_resimyol
		");
	$insert=$kaydet->execute(array(
		'galeri_resimyol' => $refimgyol
		));
}
?>