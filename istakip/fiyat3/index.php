<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $resim_url = $_POST['resim_id'];
  $urun_id = $_POST['urun_id'];
  $duba_adet = $_POST['duba_adet'];
  $musteri_isim = $_POST['isim'];
  $metre = $_POST['metre'];
  $aciklama1 = $_POST['aciklama1'];
  $aciklama2 = $_POST['aciklama2'];
  $fiyat1 = $_POST['fiyat1'];
  $olasi_uzunluk = $_POST['olasi_uzunluk'];
  $duba_pabuc = $_POST['duba_pabuc'];
  $cap = $_POST['cap'];
  $boy = $_POST['boy'];
  $kol1 = $_POST['kol1'];
  $kol2 = $_POST['kol2'];
  $kol3 = $_POST['kol3'];
  //kol isimlendirme
  $kol1_isim = null;
  $kol2_isim = null;
  $kol3_isim = null;

  $duba_cap_isim = null;
  $pubuc_isim = null;

  if ($_POST['duba_pabuc'] == '102') {
    $pabuc_isim = "İkili Pabuç";
  }

  if ($_POST['duba_pabuc'] == '56') {
    $pabuc_isim = "Tek Pabuç";
  }



  if ($_POST['cap'] == '11.50') {
    $duba_cap_isim = "Q90";
  }
  if ($_POST['cap'] == '17') {
    $duba_cap_isim = "Q110";
  }
  if ($_POST['cap'] == '22') {
    $duba_cap_isim = "Q125";
  }
  if ($_POST['cap'] == '36.55') {
    $duba_cap_isim = "Q160";
  }
  if ($_POST['cap'] == '42.75') {
    $duba_cap_isim = "Q180";
  }
  if ($_POST['cap'] == '50.5') {
    $duba_cap_isim = "Q200";
  }




  if ($_POST['kol1'] == '11.50') {
    $kol1_isim = "Q90";
  }
  if ($_POST['kol1'] == '17') {
    $kol1_isim = "Q110";
  }
  if ($_POST['kol1'] == '22') {
    $kol1_isim = "Q125";
  }
  if ($_POST['kol1'] == '36.55') {
    $kol1_isim = "Q160";
  }
  if ($_POST['kol1'] == '42.75') {
    $kol1_isim = "Q180";
  }
  if ($_POST['kol1'] == '50.5') {
    $kol1_isim = "Q200";
  }

  if ($_POST['kol2'] == '11.50') {
    $kol2_isim = " Q90";
  }
  if ($_POST['kol2'] == '17') {
    $kol2_isim = " Q110";
  }
  if ($_POST['kol2'] == '22') {
    $kol2_isim = " Q125";
  }
  if ($_POST['kol2'] == '36.55') {
    $kol2_isim = " Q160";
  }
  if ($_POST['kol2'] == '42.75') {
    $kol2_isim = " Q180";
  }
  if ($_POST['kol2'] == '50.5') {
    $kol2_isim = " Q200";
  }

  if ($_POST['kol3'] == '11.50') {
    $kol3_isim = " Q90";
  }
  if ($_POST['kol3'] == '17') {
    $kol3_isim = " Q110";
  }
  if ($_POST['kol3'] == '22') {
    $kol3_isim = " Q125";
  }
  if ($_POST['kol3'] == '36.55') {
    $kol3_isim = " Q160";
  }
  if ($_POST['kol3'] == '42.75') {
    $kol3_isim = " Q180";
  }
  if ($_POST['kol3'] == '50.5') {
    $kol3_isim = " Q200";
  }

//duba_deger , boy, çap , pabuç, adet
if ($_POST['urun_id'] == "duba") {
  $duba_boru =($cap*$boy) / 100;
  $duba_deger = ($duba_pabuc+$duba_boru) * $duba_adet;
}
else if ($_POST['urun_id'] == "diger") {
  null;
}
else {
  $duba_boru =($cap*$boy) / 100;
  $duba_deger = $duba_pabuc+$duba_boru;
  
  $kol1_fiyati= $kol1 * $metre;
  $kol2_fiyati= $kol2 * $metre;
  $kol3_fiyati= $kol3 * $metre;
  
  $santimetre = $metre * 100;
  $dubalar = floor($santimetre / $olasi_uzunluk) + 1;;
  $kalan_santimetre = $santimetre % $olasi_uzunluk;

  if ($kalan_santimetre > $olasi_uzunluk * 0.2) {
    $dubalar++;
  }

  $duba_fiyat = $dubalar * $duba_deger;
    $kol_toplam = $kol1_fiyati+$kol2_fiyati+$kol3_fiyati;
    $toplam_fiyat = $kol_toplam + $duba_fiyat;
}

}
?>
<?php
    $ticket_number = $_POST['ticketNumarasi'];
    $tarih = date("d.m.Y");
?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ticketNumarasi = $_POST["ticketNumarasi"];
    $dosyaAdi = $ticketNumarasi . "_urunler.txt";
    if ($_POST['urun_id'] == "duba") {
      $dosyaIcerigi = '<tr>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #6c2e05; line-height: 18px; vertical-align: top; padding:10px 0;" class="article">
           Duba ('.$duba_cap_isim.') » '.$pabuc_isim.'
      </td>
      <td><img src="'. $resim_url .'" width="50" height="40" alt="logo" border="0" /></td>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding:10px 0;" align="center">' . $duba_adet . '</td>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #1e2b33; line-height: 18px; vertical-align: top; padding:10px 0;" align="right">' . $duba_deger * $duba_adet . '</td>
    </tr>';
    }
   else if ($_POST['urun_id'] == "diger") {
      $dosyaIcerigi = '<tr>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #6c2e05; line-height: 18px; vertical-align: top; padding:10px 0;" class="article">
      '.$aciklama1.' <br> '.$aciklama2.'
      </td>
      <td><img src="'. $resim_url .'" width="50" height="40" alt="logo" border="0" /></td>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding:10px 0;" align="center">' . $duba_adet . '</td>
      <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #1e2b33; line-height: 18px; vertical-align: top; padding:10px 0;" align="right">' . $fiyat1 . '</td>
    </tr>';
    }
    else {
       $dosyaIcerigi = '<tr>
    <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #6c2e05; line-height: 18px; vertical-align: top; padding:10px 0;" class="article">
        Kol (' . $kol1_isim . $kol2_isim . $kol3_isim . ') <br> Duba (L-'. $olasi_uzunluk. ') ('.$duba_cap_isim.') » '.$pabuc_isim.'
    </td>
    <td><img src="'. $resim_url .'" width="50" height="40" alt="logo" border="0" /></td>
    <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #646a6e; line-height: 18px; vertical-align: top; padding:10px 0;" align="center">' . $dubalar . '</td>
    <td style="font-size: 12px; font-family: \'Open Sans\', sans-serif; color: #1e2b33; line-height: 18px; vertical-align: top; padding:10px 0;" align="right">' . $toplam_fiyat . '</td>
  </tr>';
    }
   
  file_put_contents($dosyaAdi, $dosyaIcerigi, FILE_APPEND);

}
?>

<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $ticketNumarasi = $_POST["ticketNumarasi"];
    $dosyaAdi = $ticketNumarasi . "_fiyat.txt";
    $dosyainput = file_get_contents($dosyaAdi);
    if ($_POST['urun_id'] == "duba") {
    $dosyaput = $dosyainput + ($duba_deger * $duba_adet);
    }
    else if ($_POST['urun_id'] == "diger") {
      $dosyaput = $dosyainput + ($fiyat1);
      }
    else {
      $dosyaput = $dosyainput + $toplam_fiyat;
    }
    file_put_contents($dosyaAdi, '');
  file_put_contents($dosyaAdi, $dosyaput, FILE_APPEND);

}
?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Fiyat Teklifi</title>
<meta name="robots" content="noindex,nofollow" />
<meta name="viewport" content="width=device-width; initial-scale=1.0;" />
<style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,700);
  body { margin: 0; padding: 0; background: #e1e1e1; }
  a { text-decoration: none; }
  div, p, a, li, td { -webkit-text-size-adjust: none; }
  .ReadMsgBody { width: 100%; background-color: #ffffff; }
  .ExternalClass { width: 100%; background-color: #ffffff; }
  body { width: 100%; height: 100%; background-color: #e1e1e1; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  html { width: 100%; }
  p { padding: 0 !important; margin-top: 0 !important; margin-right: 0 !important; margin-bottom: 0 !important; margin-left: 0 !important; }
  .visibleMobile { display: none; }
  .hiddenMobile { display: block; }

  @media only screen and (max-width: 600px) {
  body { width: auto !important; }
  table[class=fullTable] { width: 96% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 45% !important; }
  .erase { display: none; }
  }

  @media only screen and (max-width: 420px) {
  table[class=fullTable] { width: 100% !important; clear: both; }
  table[class=fullPadding] { width: 85% !important; clear: both; }
  table[class=col] { width: 100% !important; clear: both; }
  table[class=col] td { text-align: left !important; }
  .erase { display: none; font-size: 0; max-height: 0; line-height: 0; padding: 0; }
  .visibleMobile { display: block !important; }
  .hiddenMobile { display: none !important; }
  }
</style>
<div id="html-content">
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tr>
    <td height="20"></td>
  </tr>
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 10px 10px 0 0;">
        <tr class="hiddenMobile">
          <td height="40"></td>
        </tr>
        <tr class="visibleMobile">
          <td height="30"></td>
        </tr>

        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                  <td>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                      <tbody>
                        <tr>
                        <td align="left">  <a href="yeni.php?sirket_adi=<?php echo $ticket_number?>&musteri_isim=<?php echo $musteri_isim;?>"><img src="https://flexsafe.com.tr/dimg/27839logo-esnek-bariyer.png" width="100" height="32" alt="logo" border="0" /></a></td>
                        </tr>
                        <tr class="hiddenMobile">
                          <td height="40"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: left;">
                            Merhaba, <?php echo $musteri_isim; ?>
                            <br> Talebinize istinaden hazırlanan teklifimiz bilgilerinize sunulmaktadır.
                            Değerli siparişlerinizi bekler, çalışmalarınızda başarılar dileriz.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                      <tbody>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td height="5"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 21px; color: #eaee81; letter-spacing: -1px; font-family: 'Open Sans', sans-serif; line-height: 1; vertical-align: top; text-align: right;">
                            Fiyat Teklifi
                          </td>
                        </tr>
                        <tr>
                        <tr class="hiddenMobile">
                          <td height="50"></td>
                        </tr>
                        <tr class="visibleMobile">
                          <td height="20"></td>
                        </tr>
                        <tr>
                          <td style="font-size: 12px; color: #5b5b5b; font-family: 'Open Sans', sans-serif; line-height: 18px; vertical-align: top; text-align: right;">
                          <?php
                            function generate_teklif_number() {
                            $num_digits = rand(4, 5);
                            $min_value = pow(10, $num_digits - 1);
                            $max_value = pow(10, $num_digits) - 1;
                            $teklif_number = rand($min_value, $max_value);
                            return "#" . $teklif_number;
                            }
                            $teklif = generate_teklif_number();
                            ?>
                             <a href="sil.php"><small>Teklif <?php echo $teklif; ?></small> <br /></a>
                            <small><?php echo $tarih; ?></small>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 10px 7px 0;" width="52%" align="left">
                        Açıklama
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="left">
                        <small>Görsel</small>
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="center">
                        Duba Sayısı
                      </th>
                      <th style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #1e2b33; font-weight: normal; line-height: 1; vertical-align: top; padding: 0 0 7px;" align="right">
                        Toplam
                      </th>
                    </tr>
                    <tr>
                      <td height="1" style="background: #bebebe;" colspan="4"></td>
                    </tr>
                    <tr>
                      <td height="10" colspan="4"></td>
                    </tr>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                    <?php

$dosyaAdi = $ticketNumarasi . "_urunler.txt";

if (file_exists($dosyaAdi)) {
    $dosyaIcerigi = file_get_contents($dosyaAdi);
    $satirlar = explode(" ", $dosyaIcerigi);
    foreach ($satirlar as $satir) {
        echo $satir . " ";
    }
} 
?>
                    <tr>
                      <td height="1" colspan="4" style="border-bottom:1px solid #e4e4e4"></td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td height="20"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                        <strong>Toplam fiyat</strong>
                      </td>
                      <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #000; line-height: 22px; vertical-align: top; text-align:right; ">
                      <?php
                      $dosyafiyat = $ticketNumarasi . "_fiyat.txt";
                       echo "<strong> " . file_get_contents($dosyafiyat) . " €</strong>"; 
                       ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tbody>
    <tr>
      <td>
        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff">
          <tbody>
            <tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="40"></td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td>
                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">

                          <tbody>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>SATIŞ VE TESLİM ŞARTLARI</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="10"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                <li> Fiyatlara KDV dahil değildir.</li>
                                    <li> Teklifimiz aynı zamanda sözleşme niteliği taşımaktadır. Ayrıca bir sözleşmeye
                                        gerek yoktur.  </li>
                                    <li> Montaj firmamız tarafından yapılması durumunda montaja engel olan unsurlar
                                        müşteri tarafından kaldırılacaktır ve sadece montaj faturalandırılacaktır. </li>
                                    <li> Demontaj tarafımızca yapılması durumunda ilave fatura edilecektir </li>
                                    <li> Müşteri tarafından teklif talebi üzerinde teyit edilen bilgilerin yanlış aktarılması veyaeksik verilmesi yüzünden doğacak kusurlardan ﬁrmamız sorumlu değildir. </li>
                                    <li> Siparişle birlikte teknik ve ticari şartlarımızın tüm maddelerinin müşteri tarafından onaylanmış olduğu kabul edilir ve siparişte alınan avans karşılığından imalata başlanacağından herhangi bir sebepten dolayı siparişin iptalinde, avans iade edilemez, avans miktarı kadar ürün teslim edilir. Kalan bakiye ile ilgili üretici ﬁrmanın uygulayacağı prosedür müşteriye birebir intikal ettirilir.  </li>
                              </td>
                            </tr>
                          </tbody>
                        </table>


                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                          <tbody>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>
                                    </strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="10"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                <li> Teslim süresi teklif günündeki imalat programına göre verilmiştir, değişebilir </li>
                                    <li> Teklifin geçerlilik süresi 7 gündür. </li>
                                    <li> Teslim süresi 30 iş günüdür. </li>
                                <li> Personel yemek ücreti tarafımıza aittir. </li>
                                <li> Siparişten sonra miktar azalması, malzeme tipinin değiştirilmesi talebine karşılık üretimde ek maliyet oluşturursa, bu miktar müşteriye fatura edilir. </li>
                                <li> Müşterinin tekliﬁmizi onaylamayıp kendi sipariş formunu göndermesi ve sipariş formunda, tarafımızdan belirtilen tüm teklif ve genel şartların teyit edilmemiş olması durumunda ﬁrmamız siparişi kabul edip etmemekte serbesttir. </li>
                                <li> Ödeme, Siparişe istinaden %50 Peşin, Kalan Bakiye Malzeme tesliminde alınacaktır. </li>
                                <li> Döviz kurunda %2 artış olması durumunda ﬁyat güncellemesi yapılacaktır. </li>
                                <li> Anlaşmazlık halinde KOCAELİ mahkemeleri yetkilidir. </li>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr>
              <td>
                <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
                  <tbody>
                    <tr>
                      <td>
                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="left" class="col">
                          <tbody>
                            <tr class="hiddenMobile">
                              <td height="35"></td>
                            </tr>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>İLETİŞİM</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="10"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                Adres: Sanayi Mah., 13. Blok, 14 Cd., No:17 İzmit - KOCAELİ<br> Sabit: 0262 335 0522<br> Tel: 0543 572 4100<br> www.flexsafe.com.tr<br> info@flexsafe.com.tr
                              </td>
                            </tr>
                          </tbody>
                        </table>


                        <table width="220" border="0" cellpadding="0" cellspacing="0" align="right" class="col">
                          <tbody>
                            <tr class="hiddenMobile">
                              <td height="35"></td>
                            </tr>
                            <tr class="visibleMobile">
                              <td height="20"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 11px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 1; vertical-align: top; ">
                                <strong>ÖDEME</strong>
                              </td>
                            </tr>
                            <tr>
                              <td width="100%" height="10"></td>
                            </tr>
                            <tr>
                              <td style="font-size: 12px; font-family: 'Open Sans', sans-serif; color: #5b5b5b; line-height: 20px; vertical-align: top; ">
                                <strong>FLEXSAFE ESNEK BARİYER SİSTEMLERİ SANAYİ VE TİCARET LİMİTED ŞİRKETİ</strong><br>
                                IBAN : TR970006701000000040366066 <br>
                                USD IBAN : TR340006701000000040376027
                              </td>
                              
                            </tr>
                            
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
            <tr class="hiddenMobile">
              <td height="60"></td>
            </tr>
            <tr class="visibleMobile">
              <td height="30"></td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#e1e1e1">
  <tr>
    <td>
      <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullTable" bgcolor="#ffffff" style="border-radius: 0 0 10px 10px;">
        <tr>
          <td>
            <table width="480" border="0" cellpadding="0" cellspacing="0" align="center" class="fullPadding">
              <tbody>
                <tr>
                <td><img src="kase.png" width="500" height="150" alt="flexsafe"></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <tr class="spacer">
          <td height="50"></td>
        </tr>

      </table>
    </td>
  </tr>
  <tr>
    <td height="20"></td>
  </tr>
</table>
</div>
