<?php
if(isset($_GET['dogadjaj'],$_GET['rating'],$_GET['korisnik']))
{
	//$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
    //$dbh->exec("set names utf8");
	$dogadjaj=(int)$_GET['dogadjaj'];
	$rating=(int)$_GET['rating'];
	$korisnik=(int)$_GET['korisnik'];

	if($rating==1 || $rating==2 || $rating==3 || $rating==4 || $rating==5)
	{
		
			$dbh->query("INSERT INTO rating(ocjena,dogadjaj,korisnik) VALUES ($rating,$dogadjaj,$korisnik)");
			header('Location: pocetnaRegistrovaniKorisnik.php');
		
	}
}
?>