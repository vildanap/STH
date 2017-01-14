<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<HEAD>
<TITLE>
Sarajevo Through History
</TITLE>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious">
<link rel="stylesheet" media='screen and (min-width: 960px), (orientation:landscape) and (min-width:800)' href="stil1.css"/>
<link rel="stylesheet" media='screen and (min-width: 300px) and (max-width:960px)' href="stil2.css"/>
<script type="text/javascript" src="file.js"></script>
</HEAD>
<body>
<?php

 //provjera da li je forma submit
/*
$greska='';
if(isset($_POST['posaljiPricu']))
{
	if(preg_match('/^[a-zA-Z]+$/',$_POST['ime']) && preg_match('/^[a-zA-Z]+$/',$_POST['prezime']) ){
	$xml= new DOMDocument("1.0","UTF-8");
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->load("sarajevskePrice.xml");

	$korijen=$xml->getElementsByTagName("price")->item(0);
	$data=$xml->createElement("prica");
	$korijen->appendChild($data);

	$ime=$xml->createElement("ime",$_POST['ime']);
	$prezime=$xml->createElement("prezime",$_POST['prezime']);
	$spol=$xml->createElement("spol",$_POST['spol']);
	$tekst=$xml->createElement("tekst",html_entity_decode($_POST['Text1'], ENT_COMPAT, 'UTF-8'));
	$data->appendChild($ime);
	$data->appendChild($prezime);
	$data->appendChild($spol);
	$data->appendChild($tekst);
	$xml->save("sarajevskePrice.xml");
	$greska="Uspjesno poslana prica!";
	}
	else $greska='Neispravan format! Ime i prezime (samo slova A-Za-z)!';
}*/

$greska='';
if(isset($_POST['posaljiPricu']))
{
	if(preg_match('/^[a-zA-Z]+$/',$_POST['ime']) && preg_match('/^[a-zA-Z]+$/',$_POST['prezime']) ){
	$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
	$dbh->exec("set names utf8");
	
	$ime=$_POST['ime'];
	$prezime=$_POST['prezime'];
	$spol=$_POST['spol'];
	$tekst=$_POST['Text1'];

	$prica=$dbh->prepare("INSERT INTO price(ime,prezime,spol,tekst) VALUES (?,?,?,?)");
	$prica->bindValue(1,$ime,PDO::PARAM_STR);
	$prica->bindValue(2,$prezime,PDO::PARAM_STR);
	$prica->bindValue(3,$spol,PDO::PARAM_STR);
	$prica->bindValue(4,$tekst,PDO::PARAM_STR);
	$prica->execute();

	$greska="Uspješno poslana priča!";
}
else $greska='Neispravan format! Ime i prezime (samo slova A-Za-z)!';
}
?>

<div id="okvir">
<div id="zaglavlje" class="kolona dva"> 
Sarajevo Through History</div>
<div id="menu" class="kolona dva">
<ul id="meniLista">
<li> <a href="ind2.html"> Početna </a> </li>
<li> <a href="novosti.html">Novosti</a></li> 
<li> <a href="historija.php">Historija</a></li>
<li> <a href="sarajevskePrice.php">Sarajevske priče</a></li>
<li> <a href="login.php">Login</a></li>
</ul>
</div>

<div id="priceNaslov" class="kolona dva">
<h1> Pošalji nam svoju priču...</h1>
</div>

<div id=slike>
<div id="slikaPrice" class="kolona jedan">
<img src=slike/konkurs.jpg id=slikaPrice alt=slikaKonkurs>
</div>

<div id="slikaPrice2" class="kolona jedan">
<img src=slike/konkurs2.jpg id=slikaPrice alt=slikaKonkurs>
</div>

</div>
<div id="infoForma" class="kolona jedan">
<p> Podijeli svoju priču o Sarajevu sa drugima. </p>


<form name="formaSlanje" id="fs" method="POST" action="sarajevskePrice.php" onsubmit="return validirajKonkurs()">
<table border="0">

		<tr>
			<td> Ime: <input align=right type="text" name="ime"></input> <p id="porukaPosiljalacIme"></p></td> </tr>
			<tr>
			<td> Prezime: <input align=right type="text" name="prezime"></input><p id="porukaPosiljalacPrezime"></p> </td> 	
		</tr>
		<tr>
		<td> Spol: <input align=right type="radio" name="spol" value="Muško" checked="checked">Muško</input>
		<input type="radio" name="spol" value="Žensko">Žensko</input> </td>
		</tr>
		<tr>
		<td> Tekst (min. 50 karaktera): 
		<br> <textarea name="Text1" cols="40" rows="10"></textarea><p id="porukaPrica"></p></td></tr>
		<tr>
		<td> <input type="submit" name="posaljiPricu" value="Pošalji priču"></input> </td></tr>
	</table>

<?php 
echo '<div style="color: red; font-size: 15px; text-align:center">'.$greska.'</div>';
?>
</form>
<script type="text/javascript" src="file.js"></script>
</div>

<div id="infoOSlanju" class="kolona jedan">


</div>
<div id=citat class="kolona dva">
 "U Sarajevu sve ima svoju priču i u Sarajevu ništa nije slučajno."
</div>
</body>
</HTML>