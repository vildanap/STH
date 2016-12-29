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
//provjera da li je forma submitovana
$greska="";
if(isset($_POST['prijava'])){
	//sa inputa uzima se username i password
	if(preg_match('/[a-zA-Z0-9]+$/',$_POST['ime']) && preg_match('/[a-zA-Z0-9]{6,}$/',$_POST['password'])){
	$username=$_POST['ime'];
	$password=md5($_POST['password']);
	//otvaranje xml fajla
	$xml=simplexml_load_file("pod.xml") or die("Error: Cannot create object");
	if($password==$xml->password)
	{
		session_start();
		$_SESSION['ime']=$username;
		header('Location: pocetnaAdmin.php');
		die;
	}
	$greska='Neuspješna prijava!';
}
else $greska='Format imena i password-a: dozvoljena samo slova i brojevi (a-z A-Z 0-9)! ';
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
<div class="red">
<div id="log" class="kolona jedan">
<h1> Prijava registriranih korisnika</h1> 
</div>
<div id="signUp" class="kolona jedan">
<h1> Nemate račun? Registrujte se.</h1> 

</div>
</div>

<div id="logForma" class="kolona jedan">
<form name="loginForma" id="lf" method="POST" action="login.php" onsubmit="return validirajLogIn()">
<table border="0">

		<tr>
			<td> Username: <input align=right type="text" name="ime"></input> <p id="porukaIme" ></p> </td> </tr>
			<tr>
			<td> Password: <input align=right type="text" name="password"></input> <p id="porukaPass"></p></td> 	
		</tr>
		<tr>
		<td> <input type="submit" value="Prijavi se" name="prijava"> </td>
		</tr>
	</table>
<?php echo '<p style="color:red;text-align:left;">'.$greska.'</p>';?>
</form>
<script src="file.js"></script>
</div>


<div id="signUpForma" class="kolona jedan">
<form name=signInForma id="sf" action="login.html" method="GET" onsubmit="event.preventDefault();return validirajSignIn()">
<table border="0">

		<tr>
			<td> Username: <input align=right type="text" name="user"></input> <p id="porukaUser"></p></td> </tr>
			<tr>
			<td> Password: <input align=right type="text" name="pass"></input> <p id="porukaPassword"></p></td> 	
		</tr>
		<tr>
			<td> Email: <input align=right type="text" name="email"></input><p id="porukaEmail"></p> </td> 	
		</tr>
		<tr>  
		<td> <input type="submit" value="Registruj se"></td> </tr>
	</table>
</form>
<script src="file.js"></script>
</div>
<div id="infoKorisnicima" class="kolona dva">
Info korisnicima...
</div>
</div>
</body>
</HTML>
