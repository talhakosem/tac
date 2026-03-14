<?php 

include 'header.php'; 


$kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
$kategorisor->execute(array(
  'id' => $_GET['kategori_id']
));

$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kategori Düzenleme <small>

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
            <br />
              <div class="form-group">


             <form action="../netting/islem.php" method="POST" enctype="multipart/form-data" data-parsley-validate>
       

               <div class="col-12 mb-20">
                <div class="row mbn-10">
                  <div class="col-sm-3 col-12 mb-10"><label for="formLayoutFile1">Yüklü Resim</label></div>
                  <div class="col-sm-9 col-12 mb-10"> 
                   <?php 
                   if (strlen($kategoricek['kate_resimyol'])>0) {?>
                    <img width="200"  src="../../<?php echo $kategoricek['kate_resimyol']; ?>">
                  <?php } else {?>
                    <img width="200"  src="img/logo-yok.jpg">
                  <?php } ?> 
                </div>
              </div>  
            </div>

            <div class="col-12 mb-20">
              <div class="row mbn-10">
                <div class="col-sm-3 col-12 mb-10"><label for="formLayoutFile1">Resim Yükle</label></div>
                <div class="col-sm-6 col-12 mb-10">  <input type="file" name="kate_resimyol" class="form-control">
                </div>
              </div>  
            </div>

              <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id'] ?>"> 
              <input type="hidden" name="eski_yol" value="<?php echo $kategoricek['kate_resimyol']; ?>">

            <div style="text-align: right;" class="col-6 mb-20">
             <button type="submit" name="kategorifotoduzenle" class="btn btn-primary">Güncelle</button>
           </div>

         </form>

   </div>

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" enctype="multipart/form-data"   data-parsley-validate class="form-horizontal form-label-left">






              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  



                  $kategoridensor=$db->prepare("SELECT * from kategori where kategori_ust=:ust  order by kategori_sira");
                  $kategoridensor->execute(array(
                     'ust' => 0
                  ));

                  ?>
                  <select class="select2_multiple form-control" required="" name="kategori_ust" >

                    <?php 

                    while($kategoridencek=$kategoridensor->fetch(PDO::FETCH_ASSOC)) {

                     $kategori_id=$kategoridencek['kategori_id'];

                     ?>

                     <option  value="<?php echo $kategoridencek['kategori_id']; ?>"><?php echo $kategoridencek['kategori_ad']; ?></option>

                   <?php } ?>
                    <option  value="0">Üst kategori</option>

                 </select>
               </div>
             </div>





             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="kategori_ad" value="<?php echo $kategoricek['kategori_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>




            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Açıklama <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="kategori_desc" value="<?php echo $kategoricek['kategori_desc'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Sıra <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="kategori_sira" value="<?php echo $kategoricek['kategori_sira'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>





            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="kategori_durum" required>



                   <!-- Kısa İf Kulllanımı 

                    <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>  -->


                  <option value="1" <?php echo $kategoricek['kategori_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($kategoricek['kategori_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                 
                 </select>
               </div>
             </div>


             <input type="hidden" name="kategori_id" value="<?php echo $kategoricek['kategori_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="kategoriduzenle" class="btn btn-success">Güncelle</button>
              </div>
            </div>

          </form>



        </div>
      </div>
    </div>
  </div>


</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>
