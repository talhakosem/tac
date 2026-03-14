<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$mailsor=$db->prepare("SELECT * FROM email ");
$mailsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
        
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th>Mail</th>
                  
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($mailcek=$mailsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td ><?php echo $mailcek['musteri_mail']; ?></td>
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
