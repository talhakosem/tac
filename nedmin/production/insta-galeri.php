 <?php 

 include 'header.php';


 ?>
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
              <h2 >Resim İşlemleri <small>
                <?php
                if ($_GET['durum']=='ok') {?> 

                  <b style="color:green;">İşlem başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                  <?php } ?></small></h2><br>
                </div>
                <div align="right" class="col-md-6">
                  <a class="btn btn-primary" href="insta-foto-duzenle.php"><i class="fa fa-plus" aria-hidden="true"></i>Foto Ata</a>
                 <form  action="../netting/islem.php" method="POST" enctype="multipart/form-data">
                   <button type="submit" name="instafotosil"  class="btn btn-danger "><i class="fa fa-trash" aria-hidden="true"></i> Seçilenleri Sil</button>
                   <a class="btn btn-success" href="insta-foto-yukle.php?insta_id=<?php echo $_GET['insta_id'];?>"><i class="fa fa-plus" aria-hidden="true"></i> Fotoğraf Yükle</a>
                 </div>
                 <div class="clearfix"></div>
               </div>
               <div class="x_content">
                <?php
                $instagalerisor=$db->prepare("select * from instagaleri order by galeri_id DESC");
                $instagalerisor->execute();
                while($instagalericek=$instagalerisor->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div class="col-md-55">
                   <label>
                    <div class="image view view-first">
                     <img style="width: 250px; height: 100px; display: block;" src="../../<?php echo $instagalericek['galeri_resimyol']; ?>" alt="image" />
                     <div class="mask">
                      <p> <?php echo $instagalericek['galeri_id']; ?></p>
                    </div>
                  </div>
                  <input type="checkbox" name="instagalerisec[]"  value="<?php echo $instagalericek['galeri_id']; ?>" > Seç
              
        
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