-- ============================================================
-- RE-FLEXIBLE / Reflexible -> Tac Bariyer değiştirme
-- MySQL'de çalıştırın (büyük/küçük harf farklı yazımlar dahil)
-- ============================================================
-- Kullanım: Bu dosyayı phpMyAdmin'de SQL sekmesinde yapıştırıp
-- çalıştırın veya: mysql -u kullanici -p veritabani < replace_reflexible_to_tacbariyer.sql
-- ============================================================

-- Önce kullanacağınız veritabanını seçin:
-- USE ahsapvad_reflexible;

-- Helper: Bir metinde tüm reflexible varyantlarını 'Tac Bariyer' yapar
-- (RE-FLEXIBLE, Reflexible, re-flexible, reflexible, Re-Flexible vb.)

-- --------------------------------------------------------
-- 1. listekaydet tablosu - link sütunu (/re-flexible -> /tac-bariyer veya Tac Bariyer)
-- --------------------------------------------------------
UPDATE `listekaydet`
SET `link` = REPLACE(REPLACE(REPLACE(REPLACE(
    `link`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer');

-- --------------------------------------------------------
-- 2. urun tablosu - metin sütunları
-- --------------------------------------------------------
UPDATE `urun`
SET
  `urun_aciklamaust` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_aciklamaust`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_detay` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_detay`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_keyword` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_keyword`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_aciklama1` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_aciklama1`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_madde1` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_madde1`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_madde2` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_madde2`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer'),
  `urun_madde3` = REPLACE(REPLACE(REPLACE(REPLACE(
    `urun_madde3`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'reflexible', 'Tac Bariyer');

-- --------------------------------------------------------
-- 3. yazi tablosu (bloglar) - yazi_detay, yazi_description, yazi_keyword
-- (Re-Flexible, Re-flexble yazım hatası vb. dahil)
-- --------------------------------------------------------
UPDATE `yazi`
SET
  `yazi_detay` = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
    `yazi_detay`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Re-Flexible', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'Re-flexble', 'Tac Bariyer'),
  `yazi_description` = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
    `yazi_description`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Re-Flexible', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'Re-flexble', 'Tac Bariyer'),
  `yazi_keyword` = REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(
    `yazi_keyword`,
    'RE-FLEXIBLE', 'Tac Bariyer'),
    'Re-Flexible', 'Tac Bariyer'),
    'Reflexible', 'Tac Bariyer'),
    're-flexible', 'Tac Bariyer'),
    'Re-flexble', 'Tac Bariyer');

-- (re-flexble ve reflexible bloglarda da olabilir)
UPDATE `yazi`
SET
  `yazi_detay` = REPLACE(REPLACE(`yazi_detay`, 're-flexble', 'Tac Bariyer'), 'reflexible', 'Tac Bariyer'),
  `yazi_description` = REPLACE(REPLACE(`yazi_description`, 're-flexble', 'Tac Bariyer'), 'reflexible', 'Tac Bariyer'),
  `yazi_keyword` = REPLACE(REPLACE(`yazi_keyword`, 're-flexble', 'Tac Bariyer'), 'reflexible', 'Tac Bariyer');

-- --------------------------------------------------------
-- Kontrol (isteğe bağlı): Değişen satır sayısı
-- --------------------------------------------------------
-- SELECT COUNT(*) FROM urun WHERE urun_aciklama1 LIKE '%Tac Bariyer%' OR urun_detay LIKE '%Tac Bariyer%';
-- SELECT COUNT(*) FROM listekaydet WHERE link LIKE '%Tac Bariyer%';
-- SELECT COUNT(*) FROM yazi WHERE yazi_detay LIKE '%Tac Bariyer%' OR yazi_description LIKE '%Tac Bariyer%';
