<?php

$rez="";
if(isset($_POST['fp'])){
$var=$_POST['unos'];

/*
$xmlDoc=simplexml_load_file("dogadjaj.xml");

foreach ($xmlDoc->dogadjaj as $dog) {
	# code...
	if(stristr($dog->naziv,$var))
	$rez=$rez. "<br>". $dog->naziv;
	if(stristr($dog->mjesto,$var))
	$rez=$rez. "<br>". $dog->mjesto;
	
}*/

$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");

$rezultat=$dbh->prepare("SELECT * from dogadjaji");
$rezultat->execute();
$rezultat->fetch();

foreach ($rezultat as $r) {
  # code...
if(stristr($r['naziv'],$var))
$rez=$rez."<br>".$r['naziv'];
if(stristr($r['mjesto'],$var))
$rez=$rez."<br>".$r['mjesto'];
}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>
Sarajevo Through History
</TITLE>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious"/>
<link rel="stylesheet" type="text/css" media='screen and (min-width: 960px), (orientation:landscape) and (min-width:800)' href="stil1.css"/>
<link rel="stylesheet" type="text/css" media='screen and (min-width: 300px) and (max-width:960px)' href="stil2.css"/>
<script type="text/javascript" src="file.js"></script>
</HEAD>
<body>
<script>
function prikaziRezultate(str) {
  if (str.length==0) { 
    document.getElementById("rezultatPretrage").innerHTML="";
    document.getElementById("rezultatPretrage").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
    	 
        document.getElementById("rezultatPretrage").innerHTML=this.responseText;
        document.getElementById("rezultatPretrage").style.border="1px solid #B0C4DE";
        document.getElementById("rezultatPretrage").style.width = "380px";
    }
  }

  xmlhttp.open("GET","search.php?q="+str,true);
  xmlhttp.send();

}
</script>


<div id="okvir">
<div id="zaglavlje" class="kolona dva"> 
Sarajevo Through History</div>
<div id="menuAdmin" class="kolona dva">
<h1>Administrator panel - Pretraga događaja</h1>
</div>
<br>
<div id=pretraga class="kolona dva">
<form id=formaPretraga name=fp method=POST action="pretragaDogadjaja.php">
<p> <input type=text name=unos size=40 onkeyup="prikaziRezultate(this.value)"> &nbsp; <input type=submit name=fp value="Pretraga"></p>
<div id="rezultatPretrage"></div>
<p id=ispis><?php echo '<div style="color: black; font-size: 15px; text-align:center">'.$rez.'</div>';?><p>
</form>
</div>
</div>
</body>
</html>