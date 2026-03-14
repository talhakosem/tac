<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $metre = $_POST['metre'];
  $olasi_uzunluk = $_POST['olasi_uzunluk'];
  $duba_pabuc = $_POST['duba_pabuc'];
  $cap = $_POST['cap'];
  $boy = $_POST['boy'];
  $kol1 = $_POST['kol1'];
  $kol2 = $_POST['kol2'];
  $kol3 = $_POST['kol3'];

  $duba_boru = ($cap * $boy) / 100;
  $duba_deger = $duba_pabuc + $duba_boru;

  $kol1_fiyati = $kol1 * $metre;
  $kol2_fiyati = $kol2 * $metre;
  $kol3_fiyati = $kol3 * $metre;

  $kol_toplam = $kol1_fiyati + $kol2_fiyati + $kol3_fiyati;

  echo "Hesaplanan metre: " . $metre . " ///// Toplam Kol Fiyatı: " . number_format($kol_toplam, 2, ',', '.') . " € ///// ";

  // Duba sayısını ve fiyatını hesapla
  $santimetre = $metre * 100;
  $dubalar = floor($santimetre / $olasi_uzunluk) + 1;;
  $kalan_santimetre = $santimetre % $olasi_uzunluk;

  if ($kalan_santimetre > $olasi_uzunluk * 0.2) {
    $dubalar++;
  }

  $duba_fiyat = $dubalar * $duba_deger;
  echo "Duba fiyatı: " . number_format($duba_fiyat, 2, ',', '.') . " €<br><hr><br><br>";
  echo "<b>Toplam Duba Sayısı: " . $dubalar . "</b><br><hr>";

  // Toplam fiyatı hesapla ve ekrana yazdır
  $toplam_fiyat = $kol_toplam + $duba_fiyat;
  echo "<b>Toplam Fiyat: " . number_format(ceil($toplam_fiyat), 2, ',', '.') . " €</b>";
}

