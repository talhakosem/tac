<?php 
//include "nedmin/netting/baglan.php";
ob_start();

if(isset($_POST))
{
	$fiyat = $_POST['gelenDeger'];

	setcookie('urunFiyat', $fiyat, time() + 3600); // 1 saat



}

?>