



<form method="post" action="fiyat-hesapla.php">
  <label for="metre">Metre:</label>
  <input type="text" id="metre" name="metre" required>

  <label for="metre">Kaç metrelik uzunluklarla (cm):</label>
  <input type="text" id="olasi_uzunluk" name="olasi_uzunluk" required>


 <br> <br>
  <label for="duba_deger">Duba Pabucu:</label>
    <select id="duba_pabuc" name="duba_pabuc">
    <option value="56">1 Pabuç</option>
    <option value="102">2'li Pabuç</option>
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

  <br> <br> <br>
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

  <br>
  <br>
  <button type="submit">Fiyatlandır</button>
</form>



<br>
<br>
<a href="p100.php">p100 e git</a>

<br>


<br>

<hr>





<p>


90 mm - 3,43.-€/mt<br>
125 mm - 6,51.-€/mt<br>
160 mm - 10,66.-€/mt<br>
180 mm - 13,48.-€/mt<br>
00 mm -  16,64 €/mt

</p>



  <input type="number" id="sayiInput" placeholder="Bir sayı girin">
    <button onclick="hesapla()">Hesapla</button>
    <p id="sonuc"></p>

    <script>
        function hesapla() {
            var sayi = parseFloat(document.getElementById("sayiInput").value);
            var yuzde = 0.6;

            var yeniSayi = sayi * (1 + yuzde);
            document.getElementById("sonuc").textContent = "Sonuç: " + yeniSayi;
        }
    </script>