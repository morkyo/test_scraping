<?php
$domain = "https://www.city.setagaya.lg.jp";
$dom = new DOMDocument('1.0', 'UTF-8');
$html = file_get_contents("https://www.city.setagaya.lg.jp/news202010.html");
$html = mb_convert_encoding($html, "HTML-ENTITIES", 'auto');
@$dom->loadHTML($html);
$xpath = new DOMXpath($dom);
foreach ($xpath->query("//div[@class='list margin-bottom-wide']") as $node) {
  echo '<div>';
  echo '<a href="';
  echo $domain;
  echo $xpath->evaluate('string(.//@href)', $node);
  echo '">';
  echo $xpath->evaluate('string(.//a)', $node);
  echo '</a>';
  echo '</div>';
}
?>