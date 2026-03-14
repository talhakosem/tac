
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

<legend><span class="number">1</span> Müşteri Bilgileri</legend>
  <label for="ticketNumarasi">Firmanın Adı:</label>
  <input type="text" id="ticketNumarasi" name="ticketNumarasi" value="" required>
  <input type="text" id="urun_id" name="urun_id" value="diger" hidden>
  </fieldset>
  <fieldset>
  
  <legend><span class="number">2</span> Ürün Bilgileri</legend>
  <label for="resim_id">Ürünün Resmi:</label>
  <input type="text" id="resim_id" name="resim_id" placeholder="https://..." required>

  <label for="aciklama">Ürün bilgileri:</label>
  <label for="aciklama">1. Satır:</label>
  <input type="text" id="aciklama1" name="aciklama1" placeholder="Kol (Q30) ..." required>
  <label for="aciklama">2. Satır:</label>
  <input type="text" id="aciklama2" name="aciklama2" placeholder="Duba (L - 30) ..." required>

  <label for="duba_adet">Duba Sayisi:</label>
  <input type="text" id="duba_adet" name="duba_adet">

  <label for="fiyat">Fiyat</label>
  <input type="text" id="fiyat1" name="fiyat1" required>
  
  </fieldset>
              
       
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