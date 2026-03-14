-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 14 Mar 2026, 17:09:57
-- Sunucu sürümü: 10.3.39-MariaDB
-- PHP Sürümü: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ahsapvad_reflexible`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayar`
--

CREATE TABLE `ayar` (
  `ayar_logo` varchar(250) NOT NULL,
  `ayar_ikon` varchar(500) NOT NULL,
  `ayar_title` varchar(250) NOT NULL,
  `ayar_description` varchar(250) NOT NULL,
  `ayar_author` varchar(50) NOT NULL,
  `ayar_tel` varchar(50) NOT NULL,
  `ayar_gsm` varchar(50) NOT NULL,
  `ayar_mail` varchar(50) NOT NULL,
  `ayar_adres` varchar(250) NOT NULL,
  `ayar_facebook` varchar(150) NOT NULL,
  `ayar_linkedin` varchar(150) NOT NULL,
  `ayar_pinterest` varchar(150) NOT NULL,
  `ayar_instagram` varchar(150) NOT NULL,
  `ayar_youtube` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ayar`
--

INSERT INTO `ayar` (`ayar_logo`, `ayar_ikon`, `ayar_title`, `ayar_description`, `ayar_author`, `ayar_tel`, `ayar_gsm`, `ayar_mail`, `ayar_adres`, `ayar_facebook`, `ayar_linkedin`, `ayar_pinterest`, `ayar_instagram`, `ayar_youtube`) VALUES
('goz/28109tac.png', 'goz/31439ikontacbar-removebg-preview.png', 'Esnek Bariyer Tac Bariyer', 'Esnek Bariyer Tac Bariyer: Yeniden kullanılabilir, dayanıklı ve çevre dostu esnek bariyer sistemleri, güvenlik ve estetik için mükemmel bir çözüm sunar.', 'Esnek Bariyer', '0535 035 0470', '0535 035 0470', 'bilgi@tacbariyer.com', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `banka`
--

CREATE TABLE `banka` (
  `banka_id` int(11) NOT NULL,
  `banka_ad` varchar(50) NOT NULL,
  `banka_iban` varchar(50) NOT NULL,
  `banka_hesapadsoyad` varchar(50) NOT NULL,
  `banka_durum` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `email`
--

CREATE TABLE `email` (
  `ayar_id` int(11) NOT NULL,
  `musteri_mail` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `email`
--

INSERT INTO `email` (`ayar_id`, `musteri_mail`) VALUES
(5, 'firatbogdi6@gmail.com'),
(11, 'yasemin@yaselforklift.com'),
(12, 'duzce@flexsafe.com.tr'),
(13, 'import.manager@atenk.am');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hakkimizda`
--

CREATE TABLE `hakkimizda` (
  `hakkimizda_id` int(11) NOT NULL,
  `hakkimizda_foto` varchar(202) NOT NULL,
  `hakkimizda_video` varchar(1000) NOT NULL,
  `hakkimizda_baslik` varchar(300) NOT NULL,
  `hakkimizda_icerik` text NOT NULL,
  `hakkimizda_madde1` varchar(80) NOT NULL,
  `hakkimizda_madde2` varchar(80) NOT NULL,
  `hakkimizda_madde3` varchar(80) NOT NULL,
  `hakkimizda_madde4` varchar(80) NOT NULL,
  `hakkimizda_kalite_baslik` varchar(500) NOT NULL,
  `hakkimizda_kalite` text NOT NULL,
  `hakkimizda_misyon_baslik` varchar(500) NOT NULL,
  `hakkimizda_misyon` text NOT NULL,
  `hakkimizda_vizyon_baslik` varchar(500) NOT NULL,
  `hakkimizda_vizyon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `instagaleri`
--

CREATE TABLE `instagaleri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_resimyol` varchar(250) NOT NULL,
  `galeri_durum` varchar(20) NOT NULL DEFAULT '1',
  `urun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_ad` varchar(100) NOT NULL,
  `kategori_desc` varchar(250) NOT NULL,
  `kategori_ust` int(2) NOT NULL,
  `kategori_seourl` varchar(250) NOT NULL,
  `kate_resimyol` varchar(222) NOT NULL,
  `kategori_sira` int(2) NOT NULL,
  `kategori_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_ad`, `kategori_desc`, `kategori_ust`, `kategori_seourl`, `kate_resimyol`, `kategori_sira`, `kategori_durum`) VALUES
(47, 'Kategoriler', 'esnek bariyer', 0, 'kategoriler', '', 1, '1'),
(48, 'Güvenlik Bariyerleri', 'Esnek güvenlik bariyerleri: Darbelere karşı maksimum koruma sağlayan, dayanıklı ve sürdürülebilir bariyerlerle iş güvenliğinizi en üst düzeye taşıyın!', 47, 'guvenlik-bariyerleri', 'goz/kategori/21612guvenlik-bariyeri.jpg', 1, '1'),
(49, 'Yaya Yolu Bariyerleri ', 'Yaya yolu bariyeri, insanları forklift yollarından ayırarak kazaları önler. Esnek yapısı sayesinde darbeleri absorbe eder ve eski formuna geri döner.', 47, 'yaya-yolu-bariyerleri', 'goz/kategori/28268yaya-yolu-bariyeri.jpg', 2, '1'),
(50, 'Raf Koruma Bariyerleri', 'Raf koruma bariyeri, raf ayaklarını darbelere karşı korur. Küçük ama etkili yapısıyla dokunmalarda rafları güvence altına alır, hasarı önler.', 47, 'raf-koruma-bariyerleri', 'goz/kategori/23704raf-koruma-bariyeri.jpg', 3, '1'),
(52, 'Kolon Koruma Bariyerleri', 'Kolonu dört bir yandan sararak hem kolonu hem de çarpacak olan aracı korur. ', 47, 'kolon-koruma-bariyerleri', 'goz/kategori/23694kolon-koruma.jpg', 5, '1'),
(53, 'Köşe Bariyerleri', 'Köşe bariyeri, köşeleri sararak araç çarpışmalarını önler. Darbeleri emerek hem köşeleri hem de araçları korur, iş güvenliğini artırır.', 47, 'kose-bariyerleri', 'goz/kategori/30992kose-esnek-bariyeri.jpg', 7, '1'),
(54, 'Dubalar ve Zemin Bariyeri', ' Dubalar, esnek ve dayanıklı yapısıyla trafik yönlendirmesi sağlar. Dikkat çekici renkleri yüksek görünürlük sunar.', 47, 'dubalar-ve-zemin-bariyeri', 'goz/27366300402276227359esnek-duba.jpg', 6, '1'),
(55, 'Kapılar', 'Esnek kapılar, sık kullanılan alanlarda hızlı açılıp kapanma sağlar. Darbelere karşı dirençli ve enerji tasarrufludur.', 47, 'kapilar', 'goz/kategori/25799esnek-kapi-bariyer.jpg', 8, '1'),
(56, 'Ek Ürün', 'parça', 47, 'ek-urun', 'goz/26650291793197726971', 15, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `kullanici_id` int(11) NOT NULL,
  `kullanici_zaman` datetime NOT NULL DEFAULT current_timestamp(),
  `kullanici_mail` varchar(100) NOT NULL,
  `kullanici_gsm` varchar(50) NOT NULL,
  `kullanici_password` varchar(50) NOT NULL,
  `kullanici_adsoyad` varchar(50) NOT NULL,
  `kullanici_adres` varchar(250) NOT NULL,
  `kullanici_yetki` varchar(50) NOT NULL,
  `kullanici_durum` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`kullanici_id`, `kullanici_zaman`, `kullanici_mail`, `kullanici_gsm`, `kullanici_password`, `kullanici_adsoyad`, `kullanici_adres`, `kullanici_yetki`, `kullanici_durum`) VALUES
(147, '2020-01-14 05:59:25', 'admin', '05350350470', 'saru45', 'Tac Bariyer', '', '5', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `listekaydet`
--

CREATE TABLE `listekaydet` (
  `liste_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `company` varchar(244) NOT NULL,
  `co_location` varchar(244) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `link` varchar(233) NOT NULL,
  `name` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `privacy_check` varchar(10) NOT NULL,
  `tanitim_istegi` varchar(5) NOT NULL,
  `available` varchar(222) NOT NULL,
  `website` varchar(222) NOT NULL,
  `sektor` varchar(50) NOT NULL,
  `city` varchar(40) NOT NULL,
  `ilce` varchar(40) NOT NULL,
  `mahalle` varchar(40) NOT NULL,
  `sokak` varchar(40) NOT NULL,
  `no` varchar(10) NOT NULL,
  `olcum` varchar(10) NOT NULL,
  `resim_yolu` varchar(233) NOT NULL,
  `geldigiyer` varchar(22) NOT NULL,
  `forklift_tonaji` varchar(10) NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `listekaydet`
--

INSERT INTO `listekaydet` (`liste_id`, `email`, `company`, `co_location`, `phone`, `link`, `name`, `message`, `privacy_check`, `tanitim_istegi`, `available`, `website`, `sektor`, `city`, `ilce`, `mahalle`, `sokak`, `no`, `olcum`, `resim_yolu`, `geldigiyer`, `forklift_tonaji`, `zaman`) VALUES
(292, 'asda@xn--gmal-nza.com', 'asda', '', '5551813545', '/', 'asd', 'asdad', '', '', '', 'asd', 'asda', 'Stuttgart', 'asd', 'asd', 'asd', 'dsa', '1km+', '', 'demo', '15-25', '2024-08-17 15:25:50'),
(293, 'desf@edfe.fe', 'merhaba', 'manisa', '234234', '/', 'Talha', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2024-08-18 10:17:28'),
(294, 'akkayacihan45@gmail.com', '', '', '464646', '/bariyer-z3k-bariyer-59', 'vzxcvzxc', 'sdfsdfsdfs', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2024-09-26 17:46:28'),
(295, 'thomaskingial13@gmail.com', '', '', '86213182616', '/bariyer-z1k-kolon-koruma-bariyeri-67', 'primer-1', 'primer-8', '', 'on', 'primer-5', '', '', '', '', '', '', '', '', '', 'talep', '', '2024-10-04 15:54:36'),
(296, 'bthnegdxrbx2fn5@tempmail.us.com', '', '', '82821262235', '/bariyer-z1k-kolon-koruma-bariyeri-67', 'DanielLiC', 'Whether for personal projects or business needs, tomyAccount.com offers verified accounts that work. Our accounts are reliable, secure, and available instantly. Shop today at tomyAccount.com! \r\n \r\nDive in: \r\n \r\nhttps://tomyAccount.com \r\n \r\nCheers!', '', 'on', 'ToMyAccount', '', '', '', '', '', '', '', '', '', 'talep', '', '2024-11-14 23:56:02'),
(297, 'traiteur@saveurunique.com', '', '', '87732984631', '/bariyer-z1k-kolon-koruma-bariyeri-67', 'dvz87', 'Time to take action! Get accurate business contacts for just $30 and watch your outreach expand. https://telegra.ph/Personalized-Contact-Data-Extraction-from-Google-Maps-10-03 (or telegram: @chamerion)', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2024-11-20 20:42:43'),
(298, 'info@royaldentcare.com', '', '', '83971372916', '/bariyer-z1k-kolon-koruma-bariyeri-67?durum=gonderildi', 'edhuman', 'Time to take action! Get accurate business contacts for just $30 and watch your outreach expand. https://telegra.ph/Personalized-Contact-Data-Extraction-from-Google-Maps-10-03 (or telegram: @chamerion)', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2024-12-13 01:56:07'),
(299, 'metabrez@gmx.de', '', '', '85545651815', '/bariyer-z1k-kolon-koruma-bariyeri-67', 'Matthewwar', 'Trusted by Over 40,933 Men Across the U.S. \r\n \r\nAffordable ED Treatment No Catch \r\n \r\nWe offer 100 mg Generic Viagra® and 20 mg Generic Cialis® for just $0.45 per dose—a price that’s up to 97% less than the big brands. \r\n \r\nHow do we do it? By building our direct-to-patient platform from scratch and sourcing medication directly from the manufacturer, we cut out the middlemen and pass the savings on to you. No hidden fees, no markups—just proven ED treatments at an unbeatable price. \r\n \r\nhttps://cutt.ly/teX52Bd3 \r\nhttps://cutt.ly/geMsuEqP \r\nhttps://telegra.ph/Ordering-Viagra-from-an-online-pharmacy-12-25', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2025-03-10 19:27:07'),
(300, 'brosjonson@mail.ru', '', '', '88843194958', '/bariyer-z1k-kolon-koruma-bariyeri-67', 'Bygado', 'Help me get 1000 subscribers - https://t.me/+8YD4vOIJpnk4ZmVh \r\n \r\nIn my channel I share information about promotion, marketing, crypto and personal life. \r\n \r\nThank you, good person! \r\n \r\nHegado', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2025-03-11 06:25:59'),
(301, 'expan.s.eu.yo.racl.e.71@gmail.com', 'google', 'Р РѕСЃСЃРёСЏ', 'Apple Inc. 2025', '/category-raf-koruma-bariyerleri', 'Apple Inc. 2025. All rights reserved. Apple Inc. 2025. All rights reserved.\r\n 3836999 https://t.me/ grandbooksommer !', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2025-03-16 00:00:16'),
(302, 'mehmet.deniz@vesuvius.com', 'Vesuvius İstanbul Refrakter A.ş.', 'Gosb. osb2 mh. 1000cd. no:1022 çayırova kocaeli', '05354781789', '/re-flexible', 'Mehmet Deniz', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2025-04-07 08:11:28'),
(303, '', '', '', '', '/category-guvenlik-bariyerleri', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2025-04-26 12:54:04'),
(304, 'can@kacarlarmakina.com', '', '', '5062417181', '/bariyer-zemin-bariyeri-92', 'CAN TEZOL', 'Muhtelif boyda esnek zemin bariyeri hakkında görüşmek istiyorum.', '', 'on', '', '', '', '', '', '', '', '', '', '', 'talep', '', '2025-10-16 07:54:45'),
(305, 'n.talhakosem@gmail.com', 'deneme', '', '', 'contact', 'talha', 'merhaba', '', '', '', '', '', '', '', '', '', '', '', '', 'iletisim', '', '2026-03-14 14:01:58'),
(306, 'n.talhakosem@gmail.com', 'ded', '', '', 'contact', 'delel', 'dede', '', '', '', '', '', '', '', '', '', '', '', '', 'iletisim', '', '2026-03-14 14:05:21'),
(307, 'asdfasd@sdf.com', 'sdfsdf', 'asdfads', '32452432', '/contact?durum=gonderildi', 'tafg', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2026-03-14 14:05:53'),
(308, 'nalosy@mailinator.com', 'Joyce Chang Associates', 'Ex impedit ad dolor', '86', '/', 'Hedy Goodwin', '', '', 'on', '', '', '', '', '', '', '', '', '', '', 'kesif', '', '2026-03-14 14:07:09'),
(309, 'jygomov@mailinator.com', 'Moody Melton Inc', '', '81', '/', 'Montana Harrell', 'Possimus sed enim m', '', '', '', 'https://www.cefolydunavej.com', 'Ipsam est minim lab', 'Cologne', 'Saepe accusamus vero', 'Ex aut quasi illo ex', 'At duis aut odio nul', 'Magna proi', '500m+', '', 'demo', '4-5', '2026-03-14 14:07:24');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `marka`
--

CREATE TABLE `marka` (
  `marka_id` int(11) NOT NULL,
  `marka_resimyol` varchar(250) NOT NULL,
  `marka_sira` int(2) NOT NULL,
  `marka_ad` varchar(250) NOT NULL,
  `marka_durum` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `resim`
--

CREATE TABLE `resim` (
  `resim_id` int(11) NOT NULL,
  `resim_ad` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `resim`
--

INSERT INTO `resim` (`resim_id`, `resim_ad`) VALUES
(1, '2619637965.jpg'),
(2, '3049635341.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sepet`
--

CREATE TABLE `sepet` (
  `sepet_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urun_adet` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sepet`
--

INSERT INTO `sepet` (`sepet_id`, `kullanici_id`, `urun_id`, `urun_adet`) VALUES
(1, 169, 4, 1),
(34, 174, 8, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis`
--

CREATE TABLE `siparis` (
  `siparis_id` int(11) NOT NULL,
  `siparis_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `siparis_no` int(11) DEFAULT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `siparis_toplam` float(9,2) NOT NULL,
  `siparis_tip` varchar(50) NOT NULL,
  `siparis_banka` varchar(50) NOT NULL,
  `siparis_odeme` enum('0','1') NOT NULL DEFAULT '0',
  `siparis_adres` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `siparis_detay`
--

CREATE TABLE `siparis_detay` (
  `siparisdetay_id` int(11) NOT NULL,
  `siparis_id` int(11) NOT NULL,
  `urun_id` int(11) DEFAULT NULL,
  `urun_fiyat` varchar(11) DEFAULT '0',
  `urun_adet` int(3) DEFAULT NULL,
  `urun_varyasyon` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `siparis_detay`
--

INSERT INTO `siparis_detay` (`siparisdetay_id`, `siparis_id`, `urun_id`, `urun_fiyat`, `urun_adet`, `urun_varyasyon`) VALUES
(51, 750067, 5, '155.00', 1, NULL),
(52, 750068, 8, '155.00', 2, NULL),
(53, 750069, 3, '155.00', 1, NULL),
(54, 750070, 3, '155.00', 1, NULL),
(55, 750071, 3, '155.00', 1, NULL),
(56, 750072, 3, '155.00', 1, NULL),
(57, 750073, 8, '155.00', 1, NULL),
(58, 750074, 4, '194.00', 1, NULL),
(59, 750075, 11, '194.00', 1, NULL),
(60, 750076, 4, '194.00', 1, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_ad` varchar(100) NOT NULL,
  `slider_resimyol` varchar(250) NOT NULL,
  `slider_sira` int(2) NOT NULL,
  `slider_durum` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_ad`, `slider_resimyol`, `slider_sira`, `slider_durum`) VALUES
(57, '1', 'dimg/slider/22695229572664125898AS.png', 1, '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `stajyer`
--

CREATE TABLE `stajyer` (
  `stajyer_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(100) NOT NULL,
  `no` varchar(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `zaman` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `stajyer`
--

INSERT INTO `stajyer` (`stajyer_id`, `email`, `website`, `no`, `name`, `message`, `zaman`) VALUES
(5, 'itzik@best-practice.co.il', 'www.best-practice.co.il - https://www.facebook.com/randex.co.il?mibextid=ZbWKwL', '+9725599995', 'Itzik Cohen', 'My name Is Itzik Cohen, I&#039;m partner in several Companies that are the field of the intralogistics.\r\nI am the owner of a consulting &amp; planning company for logistics centers and also a strategic consultant for companies in the field of logistics and the supply chain.\r\n\r\nIn addition, I am a partner in a company that deals in a variety of areas in the preparation and furnishing of the structure (logistics centers, industrial buildings and offices) after construction, in preparation for the start of the site&#039;s operation in an optimal, correct and safe manner.\r\nSome of the issues we deal are:\r\n•           Guidance, warning and safety signage Production, supply and installation.\r\n•           Identification stickers for the locations of the various locations in the warehouse Production, supply and installation.\r\n•           Cleaning the warehouse and offices after the construction is finished before the tenants enter.\r\n•           Guidance and safety markings on the floor. Production, supply and installation.\r\n\r\nWe carry out a lot of projects every year (more than 100 projects) and are accessible to almost every project that arises in Israel.\r\n when we recognized this need, we founded a company that provides the solutions for all these issues in one stop shop .\r\nUntil now, in the safety  field, we have provided an answer through a subcontractor.\r\nBut we decided that in order to be efficient, attractive and flexible in the options we can offer our customers, we need to connect with a reliable, high quality and attractive price manufacturer.\r\nWe are interested in adding to the variety of services and solutions that we provide the variety of solutions that your company provides (all the protection range, Door frame protection, Wall Protection  atc&#039;) \r\n\r\nI was exposed to your products in several places. We are interested to Check the feasibility of cooperation and being your exclusive distributor in Israel.\r\n\r\nBest Regards, \r\nItzik Cohen \r\n+972559999559', '2023-03-19 13:23:25'),
(6, 'ilker.erdnz@gmail.com', '', '05542316677', 'İlker Erdeniz', 'Merhaba İsmim İlker Metalurji ve Malzeme mühendisiyim.yaklasik 9 sene bunun aktif 7 yılı kurumsal firmaların satış ve satınalma bölümlerinde olmak üzere iş tecrübem vardır.Kendi isim üzerinde yoğunlaşmak istiyorum ve şuan kendi isteğim ile kurumsal hayattan ayrıldım.Esnek bariyer daha önce firmada satınaldigim bir kalemdir ve bence potansiyeli son derece yüksektir.Eski bağlantılarım ve yeni olusturacagim portföy üzerinde ürünlerinizi pazarlayip uygulama yaparak hareket oluşturmak istemekteyim konu ile alakalı nasıl bir destek sağlayabilirsiniz', '2023-05-25 20:51:06'),
(25, 'umitmetin@tutekst.com', 'www.tutekst.com.tr', '05315294532', 'ümit metin', 'Merhabalar; Ordu merkezde iş güvenlik donanım ve ekipmanları ağırlıklı çalışan ,aynı zaman da da iş kıyafetleri üretimi ve satışı yapan yeni kurulmuş bir firmayız.\r\nÜrün portföyümüze İşimizle direkt ve endirekt alakalı sektörleri de ekleyerek hizmet yelpazemizi genişletmek istiyoruz. Firmanızın , ilgili departmanıyla bu konuda görüşmek isteriz\r\nİyi çalışmalar\r\nÜmit Metin', '2023-07-19 12:33:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urun`
--

CREATE TABLE `urun` (
  `urun_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `urun_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `urun_ad` varchar(250) NOT NULL,
  `urun_aciklamaust` text NOT NULL,
  `urun_seourl` varchar(250) NOT NULL,
  `urun_detay` text NOT NULL,
  `urun_madde1` varchar(100) NOT NULL,
  `urun_madde2` varchar(100) NOT NULL,
  `urun_madde3` varchar(100) NOT NULL,
  `urun_keyword` varchar(250) NOT NULL,
  `urun_aciklama1` text NOT NULL,
  `urun_stok` enum('0','1') NOT NULL DEFAULT '1',
  `duba` varchar(22) NOT NULL,
  `duba_1` varchar(22) NOT NULL,
  `duba_2` varchar(22) NOT NULL,
  `duba_3` varchar(22) NOT NULL,
  `duba_4` varchar(22) NOT NULL,
  `duba_5` varchar(22) NOT NULL,
  `ray` varchar(22) NOT NULL,
  `ray_1` varchar(22) NOT NULL,
  `ray_2` varchar(22) NOT NULL,
  `ray_3` varchar(22) NOT NULL,
  `ray_4` varchar(22) NOT NULL,
  `madde` varchar(122) NOT NULL,
  `madde_1` varchar(22) NOT NULL,
  `madde_2` varchar(22) NOT NULL,
  `madde_3` varchar(22) NOT NULL,
  `madde_4` varchar(22) NOT NULL,
  `madde_5` varchar(22) NOT NULL,
  `deger_1` varchar(122) NOT NULL,
  `deger_2` varchar(122) NOT NULL,
  `deger_3` varchar(122) NOT NULL,
  `deger_4` varchar(122) NOT NULL,
  `deger_5` varchar(122) NOT NULL,
  `urun_durum` enum('0','1') NOT NULL,
  `urun_onecikar` enum('0','1') NOT NULL DEFAULT '0',
  `gosterim` varchar(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `urun`
--

INSERT INTO `urun` (`urun_id`, `kategori_id`, `urun_zaman`, `urun_ad`, `urun_aciklamaust`, `urun_seourl`, `urun_detay`, `urun_madde1`, `urun_madde2`, `urun_madde3`, `urun_keyword`, `urun_aciklama1`, `urun_stok`, `duba`, `duba_1`, `duba_2`, `duba_3`, `duba_4`, `duba_5`, `ray`, `ray_1`, `ray_2`, `ray_3`, `ray_4`, `madde`, `madde_1`, `madde_2`, `madde_3`, `madde_4`, `madde_5`, `deger_1`, `deger_2`, `deger_3`, `deger_4`, `deger_5`, `urun_durum`, `urun_onecikar`, `gosterim`) VALUES
(54, 48, '2024-05-21 17:12:44', 'Tek Kollu Bariyer', '<p>Esnek&nbsp;bariyerlerimiz&nbsp;sarı renkte olup, her iki ucunda siyah tabanlı montaj ayakları ile yere sabitlenmiştir. Esnek bariyerler, darbe aldıklarında eski formlarını geri kazanma yeteneğine sahiptir ve bu sayede s&uuml;rd&uuml;r&uuml;lebilir, tekrar tekrar kullanılabilen &uuml;r&uuml;nlerdir. Bu &ouml;zellikleri, onları normal demir bariyerlerden ayırır ve daha dayanıklı ve uzun &ouml;m&uuml;rl&uuml; hale getirir.</p>\r\n', 'tek-kollu-bariyer', '', 'Tek Kollu 2 Dubalı Esnek Bariyer', '6', '', 'RE-FLEXIBLE polietilen esnek bariyer, darbelerde esneyip maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', 'Hammadde', 'Çelik', 'Delik', 'Epoksi', 'Tij', '2', 'CK-45', '6', '8', '10', '1', '1', '660'),
(55, 48, '2024-05-22 11:26:01', '2 Kollu Bariyer', '<p>G&ouml;rselde iki yatay kolu bulunan bir esnek bariyer yer almaktadır. Bariyerin her iki ucunda, siyah flanş plakalarıyla yere sabitlenmiş dubalar bulunmaktadır. Bariyerin her iki kolu sarı renkte olup, &uuml;zerlerinde siyah bir ekstra katmanla kaplanmış polietilen&nbsp;bulunmaktadır.</p>\r\n\r\n<p>Bu esnek bariyerler, darbe aldıklarında esneklik g&ouml;stererek orijinal formuna geri d&ouml;nebilme &ouml;zelliğine sahiptir. Bu &ouml;zellik, bariyerlerin dayanıklılığını ve s&uuml;rd&uuml;r&uuml;lebilirliğini artırarak onları tekrar tekrar kullanılabilir hale getirir. İki kollu tasarımı, ekstra g&uuml;venlik ve koruma sağlarken, aynı zamanda g&ouml;r&uuml;n&uuml;rl&uuml;ğ&uuml; artırarak dikkat &ccedil;ekici bir yapıya sahiptir.</p>\r\n', '2-kollu-bariyer', '', '2 Dubalı 2 Kollu Esnek Bariyer', '', '', 'RE-FLEXIBLE çift katlı polietilen esnek bariyer, darbelerde esneyip maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '754'),
(56, 48, '2024-05-21 18:38:06', '3 Kollu Bariyer', '<p>3 yatay kolu bulunan bir esnek bariyerimiz. Bariyerin her iki ucunda, yere sağlam bir şekilde monte edilmesini sağlayan siyah tabanlık&nbsp;bulunmaktadır.&nbsp;Bu esnek bariyerler, darbe aldıklarında esneklik g&ouml;stererek orijinal formuna geri d&ouml;nebilme &ouml;zelliğine sahiptir. Bu &ouml;zellik, onları klasik demir bariyerlerden ayırarak daha s&uuml;rd&uuml;r&uuml;lebilir ve uzun &ouml;m&uuml;rl&uuml; kılar. &Uuml;&ccedil; kollu yapısı, hem g&uuml;venliği artırmak hem de daha geniş bir alanı korumak i&ccedil;in tasarlanmıştır.</p>\r\n', '3-kollu-bariyer', '', '3 Kollu 2 Dubalı Esnek Bariyer', '', '', 'RE-FLEXIBLE üç katlı polietilen esnek bariyer, darbelerde esneyerek maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '671'),
(57, 48, '2024-05-22 11:46:10', 'Z1K Bariyer', '<p>G&ouml;rselde, iki farklı t&uuml;rde esnek bariyer sistemi yer almaktadır. &Uuml;stteki bariyer tek kollu bir esnek bariyer olup, u&ccedil;larında siyah flanş plakalarıyla yere sabitlenmiş dubalar bulunmaktadır. Bariyer kolu sarı renkte olup, siyah bir ekstra katmanla kaplanmış polietilen i&ccedil;ermektedir.</p>\r\n\r\n<p>Altta ise bir zemin bariyeri bulunmaktadır. Bu bariyer de benzer şekilde sarı renkte olup, yere sabitlenmiş flanş plakaları ve siyah ekstra katmanla kaplanmış polietilen &ouml;zellikleri taşımaktadır.</p>\r\n\r\n<p>Her iki bariyer t&uuml;r&uuml; de darbe aldıklarında esneklik g&ouml;stererek orijinal formuna geri d&ouml;nebilme &ouml;zelliğine sahiptir. Bu &ouml;zellik, bariyerlerin dayanıklılığını ve s&uuml;rd&uuml;r&uuml;lebilirliğini artırarak onları tekrar tekrar kullanılabilir hale getirir. Bu sistemler, g&uuml;venliği sağlamak ve alanları korumak i&ccedil;in ideal &ccedil;&ouml;z&uuml;mler sunar.</p>\r\n', 'z1k-bariyer', '', '1 Kollu 2 Zemin Bariyerli Esnek Bariyer', '', '', 'RE-FLEXIBLE çift katlı esnek bariyer, düşey ve yatay darbelere karşı maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '1', '494'),
(58, 48, '2024-05-22 12:03:39', 'Z2K Bariyer', '<p>G&ouml;rselde, iki esnek bariyer yan yana yer almaktadır. Sol tarafta, iki yatay kolu bulunan bir esnek bariyer bulunmaktadır. Bu bariyerin u&ccedil;larında, siyah flanş plakalarıyla yere sabitlenmiş dubalar bulunmaktadır. Bariyer kolları sarı renkte olup, dubalarının altında siyah renkte ekstra&nbsp;polietilen g&uuml;&ccedil;lendirme i&ccedil;ermektedir.</p>\r\n\r\n<p>Sağ tarafta ise 2 yatay kolu bulunan&nbsp;esnek bariyer yer almaktadır. Bu bariyer de orta duba ile birbirine bağlanarak ekstra dayanım sağlanmaya &ccedil;alışılmıştır.</p>\r\n\r\n<p>Her iki bariyer t&uuml;r&uuml; de darbe aldıklarında esneklik g&ouml;stererek orijinal formuna geri d&ouml;nebilme &ouml;zelliğine sahiptir. Bu &ouml;zellik, bariyerlerin dayanıklılığını ve s&uuml;rd&uuml;r&uuml;lebilirliğini artırarak onları tekrar tekrar kullanılabilir hale getirir.&nbsp;</p>\r\n\r\n<p>Ayrıca, altta zemine yerleştirilmiş iki yatay zemin bariyerleri bulunmaktadır. Bu zemin bariyerleri, d&uuml;ş&uuml;k y&uuml;kseklikte olup, aynı dayanıklılık &ouml;zelliklerine sahiptir. Bu t&uuml;r bariyerler, al&ccedil;aktan gelecek&nbsp;koruma gereksinimleri i&ccedil;in uygundur.</p>\r\n', 'z2k-bariyer', '', '3 Dubalı 2 Kollu 2 Zemin Bariyerli Esnek Bariyer', '', '', 'RE-FLEXIBLE üç katlı esnek bariyer, düşey ve yatay darbelere karşı maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '284'),
(59, 48, '2024-05-22 13:52:25', 'Z3K Bariyer', '<p>G&ouml;rselde, iki esnek bariyer yan yana yer almaktadır. Sol tarafta, &uuml;&ccedil; yatay kolu bulunan bir esnek bariyer bulunmaktadır. Bu bariyerin u&ccedil;larında, siyah flanş plakalarıyla yere sabitlenmiş dubalar bulunmaktadır. Bariyer kolları sarı renkte olup, dubalarının altında siyah renkte ekstra polietilen g&uuml;&ccedil;lendirme i&ccedil;ermektedir.</p>\r\n\r\n<p>Sağ tarafta ise yine &uuml;&ccedil; yatay kolu bulunan bir esnek bariyer yer almaktadır. Bu bariyer, orta dubayla birbirine bağlanarak ekstra dayanım sağlanmıştır.</p>\r\n\r\n<p>Her iki bariyer t&uuml;r&uuml; de darbe aldıklarında esneklik g&ouml;stererek orijinal formuna geri d&ouml;nebilme &ouml;zelliğine sahiptir. Bu &ouml;zellik, bariyerlerin dayanıklılığını ve s&uuml;rd&uuml;r&uuml;lebilirliğini artırarak onları tekrar tekrar kullanılabilir hale getirir.</p>\r\n\r\n<p>Altta zemine yerleştirilmiş iki yatay zemin bariyeri bulunmaktadır. Bu zemin bariyerleri, d&uuml;ş&uuml;k y&uuml;kseklikte olup, aynı dayanıklılık &ouml;zelliklerine sahiptir. Bu t&uuml;r bariyerler, al&ccedil;aktan gelecek koruma gereksinimleri i&ccedil;in uygundur.</p>\r\n', 'z3k-bariyer', '', '3 Dubalı 3 Kollu 2 Zemin Bariyerli Esnek Bariyer', '', '', 'RE-FLEXIBLE dört katlı esnek bariyer, düşey ve yatay darbelere karşı maksimum güvenlik sağlar. Dayanıklı ve uzun ömürlü yapısıyla endüstriyel alanlar için ideal çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '242'),
(60, 53, '2024-06-13 16:59:39', '1K Köşe Koruma Bariyeri', '<p>Tek kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n', '1k-kose-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE köşe koruma bariyeri, darbeleri emerek köşeleri korur. Esnek ve dayanıklı yapısıyla endüstriyel alanlarda güvenli bir çözüm sunar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '440'),
(63, 49, '2024-05-28 18:39:06', '2K Yaya Yolu Bariyeri', '<p>Reflexible markasının sunduğu bu esnek yaya yolu bariyeri, dayanıklılığı ve esnekliği ile öne çıkıyor. Özel polimer malzemelerden üretilmiş olan bu bariyer, darbe aldığında esneme kapasitesi sayesinde enerjiyi emer ve eski formunu geri kazanır. Bu özellik, hem bariyerin hem de darbe alan araç veya kişinin daha az zarar görmesini sağlar. Yüksek dayanıklılığa sahip olan esnek bariyer, uzun süre kullanılabilir ve hava şartlarına&nbsp;dirençlidir. Kolay monte edilip gerektiğinde demonte edilebilme özelliği ile farklı yerlerde tekrar kullanılabilir. Canlı renkleri kolayca fark edilebilir. İki kollu tasarımı, ekstra güvenlik sağlar ve bariyerin sağlamlığını artırır.</p>\r\n\r\n<p>Bu bariyer, yaya yolları ile araç ya da forklift yollarını birbirinden ayırmak için ideal bir çözümdür. Fabrikalardaki kazaların çoğunluğu forkliftlerin insanlara çarpmasından kaynaklanır. Bu tür kazaların önüne geçmek için en iyi yöntem, çalışma alanlarını mümkün olduğunca birbirinden ayırmaktır. Reflexible esnek bariyer, bu amaç doğrultusunda etkili bir çözüm sunarak yayaların güvenliğini sağlar ve kazaların önlenmesine yardımcı olur.</p>\r\n', '2k-yaya-yolu-bariyeri', '', 'esnek', '', '', 'Reflexible esnek yaya yolu bariyeri, yaya ve araç yollarını ayırarak kazaları önler. Dayanıklı, esnek yapısı ile güvenli bir çalışma ortamı sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '277'),
(64, 49, '2024-05-28 18:47:06', '2KZ Yaya Yolu Bariyeri', '<p>esnek bariyer</p>\r\n', '2kz-yaya-yolu-bariyeri', '', 'esnek', '', '', 'RE-FLEXIBLE dikey esnek bariyer, darbeleri emerek maksimum güvenlik sağlar. Esnek ve dayanıklı yapısıyla endüstriyel alanlar için ideal bir koruma sunar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '259'),
(65, 49, '2024-05-28 18:54:28', '3KZ Yaya Yolu Bariyeri', '<p>yaya yolu bariyeri</p>\r\n', '3kz-yaya-yolu-bariyeri', '', 'yaya yolu bariyeri', '', '', 'RE-FLEXIBLE dört katlı dikey esnek bariyer, darbeleri emerek maksimum güvenlik sağlar. Esnek ve dayanıklı yapısıyla endüstriyel alanlar için ideal bir koruma sunar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '220'),
(67, 52, '2024-05-22 13:58:22', 'Z1K Kolon Koruma Bariyeri', '<p>Tek kol ve zemin bariyerli kolon koruma bariyeri, yapı i&ccedil;indeki kolonları darbelere karşı korumak amacıyla tasarlanmıştır. Sarı renkli polietilen malzemeden &uuml;retilmiş olan bariyer, kolonun etrafına yerleştirilir ve forklift gibi ağır makinelerin darbelerini emerek kolonun hasar g&ouml;rmesini &ouml;nler. &Uuml;r&uuml;n&uuml;n esnek yapısı, darbe aldığında enerjiyi dağıtarak bariyerin ve kolonun zarar g&ouml;rmesini engeller, aynı zamanda bariyerin şeklinin korunmasını sağlar. Kolon koruma bariyerleri, &ouml;zellikle depo ve end&uuml;striyel alanlarda g&uuml;venliği artırmak ve yapısal elemanları korumak i&ccedil;in idealdir. Bu bariyer, kolay montaj imkanı sunar ve y&uuml;ksek dayanıklılığı sayesinde uzun &ouml;m&uuml;rl&uuml; bir koruma sağlar.</p>\r\n', 'z1k-kolon-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE dar köşe bariyeri, duvar köşelerini darbelere karşı korur. Esnek ve dayanıklı yapısı sayesinde maksimum güvenlik sunar ve endüstriyel alanlar için uzun ömürlü bir çözüm sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '358'),
(68, 52, '2024-05-22 14:24:04', 'Z2K Kolon Koruma Bariyeri	', '<p>&Ccedil;ift&nbsp;kol ve zemin bariyerli kolon koruma bariyeri, yapı i&ccedil;indeki kolonları darbelere karşı korumak amacıyla tasarlanmıştır. Genellikle 60cm boyundadır. Sarı renkli polietilen malzemeden &uuml;retilmiş olan bariyer, kolonun etrafına yerleştirilir ve forklift gibi ağır makinelerin darbelerini emerek kolonun hasar g&ouml;rmesini &ouml;nler. &Uuml;r&uuml;n&uuml;n esnek yapısı, darbe aldığında enerjiyi dağıtarak bariyerin ve kolonun zarar g&ouml;rmesini engeller, aynı zamanda bariyerin şeklinin korunmasını sağlar. Kolon koruma bariyerleri, &ouml;zellikle depo ve end&uuml;striyel alanlarda g&uuml;venliği artırmak ve yapısal elemanları korumak i&ccedil;in idealdir. Bu bariyer, kolay montaj imkanı sunar ve y&uuml;ksek dayanıklılığı sayesinde uzun &ouml;m&uuml;rl&uuml; bir koruma sağlar.</p>\r\n', 'z2k-kolon-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE köşe koruma bariyeri, dört katlı tasarımıyla darbeleri emerek maksimum köşe güvenliği sağlar. Esnek ve dayanıklı yapısıyla endüstriyel alanlar için ideal bir koruma sunar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '247'),
(69, 52, '2024-05-22 14:32:05', 'Z3K Kolon Koruma Bariyeri	', '<p>3&nbsp;kol ve zemin bariyerli kolon koruma bariyeri, yapı i&ccedil;indeki kolonları darbelere karşı korumak amacıyla tasarlanmıştır. Genellikle 100cm boyundadır. Sarı renkli polietilen malzemeden &uuml;retilmiş olan bariyer, kolonun etrafına yerleştirilir ve forklift gibi ağır makinelerin darbelerini emerek kolonun hasar g&ouml;rmesini &ouml;nler. &Uuml;r&uuml;n&uuml;n esnek yapısı, darbe aldığında enerjiyi dağıtarak bariyerin ve kolonun zarar g&ouml;rmesini engeller, aynı zamanda bariyerin şeklinin korunmasını sağlar. Kolon koruma bariyerleri, &ouml;zellikle depo ve end&uuml;striyel alanlarda g&uuml;venliği artırmak ve yapısal elemanları korumak i&ccedil;in idealdir. Bu bariyer, kolay montaj imkanı sunar ve y&uuml;ksek dayanıklılığı sayesinde uzun &ouml;m&uuml;rl&uuml; bir koruma sağlar.</p>\r\n', 'z3k-kolon-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE üç katlı köşe koruma bariyeri, maksimum köşe güvenliği için tasarlanmıştır. Esnek ve dayanıklı yapısıyla endüstriyel alanlarda etkili bir koruma sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '231'),
(72, 53, '2024-06-18 16:13:05', '2K Köşe Koruma Bariyeri', '<p>&Ccedil;ift kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Genellikle 60cm boyunda &uuml;retilmektedir. &Ccedil;ift kol yapısı sayesinde esneme ve dayanım noktası daha y&uuml;ksektir. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n', '2k-kose-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE çift katlı köşe koruma bariyeri, duvar köşelerini darbelere karşı iki kat daha güçlü korur. Esnek ve dayanıklı yapısı ile endüstriyel alanlarda uzun ömürlü güvenlik sunar', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '254'),
(73, 53, '2024-06-18 16:18:12', '3K Köşe Koruma Bariyeri', '<p>3 kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r.&nbsp;Genellikle 100cm boyunda &uuml;retilmektedir. 3&#39;l&uuml;&nbsp;kol yapısı sayesinde esneme ve dayanım noktası daha y&uuml;ksektir. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n', '3k-kose-koruma-bariyeri', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '241'),
(74, 53, '2024-06-18 16:29:56', 'D1K Köşe Koruma Bariyeri  ', '<p>Tek kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, duvar ya da korunması gerkeen malzeme boyunca şekil alabilir ve devam edebilir, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n\r\n<ul>\r\n</ul>\r\n', 'd1k-kose-koruma-bariyeri', '', '', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '291'),
(75, 53, '2024-06-18 16:32:21', 'D2K Köşe Koruma Bariyeri', '<p>&Ccedil;ift kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, duvar ya da korunması gerkeen malzeme boyunca şekil alabilir ve devam edebilir, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n', 'd2k-kose-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE köşe koruma bariyeri, darbelere karşı maksimum koruma sağlar ve duvar köşelerini güvence altına alır.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '219'),
(76, 53, '2024-06-18 16:37:59', 'D3K Köşe Koruma Bariyeri', '<p>3 kollu k&ouml;şe koruma bariyeri k&ouml;şe ve duvar koruma bariyeri olarak tasarlanmış bir g&uuml;venlik &ccedil;&ouml;z&uuml;m&uuml;d&uuml;r. Sarı renkli polietilen yapısı sayesinde hem darbelere karşı y&uuml;ksek dayanıklılık sağlar hem de dikkat &ccedil;ekici bir g&ouml;rsellik sunar. Bu bariyerler, duvar ya da korunması gerkeen malzeme boyunca şekil alabilir ve devam edebilir, &ouml;zellikle depo, fabrika gibi alanlarda k&ouml;şe noktalarını korumak amacıyla kullanılır. Forklift veya diğer ağır makinelerin darbe ihtimaline karşı k&ouml;şe ve duvarları korur, b&ouml;ylece yapısal hasarları &ouml;nler. &Uuml;r&uuml;n, mod&uuml;ler yapısı sayesinde farklı alanlarda kolayca monte edilebilir ve ek koruma sağlar. Ayrıca, bariyerin esnekliği, darbe sonrası eski formuna d&ouml;nmesini ve defalarca kullanılmasını m&uuml;mk&uuml;n kılar.</p>\r\n', 'd3k-kose-koruma-bariyeri', '', '', '', '', 'RE-FLEXIBLE köşe koruma bariyeri, endüstriyel alanlarda duvar köşelerini darbelere karşı korur. Esnek ve dayanıklı yapısıyla maksimum güvenlik sağlar, uzun ömürlü kullanım sunar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '213'),
(77, 56, '2024-06-20 16:28:49', '1D Duba', '', '1d-duba', '', 'Tek Delik Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '437'),
(78, 56, '2024-06-20 16:36:50', 'K1D Duba', '', 'k1d-duba', '', 'İki Delikli Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '457'),
(79, 56, '2024-06-20 16:44:14', 'L1D', '', 'l1d', '', '45 Derece İki Delik Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '442'),
(80, 56, '2024-06-20 16:52:25', '2D Duba', '', '2d-duba', '', '2 Tek Delik Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '432'),
(81, 56, '2024-06-20 16:58:16', 'K2D Duba', '', 'k2d-duba', '', 'İki Delik Karşılıklı Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '216'),
(82, 56, '2024-07-01 20:52:18', '2LD Duba', '', '2ld-duba', '', 'İki Delik 45 Derece Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '242'),
(83, 56, '2024-07-11 16:12:06', '3D Duba', '', '3d-duba', '', 'Üç Delikli Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '237'),
(84, 56, '2024-07-11 16:14:25', 'K3D Duba', '', 'k3d-duba', '', 'Üç Delik Karşılıklı Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '240'),
(85, 56, '2024-07-11 16:17:06', 'L3D Duba', '', 'l3d-duba', '', 'Üç Delik 45 Derece Duba', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '222'),
(86, 56, '2024-07-11 16:22:13', 'Kapak', '', 'kapak', '', 'Standart Duba Kapak', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '255'),
(87, 56, '2024-07-11 16:25:54', 'Taban Flanşı', '', 'taban-flansi', '', 'Standart Duba Ayak', '', '', '', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '237'),
(88, 54, '2024-07-11 16:28:18', 'Kısa Duba', '<p>&Ouml;zellikle forklift gibi ağır makinelerin hareket ettiği alanlarda g&uuml;venliği artırmak i&ccedil;in kullanılır. Bu duba, &ccedil;evresinde bulunan alanları korumak amacıyla stratejik noktalara yerleştirilir. Sarı renkte olması, y&uuml;ksek g&ouml;r&uuml;n&uuml;rl&uuml;k sağlar ve dikkat &ccedil;eker. Dubanın polietilen malzemeden &uuml;retilmiş olması, darbelere karşı dayanıklılığını artırır ve esnek yapısı sayesinde darbe aldığında şeklini korur. Bu &ouml;zellikleriyle, &ouml;zellikle depo ve lojistik alanlarında sık&ccedil;a tercih edilir, hem ekipmanları hem de yapısal unsurları koruma işlevi g&ouml;r&uuml;r.</p>\r\n', 'kisa-duba', '', '', '', '', 'RE-FLEXIBLE kısa duba, kompakt ve esnek yapısıyla darbelere karşı yüksek koruma sağlar. Dayanıklı malzemesi, endüstriyel alanlarda uzun ömürlü kullanım sunar. ', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '320'),
(89, 54, '2024-07-11 16:31:22', 'Orta Duba', '<p>&Ouml;zellikle forklift gibi ağır makinelerin hareket ettiği alanlarda g&uuml;venliği artırmak i&ccedil;in kullanılır. Bu duba, &ccedil;evresinde bulunan alanları korumak amacıyla stratejik noktalara yerleştirilir. Sarı renkte olması, y&uuml;ksek g&ouml;r&uuml;n&uuml;rl&uuml;k sağlar ve dikkat &ccedil;eker. Dubanın polietilen malzemeden &uuml;retilmiş olması, darbelere karşı dayanıklılığını artırır ve esnek yapısı sayesinde darbe aldığında şeklini korur. Bu &ouml;zellikleriyle, &ouml;zellikle depo ve lojistik alanlarında sık&ccedil;a tercih edilir, hem ekipmanları hem de yapısal unsurları koruma işlevi g&ouml;r&uuml;r.</p>\r\n', 'orta-duba', '', '', '', '', 'RE-FLEXIBLE orta boy duba, darbelere dayanıklı esnek yapısıyla etkili güvenlik sağlar. Endüstriyel alanlarda, araç ve yaya trafiğini yönlendirmek için ideal bir çözümdür. ', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '209'),
(90, 54, '2024-07-11 16:34:00', 'Uzun Duba', '<p>&Ouml;zellikle forklift gibi ağır makinelerin hareket ettiği alanlarda g&uuml;venliği artırmak i&ccedil;in kullanılır. Bu duba, &ccedil;evresinde bulunan alanları korumak amacıyla stratejik noktalara yerleştirilir. Sarı renkte olması, y&uuml;ksek g&ouml;r&uuml;n&uuml;rl&uuml;k sağlar ve dikkat &ccedil;eker. Dubanın polietilen malzemeden &uuml;retilmiş olması, darbelere karşı dayanıklılığını artırır ve esnek yapısı sayesinde darbe aldığında şeklini korur. Bu &ouml;zellikleriyle, &ouml;zellikle depo ve lojistik alanlarında sık&ccedil;a tercih edilir, hem ekipmanları hem de yapısal unsurları koruma işlevi g&ouml;r&uuml;r.</p>\r\n', 'uzun-duba', '', '', '', '', 'RE-FLEXIBLE uzun duba, darbelere dayanıklı esnek yapısıyla maksimum güvenlik sağlar. Endüstriyel alanlarda, araç ve yaya trafiğini düzenlemek için ideal bir çözümdür.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '235'),
(91, 50, '2024-07-12 07:27:45', 'Raf Koruma Bariyeri', '<p>Raf koruma bariyeri genellikle 60 cm uzunluğundadır. Bu bariyerler, raf ayaklarını forklift gibi makinelerin darbelerinden korumak amacıyla raflara monte edilir. Raf ile forklift arasında ek bir katman oluşturan bu bariyerler, polietilen yapısı sayesinde y&uuml;ksek darbe dayanıklılığı sağlar ve raf ayaklarının yamulmasını &ouml;nler. B&ouml;ylece, raf sistemlerinin g&uuml;venliği artırılır ve uzun &ouml;m&uuml;rl&uuml; kullanımı desteklenir.</p>\r\n', 'raf-koruma-bariyeri', '', 'Raf ayakları koruma katmanı', '', '', 'RE-FLEXIBLE raf koruma bariyeri, raflarınızı darbelere karşı esnek ve dayanıklı bir şekilde korur. Montajı kolay olup, endüstriyel alanlarda uzun ömürlü güvenlik sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '332'),
(92, 54, '2024-08-17 12:58:42', 'Zemin Bariyeri', '<p>Fabrikalar ve depo alanları gibi end&uuml;striyel ortamlarda, forklift gibi ağır makinelerin hareketlerini sınırlamak i&ccedil;in kullanılır. Bariyer, polietilen plastik hammaddeden &uuml;retilmiştir. Polietilen, esnek ve dayanıklı bir malzeme olduğundan, bariyer bir darbe aldığında esneyerek darbeyi absorbe eder ve eski formuna geri d&ouml;ner. Bu &ouml;zellik, bariyerin tekrar tekrar kullanılabilmesini sağlar.</p>\r\n', 'zemin-bariyeri', '', 'Eznek Zemin Bariyeri', '', '', 'RE-FLEXIBLE zemin bariyeri, darbelere karşı dayanıklı ve esnek yapısıyla maksimum zemin güvenliği sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '376'),
(93, 55, '2024-08-17 15:27:13', 'Belt Kapı', '<p>Şerit kapı, end&uuml;striyel alanlarda yaygın olarak kullanılan &nbsp;polietilen hammaddeden &uuml;retilen bir kapı sistemidir. Şerit&nbsp;yapısı sayesinde insanlar&nbsp;rahat&ccedil;a ge&ccedil;iş yapabilir, bu da iş s&uuml;re&ccedil;lerini hızlandırır ve verimliliği artırır. Şerit kapılar dayanıklı malzemeden &uuml;retildiği i&ccedil;in uzun &ouml;m&uuml;rl&uuml;d&uuml;r ve darbelere karşı diren&ccedil; g&ouml;sterir. Ayrıca, kolayca monte edilebilmeleri ve bakım gerektirmemeleri de bu kapıları pratik ve ekonomik bir &ccedil;&ouml;z&uuml;m haline getirir. İş g&uuml;venliğini ve enerji tasarrufunu &ouml;n planda tutan işletmeler i&ccedil;in ideal bir se&ccedil;enektir.</p>\r\n', 'belt-kapi', '', '2 Dubalı Şerit Kapı', '', '', 'RE-FLEXIBLE esnek şerit kapı, endüstriyel alanlarda darbelere dayanıklı, güvenli bir geçiş sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '211'),
(94, 55, '2024-08-17 16:16:09', 'NinetySwing Kapı', '<p>Tek Taraflı Esnek Kapımız olan NinetySwing Kapı, end&uuml;striyel alanlarda yaygın olarak kullanılan polietilen hammaddeden &uuml;retilen bir kapı sistemidir. Tek taraflı a&ccedil;ılması&nbsp;sayesinde insanlar&nbsp;rahat&ccedil;a ge&ccedil;iş yapabilir, aynı zamanda yol g&uuml;zergahına olan ge&ccedil;işlerde &ccedil;ekilerek a&ccedil;ılabildiği i&ccedil;in kısa s&uuml;reli bekleme ve yolu kontrol etmeyi sağlamaktadır. Bu da iş g&uuml;venliğini arttırır. NinetySwing&nbsp;kapılar dayanıklı malzemeden &uuml;retildiği i&ccedil;in uzun &ouml;m&uuml;rl&uuml;d&uuml;r ve darbelere karşı diren&ccedil; g&ouml;sterir. Ayrıca, kolayca monte edilebilmeleri ve bakım gerektirmemeleri de bu kapıları pratik ve ekonomik bir &ccedil;&ouml;z&uuml;m haline getirir. İş g&uuml;venliğini ve enerji tasarrufunu &ouml;n planda tutan işletmeler i&ccedil;in ideal bir se&ccedil;enektir.</p>\r\n', 'ninetyswing-kapi', '', '2 Dubalı 2X3 Kollu Esnek Kapı', '', '', 'RE-FLEXIBLE polietilen esnek güvenlik bariyeri, endüstriyel alanlarda yüksek koruma sunar. Darbelere dayanıklı, uzun ömürlü ve tekrar kullanılabilir yapısıyla güvenli bir çözüm sağlar.', '', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '229');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `urunfoto`
--

CREATE TABLE `urunfoto` (
  `urunfoto_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `urunfoto_resimyol` varchar(255) NOT NULL,
  `urunfoto_sira` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `urunfoto`
--

INSERT INTO `urunfoto` (`urunfoto_id`, `urun_id`, `urunfoto_resimyol`, `urunfoto_sira`) VALUES
(1387, 54, 'goz/urun/2948128905_esnek_bariyer_esnek-bariyer.jpg', 0),
(1388, 54, 'goz/urun/2403025292_esnek_bariyer_bariyer-esnek.jpg', 0),
(1389, 54, 'goz/urun/2190324068_esnek_bariyer_esnek-guvenlik-bariyeri.jpg', 0),
(1393, 55, 'goz/urun/2587426533_esnek_bariyer_2-kollu-esnek-bariyer.jpg', 0),
(1394, 55, 'goz/urun/2624026299_esnek_bariyer_esnek-bariyer-guvenlik-bariyeri.jpg', 0),
(1395, 55, 'goz/urun/2866223261_esnek_bariyer_esnek-bariyer-iki-kollu.jpg', 0),
(1396, 56, 'goz/urun/3025425081_esnek_bariyer_esnek-bariyer.jpg', 0),
(1397, 56, 'goz/urun/2138525838_esnek_bariyer_guvenlik-bariyeri.jpg', 0),
(1398, 56, 'goz/urun/2297824265_esnek_bariyer_esnek-bariyer-guvenlik.jpg', 0),
(1399, 57, 'goz/urun/2150020232_esnek_bariyer_esnek-bariyer.jpg', 0),
(1400, 57, 'goz/urun/2215027891_esnek_bariyer_esnek-guvenlik-bariyeri.jpg', 0),
(1401, 57, 'goz/urun/2331531370_esnek_bariyer_esnek-bariyer-guvenlik-bariyeri.jpg', 0),
(1402, 58, 'goz/urun/3196720868_esnek_bariyer_esnek-bariyer.jpg', 0),
(1403, 58, 'goz/urun/2826030543_esnek_bariyer_guvenlik-bariyeri.jpg', 0),
(1404, 58, 'goz/urun/2772025668_esnek_bariyer_bariyer-esnek.jpg', 0),
(1405, 59, 'goz/urun/3013723208_esnek_bariyer_esnek-bariyer.jpg', 0),
(1406, 59, 'goz/urun/2235127892_esnek_bariyer_esnek-guvenlik-bariyeri.jpg', 0),
(1407, 59, 'goz/urun/2356925246_esnek_bariyer_esnek-bariyer-sistemi.jpg', 0),
(1441, 68, 'goz/urun/2023326387_esnek_bariyer_kolon-esnek-bariyer.jpg', 0),
(1442, 68, 'goz/urun/2383831961_esnek_bariyer_kolon-koruma2.jpg', 0),
(1443, 68, 'goz/urun/2381721307_esnek_bariyer_kolon-koruma-bariyerleri.jpg', 0),
(1444, 69, 'goz/urun/2550124946_esnek_bariyer_kolon-koruma-3-kol.jpg', 0),
(1445, 69, 'goz/urun/2209124268_esnek_bariyer_kolon-esnek-bariyer.jpg', 0),
(1446, 69, 'goz/urun/2867722916_esnek_bariyer_kolon-koruma.jpg', 0),
(1447, 67, 'goz/urun/2623230016_esnek_bariyer_son1.jpg', 0),
(1448, 67, 'goz/urun/2981829527_esnek_bariyer_son3.jpg', 0),
(1449, 67, 'goz/urun/2899930441_esnek_bariyer_son2.jpg', 0),
(1463, 60, 'goz/urun/2795522774_esnek_bariyer_tekkol-4.jpg', 0),
(1464, 60, 'goz/urun/2207421422_esnek_bariyer_tekkol-2.jpg', 0),
(1465, 60, 'goz/urun/2821229595_esnek_bariyer_tekkol-3.jpg', 0),
(1467, 72, 'goz/urun/3008831438_esnek_bariyer_2-k-esnek-bariyer.jpg', 0),
(1468, 72, 'goz/urun/2993627624_esnek_bariyer_2k-esnek-bariyer.jpg', 0),
(1469, 72, 'goz/urun/2375121917_esnek_bariyer_2k-esnek-bariyer-fabrika.jpg', 0),
(1470, 73, 'goz/urun/2847121146_esnek_bariyer_3k-kose-koruma-bariyeri.jpg', 0),
(1471, 73, 'goz/urun/2424131366_esnek_bariyer_3k-esnek-koruma-bariyeri.jpg', 0),
(1472, 73, 'goz/urun/3101430280_esnek_bariyer_1030_Camera_SOLIDWORKS Viewport.jpg', 0),
(1473, 74, 'goz/urun/2151925629_esnek_bariyer_d1k-esnek-bariyer.jpg', 0),
(1474, 74, 'goz/urun/2546220212_esnek_bariyer_d1k-esnek-bariyer-sistemleri.jpg', 0),
(1475, 74, 'goz/urun/2001525062_esnek_bariyer_d1k-esnek-bariyer2.jpg', 0),
(1488, 75, 'goz/urun/2280927863_esnek_bariyer_esnek.jpg', 0),
(1489, 75, 'goz/urun/2678922526_esnek_bariyer_d2k-kose-bariyeri.jpg', 0),
(1490, 75, 'goz/urun/2944929754_esnek_bariyer_d2k-kose-koruma-esnek-bariyeri.jpg', 0),
(1491, 76, 'goz/urun/2818229261_esnek_bariyer_d3k-kose-koruma.jpg', 0),
(1492, 76, 'goz/urun/2152823604_esnek_bariyer_d3k-esnek-bariyer.jpg', 0),
(1493, 76, 'goz/urun/2069631556_esnek_bariyer_d3k-bariyer.jpg', 0),
(1511, 77, 'goz/urun/2528531724_esnek_bariyer_esnek-bariyer.jpg', 0),
(1512, 77, 'goz/urun/2364428724_esnek_bariyer_esnek-bariyer2.jpg', 0),
(1513, 77, 'goz/urun/2976929075_esnek_bariyer_esnek-bariyer3.jpg', 0),
(1514, 78, 'goz/urun/2888522881_esnek_bariyer_esnek-bariyer-1k.jpg', 0),
(1515, 78, 'goz/urun/3050328839_esnek_bariyer_bariyer.jpg', 0),
(1516, 78, 'goz/urun/2703427757_esnek_bariyer_esnek-bariyer-re-flex.jpg', 0),
(1517, 79, 'goz/urun/2639129786_esnek_bariyer_l1-d-esnek-bariyer.jpg', 0),
(1518, 79, 'goz/urun/2799020028_esnek_bariyer_bariyer-cesitleri.jpg', 0),
(1519, 79, 'goz/urun/2567223683_esnek_bariyer_bariyer-2.jpg', 0),
(1520, 80, 'goz/urun/2124026646_esnek_bariyer_2d-esnek-bariyer.jpg', 0),
(1521, 80, 'goz/urun/2091330321_esnek_bariyer_esnek-bariyer-2d.jpg', 0),
(1522, 80, 'goz/urun/2484426345_esnek_bariyer_bariyer-esneyen.jpg', 0),
(1526, 81, 'goz/urun/2432531772_esnek_bariyer_barier-2k.jpg', 0),
(1527, 81, 'goz/urun/2779329122_esnek_bariyer_bariyer-esnek-2k.jpg', 0),
(1528, 81, 'goz/urun/2859525004_esnek_bariyer_guvenlik-bariyeri-esnek.jpg', 0),
(1529, 82, 'goz/urun/2822926328_esnek_bariyer_l2-esnek-bariyer-duba.jpg', 0),
(1530, 82, 'goz/urun/2283722574_esnek_bariyer_bariyer-esnek-2ld.jpg', 0),
(1531, 82, 'goz/urun/2604524610_esnek_bariyer_bariyer-2ld.jpg', 0),
(1532, 83, 'goz/urun/2542128489_esnek_bariyer_3k-bariyer.jpg', 0),
(1533, 83, 'goz/urun/2949228605_esnek_bariyer_3d-duba-esnek.jpg', 0),
(1534, 83, 'goz/urun/2854325629_esnek_bariyer_esnek-bariyer-3d.jpg', 0),
(1535, 84, 'goz/urun/2212230878_esnek_bariyer_k3d-bariyer.jpg', 0),
(1536, 84, 'goz/urun/2615531374_esnek_bariyer_k3-d-guvenlik-bariyeri.jpg', 0),
(1537, 84, 'goz/urun/2287024419_esnek_bariyer_k3d-bariyer-guvenlik.jpg', 0),
(1538, 85, 'goz/urun/2300623623_esnek_bariyer_l3d-bariyer.jpg', 0),
(1539, 85, 'goz/urun/2902331471_esnek_bariyer_l3d-bariyer.jpg', 0),
(1540, 85, 'goz/urun/2397930460_esnek_bariyer_l3d-bariyer-esnek-guvenlik.jpg', 0),
(1541, 86, 'goz/urun/3132220122_esnek_bariyer_kapak3.jpg', 0),
(1542, 86, 'goz/urun/2053429620_esnek_bariyer_kapak2.jpg', 0),
(1543, 86, 'goz/urun/2250727752_esnek_bariyer_kapak.jpg', 0),
(1544, 87, 'goz/urun/2455731944_esnek_bariyer_taban3.jpg', 0),
(1545, 87, 'goz/urun/3194325694_esnek_bariyer_taban2.jpg', 0),
(1546, 87, 'goz/urun/2902623015_esnek_bariyer_taban.jpg', 0),
(1547, 88, 'goz/urun/2874624924_esnek_bariyer_kisa-duba-esnek.jpg', 0),
(1548, 88, 'goz/urun/2091625376_esnek_bariyer_kisa-duba-2.jpg', 0),
(1549, 88, 'goz/urun/2887929546_esnek_bariyer_kisa-duba3.jpg', 0),
(1550, 89, 'goz/urun/3188728141_esnek_bariyer_orta-esnek-duba.jpg', 0),
(1551, 89, 'goz/urun/2574220877_esnek_bariyer_orta-esnek-duba-bariyer.jpg', 0),
(1552, 89, 'goz/urun/2757629851_esnek_bariyer_orta-esnek-duba-bariyer-guvenlik.jpg', 0),
(1553, 90, 'goz/urun/2681026360_esnek_bariyer_uzun-duba-2.jpg', 0),
(1554, 90, 'goz/urun/2113929146_esnek_bariyer_uzun-duba-1.jpg', 0),
(1555, 90, 'goz/urun/2036929450_esnek_bariyer_uzun-duba3.jpg', 0),
(1559, 92, 'goz/urun/2971123069_esnek_bariyer_zemin_bariyeri.jpg', 0),
(1560, 92, 'goz/urun/2084222600_esnek_bariyer_zemin_bariyeri-4.jpg', 0),
(1561, 92, 'goz/urun/3070928675_esnek_bariyer_zemin_bariyer-1.jpg', 0),
(1562, 91, 'goz/urun/3163427625_esnek_bariyer_raf_koruma-2.jpg', 0),
(1563, 91, 'goz/urun/3103330818_esnek_bariyer_raf_koruma-3.jpg', 0),
(1564, 91, 'goz/urun/2446829469_esnek_bariyer_raf_koruma-12.jpg', 0),
(1565, 63, 'goz/urun/3039625548_esnek_bariyer_bariyer-yaya-yolu-bariyeri.jpg', 0),
(1566, 63, 'goz/urun/2016322184_esnek_bariyer_yaya_yolu-bariyeri-3.jpg', 0),
(1567, 63, 'goz/urun/2199629745_esnek_bariyer_yaya_yolu-bariyeri-2.jpg', 0),
(1568, 64, 'goz/urun/2503727304_esnek_bariyer_yaya_yolu-bariyeri-12.jpg', 0),
(1569, 64, 'goz/urun/2332028389_esnek_bariyer_yaya-yolu-bariyer-34.jpg', 0),
(1570, 64, 'goz/urun/2413620496_esnek_bariyer_yaya_yolu-3-bariyer.jpg', 0),
(1571, 65, 'goz/urun/2519630056_esnek_bariyer_3kol-yaya-yolu-bariyeri.jpg', 0),
(1572, 65, 'goz/urun/2322627375_esnek_bariyer_3kol-yaya-yolu-bariyeri-3.jpg', 0),
(1573, 65, 'goz/urun/2873631108_esnek_bariyer_3kol-bariyer-yaya.jpg', 0),
(1574, 93, 'goz/urun/2053428970_esnek_bariyer_esnek-kapi-1.jpg', 0),
(1575, 93, 'goz/urun/2165826964_esnek_bariyer_esnek-serit-kapi-2.jpg', 0),
(1576, 93, 'goz/urun/2045727967_esnek_bariyer_esnek-serit-kapi-3.jpg', 0),
(1580, 94, 'goz/urun/2400421494_esnek_bariyer_esnek-kapi-salincak1.jpg', 0),
(1581, 94, 'goz/urun/2106328352_esnek_bariyer_esnek-kapi-salincak3.jpg', 0),
(1582, 94, 'goz/urun/2495224544_esnek_bariyer_esnek-kapi-salincak-2.jpg', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazi`
--

CREATE TABLE `yazi` (
  `yazi_id` int(11) NOT NULL,
  `blog_resimyol` varchar(250) NOT NULL,
  `yazi_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `yazi_ad` varchar(250) NOT NULL,
  `yazi_seourl` varchar(250) NOT NULL,
  `yazi_detay` text NOT NULL,
  `yazi_description` varchar(200) NOT NULL,
  `yazi_keyword` varchar(250) NOT NULL,
  `yazi_durum` enum('0','1') NOT NULL,
  `kategori_id` varchar(233) NOT NULL,
  `yazi_onecikar` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazi`
--

INSERT INTO `yazi` (`yazi_id`, `blog_resimyol`, `yazi_zaman`, `yazi_ad`, `yazi_seourl`, `yazi_detay`, `yazi_description`, `yazi_keyword`, `yazi_durum`, `kategori_id`, `yazi_onecikar`) VALUES
(15, 'goz/yazi/21621esnek-bariyer.webp', '2026-03-14 14:09:31', 'Tac Bariyer ile Güvenlik ve Esneklik: Fabrikanızın Yeni Vazgeçilmezi', 'tac-bariyer-ile-guvenlik-ve-esneklik-fabrikanizin-yeni-vazgecilmezi', '<p>Fabrikanızda güvenlik ve düzeni sağlamak hiç bu kadar kolay ve estetik olmamıştı! Re-Flexible, esnek bariyer çözümleri ile işletmenizin ihtiyaçlarına en uygun, yenilikçi ve pratik çözümler sunuyor. Gelin, Re-Flexible&rsquo;ın sunduğu avantajları birlikte keşfedelim!</p>\r\n\r\n<p>Esnek Bariyerlerde Re-Flexible Farkı</p>\r\n\r\n<p><strong>1.&nbsp;&nbsp; Esneklik:</strong></p>\r\n\r\n<p>Re-Flexible&rsquo;ın esnek bariyerleri, darbe anında esneyerek enerjiyi absorbe eder ve hem bariyerin hem de çarpan aracın zarar görmesini önler. Bu, hem güvenlik hem de uzun ömürlü kullanım sağlar. Sık sık bariyer değiştirme derdine son!</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;2.&nbsp;&nbsp; &nbsp;Hızlı ve Kolay Kurulum:</strong></p>\r\n\r\n<p>Esnek bariyerlerimiz, modüler yapıları sayesinde ihtiyaç duyulan her yere hızla ve kolayca monte edilebilir. Kolay kurulum özelliği ile iş akışınızı kesintiye uğratmadan güvenliği artırabilirsiniz.</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;<strong>3.&nbsp;&nbsp; &nbsp;Estetik ve Ergonomik Tasarım:</strong></p>\r\n\r\n<p>Re-Flexible bariyerleri, sadece fonksiyonel değil, aynı zamanda şık ve modern tasarımlara sahiptir. Fabrikanıza estetik bir dokunuş katarken, ergonomik yapıları sayesinde çalışma alanlarının daha düzenli ve güvenli olmasını sağlar.</p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;4.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu:</strong></p>\r\n\r\n<p>Dayanıklı malzemelerden üretilen esnek bariyerlerimiz, uzun ömürlüdür ve sık sık bakım veya onarım gerektirmez. Bu sayede işletmenizin bakım maliyetlerini azaltarak bütçenize katkı sağlar.</p>\r\n\r\n<p><strong>Neden Re-Flexible&rsquo;ı Tercih Etmelisiniz?</strong></p>\r\n\r\n<p>Re-Flexible, sadece ürünleriyle değil, müşteri odaklı hizmet anlayışıyla da fark yaratır. İhtiyacınıza özel çözümler sunarak, fabrikadaki güvenlik sorunlarınıza kalıcı çözümler getiriyoruz. Ürünlerimizin yüksek kalitesi ve dayanıklılığı sayesinde, işletmenizin güvenliğini en üst düzeye çıkarıyoruz.</p>\r\n\r\n<p>Esnek Bariyerlerimizin Kullanım Alanları&nbsp;</p>\r\n\r\n<p><strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Yaya Yolu Bariyerleri:</strong></p>\r\n\r\n<p>Çalışanlarınızın güvenli bir şekilde hareket etmelerini sağlayın. Re-Flexible yaya yolu bariyerleri, darbelere karşı yüksek direnç gösterir ve yaya trafiğinin güvenliğini sağlar.</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Raf Koruma Bariyerleri:</strong></p>\r\n\r\n<p>Depolama alanlarınızı koruyun. Re-Flexible raf koruma bariyerleri, çarpma anında raf sistemlerini korur ve uzun ömürlü kullanım sağlar.</p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Kolon ve Köşe Koruma Bariyerleri:</strong></p>\r\n\r\n<p>Fabrikanızdaki kolon ve köşeleri güvence altına alın. Esnek bariyerlerimiz, darbe anında esneyerek yapısal elemanların zarar görmesini önler.</p>\r\n\r\n<p>Tac Bariyer&nbsp;esnek bariyerleri, fabrikanızın güvenliğini, estetiğini ve verimliliğini artıran mükemmel bir çözümdür. Yenilikçi ve pratik tasarımlarımızla, işletmenizin ihtiyaçlarına en uygun bariyer çözümlerini sunuyoruz. Güvenliği sağlarken, maliyetlerinizi düşürmek ve iş süreçlerinizi optimize etmek istiyorsanız, Re-Flexible sizin için ideal bir tercihtir.</p>\r\n', 'Re-Flexible esnek bariyerlerle fabrikalarda güvenliği artırın. Yaya yolları, raflar, kolonlar ve köşeler için dayanıklı çözümler sunuyoruz.', 'Re-Flexible esnek bariyer, güvenlik bariyeri, yaya yolu bariyeri, raf koruma, kolon koruma, köşe koruma, dayanıklı bariyer, fabrikada güvenlik, modern tasarım', '1', 'Güvenlik Bariyerleri', '0'),
(16, 'goz/yazi/21346bariyer-esnek.webp', '2024-08-17 18:42:12', 'Neden Demir Bariyer Yerine Esnek Bariyer Tercih Etmeliyiz?', 'neden-demir-bariyer-yerine-esnek-bariyer-tercih-etmeliyiz', '<p>Fabrikanızda güvenliği sağlamak için doğru bariyerleri seçmek kritik bir karardır. Peki, neden geleneksel demir bariyerler yerine Re-Flexible&rsquo;ın esnek bariyerlerini tercih etmelisiniz?</p>\r\n\r\n<p><strong>1. Yüksek Darbe Emme Kapasitesi</strong></p>\r\n\r\n<p>Geleneksel demir bariyerler, çarpma anında esneklik göstermez ve hem bariyerin hem de çarpan ekipmanın zarar görmesine neden olabilir. Re-Flexible&rsquo;ın esnek bariyerleri ise darbe anında esneyerek enerjiyi absorbe eder ve hasarı minimuma indirir. Bu, hem bariyerin hem de ekipmanınızın ömrünü uzatır.</p>\r\n\r\n<p><strong>2. Kolay ve Hızlı Kurulum</strong></p>\r\n\r\n<p>Demir bariyerlerin kurulumu genellikle zaman alıcı ve zahmetlidir. Re-Flexible esnek bariyerleri, modüler yapıları sayesinde hızlı ve kolay bir şekilde monte edilir. Bu, iş akışınızı kesintiye uğratmadan güvenlik önlemlerini artırmanıza olanak tanır.</p>\r\n\r\n<p><strong>3. Estetik ve Modern Tasarım</strong></p>\r\n\r\n<p>Demir bariyerler genellikle endüstriyel ve kaba bir görünüme sahiptir. Re-Flexible esnek bariyerler ise estetik ve modern tasarımları ile fabrikanıza şıklık katar. Ergonomik yapıları sayesinde çalışma alanlarınız hem daha düzenli hem de daha güvenli hale gelir.</p>\r\n\r\n<p><strong>4. Maliyet Tasarrufu</strong></p>\r\n\r\n<p>Demir bariyerler, yüksek bakım ve onarım maliyetleri gerektirebilir. Re-Flexible esnek bariyerler, dayanıklı malzemelerden üretilmiştir ve sık sık bakım gerektirmez. Bu, işletmenizin uzun vadede maliyetlerini düşürmenizi sağlar.</p>\r\n\r\n<p><strong>5. Çevre Dostu Çözümler</strong></p>\r\n\r\n<p>Re-Flexible, sürdürülebilir malzemeler kullanarak çevreye duyarlı çözümler sunar. Esnek bariyerlerimiz geri dönüştürülebilir ve çevresel etkisi minimumdur. Bu, sadece fabrikanız için değil, gezegenimiz için de daha iyi bir tercihtir.</p>\r\n\r\n<p>Re-Flexible&rsquo;ın Devrim Yaratan Çözümleri</p>\r\n\r\n<p>&nbsp;<strong>&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Yaya Yolu Bariyerleri:</strong> Çalışanlarınızın güvenli bir şekilde hareket etmelerini sağlayın. Yaya yolu bariyerlerimiz, darbelere karşı yüksek direnç gösterir ve yaya trafiğinin güvenliğini sağlar.</p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Raf Koruma Bariyerleri:</strong> Depolama alanlarınızı güvence altına alın. Raf koruma bariyerlerimiz, raf sistemlerinizi çarpmalara karşı korur ve rafların ömrünü uzatır.</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Kolon ve Köşe Koruma Bariyerleri:</strong> Fabrikanızdaki kritik yapısal elemanları koruyun. Kolon ve köşe koruma bariyerlerimiz, darbe anında esneyerek kolonların ve köşelerin zarar görmesini önler.</p>\r\n\r\n<p>Müşteri Memnuniyeti ve Kalite Garantisi</p>\r\n\r\n<p>Re-Flexible, müşteri odaklı hizmet anlayışıyla fark yaratır. Her bir bariyerimiz, yüksek kalite standartlarında üretilir ve müşterilerimizin ihtiyaçlarına özel çözümler sunar. Müşteri memnuniyetini en üst düzeyde tutarak, işletmenizin güvenliğini ve verimliliğini artırmayı hedefliyoruz.</p>\r\n\r\n<p>Esnek Bariyerlerle Geleceğe Güvenle Bakın</p>\r\n\r\n<p>Re-Flexible&rsquo;ın esnek bariyerleri, sadece bir güvenlik önlemi değil, aynı zamanda fabrikanızın genel estetiğini ve işlevselliğini artıran bir yatırımdır. Güvenliği sağlarken, maliyetlerinizi düşürmek ve operasyonel verimliliği artırmak istiyorsanız, Re-Flexible esnek bariyerleri tam size göre.</p>\r\n\r\n<p>Fabrikanızda güvenliği ve düzeni sağlamak için Re-Flexible esnek bariyerlerini tercih edin ve farkı hemen hissedin! Güvenliğin ve esnekliğin en tatlı haliyle tanışın!</p>\r\n', 'Re-Flexible esnek bariyerlerle güvenliği ve estetiği keşfedin. Dayanıklı, kolay kurulumlu ve maliyet tasarruflu çözümler sunuyoruz.', 'Re-Flexible, esnek bariyer, güvenlik bariyeri, yaya yolu, raf koruma, kolon koruma, köşe bariyeri, dayanıklı, estetik, kolay kurulum', '1', 'Yaya Yolu Bariyerleri ', '1'),
(17, 'goz/yazi/20125esnek-bariyer-re-flexible.webp', '2024-08-17 18:41:15', 'Esnek Bariyerler: Fabrikalar İçin Yenilikçi Güvenlik Çözümleri', 'esnek-bariyerler-fabrikalar-icin-yenilikci-guvenlik-cozumleri', '<p>Günümüz fabrikalarında güvenlik, verimlilik kadar önemli bir konudur. Re-flexble olarak, fabrikaların güvenlik ihtiyaçlarına cevap veren esnek bariyer çözümleri sunuyoruz. Esnek bariyerlerin iş yerinizde nasıl devrim yaratabileceğini ve güvenliğinizi nasıl artırabileceğini hiç düşündünüz mü?</p>\r\n\r\n<p><strong>1. Esnek Bariyer Nedir?</strong></p>\r\n\r\n<p>Esnek bariyerler, fabrikalarda güvenliği artırmak için kullanılan, darbelere karşı dayanıklı ve esnek yapıdaki güvenlik sistemleridir. Geleneksel çelik bariyerlerin aksine, esnek polimerlerden üretilen bu bariyerler, darbe aldığında esneyerek darbeyi absorbe eder ve tekrar eski haline döner. Bu, hem bariyerlerin hem de çarpan araçların hasar görmesini engeller.</p>\r\n\r\n<p><strong>2. Esnek Bariyerlerin Avantajları</strong></p>\r\n\r\n<p><strong>a. Darbelere Karşı Dayanıklılık</strong></p>\r\n\r\n<p>Fabrikalarda sıkça kullanılan forklift ve diğer ağır makineler, kazara çarpmalar sonucu büyük hasara yol açabilir. Esnek bariyerler, çarpma anında esneyerek darbeyi emer ve bu sayede ciddi hasarları önler.</p>\r\n\r\n<p><strong>b. Düşük Bakım Maliyeti</strong></p>\r\n\r\n<p>Geleneksel bariyerler çarpma sonrası onarım veya değişim gerektirirken, esnek bariyerler genellikle darbeden sonra eski şekline döner. Bu, bakım ve onarım maliyetlerini önemli ölçüde azaltır, işletme maliyetlerini düşürür.</p>\r\n\r\n<p><strong>c. Kolay Kurulum ve Değişim</strong></p>\r\n\r\n<p>Esnek bariyerlerin montajı oldukça basittir ve özel bir ekipman gerektirmez. Bu, üretim süreçlerinizi aksatmadan hızlı ve kolay kurulum sağlar, iş kaybını en aza indirir.</p>\r\n\r\n<p>d. Güvenli ve Şık Tasarım</p>\r\n\r\n<p>Re-flexble esnek bariyerler, sadece güvenliğinizi artırmakla kalmaz, aynı zamanda estetik tasarımı ile fabrikanıza modern bir görünüm kazandırır.</p>\r\n\r\n<p><strong>3. Fabrikalarda Esnek Bariyerlerin Kullanım Alanları</strong></p>\r\n\r\n<p><strong>a. Makine Koruma</strong></p>\r\n\r\n<p>Esnek bariyerler, üretim makinelerinin etrafında kullanılarak, çalışanların ve ekipmanların korunmasını sağlar. Böylece, olası çarpmalar sonucu oluşabilecek iş kazalarının önüne geçilir.</p>\r\n\r\n<p><strong>b. Yaya Yolları ve Ayırıcılar</strong></p>\r\n\r\n<p>Fabrika içinde yaya ve araç yollarının ayrılması, güvenliğin en önemli unsurlarından biridir. Esnek bariyerler, yaya yollarını belirgin hale getirir ve araçlarla yaya trafiğinin güvenli bir şekilde ayrılmasını sağlar.</p>\r\n\r\n<p><strong>c. Depolama Alanları</strong></p>\r\n\r\n<p>Depolama alanlarında forklift ve diğer taşıma araçlarının kullanımı sırasında, raf sistemlerinin ve depolanan ürünlerin korunmasında esnek bariyerler büyük rol oynar.</p>\r\n\r\n<p><strong>d. Yükleme Rampası Koruması</strong></p>\r\n\r\n<p>Yükleme ve boşaltma alanlarında, esnek bariyerler araçların ve personelin güvenliğini sağlar. Çarpma riskini azaltarak kazaları önler.</p>\r\n\r\n<p><strong>4. Neden Re-flexble?</strong></p>\r\n\r\n<p>Re-flexble olarak, fabrikaların güvenlik ihtiyaçlarını anlamak ve en uygun çözümleri sunmak için çalışıyoruz. Yenilikçi ürünlerimiz ve müşteri odaklı hizmet anlayışımız ile sektörde fark yaratıyoruz. Esnek bariyer çözümlerimizle, fabrikanızda güvenliği sağlarken, maliyetlerinizi düşürmenize yardımcı oluyoruz.</p>\r\n\r\n<p>Esnek bariyerlerin sunduğu avantajları fabrikanızda deneyimlemek ve daha fazla bilgi almak için bizimle iletişime geçin. Güvenliğinizi yeniden tanımlamak için Re-flexble&rsquo;ı seçin!</p>\r\n', 'Re-flexble esnek bariyerlerle fabrikalarda güvenliği artırın. Darbelere dayanıklı, düşük bakım maliyetli güvenlik çözümleri sunuyoruz.', 'fabrika güvenliği, esnek bariyerler, endüstriyel koruma, düşük bakım maliyeti, darbelere dayanıklı bariyerler, güvenlik çözümleri', '1', 'Güvenlik Bariyerleri', '1'),
(18, 'goz/yazi/30666deneme.webp', '2024-08-17 18:39:55', 'Fabrikalarda Raf Koruma Bariyerlerinin Önemi ve Kullanımı', 'fabrikalarda-raf-koruma-bariyerlerinin-onemi-ve-kullanimi', '<p>Fabrikalar, büyük miktarda malzemenin depolandığı ve yoğun iş gücünün bulunduğu endüstriyel alanlardır. Bu alanlarda güvenlik, hem işçilerin sağlığı hem de malların zarar görmemesi açısından kritik öneme sahiptir. Raf koruma bariyerleri, bu güvenliğin sağlanmasında önemli bir rol oynar. Peki, raf koruma bariyerleri nedir ve neden bu kadar önemlidir? Bu yazıda, fabrikalarda raf koruma bariyerlerinin önemini ve kullanım alanlarını ele alacağız.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerleri Nedir?</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, depo ve fabrikalardaki raf sistemlerini kazalara karşı koruyan yapısal önlemlerdir. Bu bariyerler, forkliftler, palet taşıyıcıları veya diğer ağır makinelerle çarpışmaları engellemek amacıyla tasarlanmıştır. Genellikle çelik veya diğer dayanıklı malzemelerden üretilen bu bariyerler, çarpışma sırasında raf sistemlerinin hasar görmesini önler ve böylece malzeme kayıplarını minimize eder.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerlerinin Faydaları</strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;1.&nbsp;&nbsp; &nbsp;Güvenlik Sağlar</strong>: Raf koruma bariyerleri, iş yerinde güvenliği artırır. İş kazalarının önlenmesi, işçilerin sağlığını korur ve iş gücü kaybını önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>2.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu:</strong> Raf sistemlerinde meydana gelen hasarlar, büyük maliyetlere neden olabilir. Raf koruma bariyerleri, bu tür hasarların önüne geçerek maliyetleri azaltır.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>3.&nbsp;&nbsp; &nbsp;Malzeme Koruması: </strong>Depolanan ürünlerin zarar görmesi, maddi kayıplara yol açar. Bariyerler, ürünlerin güvenliğini sağlar ve bu tür kayıpları önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>4.&nbsp;&nbsp; &nbsp;Düzen ve Verimlilik:</strong> Raf koruma bariyerleri, depo düzenini korur. Böylece, malzemelerin yerleştirilmesi ve taşınması daha verimli hale gelir.</p>\r\n\r\n<p><strong>Kullanım Alanları</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, çeşitli endüstriyel alanlarda geniş bir kullanım alanına sahiptir. Başlıca kullanım alanları şunlardır:</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;<strong>&bull;&nbsp;&nbsp; &nbsp;Depolar:</strong> Depolarda ürünlerin güvenli bir şekilde saklanması için raf koruma bariyerleri kullanılır. Bu, ürünlerin hasar görmesini ve iş kazalarını önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>&bull;&nbsp;&nbsp; &nbsp;Üretim Tesisleri:</strong> Üretim alanlarında yoğun makine hareketi vardır. Bariyerler, makinelerin raf sistemlerine çarpmasını engelleyerek güvenliği sağlar.<br />\r\n&nbsp;<strong>&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Lojistik Merkezleri:</strong> Lojistik merkezlerinde yoğun malzeme taşınması ve depolanması yapılır. Raf koruma bariyerleri, bu süreçlerde oluşabilecek kazaları önler.&nbsp;</p>\r\n\r\n<p>Fabrikalarda güvenlik ve verimliliğin artırılması, doğru ekipman kullanımıyla mümkündür. Raf koruma bariyerleri, bu ekipmanlar arasında önemli bir yer tutar. Hem işçilerin güvenliğini sağlamak hem de malzeme kayıplarını minimize etmek için raf koruma bariyerlerinin kullanımı, endüstriyel tesislerde vazgeçilmez bir önlemdir. Yatırım maliyeti düşük olan bu bariyerler, uzun vadede sağladıkları tasarruf ve güvenlik ile işletmelere büyük katkı sağlar.</p>\r\n\r\n<p>Güvenli ve verimli bir çalışma ortamı için raf koruma bariyerlerini ihmal etmeyin!</p>\r\n', 'Raf koruma bariyerleri, fabrikalarda iş güvenliğini artırır, malzeme hasarını önler ve maliyet tasarrufu sağlar ve depo düzenini korur.', 'Fabrika güvenliği, raf koruma bariyerleri, depo düzeni, malzeme koruması, iş kazası önleme, maliyet tasarrufu, üretim güvenliği.', '1', 'Raf Koruma Bariyerleri', '0'),
(19, 'goz/yazi/31534yaya-yolu-bariyer.webp', '2024-08-17 19:21:07', 'Fabrikalarda Raf Koruma Bariyerlerinin Önemi: Güvenlik ve Verimliliğin Anahtarı', 'fabrikalarda-raf-koruma-bariyerlerinin-onemi-guvenlik-ve-verimliligin-anahtari', '<p>Fabrikalar, yoğun iş gücü ve büyük miktarda malzemenin depolandığı alanlardır. Bu ortamda güvenliği sağlamak, hem çalışanların sağlığı hem de işletmenin verimliliği açısından kritik öneme sahiptir. İşte tam da bu noktada raf koruma bariyerleri devreye girer. Peki, bu bariyerler neden bu kadar önemlidir ve nasıl kullanılır? Gelin, birlikte keşfedelim.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerleri Nedir?</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, depo ve fabrikalardaki raf sistemlerini olası kazalara karşı korumak amacıyla tasarlanmış yapılardır. Bu bariyerler, forkliftler, palet taşıyıcıları ve diğer ağır makinelerin raflara çarpmasını önleyerek hem rafları hem de üzerlerindeki malzemeleri korur. Genellikle dayanıklı malzemelerden, özellikle çelikten üretilen bu bariyerler, çarpma anında oluşabilecek zararları minimize eder.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerlerinin Faydaları</strong></p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;1.&nbsp;&nbsp; &nbsp;Güvenliği Artırır:</strong> Raf koruma bariyerleri, iş yerinde güvenliği büyük ölçüde artırır. Çalışanların güvenli bir ortamda çalışmasını sağlayarak iş kazalarını önler.<br />\r\n&nbsp;<strong>&nbsp; &nbsp;2.&nbsp;&nbsp; &nbsp;Maliyetleri Azaltır:</strong> Raf sistemlerinde meydana gelebilecek hasarlar, ciddi maliyetlere yol açabilir. Bariyerler, bu tür hasarların önüne geçerek onarım ve değiştirme maliyetlerini azaltır.<br />\r\n&nbsp;&nbsp;<strong> &nbsp;3.&nbsp;&nbsp; &nbsp;Malzemelerin Korunmasını Sağlar:</strong> Raflarda depolanan ürünlerin zarar görmesi, maddi kayıplara neden olabilir. Bariyerler, ürünlerin güvenliğini sağlar ve bu tür kayıpları önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>4.&nbsp;&nbsp; &nbsp;Düzen ve Verimlilik Sağlar</strong>: Raf koruma bariyerleri, depo düzenini korur. Böylece, malzemelerin yerleştirilmesi ve taşınması daha düzenli ve verimli hale gelir.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerlerinin Kullanım Alanları</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, çeşitli endüstriyel alanlarda yaygın olarak kullanılır. Başlıca kullanım alanları şunlardır:</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Depolar:</strong> Depolarda ürünlerin güvenli bir şekilde saklanması için raf koruma bariyerleri kullanılır. Bu, ürünlerin hasar görmesini ve iş kazalarını önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>&bull;&nbsp;&nbsp; &nbsp;Üretim Tesisleri:</strong> Üretim alanlarında yoğun makine hareketi vardır. Bariyerler, makinelerin raf sistemlerine çarpmasını engelleyerek güvenliği sağlar.<br />\r\n&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Lojistik Merkezleri:</strong> Lojistik merkezlerinde yoğun malzeme taşınması ve depolanması yapılır. Raf koruma bariyerleri, bu süreçlerde oluşabilecek kazaları önler.</p>\r\n\r\n<p>Fabrikalarda güvenlik ve verimliliği artırmanın yolu, doğru ekipman kullanımından geçer. Raf koruma bariyerleri, bu açıdan kritik bir öneme sahiptir. Hem çalışanların güvenliğini sağlamak hem de malzeme kayıplarını minimize etmek için raf koruma bariyerlerinin kullanımı, endüstriyel tesislerde vazgeçilmez bir önlemdir. Küçük bir yatırım ile büyük kazançlar sağlamak mümkün!</p>\r\n\r\n<p>Güvenli ve verimli bir çalışma ortamı için raf koruma bariyerlerini ihmal etmeyin. Hem iş yerinizi hem de çalışanlarınızı koruyun, verimliliği artırın!</p>\r\n', 'Fabrikalarda raf koruma bariyerleri, iş güvenliğini artırır, malzeme hasarını önler, maliyetleri düşürür ve depo düzenini korur.', 'Fabrika güvenliği, raf koruma bariyerleri, iş kazası önleme, depo düzeni, malzeme koruması, maliyet tasarrufu, üretim güvenliği.', '1', 'Raf Koruma Bariyerleri', '0'),
(20, 'goz/yazi/28155Fabrikalarda Raf Koruma Bariyerleri Güvenlik ve Düzenin Sırrı.jpg', '2024-08-17 18:54:04', 'Fabrikalarda Raf Koruma Bariyerleri: Güvenlik ve Düzenin Sırrı', 'fabrikalarda-raf-koruma-bariyerleri-guvenlik-ve-duzenin-sirri', '<p>Fabrikaların kalabalık ve hareketli dünyasında güvenlik ve düzen sağlamak, doğru araçlarla mümkündür. Bu araçlardan biri de raf koruma bariyerleridir. Haydi, raf koruma bariyerlerinin neden bu kadar önemli olduğunu ve nasıl harikalar yarattığını daha yakından inceleyelim.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerleri Nedir?</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, adından da anlaşılacağı gibi, raf sistemlerini dış etkenlerden koruyan sağlam yapısal elemanlardır. Çelik gibi dayanıklı malzemelerden üretilirler ve forkliftler, palet taşıyıcıları gibi ağır makinelerin raflara zarar vermesini önlerler. Kısacası, küçük ama etkili bu kahramanlar, fabrikaların güvenli ve düzenli kalmasını sağlar.</p>\r\n\r\n<p><strong>Raf Koruma Bariyerlerinin Sağladığı Avantajlar</strong></p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;1.&nbsp;&nbsp; &nbsp;Çalışan Güvenliği: </strong>Çalışanlarınızın güvenliği, her şeyden önce gelir. Raf koruma bariyerleri, iş kazalarını önleyerek güvenli bir çalışma ortamı yaratır. İşçiler, rahat ve güvenli bir şekilde çalışırken, siz de onların güvende olduğunu bilmenin huzurunu yaşarsınız.<br />\r\n&nbsp;&nbsp; <strong>&nbsp;2.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu:</strong> Hasarlı raf sistemlerini onarmak veya değiştirmek, işletmenize ciddi maliyetler getirebilir. Raf koruma bariyerleri, bu tür hasarların önüne geçerek uzun vadede büyük tasarruf sağlar.<br />\r\n<strong>&nbsp;&nbsp; &nbsp;3.&nbsp;&nbsp; &nbsp;Malzeme Güvenliği:</strong> Depolanan ürünleriniz, raf koruma bariyerleri sayesinde güvence altındadır. Ürünlerinizin hasar görmesini önler, böylece hem maddi kayıpların önüne geçer hem de müşteri memnuniyetini artırırsınız.<br />\r\n&nbsp;&nbsp; <strong>&nbsp;4.&nbsp;&nbsp; &nbsp;Düzen ve Verimlilik:</strong> Düzenli bir depo, verimli bir çalışma ortamının anahtarıdır. Raf koruma bariyerleri, raf sistemlerinin düzenini koruyarak, malzemelerin yerleştirilmesini ve taşınmasını kolaylaştırır.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Raf Koruma Bariyerlerinin Kullanım Alanları</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, çeşitli endüstriyel alanlarda yaygın olarak kullanılır:</p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Depolar:</strong> Ürünlerin güvenli bir şekilde saklanması için idealdir.<br />\r\n&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Üretim Tesisleri:</strong> Makinelerin raf sistemlerine çarpmasını engelleyerek güvenliği sağlar.<br />\r\n&nbsp;&nbsp; <strong>&nbsp;&bull;&nbsp;&nbsp; &nbsp;Lojistik Merkezleri:</strong> Malzeme taşınması ve depolanması sırasında oluşabilecek kazaları önler.</p>\r\n\r\n<p>Fabrikalarda güvenlik ve verimliliği artırmak, doğru ekipmanları kullanmakla mümkündür. Raf koruma bariyerleri, bu açıdan küçük ama etkili bir yatırımdır. Hem çalışanların güvenliğini sağlamak hem de malzeme kayıplarını önlemek için raf koruma bariyerlerini kullanmak, iş yerinizi daha güvenli ve düzenli hale getirir.</p>\r\n', 'Fabrikada raf koruma bariyerleri, çalışan güvenliğini artırır, maliyetleri düşürür ve düzen sağlar. Küçük kahramanlar büyük fark yaratır!', 'Raf koruma bariyerleri, fabrika güvenliği, maliyet tasarrufu, çalışan güvenliği, depo düzeni, malzeme koruma, verimlilik.', '1', 'Raf Koruma Bariyerleri', '0'),
(21, 'goz/yazi/25103Güvenliğin ve Verimliliğin Yolu.jpg', '2024-08-17 18:58:47', 'Güvenliğin ve Verimliliğin Yolu', 'guvenligin-ve-verimliligin-yolu', '<p>Fabrikalar, makinelerin ve işçilerin yoğun hareket halinde olduğu, karmaşık ve dinamik çalışma ortamlarıdır. Bu ortamda hem işçilerin güvenliği hem de iş akışının düzenli ve verimli bir şekilde sağlanması kritik öneme sahiptir. Yaya yolu bariyerleri, bu noktada devreye girerek büyük fark yaratır. Bu yazımızda, yaya yolu bariyerlerinin neden bu kadar önemli olduğunu ve nasıl kullanıldığını ele alacağız.</p>\r\n\r\n<p><strong>Yaya Yolu Bariyerleri Nedir?</strong></p>\r\n\r\n<p>Yaya yolu bariyerleri, fabrikalarda işçilerin güvenli bir şekilde hareket etmelerini sağlamak için yaya yollarını belirleyen ve koruyan yapısal elemanlardır. Bu bariyerler, işçilerin belirlenen yolları kullanmasını teşvik eder ve makinelerin hareket alanından uzak durmalarını sağlar. Genellikle çelik veya dayanıklı plastik gibi malzemelerden üretilen bu bariyerler, fabrikalarda güvenli bir çalışma ortamı yaratır.</p>\r\n\r\n<p><strong>Yaya Yolu Bariyerlerinin Faydaları</strong></p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;<strong>1.&nbsp;&nbsp; &nbsp;Güvenliği Artırır:</strong> Yaya yolu bariyerleri, işçilerin güvenliğini sağlar. İşçilerin belirlenen yolları kullanmasını teşvik ederek kazaların önüne geçer. Bu sayede, iş kazaları minimuma indirilir ve çalışanların sağlığı korunur.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>2.&nbsp;&nbsp; &nbsp;İş Akışnı Düzenlerı: </strong>Yaya yolu bariyerleri, iş akışını düzenler. Makineler ve işçiler için ayrı yollar oluşturarak, iş akışının kesintisiz ve verimli bir şekilde devam etmesini sağlar.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>3.&nbsp;&nbsp; &nbsp;Verimliliği Artırır:</strong> Güvenli ve düzenli bir çalışma ortamı, işçilerin daha verimli çalışmasını sağlar. Yaya yolu bariyerleri, işçilerin hızlı ve güvenli bir şekilde hareket etmelerine olanak tanır.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>4.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu Sağlar:</strong> İş kazalarının azalması, iş gücü kaybını ve ilgili maliyetleri azaltır. Yaya yolu bariyerleri, kazaların önlenmesi yoluyla işletmeye maliyet tasarrufu sağlar.</p>\r\n\r\n<p><strong>Yaya Yolu Bariyerlerinin Kullanım Alanları</strong></p>\r\n\r\n<p>Yaya yolu bariyerleri, çeşitli endüstriyel alanlarda yaygın olarak kullanılır:</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Üretim Tesisleri: İşçilerin ve makinelerin güvenli bir şekilde çalışmasını sağlar.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Depolar: Malzemelerin taşınması sırasında işçilerin güvenliğini korur.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Lojistik Merkezleri: Yoğun hareketliliğin olduğu alanlarda güvenli geçiş yolları oluşturur.</p>\r\n\r\n<p>Fabrikalarda güvenliğin ve verimliliğin sağlanması, doğru ekipman ve yapıların kullanılması ile mümkündür. Yaya yolu bariyerleri, bu açıdan vazgeçilmez bir öneme sahiptir. Hem işçilerin güvenliğini sağlamak hem de iş akışını düzenlemek için yaya yolu bariyerlerini kullanmak, fabrikalarda daha güvenli ve verimli bir çalışma ortamı yaratır.</p>\r\n\r\n<p>Güvenliğin ve verimliliğin yolunu açan yaya yolu bariyerlerini ihmal etmeyin. Hem iş yerinizi hem de çalışanlarınızı koruyun ve iş akışının kesintisiz devam etmesini sağlayın!</p>\r\n', 'Fabrikada yaya yolu bariyerleri, işçi güvenliğini artırır, iş akışını düzenler ve verimliliği sağlar. Güvenliğin yol arkadaşları!', 'Fabrika güvenliği, yaya yolu bariyerleri, işçi koruma, iş akışı düzeni, verimlilik, kazaları önleme, endüstriyel güvenlik.', '1', 'Yaya Yolu Bariyerleri ', '0'),
(22, 'goz/yazi/30732F7EA1964-C744-464F-9D70-DE7A4A742284.webp', '2024-08-17 15:29:19', 'Raf Koruma Bariyerleri: Depo Güvenliğinizin Vazgeçilmez Kahramanı', 'raf-koruma-bariyerleri-depo-guvenliginizin-vazgecilmez-kahramani', '<p>Depo yönetimi ve düzeni, iş yerinizin verimliliğini ve güvenliğini doğrudan etkiler. Raf sistemleri, bu düzenin en kritik unsurlarından biridir. Ancak, raf sistemlerinin etkin bir şekilde korunması, genellikle göz ardı edilen ama son derece önemli bir detaydır. İşte burada devreye raf koruma bariyerleri giriyor!</p>\r\n\r\n<p><strong>Raf Koruma Bariyerleri Nedir ve Neden Önemlidir?</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, depo ve fabrika gibi yoğun trafiğin olduğu alanlarda raf sistemlerini darbelere ve kazalara karşı koruyan güçlü ve dayanıklı yapılardır. Peki, bu koruma bariyerlerinin neden bu kadar önemli olduğunu hiç düşündünüz mü? İşte birkaç sebep:</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;1.&nbsp;&nbsp; &nbsp;Güvenlik: </strong>Çalışanlarınızın güvenliği her şeyden önce gelir. Raf koruma bariyerleri, olası çarpışmalarda rafların devrilmesini ve ciddi kazaları önler.<br />\r\n&nbsp;&nbsp; &nbsp;<strong>2.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu:</strong> Raf sistemlerinin onarımı veya değiştirilmesi oldukça maliyetli olabilir. Bariyerler, bu tür maliyetlerin önüne geçer ve uzun vadede tasarruf sağlar.<br />\r\n&nbsp;&nbsp; &nbsp;3.&nbsp;&nbsp; &nbsp;Verimlilik: Güvenli bir depo, iş akışını kesintiye uğratmaz. Bu da operasyonel verimliliğinizi artırır.</p>\r\n\r\n<p><strong>Raf Koruma Bariyeri Çeşitleri</strong></p>\r\n\r\n<p>Re-Flexible olarak, çeşitli ihtiyaçlara uygun farklı raf koruma bariyerleri sunuyoruz. İşte popüler bazı çeşitler:</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Köşe Koruma Bariyerleri: Rafların köşelerini koruyarak, özellikle dar alanlarda manevra yaparken olası çarpışmaları engeller.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Ayak Koruma Bariyerleri: Raf ayaklarını darbelerden korur, rafın dengesini ve sağlamlığını muhafaza eder.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Tam Yükseklik Bariyerleri: Rafların tamamını koruyarak, yüksek raf sistemlerinde bile tam güvenlik sağlar.</p>\r\n\r\n<p><strong>Neden Re-Flexible?</strong></p>\r\n\r\n<p>Re-Flexible olarak, müşteri memnuniyeti ve kaliteyi her zaman ön planda tutuyoruz. Raf koruma bariyerlerimiz:</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Dayanıklı ve Uzun Ömürlüdür: Yüksek kaliteli malzemelerden üretilir.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Kolay Montaj ve Kullanım: Pratik montaj özellikleri sayesinde zaman ve iş gücünden tasarruf sağlar.<br />\r\n&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;Çeşitli İhtiyaçlara Uygun Çözümler: Depo veya fabrikanızın spesifik gereksinimlerine uygun çeşitli seçenekler sunar.</p>\r\n\r\n<p><strong>Güvenli ve Verimli Depo Yönetimi İçin Doğru Adres</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, depo güvenliğinizin ve düzeninizin gizli kahramanıdır. Re-Flexible olarak, iş yerinizin ihtiyaçlarına uygun en kaliteli ve dayanıklı bariyerleri sizlere sunmaktan gurur duyuyoruz. Web sitemizden ürünlerimize göz atabilir ve size en uygun çözümleri bulabilirsiniz.</p>\r\n\r\n<p>Güvenli ve verimli bir depo için ilk adımı atın, raf koruma bariyerleri ile tanışın!</p>\r\n', 'Depo güvenliğinizi artırın! Dayanıklı raf koruma bariyerlerimizle kazaları önleyin ve maliyetlerinizi düşürün.', 'raf koruma bariyerleri, depo güvenliği, raf sistemi koruma, endüstriyel güvenlik, maliyet tasarrufu, dayanıklı bariyerler', '1', 'Raf Koruma Bariyerleri', '0'),
(23, 'goz/yazi/22496bariyer-kolon.webp', '2024-08-17 15:14:40', 'Depo Güvenliğinde Yeni Standart: Kolon Koruma Bariyerleri', 'depo-guvenliginde-yeni-standart-kolon-koruma-bariyerleri', '<p>Depo ve fabrika gibi yoğun trafik alanlarında güvenlik ve düzen, verimli bir işleyişin temel taşlarıdır. Depo raflarının yanı sıra, yapısal kolonlar da korunması gereken kritik unsurlar arasında yer alır. İşte bu noktada kolon koruma bariyerleri devreye giriyor ve güvenlik konusunda yeni bir standart belirliyor!</p>\r\n\r\n<p><strong>Kolon Koruma Bariyerleri Nedir ve Neden Önemlidir?</strong></p>\r\n\r\n<p>Kolon koruma bariyerleri, depo ve üretim tesislerinde kolonların darbelere karşı korunmasını sağlayan güçlü ve dayanıklı bariyerlerdir. Peki, bu koruma bariyerlerinin neden bu kadar önemli olduğunu biliyor musunuz? İşte birkaç önemli neden:</p>\r\n\r\n<p><strong>&nbsp;&nbsp; &nbsp;1.&nbsp;&nbsp; &nbsp;Yapısal Güvenlik: </strong>Kolonlar, binanızın yapısal bütünlüğünü sağlar. Darbelere karşı korunmaları, binanın genel güvenliğini artırır.</p>\r\n\r\n<p>&nbsp;<strong>&nbsp; &nbsp;2.&nbsp;&nbsp; &nbsp;Çalışan Güvenliği:</strong> Olası çarpışmalarda kolonların hasar görmesi, ciddi iş kazalarına yol açabilir. Bariyerler, bu riskleri minimize eder.</p>\r\n\r\n<p>&nbsp;&nbsp; <strong>&nbsp;3.&nbsp;&nbsp; &nbsp;Maliyet Tasarrufu: </strong>Kolon hasarlarının onarımı maliyetli ve zaman alıcı olabilir. Koruma bariyerleri, bu tür maliyetlerin önüne geçer.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Neden Re-Flexible Kolon Koruma Bariyerleri?</strong></p>\r\n\r\n<p>Re-Flexible olarak, kalite ve müşteri memnuniyetini her zaman ön planda tutuyoruz. Kolon koruma bariyerlerimiz:</p>\r\n\r\n<p>&nbsp; &nbsp; &bull;&nbsp;&nbsp; &nbsp;<strong>Dayanıklı ve Uzun Ömürlüdür: </strong>Yüksek kaliteli malzemeler kullanılarak üretilmiştir.</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;<strong>Kolay Montaj ve Kullanım:</strong> Pratik montaj özellikleri sayesinde zaman ve iş gücünden tasarruf sağlar.</p>\r\n\r\n<p>&nbsp;&nbsp; &nbsp;&bull;&nbsp;&nbsp; &nbsp;<strong>Çeşitli İhtiyaçlara Uygun Çözümler:</strong> Tesisinizin spesifik gereksinimlerine uygun çeşitli seçenekler sunar.</p>\r\n\r\n<p><strong>Güvenli ve Verimli Depo Yönetimi İçin Doğru Adres</strong></p>\r\n\r\n<p>Kolon koruma bariyerleri, depo güvenliğinizin ve düzeninizin vazgeçilmez unsurlarıdır. Re-Flexible olarak, tesisinizin ihtiyaçlarına uygun en kaliteli ve dayanıklı bariyerleri sizlere sunmaktan gurur duyuyoruz. Web sitemizden ürünlerimize göz atabilir ve size en uygun çözümleri bulabilirsiniz.</p>\r\n\r\n<p>Güvenli ve verimli bir depo için ilk adımı atın, kolon koruma bariyerleri ile tanışın!</p>\r\n', 'Depo ve fabrika güvenliğinizi artırın! Dayanıklı kolon koruma bariyerlerimizle yapısal güvenliği sağlayın ve kazaları önleyin.', 'kolon koruma bariyerleri, depo güvenliği, yapısal koruma, endüstriyel güvenlik, dayanıklı bariyerler, maliyet tasarrufu', '1', 'Kolon Koruma Bariyerleri', '0'),
(24, 'goz/yazi/25545raf-koruma-bariyerleri.webp', '2024-08-17 15:03:36', 'Raf Koruma Bariyerleri: Rafların Güvenlik Kalkanı', 'raf-koruma-bariyerleri-raflarin-guvenlik-kalkani', '<p>Bugün sizlere fabrikaların olmazsa olmaz güvenlik önlemlerinden biri olan raf koruma bariyerlerinden bahsedeceğiz. Hem işçilerin güvenliği hem de iş akışının düzeni için bu bariyerlerin neden bu kadar önemli olduğunu birlikte inceleyelim.</p>\r\n\r\n<p><strong>Güvenlikte İlk Adım</strong></p>\r\n\r\n<p>Fabrikalar, yoğun çalışma ortamları ve ağır yüklerin taşındığı yerlerdir. Bu tür ortamlarda güvenlik her zaman ön planda olmalıdır. Raf koruma bariyerleri, rafların devrilme riskini en aza indirerek işçilerin güvenliğini sağlar. Özellikle forklift gibi araçların sıkça kullanıldığı alanlarda, bariyerler kazaların önüne geçmek için kritik bir rol oynar.</p>\r\n\r\n<p><strong>Kesintisiz İş Akışı</strong></p>\r\n\r\n<p>Bir fabrikanın verimliliği, kesintisiz bir iş akışına bağlıdır. Düşen raflar veya devrilen malzemeler, sadece işçilerin güvenliğini tehlikeye atmakla kalmaz, aynı zamanda üretim sürecinde büyük aksamalara neden olur. Raf koruma bariyerleri sayesinde, bu tür kesintilerin önüne geçilir ve iş süreçleri sorunsuz bir şekilde devam eder. Bu da hem zaman hem de maliyet tasarrufu demektir.</p>\r\n\r\n<p><strong>Dayanıklı ve Uzun Ömürlü</strong></p>\r\n\r\n<p>Raf koruma bariyerleri, sağlam ve dayanıklı malzemelerden üretilir. Yüksek dayanıklılığa sahip polietilen plastikten yapılan bu bariyerler, uzun yıllar boyunca etkin bir koruma sağlar. Kolay kurulumu sayesinde ise hızlıca monte edilir ve anında güvenlik sağlar. Yatırımınızın uzun ömürlü ve sağlam olması, fabrikalar için büyük bir avantajdır.</p>\r\n\r\n<p><strong>Güvenlik</strong></p>\r\n\r\n<p>Raf koruma bariyerlerini güvenlik çözümü olarak nitelendirebiliriz. Çünkü bu basit ama etkili çözümler, iş yerinde huzuru ve güvenliği sağlar. Raf koruma bariyerleri fabrikanızdaki herkesin güvenle çalışmasına katkıda bulunur. Güvenli bir ortamda çalışmak, işçilerin motivasyonunu ve üretkenliğini artırır.</p>\r\n\r\n<p>Fabrikanızda güvenliği artırmak ve iş akışını düzenlemek için raf koruma bariyerleri mükemmel bir çözümdür. İşçilerinizi korumak, iş süreçlerinizi kesintisiz sürdürmek ve uzun vadede maliyet tasarrufu sağlamak için bu bariyerlere yatırım yapmayı düşünebilirsiniz. Güvenlik, her zaman önceliğiniz olmalı!</p>\r\n', 'Fabrikalarda raf koruma bariyerleri, işçi güvenliğini sağlamak ve iş akışını kesintisiz sürdürmek için kritik bir çözümdür. Dayanıklı ve uzun ömürlüdür.', 'Fabrika güvenliği, raf koruma bariyeri, işçi güvenliği, iş akışı, dayanıklı bariyerler, üretim verimliliği, endüstriyel güvenlik.', '1', 'Raf Koruma Bariyerleri', '0'),
(28, 'goz/yazi/21697bariyer.webp', '2024-08-17 15:05:27', 'Dubalar ile Güvenliğin Esnek Çözümleri', 'dubalar-ile-guvenligin-esnek-cozumleri', '<p>Endüstriyel ve ticari alanlarda güvenlik önlemleri, iş süreçlerinin verimli ve kesintisiz bir şekilde devam etmesi için kritik öneme sahiptir. Bu bağlamda, esnek dubalar yenilikçi ve etkili bir çözüm olarak öne çıkar. Hem dayanıklılıkları hem de esneklikleri ile dikkat çeken esnek dubalar, güvenlik ve düzen sağlama konusunda nasıl bir fark yaratıyor? İşte detaylar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;Esnek Dubalar Nedir ve Nasıl Çalışır?</strong><br />\r\nEsnek dubalar, özel olarak tasarlanmış yüksek dayanıklılığa sahip polimer malzemelerden üretilen bariyerlerdir. Bu dubalar, çarpma anında eğilip bükülebilir ve ardından orijinal şekline geri dönebilir. Bu özellik, onları yoğun trafik ve darbe riski yüksek alanlar için ideal kılar.&nbsp;</p>\r\n\r\n<p><strong>&nbsp; Esnek dubaların çalışma prensibi:</strong><br />\r\n<strong>Esneklik ve Hafiflik: </strong>Bu dubalar, güçlü fakat esnek malzemelerden yapılır. Böylece, herhangi bir darbe durumunda kırılmak yerine esner ve sonra eski haline döner.<br />\r\n<strong>Dikkat Çekici Tasarım: </strong>Genellikle parlak renklerde üretilirler, bu sayede dikkat çekerek tehlike anında uyarı sağlarlar.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp;Esnek Dubaların Sağladığı Temel Faydalar Esnek dubalar, klasik güvenlik bariyerlerine göre birçok avantaj sunar. İşte esnek dubaların sunduğu başlıca faydalar:</p>\r\n\r\n<p><strong>1. Yüksek Darbe Dayanıklılığı: &nbsp;</strong><br />\r\nEsnek dubalar, araç çarpmaları veya diğer mekanik darbelere karşı yüksek dayanıklılık gösterir. Bu, sıkça yenileme ihtiyacını ortadan kaldırır.</p>\r\n\r\n<p><strong>2. Kolay Taşınabilirlik ve Kurulum: &nbsp;</strong><br />\r\nHafif yapıları sayesinde esnek dubalar, kolayca taşınabilir ve hızlı bir şekilde kurulabilir. Bu, mobil çalışma ortamları için idealdir.</p>\r\n\r\n<p><strong>3. Uzun Ömürlü Kullanım:</strong><br />\r\nDayanıklı malzemelerden üretilen esnek dubalar, uzun ömürlü kullanım sunar. Bakım gereksinimi düşük, maliyet etkin bir çözümdür.</p>\r\n\r\n<p><strong>4. Çevre Dostu Malzemeler: &nbsp;</strong><br />\r\nÇoğu esnek duba, geri dönüştürülebilir malzemelerden üretilir. Bu, sürdürülebilirlik açısından önemli bir avantajdır.</p>\r\n\r\n<p><strong>5. Estetik ve Fonksiyonel Tasarım: &nbsp;</strong><br />\r\nEsnek dubalar, hem estetik hem de fonksiyonel açıdan dikkat çekicidir. Renkleri ve şekilleri, görsel olarak da çalışma alanlarına katkı sağlar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;Esnek Dubaların Kullanım Alanları</strong><br />\r\nEsnek dubalar, çeşitli endüstriyel ve ticari ortamlarda geniş bir kullanım alanına sahiptir. İşte bazı örnekler</p>\r\n\r\n<p><strong>Fabrika&nbsp;ve Üretim Alanları: </strong>Makine ve ekipmanların bulunduğu alanlarda güvenlik bariyeri olarak kullanılırlar.<br />\r\n<strong>Depo ve Lojistik Merkezleri: </strong>Araç trafiğinin yoğun olduğu depo ve lojistik merkezlerinde, trafiği yönlendirmek ve kazaları önlemek için kullanılır.<br />\r\n<strong>Otoparklar ve Açık Alanlar:</strong> Araç park alanlarını belirlemek ve yönlendirmek için idealdirler.<br />\r\n&nbsp;</p>\r\n\r\n<p><strong>&nbsp; &nbsp;Esnek Dubaların Geleceği</strong><br />\r\nEsnek dubalar, endüstriyel ve ticari alanlarda güvenlik ve düzen sağlama konusunda yeni bir çağ açıyor. Esnek ve dayanıklı yapıları, maliyet etkinlikleri ve çevre dostu özellikleri ile esnek dubalar, modern çalışma alanlarının vazgeçilmez bir parçası haline geliyor.</p>\r\n', 'Esnek dubalar, fabrikalarda güvenliği ve düzeni artıran, darbelere dayanıklı, esnek ve çevre dostu bariyerlerdir.', 'Esnek dubalar, fabrika güvenliği, fabrika bubaları\' darbe dayanıklılığı, taşınabilir bariyer, çevre dostu, endüstriyel güvenlik, uzun ömürlü.', '1', 'Dubalar ve Zemin Bariyeri', '0'),
(29, 'goz/yazi/25986bariyer-duba.webp', '2024-08-17 15:05:09', 'Fabrikalarda Dubaların Önemi ve Kullanım Alanları', 'fabrikalarda-dubalarin-onemi-ve-kullanim-alanlari', '<p>Endüstriyel alanlarda güvenlik ve düzenin sağlanması her zaman önceliklidir. Bu bağlamda dubalar, genellikle göz ardı edilse de, oldukça kritik bir rol oynar. Peki, dubalar fabrikalarda nasıl kullanılır ve neden bu kadar önemlidir?</p>\r\n\r\n<p><strong>&nbsp; &nbsp; Dubalar Nedir ve Nasıl Çalışır?</strong></p>\r\n\r\n<p>Dubalar, genellikle parlak renkli ve plastikten yapılan, yerleştirildikleri alanlarda dikkat çekici bir uyarı aracı olarak kullanılan nesnelerdir. Birçok farklı şekil ve boyutta olabilirler, ancak en yaygın özellikleri dayanıklı ve tekrar kullanılabilir&nbsp;olmalarıdır. Dubalar, işaretlemek veya sınırlandırmak istediğimiz alanlarda kullanılarak, hem çalışanların hem de araçların güvenliğini sağlar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp;&nbsp;Fabrikalarda Dubaların Kullanım Alanları</strong></p>\r\n\r\n<p><strong>1. Trafik Yönlendirmesi:&nbsp;</strong>Fabrika içindeki araç trafiğini yönlendirmek için dubalar kullanılır. Özellikle büyük fabrikalarda forkliftler ve diğer taşıma araçları sıkça kullanıldığından, güvenli ve düzenli bir trafik akışı sağlanması hayati önem taşır.</p>\r\n\r\n<p><strong>2. Geçici Alan Sınırlandırma:</strong> Bakım veya onarım çalışmaları sırasında belirli alanların geçici olarak kapatılması gerekebilir. Dubalar, bu tür durumlarda alanı net bir şekilde sınırlandırarak çalışanların yanlışlıkla tehlikeli bölgelere girmesini önler.</p>\r\n\r\n<p><strong>3. Depolama Alanları: </strong>Depolama alanlarında düzeni sağlamak ve belirli bölgeleri işaretlemek için dubalar kullanılabilir. Bu, malzemelerin doğru yerlere yerleştirilmesini ve erişimin kolaylaştırılmasını sağlar.</p>\r\n\r\n<p><strong>4. Acil Durum Yolları:</strong> Acil durumlarda kullanılacak yolların ve çıkışların belirlenmesi de dubalar aracılığıyla yapılabilir. Bu sayede tahliye durumlarında karışıklık yaşanmasının önüne geçilir.</p>\r\n\r\n<p>Fabrikalarda güvenlik ve düzenin sağlanması, üretim verimliliği açısından kritik öneme sahiptir. Dubalar, bu düzenin sağlanmasında küçük ama etkili bir rol oynar. Onların doğru ve etkin kullanımı, iş yerinde kazaların ve karmaşanın önlenmesine büyük katkı sağlar. Fabrikada çalışan herkesin, dubaların önemini ve doğru kullanımını bilmesi, daha güvenli bir çalışma ortamı oluşturulmasına yardımcı olur.</p>\r\n', 'Fabrikalarda dubalar, güvenliği ve düzeni sağlar. Trafik yönlendirme, alan sınırlandırma ve acil durum yollarında kullanılır.', 'fabrika güvenliği, dubalar, trafik yönlendirme, alan sınırlandırma, acil durum, endüstriyel güvenlik, iş yeri güvenliği, depolama düzeni', '1', 'Dubalar ve Zemin Bariyeri', '0'),
(30, 'goz/yazi/22244kose-bariyeri-esnek-bariyer.webp', '2024-08-17 14:47:40', 'Fabrikalarda Köşe Bariyerleri: Güvenliğin Tatlı Köşesi', 'fabrikalarda-kose-bariyerleri-guvenligin-tatli-kosesi', '<p>Fabrikalar, üretim hattından depolamaya, yükleme alanlarından ofis bölümlerine kadar karmaşık ve yoğun iş ortamlarıdır. Bu ortamlarda işçi güvenliği ve ekipmanların korunması büyük önem taşır. İşte tam da bu noktada köşe bariyerleri devreye girer. Fabrikalarda köşe bariyerlerinin kullanımı, hem güvenliği artırır hem de tesisin genel verimliliğini destekler. Peki, bu küçük ama etkili ekipmanların neden bu kadar önemli olduğunu hiç düşündünüz mü?</p>\r\n\r\n<p>&nbsp; <strong>&nbsp; &nbsp;1. Güvenliği Artırır</strong></p>\r\n\r\n<p>Köşe bariyerleri, özellikle forklift ve diğer ağır makinelerin yoğun olarak kullanıldığı alanlarda, olası çarpma ve kazaları önlemede kritik bir rol oynar. Bariyerler, çalışanları ve ekipmanları koruyarak iş kazalarını minimize eder. Ayrıca, köşe bariyerlerinin dikkat çekici renkleri ve tasarımları, işçilere potansiyel tehlikeleri hatırlatarak daha dikkatli olmalarını sağlar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;2. Maliyet Tasarrufu Sağlar</strong></p>\r\n\r\n<p>Bir fabrikada meydana gelebilecek bir kaza, ciddi maddi kayıplara da yol açabilir. Hasar gören makinelerin onarımı, üretim duraklamaları ve iş gücü kaybı gibi maliyetler, işletmeler için büyük bir yük olabilir. Köşe bariyerleri, bu tür kazaları önleyerek işletmelerin uzun vadede maliyet tasarrufu yapmasına yardımcı olur.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;3. Ekipmanları Korur</strong></p>\r\n\r\n<p>Fabrika ortamında sürekli hareket halinde olan makineler ve araçlar, köşelere çarparak hem kendilerine hem de çevredeki ekipmanlara zarar verebilir. Köşe bariyerleri, bu tür çarpmaları önleyerek makinelerin ve diğer ekipmanların ömrünü uzatır. Böylece, fabrikada daha az onarım ve değiştirme işlemi gerekecektir.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;4. Kolay Kurulum ve Dayanıklılık</strong></p>\r\n\r\n<p>Köşe bariyerleri, dayanıklı malzemelerden üretilir ve fabrikaların zorlu çalışma koşullarına dayanacak şekilde tasarlanır. Kurulumu oldukça kolaydır ve yer değişikliği gerektiğinde yeniden konumlandırılabilir. Bu esneklik, fabrikaların değişen ihtiyaçlarına hızla uyum sağlamalarını mümkün kılar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;5. İş Yeri Moralini Yükseltir</strong></p>\r\n\r\n<p>Güvenli bir iş yeri, çalışanların moral ve motivasyonunu da artırır. İşçiler, kendilerini güvende hissettiklerinde daha verimli ve dikkatli çalışırlar. Bu da genel üretkenliği artırarak fabrikanın başarısına katkıda bulunur.</p>\r\n\r\n<p>Fabrikalar için küçük bir detay gibi görünen köşe bariyerleri, aslında büyük farklar yaratabilir. Hem çalışanların hem de ekipmanların korunmasını sağlayarak güvenli, verimli ve maliyet etkin bir çalışma ortamı sunar. Tatlı bir detay olarak nitelendirebileceğimiz köşe bariyerleri, aslında fabrika güvenliğinin köşe taşlarından biridir. Her köşede güvenliğin tadını çıkarmak isteyen tüm fabrikalara köşe bariyerlerini şiddetle tavsiye ediyoruz!</p>\r\n', 'Köşe bariyerleri, fabrikalarda güvenliği artırır, maliyetleri düşürür ve ekipmanları korur. İşçi moralini yükseltir ve verimliliği artırır.', ' Köşe bariyerleri, fabrika güvenliği, işçi koruma, ekipman koruma, maliyet tasarrufu, iş yeri güvenliği, verimlilik artırma.', '1', 'Köşe Bariyerleri', '0');
INSERT INTO `yazi` (`yazi_id`, `blog_resimyol`, `yazi_zaman`, `yazi_ad`, `yazi_seourl`, `yazi_detay`, `yazi_description`, `yazi_keyword`, `yazi_durum`, `kategori_id`, `yazi_onecikar`) VALUES
(31, 'goz/yazi/30374esnek-bariyer-duba.webp', '2024-08-17 14:44:45', 'Endüstriyel Ortamlarda Esnek Dubalar: Güvenlik ve Verimlilik İçin Akıllı Çözümler', 'endustriyel-ortamlarda-esnek-dubalar-guvenlik-ve-verimlilik-icin-akilli-cozumler', '<p>Fabrikalar ve diğer endüstriyel ortamlar, yüksek güvenlik standartlarına sahip olması gereken yerlerdir. Bu ortamlarda çalışanların ve ekipmanların korunması, operasyonların verimliliğini ve güvenliğini artırmak için kritik öneme sahiptir. Bu bağlamda, esnek dubalar önemli bir rol oynar. Esnek dubalar, özellikle köşe bariyerleri olarak kullanıldığında, endüstriyel alanlarda çeşitli avantajlar sağlar. Bu yazıda, esnek dubaların fabrikalarda nasıl kullanıldığını ve sağladığı faydaları inceleyeceğiz.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;Esnek Dubaların Özellikleri</strong></p>\r\n\r\n<p>Esnek dubalar, dayanıklı ve esnek plastik malzemelerden üretilir. Bu dubalar, darbelere karşı dirençlidir ve çarpmalar sonrasında orijinal şekillerine geri dönebilir. Bu özellikleri sayesinde, forkliftler, paletler ve diğer ağır ekipmanların yoğun olarak kullanıldığı fabrikalarda ideal bir çözümdür.</p>\r\n\r\n<p>&nbsp; &nbsp;<strong> Dayanıklılık:</strong> Esnek dubalar, yüksek mukavemetli malzemelerden yapılmış olup, sert darbelere dayanabilir ve deformasyon olmadan görevlerini sürdürebilir.<br />\r\n<strong>&nbsp; &nbsp; Esneklik:</strong> Çarpmalar sonucunda şekillerini kaybetmezler ve orijinal hallerine dönerler, bu da uzun ömürlü kullanım sağlar.<br />\r\n&nbsp; &nbsp;<strong>Görünürlük</strong>: Parlak renkleri ve reflektif yüzeyleri sayesinde, çalışanların ve ekipman operatörlerinin kolayca fark edebilmesini sağlar.</p>\r\n\r\n<p><strong>Esnek Dubaların Fabrikalarda Kullanım Alanları</strong></p>\r\n\r\n<p><strong>1. Köşe Bariyerleri:</strong> Fabrika içindeki yoğun trafik alanlarında, özellikle köşe noktalarında, esnek dubalar etkili bir bariyer görevi görür. Bu bariyerler, forkliftlerin ve diğer araçların köşe dönüşlerinde güvenliğini artırır.</p>\r\n\r\n<p><strong>2. Geçiş Yolları: </strong>Fabrika içindeki yaya yollarını ve araç geçiş yollarını ayırmak için esnek dubalar kullanılır. Bu dubalar, geçiş yollarının belirgin hale getirilmesini ve olası kazaların önlenmesini sağlar.</p>\r\n\r\n<p><strong>3. Depolama Alanları: </strong>Depo alanlarında, raf sistemlerinin ve malzemelerin korunması için esnek dubalar yerleştirilir. Bu dubalar, yanlış manevralar sonucu oluşabilecek hasarları minimize eder.</p>\r\n\r\n<p><strong>4. Acil Durum Alanları:</strong> Acil durumlarda kullanılacak yolların ve alanların belirgin hale getirilmesinde esnek dubalar kullanılır. Bu dubalar, acil durumlarda hızlı ve güvenli bir tahliye sağlar.</p>\r\n\r\n<p><strong>&nbsp; &nbsp; &nbsp;Esnek Dubaların Sağladığı Faydalar</strong></p>\r\n\r\n<p>&nbsp; &nbsp; <strong>Güvenlik Artışı: </strong>Esnek dubalar, darbelere karşı dayanıklı oldukları için ekipman ve çalışan güvenliğini artırır.<br />\r\n&nbsp; &nbsp; <strong>Maliyet Tasarrufu:</strong> Uzun ömürlü ve dayanıklı oldukları için, sık sık değiştirilme gereksinimi olmaz ve bakım maliyetlerini düşürür.<br />\r\n&nbsp; &nbsp; <strong>Verimlilik:</strong> Fabrika içindeki trafik akışını düzenleyerek operasyonların daha verimli bir şekilde yürütülmesini sağlar.<br />\r\n&nbsp; &nbsp;<strong> Esneklik ve Adaptasyon: </strong>Çeşitli boyutlarda ve şekillerde bulunabilen esnek dubalar, fabrikaların ihtiyaçlarına göre kolayca adapte edilebilir.</p>\r\n\r\n<p>Esnek dubalar, fabrikalar ve diğer endüstriyel ortamlarda güvenlik ve verimliliği artırmak için ideal bir çözümdür. Dayanıklı ve esnek yapıları sayesinde, hem çalışanların hem de ekipmanların korunmasında etkin bir rol oynarlar. Fabrika içindeki çeşitli kullanım alanları ile, operasyonların düzenli ve güvenli bir şekilde yürütülmesine katkıda bulunurlar. Esnek dubalar, modern endüstriyel güvenlik çözümleri arasında önemli bir yere sahiptir ve işletmelerin güvenlik standartlarını yükseltmelerine yardımcı olur.</p>\r\n', 'Esnek dubalar, fabrikalarda köşe bariyerleri olarak kullanılarak çalışanların ve ekipmanların güvenliğini artırır, maliyet tasarrufu sağlar.', 'esnek dubalar, köşe bariyerleri, fabrika güvenliği, endüstriyel dubalar, çalışan güvenliği, maliyet tasarrufu, verimlilik, trafik yönetimi', '1', 'Köşe Bariyerleri', '1'),
(32, 'goz/yazi/28268yaya-yolu.webp', '2024-08-17 14:35:58', 'Fabrikalarda Kullanılan Esnek Dubalar: Güvenlik ve Verimlilik İçin Eğlenceli Çözümler', 'fabrikalarda-kullanilan-esnek-dubalar-guvenlik-ve-verimlilik-icin-eglenceli-cozumler', '<p>Fabrikalar, yoğun iş akışının ve hareketliliğin hakim olduğu yerlerdir. Bu ortamlarda güvenliği sağlamak hem çalışanların hem de ekipmanların korunması açısından oldukça önemlidir. İşte bu noktada, esnek dubalar devreye girer. Bu yazıda, esnek dubaların fabrikalarda nasıl kullanıldığını ve sağladığı faydaları ele alacağız.</p>\r\n\r\n<p><strong>Esnek Dubaların Özellikleri</strong></p>\r\n\r\n<p>Esnek dubalar, renkli ve parlak görünümleriyle hem güvenliği artırır hem de görünürlüğü arttırır. Darbelere karşı dayanıklı malzemelerden üretilen bu dubalar, esneklikleri sayesinde çarpmalar sonrası şekillerini hemen geri kazanır.</p>\r\n\r\n<p><strong>Parlak Renkler: </strong>Esnek dubalar genellikle&nbsp;sarı, siyah gibi dikkat çekici renklerde üretilir. Bu renkler, çalışanların kolayca fark etmesini sağlar.<br />\r\n<strong>Reflektif Yüzeyler:</strong> Özellikle düşük ışıklı ortamlarda bile görünürlüğü artıran reflektif yüzeyler, dubaların işlevselliğini artırır.<br />\r\n<strong>Esneklik ve Dayanıklılık:</strong> Esnek dubalar, ağır darbelere dayanabilir ve esneklikleri sayesinde tekrar eski şekillerine dönerler.</p>\r\n\r\n<p><strong>Esnek Dubaların Fabrikalarda Kullanım Alanları</strong></p>\r\n\r\n<p><strong>1. Renkli Köşe Bariyerleri:</strong> Fabrika içinde köşe dönüşlerinde kullanılan esnek dubalar, araçların ve çalışanların güvenli bir şekilde manevra yapmasını sağlar.<br />\r\n<strong>2. Geçiş Yolları: </strong>Yaya yollarını ve araç geçiş yollarını ayırmak için kullanılan bu dubalar, geçiş yollarının güvenliğini ve düzenini sağlar.<br />\r\n<strong>3. Depolama Alanları: </strong>Depo alanlarında, rafların ve malzemelerin korunmasında kullanılır.<br />\r\n<strong>4. Acil Durum Yolları:</strong> Acil durumlar için belirlenen yolların ve alanların işaretlenmesinde kullanılan bu dubalar, hem güvenli hem de dikkat çekici bir çözüm sunar.</p>\r\n\r\n<p><strong>Esnek Dubaların Sağladığı Faydalar</strong></p>\r\n\r\n<p><strong>Güvenli Çalışma Alanları:</strong> Esnek dubalar, darbelere dayanıklı yapıları sayesinde ekipman ve çalışan güvenliğini artırır.<br />\r\n<strong>Maliyet Dostu Çözümler:</strong> Uzun ömürlü yapıları sayesinde sık sık değiştirme gerektirmezler, bu da maliyetleri düşürür.<br />\r\n<strong>Verimli Çalışma Ortamları: </strong>Fabrika içindeki trafiği düzenleyerek operasyonların daha düzenli ve verimli ilerlemesine yardımcı olurlar.<br />\r\n&nbsp;</p>\r\n\r\n<p>Esnek dubalar, fabrikalarda hem güvenliği sağlamak hem de çalışma ortamını daha canlı&nbsp;hale getirmek için ideal çözümler sunar. Renkli ve dayanıklı yapıları sayesinde, fabrikaların vazgeçilmez güvenlik ekipmanları arasında yer alırlar. Esnek dubalarla, hem çalışanlarınızın güvenliğini sağlayabilirsiniz.</p>\r\n', 'Esnek dubalar, fabrikalarda güvenliği artırırken parlak renkleriyle göze çarpar ve maliyet dostu çözümler sunar.', 'esnek dubalar, renkli dubalar, fabrika güvenliği, endüstriyel güvenlik, çalışan güvenliği, maliyet tasarrufu, parlak renkler, trafik yönetimi', '1', 'Güvenlik Bariyerleri', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazyorum`
--

CREATE TABLE `yazyorum` (
  `yorum_id` int(11) NOT NULL,
  `yazi_id` int(11) NOT NULL,
  `yorum_yapan` varchar(250) NOT NULL,
  `yorum_mail` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `yorum_detay` text NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `yorum_onay` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorum`
--

CREATE TABLE `yorum` (
  `yorum_id` int(11) NOT NULL,
  `yorum_ad` varchar(100) NOT NULL,
  `yorum_tel` varchar(50) NOT NULL,
  `yorum_email` varchar(200) NOT NULL,
  `yorum_detay` text NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `musteri_email` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `yorum_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `urun_id` int(11) NOT NULL,
  `yorum_detay` text NOT NULL,
  `yorum_zaman` timestamp NOT NULL DEFAULT current_timestamp(),
  `yorum_onay` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `banka`
--
ALTER TABLE `banka`
  ADD PRIMARY KEY (`banka_id`);

--
-- Tablo için indeksler `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`ayar_id`);

--
-- Tablo için indeksler `hakkimizda`
--
ALTER TABLE `hakkimizda`
  ADD PRIMARY KEY (`hakkimizda_id`);

--
-- Tablo için indeksler `instagaleri`
--
ALTER TABLE `instagaleri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Tablo için indeksler `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`kullanici_id`);

--
-- Tablo için indeksler `listekaydet`
--
ALTER TABLE `listekaydet`
  ADD PRIMARY KEY (`liste_id`);

--
-- Tablo için indeksler `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`marka_id`);

--
-- Tablo için indeksler `resim`
--
ALTER TABLE `resim`
  ADD PRIMARY KEY (`resim_id`),
  ADD UNIQUE KEY `resim_id` (`resim_id`);

--
-- Tablo için indeksler `sepet`
--
ALTER TABLE `sepet`
  ADD PRIMARY KEY (`sepet_id`);

--
-- Tablo için indeksler `siparis`
--
ALTER TABLE `siparis`
  ADD PRIMARY KEY (`siparis_id`);

--
-- Tablo için indeksler `siparis_detay`
--
ALTER TABLE `siparis_detay`
  ADD PRIMARY KEY (`siparisdetay_id`);

--
-- Tablo için indeksler `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Tablo için indeksler `stajyer`
--
ALTER TABLE `stajyer`
  ADD PRIMARY KEY (`stajyer_id`);

--
-- Tablo için indeksler `urun`
--
ALTER TABLE `urun`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `urunfoto`
--
ALTER TABLE `urunfoto`
  ADD PRIMARY KEY (`urunfoto_id`);

--
-- Tablo için indeksler `yazi`
--
ALTER TABLE `yazi`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Tablo için indeksler `yazyorum`
--
ALTER TABLE `yazyorum`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Tablo için indeksler `yorum`
--
ALTER TABLE `yorum`
  ADD PRIMARY KEY (`yorum_id`),
  ADD UNIQUE KEY `yorum_id` (`yorum_id`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`yorum_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `banka`
--
ALTER TABLE `banka`
  MODIFY `banka_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `email`
--
ALTER TABLE `email`
  MODIFY `ayar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `hakkimizda`
--
ALTER TABLE `hakkimizda`
  MODIFY `hakkimizda_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `instagaleri`
--
ALTER TABLE `instagaleri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `kullanici_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- Tablo için AUTO_INCREMENT değeri `listekaydet`
--
ALTER TABLE `listekaydet`
  MODIFY `liste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=310;

--
-- Tablo için AUTO_INCREMENT değeri `marka`
--
ALTER TABLE `marka`
  MODIFY `marka_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `resim`
--
ALTER TABLE `resim`
  MODIFY `resim_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `sepet`
--
ALTER TABLE `sepet`
  MODIFY `sepet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `siparis`
--
ALTER TABLE `siparis`
  MODIFY `siparis_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `siparis_detay`
--
ALTER TABLE `siparis_detay`
  MODIFY `siparisdetay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Tablo için AUTO_INCREMENT değeri `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Tablo için AUTO_INCREMENT değeri `stajyer`
--
ALTER TABLE `stajyer`
  MODIFY `stajyer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `urun`
--
ALTER TABLE `urun`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Tablo için AUTO_INCREMENT değeri `urunfoto`
--
ALTER TABLE `urunfoto`
  MODIFY `urunfoto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1583;

--
-- Tablo için AUTO_INCREMENT değeri `yazi`
--
ALTER TABLE `yazi`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `yazyorum`
--
ALTER TABLE `yazyorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `yorum`
--
ALTER TABLE `yorum`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `yorum_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
