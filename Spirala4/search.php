<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("dogadjaj.xml");

//$x=$xmlDoc->getElementsByTagName('dogadjaj');

//get the q parameter from URL
$q=$_GET["q"];
$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");

$rez=$dbh->query("SELECT naziv,mjesto FROM dogadjaji");

if (strlen($q)>0) {
  $hint="";
  $brojRedova=0;
 foreach($rez as $r) {
   // $y=$x->item($i)->getElementsByTagName('naziv');
    //$z=$x->item($i)->getElementsByTagName('mjesto');
      if (stristr($r['naziv'],$q) && stristr($r['mjesto'],$q) && $brojRedova<=8) {
        if ($hint=="") {
          $hint= $r['naziv'];
          $hint=$hint . "<br />" . 
          $r['mjesto'];
        } else {
          $hint=$hint . "<br />" . 
          $r['naziv'];
          $hint=$hint . "<br />" . 
          $r['mjesto'];
        }
            $brojRedova=$brojRedova+2;
      }
      else if (stristr($r['naziv'],$q) && $brojRedova<10)
      {
        if ($hint=="") {
          $hint= $r['naziv'];
          
        } else {
          $hint=$hint . "<br />" . 
          $r['naziv'];
        }
        $brojRedova=$brojRedova+1;
      }
      else if (stristr($r['mjesto'],$q) && $brojRedova<10){

        if ($hint=="") {
          $hint= $r['mjesto'];
        } else {
          $hint=$hint . "<br />" . 
          $r['mjesto'];
        }
          $brojRedova=$brojRedova+1;
      }
    
  }
}
if ($hint=="") {
  $response="Nema rezultata";
} else {
  $response=$hint;
}

//output the response
echo '<div style="color: black; font-size: 15px; text-align:center">'.$response.'</div>';
?>