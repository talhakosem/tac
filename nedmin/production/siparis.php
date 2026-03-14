<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$siparissor=$db->prepare("SELECT * FROM siparis order by siparis_odeme ASC");
$siparissor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

	<div class="clearfix"></div>
	<div class="row">
	  <div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
		  <div class="x_title">
			<h2>Sipariş Listeleme <small>

			  <?php 

			  if ($_GET['durum']=="ok") {?>

				<b style="color:green;">İşlem Başarılı...</b>

			  <?php } elseif ($_GET['durum']=="no") {?>

				<b style="color:red;">İşlem Başarısız...</b>

			  <?php }

			  ?>


			</small></h2>

			<div class="clearfix"></div>


		  </div>
		  <div class="x_content">


			<!-- Div İçerik Başlangıç -->

			<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
			  <thead>
				<tr>
				  <th>S.Sayı</th>
				  <th>Sipariş No</th>
				  <th>Müşteri</th>
				  <th>Sipariş Zamanı</th>
				  <th>Tutar</th>
				  <th>Durum</th>
				  <th></th>                 
				</tr>
			  </thead>

			  <tbody>

				<?php 

				$say=0;

				while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++


				  ?>


				  <tr>
				   <td width="20"><?php echo $say ?></td>


				   <td>

					<?php echo $sipariscek['siparis_id'] ?> <br> 

						<?php

						$siparis_id = $sipariscek['siparis_id'];
						$detaysor   = $db->prepare("SELECT * FROM siparis_detay where siparis_id=:siparis_id");

						$detaysor->execute(array(
							'siparis_id' => $siparis_id
						));

						while($detaycek=$detaysor->fetch(PDO::FETCH_ASSOC)) {

							echo $detaycek['urun_adet'];  echo " adet ";

							$urun_id	=	$detaycek['urun_id'];
							$urunsor	=	$db->prepare("SELECT * FROM urun where urun_id=:urun_id");
							$urunsor->execute(array(
								'urun_id' => $urun_id
							));
							$uruncek	=	$urunsor->fetch(PDO::FETCH_ASSOC);
							echo  $uruncek['urun_ad']; 
							echo "<br>"; 
							echo  $detaycek['urun_varyasyon']; 
							echo "<br>"; 
						}
						?>   
					</td>


				  <td>
				  <?php 

					$siparis_adres	=	json_decode( $sipariscek['siparis_adres'], true );

				  ?>
				   İsim:<?php echo $siparis_adres['kullanici_adsoyad'] ?>
				  <br> Mail:<?php echo $siparis_adres['kullanici_mail'] ?>
				  <br> Tel :<?php echo $siparis_adres['kullanici_gsm'] ?>
				  <br> Adres:<?php echo $siparis_adres['kullanici_adres'] ?>
				</td>


				<td><?php echo $sipariscek['siparis_zaman'] ?> </td>
				<td><?php echo $sipariscek['siparis_toplam'] ?> </td>
				<td><?php echo $sipariscek['siparis_tip'] ?>  <?php  $banka_id=$sipariscek['siparis_banka'];

				$bankasor=$db->prepare("SELECT * FROM banka where banka_id=:id");
				$bankasor->execute(array(
				  'id' => $banka_id
				));

				$bankacek=$bankasor->fetch(PDO::FETCH_ASSOC);

				echo $bankacek['banka_ad']; ?> </td>



				<td><center><?php 

				if ($sipariscek['siparis_odeme']==0) {?>

				 <a href="../netting/islem.php?siparis_id=<?php echo $sipariscek['siparis_id'] ?>&siparis_one=1&siparis_odeme=ok"><button class="btn btn-warning btn-xs">Yeni Sipariş</button></a>


			   <?php } elseif ($sipariscek['siparis_odeme']==1) {?>


				 <a href="../netting/islem.php?siparis_id=<?php echo $sipariscek['siparis_id'] ?>&siparis_one=0&siparis_odeme=ok"><button class="btn btn-success btn-xs">Tamamlandı</button></a>

			   <?php } ?>


			 </center></td>







		   </tr>



		 <?php  }

		 ?>


	   </tbody>
	 </table>

	 <!-- Div İçerik Bitişi -->


   </div>
 </div>
</div>
</div>




</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
