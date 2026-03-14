<?php header('Content-type: application/xml; charset="utf8"',true); ?>

<urlset 
xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"

xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"

xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"

xmlns:example="http://www.example.com/schemas/example_schema">





<?php include "nedmin/netting/baglan.php";  ?>


    <url>
        <loc>https://tacbariyer.com/</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <url>
        <loc>https://tacbariyer.com/re-flexible</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <url>
        <loc>https://tacbariyer.com/contact</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <url>
        <loc>https://tacbariyer.com/blog</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <url>
        <loc>https://tacbariyer.com/goals-and-principles</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <url>
        <loc>https://tacbariyer.com/customer-relations</loc>
        <lastmod><?php echo date("Y-m-d"); ?></lastmod>
    </url>

    <?php 
    $bariyersor = $db->prepare("SELECT * FROM urun");
    $bariyersor->execute();

    while($bariyercek = $bariyersor->fetch(PDO::FETCH_ASSOC)) { ?>
        <url>
            <loc>https://tacbariyer.com/bariyer-<?php echo $bariyercek['urun_seourl']."-".$bariyercek['urun_id']; ?></loc>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        </url>
    <?php } ?>

    <?php 
    $kategorisor = $db->prepare("SELECT * FROM kategori WHERE kategori_id != '47'");
    $kategorisor->execute();

    while($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
        <url>
            <loc>https://tacbariyer.com/category-<?php echo $kategoricek['kategori_seourl']; ?></loc>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        </url>
    <?php } ?>

    <?php 
    $yazisor = $db->prepare("SELECT * FROM yazi");
    $yazisor->execute();

    while($yazicek = $yazisor->fetch(PDO::FETCH_ASSOC)) { ?>
        <url>
            <loc>https://tacbariyer.com/blog-<?php echo $yazicek['yazi_seourl']; ?></loc>
            <lastmod><?php echo date("Y-m-d"); ?></lastmod>
        </url>
    <?php } ?>

</urlset>
