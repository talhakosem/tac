<?php include 'header.php'; 
$slidersor=$db->prepare("SELECT * FROM stajyer");
$slidersor->execute(); ?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <h2>Başvuru Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ad</th>
                  <th>Tel</th>
                  <th>Email</th>
                  <th>website</th>
                  <th>Mesaj</th>
                  <th>Zaman</th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($slidercek=$slidersor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td><?php echo $slidercek['name'] ?></td>
                   <td><?php echo $slidercek['no'] ?></td>
                   <td><?php echo $slidercek['email'] ?></td>
                   <td><?php echo $slidercek['website'] ?></td>
                   <td><?php echo $slidercek['message'] ?></td>
                   <td><?php echo $slidercek['zaman'] ?></td>
                 </tr>



               <?php  } ?>


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
