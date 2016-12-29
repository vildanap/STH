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
<div id="crudAdmin" class="kolona dva" style="background-color: #EEFEF9;">
<h1>Dodaj događaj</h1>
</div>
<form method="POST" id="formaAdmin">
<table align="center" class="tabela" border="1px solid black" >
<?php
 $niz = simplexml_load_file("dogadjaj.xml");   
    print '<tr>';
    print '<th>R.br.</th>';
    print '<th>Naziv</th>';
    print '<th>Mjesto</th>';
    print '<th>Vrijeme</th>';
    print '<th>Tip</th>';
    print '</tr>';

 	$i=1;  
 	
    foreach($niz->children() as $element) {
    	print '<tr>';
    	print '<td>'.$i.'</td>';
        print '<td><input type=text name="naziv'.$i.'" value="'.$element->naziv.'"/></td>';
        print '<td><input name="mjesto'.$i.'" value="'.$element->mjesto.'" /></td>';
        print '<td><input name="vrijeme'.$i.'" value="'.$element->vrijeme.'" /></td>';
        print '<td><input name="tip'.$i.'" value="'.$element->tip.'" /></td>';
        print '<td><input type=submit name="uredi'.$i.'" value=Uredi></td>';

        if(isset($_POST['uredi'.$i.'']))
    	{
    	$naziv=$_POST['naziv'.$i.''];
    	$mjesto=$_POST['mjesto'.$i.''];
    	$vrijeme=$_POST['vrijeme'.$i.''];
    	$tip=$_POST['tip'.$i.''];
    	
    	if(preg_match('/^[a-žA-Ž0-9.\s]+$/',$naziv) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$vrijeme) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$tip)){
		$niz->dogadjaj[$i-1]->naziv=$naziv;	
		$niz->dogadjaj[$i-1]->mjesto=$mjesto;
		$niz->dogadjaj[$i-1]->vrijeme=$vrijeme;
		$niz->dogadjaj[$i-1]->tip=$tip;
		$niz->asXML('dogadjaj.xml');
		header("location: pocetnaAdmin.php");
        die();

		}
		else echo '<p style="color:red; font-size:15px;">Dozvoljen unos slova(A-Ž), brojeva, razmaka i tačke! Min.dužina polja:1</p>';
    	}

        print '<td><input type=submit name="izbrisi'.$i.'" value=Izbriši></td>';

        if(isset($_POST['izbrisi'.$i.'']))
        {
        	unset($niz->dogadjaj[$i-1]);
        	$niz->asXML('dogadjaj.xml');
       		header("location: pocetnaAdmin.php");
            die();
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
			$xml=simplexml_load_file("dogadjaj.xml");
			$naziv=$_POST['naziv'.$i.''];
			$mjesto=$_POST['mjesto'.$i.''];
			$vrijeme=$_POST['vrijeme'.$i.''];
			$tip=$_POST['tip'.$i.''];

    		if(preg_match('/^[a-žA-Ž0-9.\s]+$/',$naziv) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$mjesto) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$vrijeme) && preg_match('/^[a-žA-Ž0-9.\s]+$/',$tip)){
    		$child = $xml->addChild("dogadjaj");
			$child->addChild("naziv",$_POST['naziv'.$i.'']);
			$child->addChild("mjesto",$_POST['mjesto'.$i.'']);
			$child->addChild("vrijeme",$_POST['vrijeme'.$i.'']);
			$child->addChild("tip",$_POST['tip'.$i.'']);
			$xml->asXML("dogadjaj.xml");
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