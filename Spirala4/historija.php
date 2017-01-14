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
<link rel="stylesheet" type="text/css" media='screen and (min-width: 960px), (orientation:landscape) and (min-width:800)' href="stil1.css"/>
<link rel="stylesheet" type="text/css" media='screen and (min-width: 300px) and (max-width:960px)' href="stil2.css"/>
<script type="text/javascript" src="file.js"></script>
</HEAD>
<body>
<?php
/* 
$poruka='';
if(isset($_POST['pitanje']))
{
	$xml= new DOMDocument("1.0","UTF-8");
	$xml->preserveWhiteSpace = false;
	$xml->formatOutput = true;
	$xml->load("anketa.xml");
	$duzina=$xml->getElementsByTagName("odgovor")->length;

	$korijen=$xml->getElementsByTagName("odgovori")->item(0);
	$data=$xml->createElement("odgovor");
	$korijen->appendChild($data);

	if(isset($_POST['odg'])){
		$odgovor=$xml->createElement("tekst",$_POST['odg']);
		$rbr=$xml->createElement("redniBroj",$duzina+1);
	$data->appendChild($odgovor);
	$data->appendChild($rbr);
	$xml->save("anketa.xml");}
	$poruka='Vaš odgovor je poslan!';
	*/
	$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
	$dbh->exec("set names utf8");
    $poruka="";
if(isset($_POST['pitanje']))
{

	if(isset($_POST['odg']))
	{	
		 $brojRedova=$dbh->prepare("SELECT * FROM anketa");	
		 $brojRedova->execute(); 
		 $rbr=$brojRedova->rowCount();
		 $rbr++;
		 $tekst=$_POST['odg'];
		 $sql = $dbh->prepare("INSERT INTO anketa(odgovor,redni) VALUES (?,?)");
   		 $sql->bindValue(1, $tekst,PDO::PARAM_STR);
         $sql->bindValue(2, $rbr,PDO::PARAM_INT);
         $sql->execute();
         $poruka='Vaš odgovor je poslan!';
	}
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

<div id="submenuHistorija" class="kolona dva">
<ul id="submenuListaHistorija">
<li> <a href="antika.html">Antički period</a></li>
<li> <a href="#">Srednji vijek</a></li>
<li> <a href="#">Osmanski period</a></li>
<li> <a href="#">Austrougarski period</a></li>
<li> <a href="#">Kraljevina Jugoslavija</a></li>
<li> <a href="#">Sarajevo danas</a></li>
</ul>
</div>

<div id="anketa" class="kolona jedan">
<p> Pitanje dana? </p>

<form name="formaGlasanje" id="fg" method=POST action="historija.php">
<table border="0">

		<tr>
			<td> Srednjovjekovni naziv Sarajeva je: </td> </tr>
			
		<tr>
		<td> <input type="radio" name="odg" value="Seher" />Seher</td>
		</tr>
		<tr>
		<td>  <input align=right type="radio" name="odg" value="Vrhbosna"/>Vrhbosna</td>
		</tr>
		<tr>
		<td> </td></tr>
		 <tr><td><input type="submit" value=Odgovori name="pitanje"></input></td></tr>

		 <?php echo '<p style="color:black; font-size:18px;">'.$poruka.'</p>';?>
	</table>
</form>

</div>
</body>
</HTML>