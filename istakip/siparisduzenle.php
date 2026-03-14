<?php 
include 'header.php' ;


if (isset($_POST['sip_id'])) {
	$kayitsor=$db->prepare("SELECT * FROM siparis where sip_id=:id");
	$kayitsor->execute(array(
		'id' => guvenlik($_POST['sip_id'])
	));
	$kayitcek=$kayitsor->fetch(PDO::FETCH_ASSOC);
} else {
	header("location:siparisler");
} 

?>
<!--<script src="ckeditor/ckeditor.js"></script>-->
<link rel="stylesheet" media="all" type="text/css" href="vendor/upload/css/fileinput.min.css">
<link rel="stylesheet" type="text/css" media="all" href="vendor/upload/themes/explorer-fas/theme.min.css">
<script src="vendor/upload/js/fileinput.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/fas/theme.min.js" type="text/javascript" charset="utf-8"></script>
<script src="vendor/upload/themes/explorer-fas/theme.minn.js" type="text/javascript" charset="utf-8"></script>
<div class="container">
    
     <a href="gider.php?sip_id=<?php echo $kayitcek['sip_id']; ?>"><button type="button" class="btn btn-primary float-right">Gider Ekle</button></a>
<br><br>


<div>

          <div class="list-group mb-4">
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">Harcama Listesi <b class=" text-uppercase"><?php echo $kayitcek['baslik'] ?></b></h5>
    </div>
  </a>

  <?php 
  $sip_id = $kayitcek['sip_id'];
  $sorgu = $db->prepare("SELECT * FROM gider where sip_id=:sip_id order by gider_id desc");
  $sorgu->execute(['sip_id' =>$sip_id]);
  $say=$sorgu->rowCount();

   date_default_timezone_set('Etc/GMT-3');

  while($sorgucek = $sorgu->fetch(PDO::FETCH_ASSOC)) {  ?>
  
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5>  <?php echo $sorgucek ["baslik"]; ?>  </h5>

      <small class="text-muted">

        <?php echo date('d.m.Y', $sorgucek['gider_tarihi']); ?>
        <br>
            <?php 
                            $bugun = time();
                            $gecmis = $sorgucek['gider_tarihi'];
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




        </small>
    </div>
    
    
  <p>  Harcama Yapan: <?php echo $sorgucek ["isim"]; ?></p>
    <p class="mb-1"><?php echo $sorgucek ["detay"]; ?><br> 
    Harcanan Tutar: <?php echo $sorgucek ["fiyat"]; ?></p>
  
  </a> 
  
  
<?php } ?>
</div>

</div>
	 <?php  if ($kullanicicek['kul_yetki']==1) {  ?>
	<div class="row">
		<div class="col-md-12">
			<div class="card br-1 shadow mb-4">
				<div class="card-header py-3">
					<h5 class="m-0 font-weight-bold text-primary">Sipariş Düzenleme İşlemi   
						<small>
							<?php 
							if (isset($_GET['islem'])) { 
								if (guvenlik($_GET['islem'])=="ok") {?> 
									<b style="color: green; font-size: 16px;">İşlem Başarılı</b>
								<?php } elseif (guvenlik($_GET['islem'])=="no") { ?> 
									<b style="color: red; font-size: 16px;">İşlem Başarısız</b>
								<?php } } ?>

							</small>
						</h5>
					</div>
					<div class="card-body">
						<form action="islemler/islem.php" method="POST"  enctype="multipart/form-data"  data-parsley-validate>
							<div class="form-row">
								<div class="form-group col-md-4">
									<label>İsim Soyisim</label>
									<input type="text" class="form-control" required name="musteri_isim" value="<?php echo $kayitcek['musteri_isim'] ?>">
								</div>
								<div class="form-group col-md-4">
									<label>E-Posta</label>
									<input type="email" class="form-control"  name="musteri_mail" value="<?php echo $kayitcek['musteri_mail'] ?>">
								</div>	
								<div class="form-group col-md-4">
									<label>Telefon Numarası</label>
									<input type="number" class="form-control" name="musteri_telefon" value="<?php echo $kayitcek['musteri_telefon'] ?>">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Sipariş Başlığı</label>
									<input type="text" class="form-control" required name="sip_baslik" value="<?php echo $kayitcek['sip_baslik'] ?>">
								</div>
								<div class="form-group col-md-6">
									<label>Sipariş Tamamlanma Yüzdesi</label>
									<input type="number" min="0" max="100" value="<?php echo $kayitcek['yuzde'] ?>" class="form-control" required name="yuzde" placeholder="Sipariş Tamamlanma Yüzdesi">
								</div>
							</div>
						
							 
							<div class="form-row">
								<div class="form-group col-md-6">
									<label>Ücret (TL)</label>
									<input type="number" class="form-control" required name="sip_ucret" value="<?php echo $kayitcek['sip_ucret'] ?>">
								</div>

								<div class="form-group col-md-6">
									<label>Alınan Ücret <b> <?php echo $kayitcek['sip_alinan_ucret'] ?></b></label>
									<input type="number" class="form-control"  name="sip_alinan_ucret" placeholder="Son Alınan Ücreti Girin">
								</div>
								
							</div>

 
							<div class="form-row">
								
								<div class="form-group col-md-6">
									<label>Teslim Tarihi</label>
									<input  type="date" class="form-control" name="sip_teslim_tarihi" value="<?php echo $kayitcek['sip_teslim_tarihi'] ?>">
								</div>

									<div class="form-group col-md-6">
									<label>Sipariş Çizimi Yükle</label>
									<input  type="file" class="form-control" name="sip_dosya" >
								</div>


							</div>
							
							<div class="form-row">	
								
								<?php $durum=$kayitcek['sip_durum']; ?>
								<div class="form-group col-md-6">
									<label>Sipariş Durumu</label>
									<select id="inputState" name="sip_durum" required class="form-control">
										<?php foreach (durum() as $key => $value): ?>
											<option <?php if($durum == $key){echo("selected");}?> value="<?php echo $key ?>"><?php echo $value ?></option>
										<?php endforeach ?>
									</select>
								</div>
								<?php $aciliyet=$kayitcek['sip_aciliyet']; ?>
								<div class="form-group col-md-6">
									<label>Aciliyet</label>
									<select id="inputState" required name="sip_aciliyet" class="form-control">
										<?php foreach (aciliyet() as $key => $value): ?>
											<option <?php if($aciliyet == $key){echo("selected");}?> value="<?php echo $key ?>"><?php echo $value ?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>			
										
							<div class="form-row mt-2">
								<div class="form-group col-md-12">
									<textarea class="ckeditor" name="sip_detay" id="editor"><?php echo $kayitcek['sip_detay']?></textarea>
								</div>
							</div>
							<input type="hidden" class="form-control" name="sip_id" value="<?php echo $kayitcek['sip_id'] ?>">
							<div class="text-center">
								<button type="submit" name="siparisguncelle" class="btn btn-success btn-lg"><i class="fa fa-save"></i> Kaydet</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<? } ?>
	</div>
	<?php include 'footer.php' ?>

	<?php 
	if (strlen($kayitcek['dosya_yolu'])>10) {?>
		<script>
			$(document).ready(function () {
				var url1='<?php echo $kayitcek['dosya_yolu'] ?>';
				$("#sipdosya").fileinput({
					'theme': 'explorer-fas',
					'showUpload': false,
					'showCaption': true,
					'showDownload': true,
			//	'initialPreviewAsData': true,
					allowedFileExtensions: ["jpg", "png", "jpeg", "mp4", "zip", "rar"],
					initialPreview: [
						'<img src="dosyalar/<?php echo $kayitcek['dosya_yolu'] ?>" style="height:90px" class="file-preview-image" alt="Dosya" title="Dosya">'
						],
					initialPreviewConfig: [
						{downloadUrl: url1,
						showRemove: false,
					},
					],
				});

			});
		</script>
	<?php } else { ?>
		<script>
			$(document).ready(function () {
				var url1='<?php echo $kayitcek['dosya_yolu'] ?>';
				$("#sipdosya").fileinput({
					'theme': 'explorer-fas',
					'showUpload': false,
					'showCaption': true,
					'showDownload': true,
			//	'initialPreviewAsData': true,
					allowedFileExtensions: ["jpg", "png", "jpeg", "mp4", "zip", "rar"],
				});

			});
		</script>
	<?php } ?>
