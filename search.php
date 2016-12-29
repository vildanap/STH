<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("dogadjaj.xml");

$x=$xmlDoc->getElementsByTagName('dogadjaj');

//get the q parameter from URL
$q=$_GET["q"];

if (strlen($q)>0) {
  $hint="";
  $brojRedova=0;
 for($i=0; $i<($x->length); $i++) {
    $y=$x->item($i)->getElementsByTagName('naziv');
    $z=$x->item($i)->getElementsByTagName('mjesto');

      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) && stristr($z->item(0)->childNodes->item(0)->nodeValue,$q) && $brojRedova<=8) {
        if ($hint=="") {
          $hint= $y->item(0)->childNodes->item(0)->nodeValue;
          $hint=$hint . "<br />" . 
          $z->item(0)->childNodes->item(0)->nodeValue;
        } else {
          $hint=$hint . "<br />" . 
          $y->item(0)->childNodes->item(0)->nodeValue;
          $hint=$hint . "<br />" . 
          $z->item(0)->childNodes->item(0)->nodeValue;
        }
            $brojRedova=$brojRedova+2;
      }
      else if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q) && $brojRedova<10)
      {
        if ($hint=="") {
          $hint= $y->item(0)->childNodes->item(0)->nodeValue;
          
        } else {
          $hint=$hint . "<br />" . 
          $y->item(0)->childNodes->item(0)->nodeValue;
        }
        $brojRedova=$brojRedova+1;
      }
      else if (stristr($z->item(0)->childNodes->item(0)->nodeValue,$q) && $brojRedova<10){

        if ($hint=="") {
          $hint= $z->item(0)->childNodes->item(0)->nodeValue;
        } else {
          $hint=$hint . "<br />" . 
          $z->item(0)->childNodes->item(0)->nodeValue;
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