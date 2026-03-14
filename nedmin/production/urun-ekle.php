<?php  include 'header.php';  ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Ekle <small>

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
            <form action="../netting/islem.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">



              <!-- Kategori seçme başlangıç -->


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kategori Seç<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-6">

                  <?php  

                  $urun_id=$uruncek['kategori_id']; 

                  $kategorisor=$db->prepare("select * from kategori where kategori_durum=:durum and kategori_id != '42' order by kategori_sira");
                  $kategorisor->execute(array(
                   'durum' => 1
                 ));

                 ?>
                 <select class="select2_multiple form-control" required="" name="kategori_id" >


                   <?php 

                   while($kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC)) {

                     $kategori_id=$kategoricek['kategori_id'];

                     ?>

                     <option  value="<?php echo $kategoricek['kategori_id']; ?>"><?php echo $kategoricek['kategori_ad']; ?></option>

                   <?php } ?>

                 </select>
               </div>
             </div>


             <!-- kategori seçme bitiş -->


             <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Ad <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_ad" placeholder="Ürün adını giriniz" required="required" class="form-control col-md-7 col-xs-12">
              </div>
            </div>





            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Açıklama Üst <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">

                <textarea  class="ckeditor" id="editor1" name="urun_aciklamaust"></textarea>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 1 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde1" placeholder="Ürün madde 1 giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 2 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde2" placeholder="Ürün madde 2 giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Madde 3 <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_madde3" placeholder="Ürün madde 3 giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Keyword <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="first-name" name="urun_keyword" placeholder="Ürün keyword giriniz" class="form-control col-md-7 col-xs-12">
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Stok<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="heard" class="form-control" name="urun_stok" required>


                  <option value="1" >Var</option>
                  <option value="0" >Yok</option>



                </select>
              </div>
            </div>


            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Ürün Durum<span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <select id="heard" class="form-control" name="urun_durum" required>


                <option value="1" >Aktif</option>
                <option value="0" >Pasif</option>



              </select>
            </div>
          </div>

          <div class="x_content">
           <br>
           <p>Ürün Varyant ve Fiyatlar</p>

<div class="row">
           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba"  placeholder="Duba">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba_1"  placeholder="Seçenek 1">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba_2"  placeholder="Seçenek 2">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba_3"  placeholder="Seçenek 3">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba_4"  placeholder="Seçenek 4">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="duba_5"  placeholder="Seçenek 5">
           </div>
</div>
<br>
<div class="row">
           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="ray"  placeholder="Ray">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="ray_1"  placeholder="Seçenek 1">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="ray_2"  placeholder="Seçenek 2">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="ray_3"  placeholder="Seçenek 3">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="ray_4"  placeholder="Seçenek 4">
           </div>
</div>
<br>

           <div class="row">
           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <center><p>İsim ve Değer</p></center>
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 "> 
            <input type="text" class="form-control" name="deger_1" placeholder="Değer 1">
          </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
             <input type="text" class="form-control" name="deger_2" placeholder="Değer 2">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
             <input type="text" class="form-control" name="deger_3" placeholder="Değer 3">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
             <input type="text" class="form-control" name="deger_4" placeholder="Değer 4">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="deger_5" placeholder="Değer 5">
           </div>
</div>
<br>

<div class="row">
           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde"  placeholder="Madde">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde_1"  placeholder="Seçenek 1">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde_2"  placeholder="Seçenek 2">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde_3"  placeholder="Seçenek 3">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde_4"  placeholder="Seçenek 4">
           </div>

           <div class="col-md-2 col-sm-6 col-xs-12 ">
            <input type="text" class="form-control" name="madde_5"  placeholder="Seçenek 5">
           </div>
</div>



    <div class="ln_solid"></div>
    <div class="form-group">
      <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
        <button type="submit" name="urunekle" class="btn btn-success">Kaydet</button>
      </div>
    </div>
  </form>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php'; ?>