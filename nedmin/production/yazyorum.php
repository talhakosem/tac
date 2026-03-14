<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$yorumsor=$db->prepare("SELECT * FROM yazyorum ");
$yorumsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yorum Listeleme <small>

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


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Yorum</th>
                  <th>Mail</th>
                  <th>Yazı</th>
                  <th>Sil</th>
              
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($yorumcek=$yorumsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $yorumcek['yorum_detay'] ?></td>
                 <td><?php echo $yorumcek['yorum_mail'] ?></td>
                 <td width="35"><?php 

                     $yazi_id=$yorumcek['yazi_id'];

                     $yazisor=$db->prepare("SELECT * FROM yazi where yazi_id=:id");
                     $yazisor->execute(array(
                      'id' =>  $yazi_id
                      ));

                     $yazicek=$yazisor->fetch(PDO::FETCH_ASSOC);


                     echo $yazicek['yazi_ad'];



                     ?></td>


            <td width="20"><center><a href="../netting/islem.php?yorum_id=<?php echo $yorumcek['yorum_id']; ?>&yazyorumsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
