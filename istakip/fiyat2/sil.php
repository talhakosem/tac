<?php
$dosyaDizini = ''; 


$dosyalar = glob($dosyaDizini . '*.txt');

foreach ($dosyalar as $dosya) {
    if (is_file($dosya)) {
        unlink($dosya);
    }
}

header('Location: yeni.php');
exit;
?>
