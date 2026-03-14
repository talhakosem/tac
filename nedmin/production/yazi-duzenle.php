<?php 

include 'header.php'; 


$yazisor=$db->prepare("SELECT * FROM yazi where yazi_id=:id");
$yazisor->execute(array(
  'id' => $_GET['yazi_id']
));

$yazicek=$yazisor->fetch(PDO::FETCH_ASSOC);

?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yazı Düzenleme <small>

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

            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
          <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim<br><span class="required">1272*600</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">

                  <?php 
                  if (strlen($yazicek['blog_resimyol'])>0) {?>

                    <img width="200"  src="../../<?php echo $yazicek['blog_resimyol']; ?>">

                  <?php } else {?>


                    <img width="200"  src="../../dimg/logo-yok.png">


                  <?php } ?>

                  
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">İkon Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="file" id="first-name"  name="blog_resimyol"  class="form-control col-md-7 col-xs-12">
                </div>
              </div>

             <input type="hidden" name="yazi_id" value="<?php echo $yazicek['yazi_id'] ?>"> 
              <input type="hidden" name="eski_yol" value="<?php echo $yazicek['blog_resimyol']; ?>">

              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="yazifotoduzenle" class="btn btn-primary">Güncelle</button>
              </div>

            </form>
            
            <hr>


              <!-- Kategori seçme başlangıç -->

              <form action="../netting/islem.php" method="POST"  id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
            

               <!--  <p>//200*132 boyutunu kullanman tema tasarımına uyumlu olcaktır.</p>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="blog_resimyol"   class="form-control col-md-7 col-xs-12">
                    <img width="200" src="../../<?php echo $yazicek['blog_resimyol'] ?>">
                  </div>
                </div>

                kategori seçme bitiş -->


                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Ad <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="first-name" name="yazi_ad" value="<?php echo $yazicek['yazi_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <!-- Ck Editör Başlangıç -->

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Detay <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <textarea  class="ckeditor" id="editor1" name="yazi_detay"><?php echo $yazicek['yazi_detay']; ?></textarea>
                  </div>
                </div>

                      <script language="javascript" type="text/javascript">
                CKEDITOR.replace('editor1',{
                  filebrowserBrowseUrl: 'browser/browse.php',
                  filebrowserImageBrowseUrl: 'browser/browse.php?type=Images',
                  filebrowserUploadUrl: 'uploader/upload.php',
                  filebrowserImageUploadUrl: 'www.fikirlerim.net/uploader/upload.php?type=Images',
                  filebrowserWindowWidth: '900',
                  filebrowserWindowHeight: '400',
                  filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
                  filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
                  filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                  filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
                  filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
                });
                CKEDITOR.config.entities_latin=false
              </script>

              <!-- Ck Editör Bitiş -->



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Site Açıklama <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yazi_description" value="<?php echo $yazicek['yazi_description'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Anahtar Kelime //SEO<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" name="yazi_keyword" value="<?php echo $yazicek['yazi_keyword'] ?>" required="required" class="form-control col-md-7 col-xs-12">
                </div>
              </div>




              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Öne Çıkar<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                 <select id="heard" class="form-control" name="yazi_onecikar" required>



                  <option value="1" <?php echo $yazicek['yazi_onecikar'] == '1' ? 'selected=""' : ''; ?>>Evet</option>



                  <option value="0" <?php if ($yazicek['yazi_onecikar']==0) { echo 'selected=""'; } ?>>Hayır</option>


                </select>
              </div>
            </div>



            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazı Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="yazi_durum" required>

                  <option value="1" <?php echo $yazicek['yazi_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($yazicek['yazi_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>


                 </select>
               </div>
             </div>






              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $katad=$yazicek['kategori_id']; 

                  $kategorisor=$db->prepare("SELECT * from kategori  where kategori_durum=:durum order by kategori_sira");
                  $kategorisor->execute(array(
                   'durum' => 1
                 ));

                 ?>
                 <select class="select2_multiple form-control" required="" name="kategori_id" >


                   <?php 

                   while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                     $kategori_ad=$kategoricek['kategori_ad'];

                     ?>

                     <option <?php if ($kategori_ad==$katad) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_ad']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                   <?php } ?>

                 </select>
               </div>
             </div>




             <input type="hidden" name="yazi_id" value="<?php echo $yazicek['yazi_id'] ?>"> 


             <div class="ln_solid"></div>
             <div class="form-group">
     
              <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <button type="submit" name="yaziduzenle" class="btn btn-success">Güncelle</button>
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
