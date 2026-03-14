<?php include'header.php' ?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div class="container-fluid">

  <a href="projeekle"><button style="float: right;" class="btn btn-primary">Proje Ekle</button><a/>
    <h1 class="h3 mb-2 text-gray-800">Projeler</h1>

    <!-- DataTales Giriş -->
    <div class="card shadow mb-4">
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Projeler</h6>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr> 
              <th>No</th>
              <th>FİRMA</th>
              <th>Müşteri isim</th>
              <th>Başlangıç</th>
              <th>Geçen Zaman</th>
              <th>Aciliyet</th>
              <th>Ücret</th>
              <th>Durum</th>
              <th>İşlem</th>

            </tr>
          </thead>
          <!--While döngüsü ile veritabanında ki verilerin tabloya çekilme işlemi giriş-->
          <tbody>
           <?php 

           date_default_timezone_set('Etc/GMT-3');
           echo "Bugün: ".date('Y-m-d'); 

           $say=0;
           $kullanici_id=$kullanicicek["kul_id"];
           $projesor=$db->prepare("SELECT * FROM proje where kullanici_id=:kul_id ORDER BY proje_id DESC");
           $projesor->execute(['kul_id' => $kullanici_id]);
           while ($projecek=$projesor->fetch(PDO::FETCH_ASSOC)) { $say++?>

             <tr>
              <td><?php echo $say; ?></td>
              <td><?php echo $projecek['firma_baslik']; ?></td>
              <td><?php echo $projecek['musteri_isim']; ?></td>
              <td> <?php echo date('d.m.Y', $projecek['proje_baslama_tarihi']); ?></td>


              <td> 
                <span style="color: red;">
                  <b>
                    <?php 
                    $bugun = time();
                    $gecmis = $projecek['proje_baslama_tarihi'];
                    $fark = $bugun-$gecmis;

                    $dakika = $fark / 60;
                    $saniye_farki = floor($fark - (floor($dakika) * 60));

                    $saat = $dakika / 60;
                    $dakika_farki = floor($dakika - (floor($saat) * 60));

                    $gun = $saat / 24;
                    $saat_farki = floor($saat - (floor($gun) * 24));

                    $yil = floor($gun/365);
                    $gun_farki = floor($gun - (floor($yil) * 365));


                      //echo $yil . ' yıl';
                    echo $gun_farki . ' gün'." - ";
                    echo $saat_farki . ' saat ';
                     // echo $dakika_farki . ' dakika - ';
                      //echo $saniye_farki . ' saniye ';

                    ?>
                  </b>
                </span>
              </td>

              <td><?php 
              if ($projecek['proje_aciliyet']==0) {
                echo '<span class="badge badge-danger" style="font-size:1rem">Acil</span>';
              } else {
                echo aciliyet()[$projecek['proje_aciliyet']];
              }
            ?></td>
            <td><?php echo number_format($projecek['proje_ucret']); ?></td>

            <td><?php 
            if ($projecek['proje_durum']==4) {
              echo '<span class="badge badge-success" style="font-size:1rem">Alındı</span>';
            } else {
              echo durum2()[$projecek['proje_durum']];
            }
          ?></td>
          <td> 
          <?php /*
          if (yetkikontrol()=="yetkili") { */?>
            <div class="d-flex justify-content-center">
             <form action="projeduzenle.php" method="GET">
              <input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
              <button type="submit" class="btn btn-success btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-edit"></i>
                </span>
              </button>
            </form>
            <form class="mx-1" action="islemler/islem.php" method="POST">
              <input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
              <button type="submit" name="projesilme" class="btn btn-danger btn-sm btn-icon-split">
                <span class="icon text-white-60">
                  <i class="fas fa-trash"></i>
                </span>
              </button>
            </form>  
          <?php } ?>
          <form action="proje.php" method="POST">
            <input type="hidden" name="proje_id" value="<?php echo $projecek['proje_id'] ?>">
            <button type="submit" name="proje_bak" class="btn btn-primary btn-sm btn-icon-split">
              <span class="icon text-white-60">
                <i class="fas fa-eye"></i>
              </span>
            </button>
          </form>  
        </div>
      </td>              
    </tr>
    <?php /* }  */?>
  </tbody>

</table>
</div>
</div>
</div>
<!--Datatables çıkış-->
</div>


<?php include'footer.php' ?>

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script> 
<script src="vendor/datatables/dataTables.buttons.min.js"></script>
<script src="vendor/datatables/buttons.flash.min.js"></script>
<script src="vendor/datatables/jszip.min.js"></script>
<script src="vendor/datatables/pdfmake.min.js"></script>
<script src="vendor/datatables/vfs_fonts.js"></script>
<script src="vendor/datatables/buttons.html5.min.js"></script>
<script src="vendor/datatables/buttons.print.min.js"></script>
