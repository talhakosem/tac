<?php 

include 'header.php'; 

//Belirli veriyi seçme işlemi
$urunsor=$db->prepare("SELECT * FROM urun order by urun_id asc");
$urunsor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Ürün Listeleme <small>

              <?php 

              if ($_GET['durum']=="ok") {?>

                <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

                <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
            <div class="clearfix"></div>
            <div align="right">
              <a href="urun-ekle.php"><button class="btn btn-success btn-xs"> Yeni Ekle</button></a>

            </div>


          </div>

          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr>
                  <th>S.No</th>
                  <th></th>
                  <th>Ürün Ad</th>
                  <th>Kategorisi</th>
                  <!--<th>Ürün Fiyat</th>-->
                  <th>Ürün Stok</th>
                  <th>Gösterim</th>
                  
                  <th>Resim İşlemleri</th>
                  <th>Öne Çıkar</th>
                  <th>Durum</th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                $say=0;

                while($uruncek=$urunsor->fetch(PDO::FETCH_ASSOC)) { $say++?>


                  <tr>
                   <td width="20"><?php echo $say ?></td>
                   <td width="20"><center><a href="urun-duzenle.php?urun_id=<?php echo $uruncek['urun_id']; ?>"><button class="btn btn-primary btn-xs">Düzenle</button></a></center></td>
                   <td><?php echo $uruncek['urun_ad'] ?></td>
                   
                   <td width="20"><?php

                   $kategori_id=$uruncek['kategori_id'];
                   $kategorisor=$db->prepare("SELECT * FROM kategori where kategori_id=:id");
                   $kategorisor->execute(array(
                    'id' => $kategori_id
                  ));
                   $kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);   

                   echo $kategoricek['kategori_ad'];



                 ?></td>
                 <!-- <td width="20"><?php echo $uruncek['secenek1_fiyat'] ?></td>-->
                 <td width="20"><center><?php 

                 if ($uruncek['urun_stok']==0) {?>

                   <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_sto=1&urun_stok=ok"><button class="btn btn-danger btn-xs">Ürün Yok</button></a>


                 <?php } elseif ($uruncek['urun_stok']==1) {?>


                   <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_sto=0&urun_stok=ok"><button class="btn btn-success btn-xs">Ürün Stokta</button></a>

                 <?php } ?>


               </center></td>
               <td> <center> <?php echo $uruncek['gosterim'] ?> </center></td>
               
               <td width="20"><center><a href="urun-galeri.php?urun_id=<?php echo $uruncek['urun_id'] ?>"><button class="btn btn-success btn-xs">Resim İşlemleri</button></a></center></td>
               <td width="20"><center><?php 

               if ($uruncek['urun_onecikar']==0) {?>

                 <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=1&urun_onecikar=ok"><button class="btn btn-success btn-xs">Ön Çıkar</button></a>


               <?php } elseif ($uruncek['urun_onecikar']==1) {?>


                 <a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id'] ?>&urun_one=0&urun_onecikar=ok"><button class="btn btn-warning btn-xs">Kaldır</button></a>

               <?php } ?>


             </center></td>


             <td width="20"><center><?php 

             if ($uruncek['urun_durum']==1) {?>

              <button class="btn btn-success btn-xs">Aktif</button>

            <?php } else {?>

              <button class="btn btn-danger btn-xs">Pasif</button>


            <?php } ?>
          </center>


        </td>



        <td width="20"><center><a href="../netting/islem.php?urun_id=<?php echo $uruncek['urun_id']; ?>&urunsil=ok"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
