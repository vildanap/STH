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
<div id="menuAdmin" class="kolona dva">
<h1>Administrator panel</h1>
</div>

<div id="podstranicaAdmin">
<div id="glavniDioPocetnaAdmin" class="kolona dva" style="background-color: #EEFEF9;">
<h1>Dobrodošao, <?php echo $_SESSION['ime']; ?> </h1>
<p><a href="logout.php" action="odjava.php">Odjava</a> &nbsp; <a href="pdf.php">Preuzmi PDF</a> &nbsp; <a href="csv.php">Preuzmi CSV</a> &nbsp; <a href="pretragaDogadjaja.php">Pretraga događaja</a> </p> 
<a href=prebaci.php name="xmlDugme">Prebaci iz XML u bazu</a>
<div id="crudAdmin" class="kolona dva" style="background-color: #EEFEF9;">
<h1>Dodaj događaj</h1>
</div>
<form method="POST" id="formaAdmin">
<table align="center" class="tabela" border="1px solid black" >
<?php
    $dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
    $dbh->exec("set names utf8");
    print '<tr>';
    print '<th>R.br.</th>';
    print '<th>Naziv</th>';
    print '<th>Mjesto</th>';
    print '<th>Vrijeme</th>';
    print '<th>Tip</th>';
    print '</tr>';
 
    $brojRedova=$dbh->prepare("SELECT * FROM dogadjaji");  
         $brojRedova->execute(); 
         $rbr=$brojRedova->rowCount();
    $red=$dbh->prepare("SELECT * FROM dogadjaji");  
    $red->execute();
    $rez=$red->fetchAll();
    $i=1;
    foreach ($rez as $p) {
         # code... {
        print '<tr>';
        print '<td>'.$i.'</td>';
        print '<td><input type=text name="naziv'.$i.'" value="'.$p['naziv'].'"/></td>';
        print '<td><input name="mjesto'.$i.'" value="'.$p['mjesto'].'" /></td>';
        print '<td><input name="vrijeme'.$i.'" value="'.$p['vrijeme'].'" /></td>';
        print '<td><input name="tip'.$i.'" value="'.$p['tip'].'" /></td>';
        print '<td><input type=submit name="uredi'.$i.'" value=Uredi></td>';       
        print '<td><input type=submit name="izbrisi'.$i.'" value=Izbriši></td>';

        if(isset($_POST['uredi'.$i.'']))
        {
        $button="uredi$p[naziv]";
        $naziv=$_POST['naziv'.$i.''];
        $mjesto=$_POST['mjesto'.$i.''];
        $vrijeme=$_POST['vrijeme'.$i.''];
        $tip=$_POST['tip'.$i.''];
        
        if(preg_match('/^[a-žA-Ž0-9.\s]+$/',$naziv) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$vrijeme) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$tip)){
        $brRed=substr($button, 5);//$button[strlen($button)-1];
        $noviRed=$dbh->prepare("UPDATE dogadjaji SET naziv=?,mjesto=?,vrijeme=?,tip=? where naziv=?");
        $noviRed->bindValue(1,$naziv,PDO::PARAM_STR);
        $noviRed->bindValue(2,$mjesto,PDO::PARAM_STR);
        $noviRed->bindValue(3,$vrijeme,PDO::PARAM_STR);
        $noviRed->bindValue(4,$tip,PDO::PARAM_STR);
        $noviRed->bindValue(5,$brRed,PDO::PARAM_STR);
        $noviRed->execute();
        header("location: pocetnaAdmin.php");
        die();
       //echo $brRed;
        }
        else echo '<p style="color:red; font-size:15px;">Dozvoljen unos slova(A-Ž), brojeva, razmaka i tačke! Min.dužina polja:1</p>';
        }

        if(isset($_POST['izbrisi'.$i.'']))
        {   $a=$p['naziv'];
            $button2="izbrisi$a";
            $brRed2=substr($button2, 7);
            $izbrisiRed=$dbh->prepare("DELETE FROM dogadjaji WHERE naziv=?");
            $izbrisiRed->bindValue(1,$brRed2,PDO::PARAM_STR);
            $izbrisiRed->execute();
           header("location: pocetnaAdmin.php");
           die();
           // echo $brRed2;
        }


$i++;
}
        print '<tr>';
        print '<td>'.$i.'</td>';
        print '<td><input name="naziv'.$i.'" /></td>';
        print '<td><input name="mjesto'.$i.'" /></td>';
        print '<td><input name="vrijeme'.$i.'" /></td>';
        print '<td><input name="tip'.$i.'"/></td>';
        print '<td><input type=submit name="dodaj'.$i.'" value=Dodaj></td>';

        if(isset($_POST['dodaj'.$i.'']))
        {
            $naziv=$_POST['naziv'.$i.''];
            $mjesto=$_POST['mjesto'.$i.''];
            $vrijeme=$_POST['vrijeme'.$i.''];
            $tip=$_POST['tip'.$i.''];

            if(preg_match('/^[a-žA-Ž0-9.\s]+$/',$naziv) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$mjesto) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$vrijeme) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$tip)){
            $noviRed=$dbh->prepare("INSERT INTO dogadjaji(naziv,mjesto,vrijeme,tip) VALUES(?,?,?,?)");
        $noviRed->bindValue(1,$naziv,PDO::PARAM_STR);
        $noviRed->bindValue(2,$mjesto,PDO::PARAM_STR);
        $noviRed->bindValue(3,$vrijeme,PDO::PARAM_STR);
        $noviRed->bindValue(4,$tip,PDO::PARAM_STR);
        $noviRed->execute();
            header('location: pocetnaAdmin.php');
            die();
        }
            else echo '<p style="color:red; font-size:15px;">Dozvoljen unos slova(A-Ž), brojeva, razmaka i tačke! Min.dužina polja:1</p>';
            
       }

?>
</table>
</form>
</div>
</div>
</body>
</HTML>