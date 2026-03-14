
<?php 

include 'header.php'; 


$instagalerisor=$db->prepare("SELECT * FROM instagaleri where galeri_id=:id");
$instagalerisor->execute(array(
  'id' => $_GET['galeri_id']
  ));

$instagalericek=$instagalerisor->fetch(PDO::FETCH_ASSOC);


?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>instagaleri Düzenleme <small>

            </small></h2>
            
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <br />

  
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Resim <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <img width="300" src="../../<?php echo $instagalericek['galeri_resimyol']; ?>">
                </div>
              </div>

     



            <form action="../netting/islem.php" method="post"> 
        
             <select class="select2_multiple form-control"  name="urun_id" >
                  <option value="0">Atama yap</option>
              <?php 
              $sorgu = $db->query("SELECT * FROM urun");
              foreach ($sorgu as $key) { ?>
              
                <option value="<?php echo $key["urun_id"]; ?>"><?php echo $key["urun_ad"]; ?></option>
              <?php } ?>
            </select>
 
            <input type="hidden" name="galeri_id" value="<?php echo $instagalericek['galeri_id'] ?>">

            <button class="btn btn-success" name="gelenfotoid">Gönder</button>
          </form>


       



        </div>
      </div>
    </div>
  </div>


</div>
</div>
<!-- /page content -->

<?php include 'footer.php'; ?>


