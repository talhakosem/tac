<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$yazisor=$db->prepare("SELECT * FROM yazi order by yazi_id DESC");
$yazisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Blog Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>

            <div class="clearfix"></div>  <p>Resim boyutunun 870*400 olması daha iyi gözükecektir.</p>


            <div align="right">
              <a href="yazi-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Yazı Ad</th>
                  <th>Öne Çıkar</th>
                  <th>Durum</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($yazicek=$yazisor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $yazicek['yazi_ad'] ?></td>
                
                 <td><center><?php 

                 if ($yazicek['yazi_onecikar']==0) {?>

                 <a href="../netting/islem.php?yazi_id=<?php echo $yazicek['yazi_id'] ?>&yazi_one=1&yazi_onecikar=ok"><button class="btn btn-success btn-xs">Öne Çıkar</button></a>
                   

                 <?php } elseif ($yazicek['yazi_onecikar']==1) {?>


                 <a href="../netting/islem.php?yazi_id=<?php echo $yazicek['yazi_id'] ?>&yazi_one=0&yazi_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

                   <?php } ?>
                     

                   </center></td>
               

                 <td><center><?php 

                  if ($yazicek['yazi_durum']==1) {?>

                  <button class="btn btn-success btn-xs">Aktif</button>

                  <!--

                  success -> yeşil
                  warning -> tyazicu
                  danger -> kırmızı
                  default -> beyaz
                  primary -> mavi buton

                  btn-xs -> ufak buton 

                -->

                <?php } else {?>

                <button class="btn btn-danger btn-xs">Pasif</button>


                <?php } ?>
              </center>


            </td>


            <td><center><a href="yazi-duzenle.php?yazi_id=<?php echo $yazicek['yazi_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
            <td><center><a href="../netting/islem.php?yazi_id=<?php echo $yazicek['yazi_id']; ?>&yazisil=ok&blog_resimyol=<?php echo $yazicek['blog_resimyol'] ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
