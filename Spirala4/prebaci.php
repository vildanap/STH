<?php

$brojpromjena=0;
$xmlDoc = new DOMDocument();
$xmlDoc->load("anketa.xml");

$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");
$rezultat = $dbh->query("CREATE TABLE anketa(id INT PRIMARY KEY AUTO_INCREMENT, odgovor TEXT, redni INT)");


$xmlObject = $xmlDoc->getElementsByTagName('odgovor');
$duzina = $xmlObject->length;

for ($i=0; $i < $duzina; $i++){
   $tekst = $xmlObject->item($i)->getElementsByTagName('tekst')->item(0)->childNodes->item(0)->nodeValue;
   $rbr = $xmlObject->item($i)->getElementsByTagName('redniBroj')->item(0)->childNodes->item(0)->nodeValue;
   $provjera=$dbh->query("SELECT ID FROM anketa WHERE redni='{$rbr}'");
   $row = $provjera->fetch();
   if(!$row){
   $sql = $dbh->prepare("INSERT INTO anketa(odgovor,redni) VALUES (?,?)");
   $sql->bindValue(1, $tekst,PDO::PARAM_STR);
   $sql->bindValue(2, $rbr,PDO::PARAM_INT);
   $sql->execute();
   $brojpromjena++;
}

}

$xmlDoc1 = new DOMDocument();
$xmlDoc1->load("sarajevskePrice.xml");

$rezultat1 = $dbh->query("CREATE TABLE price(id INT PRIMARY KEY AUTO_INCREMENT, ime VARCHAR(20), prezime VARCHAR(20), spol VARCHAR(7), tekst TEXT)");

$xmlObject1 = $xmlDoc1->getElementsByTagName('prica');
$duzina1 = $xmlObject1->length;

for ($i=0; $i < $duzina1; $i++){
   $ime = $xmlObject1->item($i)->getElementsByTagName('ime')->item(0)->childNodes->item(0)->nodeValue;
   $prezime = $xmlObject1->item($i)->getElementsByTagName('prezime')->item(0)->childNodes->item(0)->nodeValue;
   $spol = $xmlObject1->item($i)->getElementsByTagName('spol')->item(0)->childNodes->item(0)->nodeValue;
   $tekst = $xmlObject1->item($i)->getElementsByTagName('tekst')->item(0)->childNodes->item(0)->nodeValue;
   $provjera=$dbh->query("SELECT ID FROM price WHERE ime='{$ime}' and prezime='{$prezime}' and spol='{$spol}' and tekst='{$tekst}'");
   $row = $provjera->fetch();
   if(!$row){
   $sql = $dbh->prepare("INSERT INTO price(ime,prezime,spol,tekst) VALUES (?,?,?,?)");
   $sql->bindValue(1, $ime,PDO::PARAM_STR);
   $sql->bindValue(2, $prezime,PDO::PARAM_STR);
   $sql->bindValue(3, $spol,PDO::PARAM_STR);
   $sql->bindValue(4, $tekst,PDO::PARAM_STR);
   $sql->execute();
   $brojpromjena++;
}
}
  

$xmlDoc2 = new DOMDocument();
$xmlDoc2->load("pod.xml");
//adminovi podaci
$rezultat2 = $dbh->query("CREATE TABLE korisnici(id INT PRIMARY KEY AUTO_INCREMENT, username VARCHAR(20), password VARCHAR(100), email VARCHAR(50))");
if(!$rezultat2){

}

$xmlObject2 = $xmlDoc2->getElementsByTagName('users');
$duzina2 = $xmlObject2->length;

for ($i=0; $i < $duzina2; $i++){
   $user = $xmlObject2->item($i)->getElementsByTagName('username')->item(0)->childNodes->item(0)->nodeValue;
   $pass = $xmlObject2->item($i)->getElementsByTagName('password')->item(0)->childNodes->item(0)->nodeValue;
   $email=NULL;
   $provjera=$dbh->query("SELECT id FROM korisnici WHERE username='$user'");
   $row = $provjera->fetch();
   if(!$row){
   $sql = $dbh->prepare("INSERT INTO korisnici(username,password,email) VALUES (?,?,?)");
   $sql->bindValue(1, $user,PDO::PARAM_STR);
   $sql->bindValue(2, $pass,PDO::PARAM_STR);
   $sql->bindValue(3, $email,PDO::PARAM_STR);
   $sql->execute();
   $brojpromjena++;
}
}


$xmlDoc3 = new DOMDocument();
$xmlDoc3->load("users.xml");

//ostali korisnici
$xmlObject3 = $xmlDoc3->getElementsByTagName('korisnik');
$duzina3 = $xmlObject3->length;

for ($i=0; $i < $duzina3; $i++){
   $user = $xmlObject3->item($i)->getElementsByTagName('username')->item(0)->childNodes->item(0)->nodeValue;
   $pass = $xmlObject3->item($i)->getElementsByTagName('password')->item(0)->childNodes->item(0)->nodeValue;
   $email = $xmlObject3->item($i)->getElementsByTagName('email')->item(0)->childNodes->item(0)->nodeValue;
   $provjera=$dbh->query("SELECT id FROM korisnici WHERE username='$user'");
   $row = $provjera->fetch();
   if(!$row){
   $sql = $dbh->prepare("INSERT INTO korisnici(username,password,email) VALUES (?,?,?)");
   $sql->bindValue(1, $user,PDO::PARAM_STR);
   $sql->bindValue(2, $pass,PDO::PARAM_STR);
   $sql->bindValue(3, $email,PDO::PARAM_STR);
   $sql->execute();
   $brojpromjena++;	
}
}


$xmlDoc4 = new DOMDocument();
$xmlDoc4->load("dogadjaj.xml");
$rezultat3 = $dbh->query("CREATE TABLE dogadjaji(id INT PRIMARY KEY AUTO_INCREMENT, naziv VARCHAR(30), mjesto VARCHAR(30), vrijeme VARCHAR(40), tip VARCHAR(20))");
//ostali korisnici
$xmlObject4 = $xmlDoc4->getElementsByTagName('dogadjaj');
$duzina4 = $xmlObject4->length;

for ($i=0; $i < $duzina4; $i++){
   $naziv = $xmlObject4->item($i)->getElementsByTagName('naziv')->item(0)->childNodes->item(0)->nodeValue;
   $mjesto = $xmlObject4->item($i)->getElementsByTagName('mjesto')->item(0)->childNodes->item(0)->nodeValue;
   $vrijeme = $xmlObject4->item($i)->getElementsByTagName('vrijeme')->item(0)->childNodes->item(0)->nodeValue;
   $tip = $xmlObject4->item($i)->getElementsByTagName('tip')->item(0)->childNodes->item(0)->nodeValue;
   $provjera=$dbh->query("SELECT id FROM dogadjaji WHERE naziv='$naziv'");
   $row = $provjera->fetch();
   if(!$row){
   $sql = $dbh->prepare("INSERT INTO dogadjaji(naziv,mjesto,vrijeme,tip) VALUES (?,?,?,?)");
   $sql->bindValue(1, $naziv,PDO::PARAM_STR);
   $sql->bindValue(2, $mjesto,PDO::PARAM_STR);
   $sql->bindValue(3, $vrijeme,PDO::PARAM_STR);
   $sql->bindValue(4, $tip,PDO::PARAM_STR);
   $sql->execute();
   $brojpromjena++;	
}
}
if($brojpromjena>0)
print "Uspješno preneseni podaci u bazu.<br> Broj promjena: $brojpromjena<br>";
else print "Svi podaci iz XML-a su već u bazi!";
?>