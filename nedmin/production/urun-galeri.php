<?php include 'header.php'; ?>
<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
             <div align="left" class="col-md-6">
              <h2 >Resim Ürün Fotoğraf İşlemleri <small>
                <?php
                echo $say." kayıt listelendi.";
                if ($_GET['durum']=='ok') {?> 

                  <b style="color:green;">İşlem başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                  <?php } ?></small></h2><br>

                </div>
                <form  action="../netting/islem.php" method="POST" enctype="multipart/form-data">

                  <input type="hidden" name="urun_id" value="<?php echo $_GET['urun_id']; ?>">

                  <div align="right" class="col-md-6">
                    <button type="submit" name="urunfotosil"  class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i> Seçilenleri Sil</button>
                    <a class="btn btn-success" href="urun-foto-yukle.php?urun_id=<?php echo $_GET['urun_id'];?>"><i class="fa fa-plus" aria-hidden="true"></i> Ürün Fotoğraf Yükle</a>
                  </div>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <?php
                  $urunfotosor=$db->prepare("select * from urunfoto where urun_id=:urun_id order by urunfoto_id DESC");
                $urunfotosor->execute(array(
                  'urun_id' => $_GET['urun_id']
                ));

                while($urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC)) { ?>

                  <div class="col-md-55">
                   <label>
                    <div class="image view view-first">
                      <img style="width: 250px; height: 100px; display: block;" src="../../<?php echo $urunfotocek['urunfoto_resimyol']; ?>" alt="image" />
                      <div class="mask">
                        <p><?php echo $urunfotocek['urunfoto_ad']; ?> <?php echo $urunfotocek['urunfoto_id']; ?></p>
                      </div>
                    </div>

                    <?php  array("$urunfotosec"); ?>

                    <input type="hidden" name="urunfoto_resimyol[]" value="<?php echo $urunfotocek['urunfoto_resimyol']; ?>">
                    <input type="checkbox" name="urunfotosec[]"  value="<?php echo $urunfotocek['urunfoto_id']; ?>" > Seç
                  </label>
                </div>
              <?php } ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>