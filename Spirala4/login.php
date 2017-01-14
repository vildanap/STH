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
/*$greska="";
if(isset($_POST['prijava'])){
	//sa inputa uzima se username i password
	if($_POST['ime']=='admin'){
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
else {
	if(preg_match('/[a-zA-Z0-9]+$/',$_POST['ime']) && preg_match('/[a-zA-Z0-9]{6,}$/',$_POST['password'])){
	$username=$_POST['ime'];
	$password=md5($_POST['password']);
	//otvaranje xml fajla
	$xml=simplexml_load_file("users.xml") or die("Error: Cannot create object");

	foreach ($xml->korisnik as $k) {
				
	if($k->username==$username && $k->password==$password)
	{
		session_start();
		$_SESSION['ime']=$username;
		header('Location: pocetnaRegistrovaniKorisnik.php');
		die;
	}
	}

	$greska='Neuspješna prijava!';
}

else $greska='Format imena i password-a: dozvoljena samo slova i brojevi (a-z A-Z 0-9)! ';
}
}*/
$greska="";
if(isset($_POST['prijava'])){
	//sa inputa uzima se username i password

	$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
	$dbh->exec("set names utf8");
	
	if(preg_match('/[a-zA-Z0-9]+$/',$_POST['ime']) && preg_match('/[a-zA-Z0-9]{6,}$/',$_POST['password'])){
	$username=$_POST['ime'];
	$password=md5($_POST['password']);

	$provjera=$dbh->prepare("SELECT id from korisnici where username=? and password=?");
	$provjera->bindValue(1,$username,PDO::PARAM_STR);
	$provjera->bindValue(2,$password,PDO::PARAM_STR);
	$provjera->execute();
	$p=$provjera->fetch();

	if($p)
	{
		session_start();
		$_SESSION['ime']=$username;
		if($username=='admin'){
		header('Location: pocetnaAdmin.php');
		die;}
	    else {header('Location: pocetnaRegistrovaniKorisnik.php');
		die;}
	}
	else $greska='Neuspješna prijava!';
}
	else $greska='Format imena i password-a: dozvoljena samo slova i brojevi (a-z A-Z 0-9)! ';
}
?>

<?php 
/*
$greska1="";

if (isset($_POST['registracija']))
{
	if(preg_match('/[a-zA-Z0-9]+$/',$_POST['user']) && preg_match('/[a-zA-Z0-9]{6,}$/',$_POST['pass']) && $_POST['pass']==$_POST['pass2']){
	$username=$_POST['user'];
	$password=md5($_POST['pass']);
	$email=$_POST['email'];
	//otvaranje xml fajla
   $xml=simplexml_load_file("users.xml");
	
	foreach ($xml->korisnik as $k) {
		
		if($k->username == $username || $k->email == $email)
			$greska1="Username/email već postoji!";
	}

	if($greska1=='')
	{
	        $child = $xml->addChild("korisnik");
			$child->addChild("username",$username);
			$child->addChild("password",$password);
			$child->addChild("email",$email);
			$xml->asXML("users.xml");
			$greska1="Uspješna registracija!";
	}

}

else $greska1='Format imena i password-a: dozvoljena samo slova i brojevi (a-z A-Z 0-9)! Dužina password-a (min: 6 znakova)!';
}*/


$greska1="";
if (isset($_POST['registracija']))
{
   if(preg_match('/[a-zA-Z0-9]+$/',$_POST['user']) && preg_match('/[a-zA-Z0-9]{6,}$/',$_POST['pass']) && $_POST['pass']==$_POST['pass2']){
	$username=$_POST['user'];
	$password=md5($_POST['pass']);
	$email=$_POST['email'];

	$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
	$dbh->exec("set names utf8");

	$provjera=$dbh->prepare("SELECT id FROM korisnici where username=?");
	$provjera->bindValue(1,$username, PDO::PARAM_STR);
	$provjera->execute();
	$p=$provjera->fetch();
	if(!$p)
	{
		$registracija=$dbh->prepare("INSERT INTO korisnici(username,password,email) VALUES(?,?,?)");
		$registracija->bindValue(1,$username);
		$registracija->bindValue(2,$password);
		$registracija->bindValue(3,$email);
		$registracija->execute();
		$greska1="Uspješna registracija!";

	}
	else $greska1="Username već postoji!";
}
else $greska1='Format imena i password-a: dozvoljena samo slova i brojevi (a-z A-Z 0-9)! Dužina password-a (min: 6 znakova)!';
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
<form name=signInForma id="sf" action="login.php" method="POST" onsubmit="return validirajSignIn()">
<table border="0">

		<tr>
			<td> Username: <input align=right type="text" name="user"></input> <p id="porukaUser"></p></td> </tr>
			<tr>
			<td> Password: <input align=right type="password" name="pass"></input> <p id="porukaPassword"></p></td> 	
		</tr>
		<tr>
			<td> Password (potvrda): <input align=right type="password" name="pass2"></input> <p id="porukaPassword2"></p></td> 	
		</tr>
		<tr>
			<td> Email: <input align=right type="text" name="email"></input><p id="porukaEmail"></p> </td> 	
		</tr>
		<tr>  
		<td> <input type="submit" value="Registruj se" name="registracija"></td> </tr>
	</table>
	<?php echo '<p style="color:red;text-align:left;font-size:15px">'.$greska1.'</p>';?>
</form>
<script src="file.js"></script>
</div>
<div id="infoKorisnicima" class="kolona dva">
Info korisnicima...
</div>
</div>
</body>
</HTML>
