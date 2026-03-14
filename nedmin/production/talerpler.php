<?php 

include 'header.php'; 

$listesor=$db->prepare("SELECT * FROM listekaydet order by liste_id desc");
$listesor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
         <h2 class="mt-4">Talep Listeleme</h2> 
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ad</th>
                  <th>Talep</th>
                  <th>Tarih</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>
                <?php 
                $say=0;
                while($listecek=$listesor->fetch(PDO::FETCH_ASSOC)) { $say++?>
                <tr>
                 <td width="20"><?php echo $say ?></td>
                 <td><?php echo $listecek['name'] ?></td>
                 <td>

                  <?php $geldigiyer = $listecek['geldigiyer'];  if ($geldigiyer =="kesif") { echo "Keşif Talebi"; }elseif($geldigiyer =="talep"){ echo "Görüşme Talebi"; }elseif ($geldigiyer =="demo") { echo "Demo Talebi"; }  ?>
                   </td>
                 <td><?php echo $listecek['zaman'] ?></td>
                

            <td><center><a href="liste-detay.php?liste_id=<?php echo $listecek['liste_id']; ?>"><button class="btn btn-primary btn-xs">Detay</button></a></center></td>
          </tr>

          <?php  }   ?>


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
