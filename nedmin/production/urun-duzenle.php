<?php 

include 'header.php'; 


$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
$urunsor->execute(array(
  'id' => $_GET['urun_id']
));

$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Düzenleme <small>

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



            <?php 
            $urun_id=$uruncek['urun_id'];
            $urunfotosor=$db->prepare("SELECT * FROM urunfoto where urun_id=:urun_id order by urunfoto_id asc limit 1 ");
            $urunfotosor->execute(array(
              'urun_id' => $urun_id
            ));
            while($urunfotocek=$urunfotosor->fetch(PDO::FETCH_ASSOC))  { ?>


              <center><img height="200px" src="../../<?php echo $urunfotocek['urunfoto_resimyol'] ?>" alt=""></center>   

            <?php } ?>



            <!-- / => en kök dizine çık ... ../ bir üst dizine çık -->
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <!-- Kategori seçme başlangıç -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $urun_id=$uruncek['kategori_id']; 

                  $kategorisor=$db->prepare("SELECT * from kategori  where kategori_durum=:durum order by kategori_sira");
                  $kategorisor->execute(array(
                   'durum' => 1
                 ));

                 ?>
                 <select class="select2_multiple form-control" required="" name="kategori_id" >


                   <?php 

                   while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                     $kategori_id=$kategoricek['kategori_id'];

                     ?>

                     <option <?php if ($kategori_id==$urun_id) { echo "selected='select'"; } ?> value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                   <?php } ?>

                 </select>
               </div>
             </div>


             <!-- kategori seçme bitiş -->


             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_ad" value="<?php echo $uruncek['urun_ad'] ?>" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Açıklama Üst <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">

                <textarea  class="ckeditor" name="urun_aciklamaust"><?php echo $uruncek['urun_aciklamaust'] ?></textarea>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 1 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde1" value="<?php echo $uruncek['urun_madde1'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 2 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde2" value="<?php echo $uruncek['urun_madde2'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 3 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde3" value="<?php echo $uruncek['urun_madde3'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Description //SEO<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_keyword" value="<?php echo $uruncek['urun_keyword'] ?>" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="urun_stok" required>



                <option value="1" <?php echo $uruncek['urun_stok'] == '1' ? 'selected=""' : ''; ?>>Stokta Var</option>



                <option value="0" <?php if ($uruncek['urun_stok']==0) { echo 'selected=""'; } ?>>Stokta Yok</option>


              </select>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Öne Çıkar<span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
             <select id="heard" class="form-control" name="urun_onecikar" required>



              <option value="1" <?php echo $uruncek['urun_onecikar'] == '1' ? 'selected=""' : ''; ?>>Evet</option>



              <option value="0" <?php if ($uruncek['urun_onecikar']==0) { echo 'selected=""'; } ?>>Hayır</option>


            </select>
          </div>
        </div>



        <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
          </label>
          <div class="col-md-6 col-sm-6 col-xs-12">
           <select id="heard" class="form-control" name="urun_durum" required>




            <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>

                  <!-- 
                  <option value="1" <?php echo $uruncek['urun_durum'] == '1' ? 'selected=""' : ''; ?>>Aktif</option>



                  <option value="0" <?php if ($uruncek['urun_durum']==0) { echo 'selected=""'; } ?>>Pasif</option>
                -->

                <?php 

                if ($uruncek['urun_durum']==0) {?>


                 <option value="0">Pasif</option>
                 <option value="1">Aktif</option>


               <?php } else {?>

                 <option value="1">Aktif</option>
                 <option value="0">Pasif</option>

               <?php  }

               ?> 


             </select>
           </div>
         </div>



         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">1. Madde Başlık ve Açıklama</label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="madde_1" value="<?php echo $uruncek['madde_1'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="deger_1" value="<?php echo $uruncek['deger_1'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">2. Madde Başlık ve Açıklama</label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="madde_2" value="<?php echo $uruncek['madde_2'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="deger_2" value="<?php echo $uruncek['deger_2'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">3. Madde Başlık ve Açıklama</label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="madde_3" value="<?php echo $uruncek['madde_3'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="deger_3" value="<?php echo $uruncek['deger_3'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">4. Madde Başlık ve Açıklama</label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="madde_4" value="<?php echo $uruncek['madde_4'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="deger_4" value="<?php echo $uruncek['deger_4'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>

         <div class="form-group">
          <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">5. Madde Başlık ve Açıklama</label>
          <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="madde_5" value="<?php echo $uruncek['madde_5'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
           <div class="col-md-3 col-sm-6 col-xs-12">
            <input type="text" id="first-name" name="deger_5" value="<?php echo $uruncek['deger_5'] ?>" class="form-control col-md-7 col-xs-12">
          </div>
        </div>



        <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id'] ?>"> 


        <div class="ln_solid"></div>
        <div class="form-group">
          <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
            <button type="submit" name="urunduzenle" class="btn btn-success">Güncelle</button>
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
