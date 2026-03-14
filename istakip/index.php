<?php 
include 'header.php';
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<div class="container-fluid p-2">
	
										



	<div class="row">

		<?php 
			$kullanici_id=$kullanicicek["kul_id"];
			$verisor=$db->prepare("SELECT * FROM proje where proje_durum = '3' and kullanici_id=:kul_id");
			$verisor->execute(['kul_id' => $kullanici_id]);

			while ($vericek=$verisor->fetch(PDO::FETCH_ASSOC)) { 
			?>
			
			
			<div class="col-xl-3 col-md-6 mb-4">
				<div class="card border-left-<?php 	if ($vericek['proje_aciliyet']==0) {echo "danger";} elseif ($vericek['proje_aciliyet']==1) {echo "primary";}  ?> shadow h-100 py-2">
					<a href="projeduzenle.php?proje_id=<?php echo $vericek['proje_id']; ?>"><div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class=" font-weight-bold text-primary text-uppercase mb-1">
									<b>	<?php echo $vericek['firma_baslik'] ?></b></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-edit fa-2x text-gray-300"></i>
							</div>
						</div>
					</div></a>
				</div>
			</div>

<?php 	} ?>
</div>
	<hr>



		<div class="row" style="margin-bottom: -20px;">

			<?php 
			$projesayisor=$db->prepare("SELECT proje_id FROM proje where proje_durum = '3' and kullanici_id=:kul_id ");
			$projesayisor->execute(['kul_id' => $kullanici_id]);
			$projesayisi = $projesayisor->rowCount();
			?>
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Aktif Proje <b>Sayısı</b></div>
								<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php 
			$proje_biten_sayi_sor=$db->prepare("SELECT proje_id FROM proje WHERE proje_durum='4' and kullanici_id=:kul_id");
			$proje_biten_sayi_sor->execute(['kul_id' => $kullanici_id]);
			$alinan_say = $proje_biten_sayi_sor->rowCount();
			?>
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Alınan <b>İşler</b> </div>
								<div class="h4 mb-0 font-weight-bold text-gray-800">
									<?php echo 
									$alinan_say; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php 
				$projesayisor=$db->prepare("SELECT proje_id FROM proje WHERE  kullanici_id=:kul_id");
				$projesayisor->execute(['kul_id' => $kullanici_id]);
				$projesayisi = $projesayisor->rowCount();
				?>
				<div class="col-xl-2 col-md-6 mb-4">
					<div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Şuana Kadar Alınan Proje  <b>Sayısı</b></div>
									<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $projesayisi; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-list fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>



				<?php 
				$proje_biten_sayi_sor2=$db->prepare("SELECT proje_id FROM proje WHERE proje_durum='5' and kullanici_id=:kul_id");
				$proje_biten_sayi_sor2->execute(['kul_id' => $kullanici_id]);
				$kaybedilen_say = $proje_biten_sayi_sor2->rowCount();
				?>

				<div class="col-xl-2 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kaybedilen <b>İşler</b> </div>
									<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $kaybedilen_say; ?></div>
								</div>
								<div class="col-auto">
									<i class="fas fa-times fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>


				<?php 
				$projectMoney=$db->prepare("SELECT SUM(proje_ucret) AS proje_ucreti FROM proje where proje_durum != '4' and proje_durum != '5'  and kullanici_id=:kul_id");
				$projectMoney->execute(['kul_id' => $kullanici_id]);
				$projectMoneyWrite= $projectMoney->fetch(PDO::FETCH_ASSOC); ?>

				<div class="col-xl-4 col-md-6 mb-4">
					<div class="card border-left-danger shadow h-100 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Projeler de Bekleyen <b>Para</b> </div>
									<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo number_format($projectMoneyWrite["proje_ucreti"],2,',','.'); ?></div>
								</div>
								<div class="col-auto">								
									<i class="fas fa-lira-sign fa-2x text-gray-300"></i>
								</div>
							</div>
						</div>
					</div>
				</div>	
			</div>

			<hr style="margin-bottom: 15px !important;">


			<!--Projeler Giriş-->
			<div class="row">
			<div class="col-md-12">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h5 class="m-0 font-weight-bold text-primary text-center">Projeler</h5>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr> 
										<th>Müşteri İsim</th>
										<th>Yapılacak İş</th>
										<th>Başlangıç Tarihi</th>
										<th>Geçen Zaman</th>
										<th>Aciliyet</th>

									</tr>
								</thead>
								<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
								<tbody>
									<?php 

										date_default_timezone_set('Etc/GMT-3');
									$say=0;
									$projesor=$db->prepare("SELECT * FROM proje where proje_durum = '3' and kullanici_id=:kul_id ORDER BY proje_id DESC");
									$projesor->execute(['kul_id' => $kullanici_id]);
									while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

										<tr>
											<td><?php echo $projecek['musteri_isim']; ?></td>
											<td><?php echo $projecek['proje_baslik']; ?></td>
											<td><?php echo date('d.m.Y', $projecek['proje_baslama_tarihi']); ?></td>
											<td> 
												<span style="color: red;">
													<b>
														<?php 
														$bugun = time();
														$gecmis = $projecek['proje_baslama_tarihi'];
														$fark = $bugun-$gecmis;

														$dakika = $fark / 60;
														$saniye_farki = floor($fark - (floor($dakika) * 60));

														$saat = $dakika / 60;
														$dakika_farki = floor($dakika - (floor($saat) * 60));

														$gun = $saat / 24;
														$saat_farki = floor($saat - (floor($gun) * 24));

														$yil = floor($gun/365);
														$gun_farki = floor($gun - (floor($yil) * 365));


                      //echo $yil . ' yıl';
														echo $gun_farki . ' gün'." - ";
														echo $saat_farki . ' saat ';
                     // echo $dakika_farki . ' dakika - ';
                      //echo $saniye_farki . ' saniye ';

														?>
													</b>
												</span>
											</td>
											<td><?php 
											if ($projecek['proje_aciliyet']=="0") {
												echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
											} else {
												echo aciliyet()[$projecek['proje_aciliyet']];
											}
										?></td>

									</tr>
								<?php } ?>
							</tbody>
							<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
						</table>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">


		<!-- Earnings (Monthly) Card Example -->
		<?php 
		$siparis_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='1' or sip_durum='0' and kullanici_id=:kul_id ");
		$siparis_biten_sayi_sor->execute(['kul_id' => $kullanici_id]);
		$siparis_biten_sayi_cek = $siparis_biten_sayi_sor->rowCount();
		?>

		<div class="col-xl-2 col-md-6 mb-4">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Devam Eden <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparis_biten_sayi_cek; ?></div>
						</div>
						<div class="col-auto">
							<i class="fas fa-thumbtack fa-2x text-gray-300"></i>

						</div>
					</div>
				</div>
			</div>
		</div>	



		<?php 
		$siparis_biten_sayi_sor=$db->prepare("SELECT sip_id FROM siparis WHERE sip_durum='2' and kullanici_id=:kul_id ");
		$siparis_biten_sayi_sor->execute(['kul_id' => $kullanici_id]);
		$siparis_biten_sayi_cek = $siparis_biten_sayi_sor->rowCount();
		?>


		<div class="col-xl-2 col-md-6 mb-4">
			<div class="card border-left-success shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Biten <b>Sipariş</b> Sayısı</div>
							<div class="h4 mb-0 font-weight-bold text-gray-800">

								<?php  echo $siparis_biten_sayi_cek ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-calendar-check fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


			<?php 
			$siparissayisor=$db->prepare("SELECT sip_id FROM siparis where kullanici_id=:kul_id ");
			$siparissayisor->execute(['kul_id' => $kullanici_id]);
			$siparissayisicek = $siparissayisor->rowCount();
			?>
			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Şuana Kadar Alınan <b>Sipariş</b> Sayısı</div>
								<div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo $siparissayisicek; ?></div>
							</div>
							<div class="col-auto">
								<i class="fas fa-list fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>	



			<!-- Earnings (Monthly) Card Example -->
			<?php 
			$Fiyat=$db->prepare("SELECT SUM(sip_ucret) AS ucret FROM siparis where kullanici_id=:kul_id ");
			$Fiyat->execute(['kul_id' => $kullanici_id]);
			$FiyatYaz= $Fiyat->fetch(PDO::FETCH_ASSOC); 

			$alinan=$db->prepare("SELECT SUM(sip_alinan_ucret) AS alinan_ucret FROM siparis where kullanici_id=:kul_id ");
			$alinan->execute(['kul_id' => $kullanici_id]);
			$alinan_yaz= $alinan->fetch(PDO::FETCH_ASSOC); ?>


            		<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-danger shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Kalan <b>Para</b></div>
								<div class="h4 mb-0 font-weight-bold text-gray-800">
									<?php echo number_format($FiyatYaz['ucret']-$alinan_yaz['alinan_ucret']) ?> 
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-lira-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>
			

			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Alınan <b>Para</b></div>
								<div class="h4 mb-0 font-weight-bold text-gray-800">
									<?php echo number_format($alinan_yaz['alinan_ucret']) ?> 
								</div>
							</div>
							<div class="col-auto">
								<i  class="fas fa-lira-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>	

	


			<div class="col-xl-2 col-md-6 mb-4">
				<div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
						<div class="row no-gutters align-items-center">
							<div class="col mr-2">
								<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Toplam <b>Kazanç</b> </div>
								<div class="h4 mb-0 font-weight-bold text-gray-800">
									<?php echo number_format($FiyatYaz['ucret']) ?>
								</div>
							</div>
							<div class="col-auto">
								<i class="fas fa-lira-sign fa-2x text-gray-300"></i>
							</div>
						</div>
					</div>
				</div>
			</div>




				<div class="col-md-12">
					<div class="card shadow mb-4">
						<div class="card-header py-3 text-center">
							<h5 class="m-0 font-weight-bold text-primary">Siparişler</h5>
						</div>
						<div class="card-body" style="width: 100%">

							<div class="table-responsive">
								<table class="table table-bordered" id="siparistablosu" width="100%" cellspacing="0">
									<thead>
										<tr> 
											<th>İsim</th>
											<th>Yapılacak İş</th>
											<th>Başlangıç Tarihi</th>
											<th>Geçen Zaman</th>
											<th>Bitiş Tarihi</th>
											<th>Aciliyet</th>

										</tr>
									</thead>
									<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
									<tbody>
										<?php 

										$siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:kul_id and sip_durum = '0' or sip_durum = '1'  ORDER BY sip_id DESC");
										$siparissor->execute(['kul_id' => $kullanici_id]);
										while ($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC)) { $say++?>

											<tr>
												<td><?php echo $sipariscek['musteri_isim']; ?></td>	
												<td><?php echo $sipariscek['sip_baslik']; ?></td>
												<td><?php echo date('d.m.Y H:i:s', $sipariscek['sip_baslama_tarih']); ?></td>
												<td> 
													<?php if ($sipariscek['sip_durum']==2) {
														echo "Teslim Edildi";
													}else{  ?>
														<span style="color: red;"><b> 
															<?php 
															$bugun = time();
															$gecmis = $sipariscek['sip_baslama_tarih'];
															$fark = $bugun-$gecmis;

															$dakika = $fark / 60;
															$saniye_farki = floor($fark - (floor($dakika) * 60));

															$saat = $dakika / 60;
															$dakika_farki = floor($dakika - (floor($saat) * 60));

															$gun = $saat / 24;
															$saat_farki = floor($saat - (floor($gun) * 24));

															$yil = floor($gun/365);
															$gun_farki = floor($gun - (floor($yil) * 365));
                     								 //echo $yil . ' yıl';
															echo $gun_farki . ' gün'." / ";
															echo $saat_farki . ' saat  '; ?> </b>
														</span> 
													<?php } ?>
												</td>

												<td><?php echo $sipariscek['sip_teslim_tarihi']; ?></td>




												<td><?php 
												if ($sipariscek['sip_aciliyet']=="Acil") {
													echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
												} else {
													echo aciliyet()[$sipariscek['sip_aciliyet']];
												}
											?></td>
										</tr>
									<?php }
									?>
								</tbody>
								<!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi çıkış-->
							</table>
						</div>
					</div>
				</div>
			</div>

		</div>

</div>
<!--Projeler Çıkış-->

</div>


<?php 
include 'footer.php';
?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
<script type="text/javascript">
	$("#aktarmagizleme").click(function(){
		$(".dt-buttons").toggle();
	});
</script>
<script type="text/javascript">
	$(".mobilgoster").click(function(){
		$(".gizlemeyiac").toggle();
	});
</script>

<script>
	var dataTables = $('#dataTable').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
});
</script>

<script>
	var dataTables = $('#siparistablosu').DataTable({
    "ordering": true,  //Tabloda sıralama özelliği gözüksün mü? true veya false
    "searching": true,  //Tabloda arama yapma alanı gözüksün mü? true veya false
    "lengthChange": true, //Tabloda öğre gösterilme gözüksün mü? true veya false
    "info": true,
    "lengthMenu": [ 5, 10, 25, 50, 75, 100 ],
    dom: "<'row '<'col-md-6'l><'col-md-6'f><'col-md-4 d-none d-print-block'B>>rtip",
});
</script>

