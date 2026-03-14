<?php
if (isset($_GET['resim_id']) && !empty($_GET['resim_id'])) {
  $resim_url = $_GET['resim_id'];
  $musteri = $_GET['musteri_isim'];
  $sirket_adi = $_GET['sirket_adi'];
  $urun = $_GET['urun'];
}
else {
  header("Location: yeni.php");
  exit(); 
}
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fiyat Al</title>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
    </head>
    <body>
      <div class="row">
    <div class="col-md-12">
      <form action="index.php" method="post">
      <div align="center">
         <img src="https://flexsafe.com.tr/dimg/27839logo-esnek-bariyer.png" width="200" height="50" alt="flexsafe">
  </div>        
  <br>

  <fieldset>
  <?php
if (isset($_GET['resim_id']) && !empty($_GET['resim_id'])) {
  $resim_url = $_GET['resim_id'];
  $sirket_adi = $_GET['sirket_adi'];
  $urun = $_GET['urun'];
}
else {
  header("Location: yeni.php");
  exit(); 
}
?>
<?php

if ($urun == "duba") {
  $dosyaIceri = '<legend><span class="number">1</span> Müşteri Bilgileri</legend>
  <label for="isim">Müşterinin Adı:</label>
  <input type="text" id="isim" name="isim" value="'. $musteri .'" required>
  <label for="ticketNumarasi">Firmanın Adı:</label>
  <input type="text" id="ticketNumarasi" name="ticketNumarasi" value="' . $sirket_adi .'" required>
  <input type="text" id="resim_id" name="resim_id" value="'. $resim_url .'" hidden>
  <input type="text" id="urun_id" name="urun_id" value="duba" hidden>

  </fieldset>
  <fieldset>
  
  <legend><span class="number">2</span> Duba Bilgileri</legend>

  <label for="duba_deger">Duba boyu (cm):</label>
  <select id="boy" name="boy">
      <option value="30">30</option>
      <option value="40">40</option>
      <option value="50">50</option>
      <option value="60">60</option>
      <option value="70">70</option>
      <option value="80">80</option>
      <option value="90">90</option>
      <option value="100">100</option>
      <option value="110">110</option>
      <option value="120">120</option>
  </select>

  <label for="duba_deger">Duba Pabucu:</label>
  <select id="duba_pabuc" name="duba_pabuc">
      <option value="56">1 Pabuç</option>
      <option value="102">2\'li Pabuç</option>
  </select>

  <label for="duba_deger">Duba çapı:</label>
  <select id="cap" name="cap">
      <option value="11.50">Q90</option>
      <option value="17">Q110</option>
      <option value="22">Q125</option>
      <option value="36.55">Q160</option>
      <option value="42.75">Q180</option>
      <option value="50.5">Q200</option>
  </select>

  <label for="duba_adet">Duba Adet:</label>
  <input type="text" id="duba_adet" name="duba_adet" required>
  
  </fieldset>';
  echo $dosyaIceri;
    
}
else {
  $dosyaIceri = '
  <fieldset>
    <legend><span class="number">1</span> Müşteri Bilgileri</legend>
    <label for="isim">Müşterinin Adı:</label>
    <input type="text" id="isim" name="isim" value="'. $musteri .'" required>
    <label for="ticketNumarasi">Firmanın Adı:</label>
    <input type="text" id="ticketNumarasi" name="ticketNumarasi" value="'.$sirket_adi.'" required>
    <input type="text" id="resim_id" name="resim_id" value="'.$resim_url.'" hidden>
  </fieldset>
  <fieldset>
    <legend><span class="number">2</span> Duba Bilgileri</legend>
    <label for="metre">Metre:</label>
    <input type="text" id="metre" name="metre" required>
    <label for="metre">Kaç metrelik uzunluklarla (cm):</label>
    <input type="text" id="olasi_uzunluk" name="olasi_uzunluk" required>
    <label for="duba_deger">Duba boyu (cm):</label>
    <select id="boy" name="boy">
      <option value="30">30</option>
      <option value="40">40</option>
      <option value="50">50</option>
      <option value="60">60</option>
      <option value="70">70</option>
      <option value="80">80</option>
      <option value="90">90</option>
      <option value="100">100</option>
      <option value="110">110</option>
      <option value="120">120</option>
    </select>
    <label for="duba_deger">Duba Pabucu:</label>
    <select id="duba_pabuc" name="duba_pabuc">
      <option value="56">1 Pabuç</option>
      <option value="102">2\'li Pabuç</option>
    </select>
    <label for="duba_deger">Duba çapı:</label>
    <select id="cap" name="cap">
      <option value="11.50">Q90</option>
      <option value="17">Q110</option>
      <option value="22">Q125</option>
      <option value="36.55">Q160</option>
      <option value="42.75">Q180</option>
      <option value="50.5">Q200</option>
    </select>
  </fieldset>
  <fieldset>
    <legend><span class="number">3</span> Kol Bilgileri</legend>
    <div class="flex-container">
      <label for="kol1">Kol 1:</label>
      <select id="kol1" name="kol1">
        <option value="11.50">Q90</option>
        <option value="17">Q110</option>
        <option value="22">Q125</option>
        <option value="36.55">Q160</option>
        <option value="42.75">Q180</option>
        <option value="50.5">Q200</option>
      </select>
      <label for="kol2">Kol 2:</label>
      <select id="kol2" name="kol2">
        <option value="0">Yok</option>
        <option value="11.50">Q90</option>
        <option value="17">Q110</option>
        <option value="22">Q125</option>
        <option value="36.55">Q160</option>
        <option value="42.75">Q180</option>
        <option value="50.5">Q200</option>
      </select>
      <label for="kol3">Kol 3:</label>
      <select id="kol3" name="kol3">
        <option value="0">Yok</option>
        <option value="11.50">Q90</option>
        <option value="17">Q110</option>
        <option value="22">Q125</option>
        <option value="36.55">Q160</option>
        <option value="42.75">Q180</option>
        <option value="50.5">Q200</option>
      </select>
    </div>
  </fieldset>';
  echo $dosyaIceri;
}
?>
          
       
        <button type="submit">Fiyat Oluştur</button>
        
        
       </form>
        </div>
      </div>
      
    </body>
</html>


<style>
  *, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #ddee48;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #d3eb21;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #c2f541;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}

@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}

</style>