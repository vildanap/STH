<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=price.csv');
/*$file='sarajevskePrice.xml';
if (file_exists($file)) {
    $xml = simplexml_load_file($file);
	$csv = fopen('php://output', 'w');
	foreach ($xml->prica as $prica) 
    fputcsv($csv, get_object_vars($prica),',','"');
	fclose($csv);
}*/

$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");
$csv = fopen('php://output', 'w');
$sql="SELECT * FROM price";
$price=$dbh->prepare($sql);
$price->execute();
while ($row = $price->fetch(PDO::FETCH_ASSOC)) {
    fputcsv($csv, $row);
}
fclose($csv);
?>
