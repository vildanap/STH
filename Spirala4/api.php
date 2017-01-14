<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
}

function rest_post($request, $data) { }
function rest_delete($request) { }
function rest_put($request, $data) { }
function rest_error($request) { }
function rest_get($request, $data) { 

$id = $data['id']; 
$dbh = new PDO("mysql:dbname=wt;host=localhost;charset=utf8", "root", "");
$dbh->exec("set names utf8");
if($request=="/Spirala3/api.php/price"){
$price=$dbh->prepare("SELECT * from price");
$price->execute();
if(!$price) {header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");die();}
$var=json_encode($price->fetchAll());
echo $var;
}
else if ($request=="/Spirala3/api.php/dogadjaji"){
$korisnici=$dbh->prepare("SELECT * from dogadjaji");
$korisnici->execute();
if(!$korisnici) {header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");die();}
$var=json_encode($korisnici->fetchAll());
echo $var;
}
else if ($request=="/Spirala3/api.php/price?id=$id"){
$price=$dbh->prepare("SELECT * from price where id=$id");
$price->execute();
if(!$price) {header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");die();}
$var=json_encode($price->fetchAll());
echo $var;
}    
else if ($request=="/Spirala3/api.php/dogadjaji?id=$id"){
 $korisnici=$dbh->prepare("SELECT * from dogadjaji where id=$id");
$korisnici->execute();
if(!$korisnici) {header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");die();}
$var=json_encode($korisnici->fetchAll());
echo $var;
}
}
$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>