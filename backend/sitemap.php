<?php
header("Content-Type: application/xml; charset=utf-8");
include 'head.php';

$gemeinden = query("SELECT * FROM gemeindekompass360_gemeinden");
$buergermeister = query("SELECT * FROM gemeindekompass360_burgermeister");
$bezirke = query("SELECT * FROM gemeindekompass360_bezirke");
$bundeslaender = query("SELECT * FROM gemeindekompass360_bundeslander");
$base_url = "https://alex.polan.sk/";//gemeinde-kompass-360/

echo '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">' . PHP_EOL;

while ($row = mysqli_fetch_array($gemeinden)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . 'gemeinde/' .  strtolower(str_replace([" ", "ä", "ü", "ö"], ["-", "ae", "ue", "oe"], $row["code"])) . '/</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}

while ($row = mysqli_fetch_array($bezirke)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . strtolower(str_replace([" ", "ä", "ü", "ö"], ["-", "ae", "ue", "oe"], $row["name"])) . '/</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}


while ($row = mysqli_fetch_array($bundeslaender)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . strtolower(str_replace([" ", "ä", "ü", "ö"], ["-", "ae", "ue", "oe"], $row["name"])) . '/</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}

while ($row = mysqli_fetch_array($buergermeister)) {
    echo '<url>' . PHP_EOL;
    echo '<loc>' . $base_url . strtolower(str_replace([" ", "ä", "ü", "ö"], ["-", "ae", "ue", "oe"], $row["name"])) . '/</loc>' . PHP_EOL;
    echo '<changefreq>daily</changefreq>' . PHP_EOL;
    echo '</url>' . PHP_EOL;
}

echo '</urlset>' . PHP_EOL;
?>