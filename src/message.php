<?php
$name = $_POST['name'];
$email = $_POST['email'];
$msg = $_POST['message'];
//$name = "a";
//$email = "n";
//$msg = "d";

require_once "dbConfig.php";
$connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);
if(!$connect)
{
    //die("Error: " . mysql_error());
    die(0);
}
mysql_select_db(DB_NAME, $connect);
mysql_query("SET NAMES 'UTF8'");

$rst = mysql_query("insert into message(name,email,msg,time,isread) values('$name','$email','$msg',now(),'0');");
if(!$rst)
{
    //die('Error: ' . mysql_error());
    die(0);
}
die(1);

?>