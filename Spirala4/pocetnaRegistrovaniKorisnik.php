<?php
session_start();
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
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Delicious">
<link rel="stylesheet" type="text/css" media='screen and (min-width: 960px), (orientation:landscape) and (min-width:800)' href="stil1.css"/>
<link rel="stylesheet" type="text/css" media='screen and (min-width: 300px) and (max-width:960px)' href="stil2.css"/>
<script type="text/javascript" src="file.js"></script>
</HEAD>
<body>

<div id="okvir">
<div id="zaglavlje" class="kolona dva"> 
Sarajevo Through History</div>
<div id="menuRegistrovani" class="kolona dva">
<h1>Korisnički panel</h1>
</div>

<div id="podstranicaAdmin">
<div id="glavniDioPocetnaAdmin" class="kolona dva">
<h1>Dobrodošao/la, <?php echo $_SESSION['ime']; ?> </h1>
<p><a href="logout.php" action="odjava.php">Odjava</a> &nbsp; </p> 
<?php
if(isset($_GET['dogadjaj'],$_GET['rating'],$_GET['korisnik']))
{
    $dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
    $dbh->exec("set names utf8");
    $dogadjaj=(int)$_GET['dogadjaj'];
    $rating=(int)$_GET['rating'];
    $korisnik=(int)$_GET['korisnik'];

    if($rating==1 || $rating==2 || $rating==3 || $rating==4 || $rating==5)
    {
        //provjera da li je korisnik već ocijenio događaj
        $glas='false';
        $jeLiGlasao=$dbh->query("SELECT id from rating where dogadjaj=$dogadjaj and korisnik=$korisnik");
        foreach ($jeLiGlasao as $provjera ) {

            $glas=$provjera['id'];
                    
        }
        if($glas=='false')
        {
            $dbh->query("INSERT INTO rating(ocjena,dogadjaj,korisnik) VALUES ($rating,$dogadjaj,$korisnik)");
            print "<h2 style=color:red;>Hvala na glasanju!</h2>";          
        }
        else print "<h2 style=color:red;>Već ste ocijenili ovaj događaj!</h2>";
    }
}
?>
</div>
<div id="menuKorisnik" class="kolona dva">

</div>
<div id="ratingDogadjaja" class="kolona dva">

<?php
$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");

$korisnik=$_SESSION['ime'];
$rez=$dbh->query("SELECT id FROM korisnici where username='$korisnik'");
foreach ($rez as $key ) {
    # code...
    $korisnikID=$key['id'];
}
$dogadjaji=$dbh->query("SELECT * FROM dogadjaji");
foreach ($dogadjaji as $d) {
    
    $id=$d['id'];
    $naziv=$d['naziv'];
    $mjesto=$d['mjesto'];
    $vrijeme=$d['vrijeme'];
    $tip=$d['tip'];
    print "<h2 style=background-color:#FFE057>$naziv</h2>";
    print "<h3>$mjesto</h3>";
    print "<h3>$vrijeme</h3>";
    print "<h3>Vaša ocjena: ";
    for($i=1;$i<=5;$i++)
        print "<a style=color:black; href=pocetnaRegistrovaniKorisnik.php?dogadjaj=$id&rating=$i&korisnik=$korisnikID>$i</a>&nbsp; &nbsp;";
    }
    print "</h3>";

?>
</div>
</body>
</HTML>