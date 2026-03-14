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
                echo $say." kayıt listelendi.";
                if ($_GET['durum']=='ok') {?> 

                  <b style="color:green;">İşlem başarılı...</b>

                <?php } elseif ($_GET['durum']=='no')  {?>

                  <b style="color:red;">İşlem Başarısız...</b>

                  <?php } ?></small></h2><br>
                </div>
                <div align="right" class="col-md-6">
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="x_content">
                <?php
                $instagalerisor=$db->prepare("select * from instagaleri order by galeri_id DESC");
                $instagalerisor->execute();
                while($instagalericek=$instagalerisor->fetch(PDO::FETCH_ASSOC)) { ?>
                  <div class="col-md-6">
                   <label>
                    <div class="image view view-first">
                     <img style="width: 350px; height: 350px; display: block;" src="../../<?php echo $instagalericek['galeri_resimyol']; ?>" alt="image" />
                     <div class="mask">
                      <p><?php
                      $urun_id = $instagalericek['urun_id'];
                      $sorgu = $db->query("SELECT * FROM urun where urun_id=$urun_id");
                      $sorgucek = $sorgu->fetch(PDO::FETCH_ASSOC);
                      echo $sorgucek["urun_ad"]; ?></p>
                    </div>
                  </div>
                  <center><a href="insta-foto-ata.php?galeri_id=<?php echo $instagalericek['galeri_id']; ?>"><button style="margin-top: 5px;" class="btn btn-primary btn-xs">Ürüne Ata</button></a></center>
                </label>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php include 'footer.php'; ?>