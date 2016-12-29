<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=price.csv');
$file='sarajevskePrice.xml';
if (file_exists($file)) {
    $xml = simplexml_load_file($file);
	$csv = fopen('php://output', 'w');
	foreach ($xml->prica as $prica) 
    fputcsv($csv, get_object_vars($prica),',','"');
	fclose($csv);
}
?>
