<?php

require_once "dbConfig.php";

$username = $_POST["username"];
$passwd = $_POST["password"];
//$username = "laishaofa";
//$passwd = "jjjjjj";

 $RST_ERROR_DB = 0;
 $RST_ERROR_USERNAME = 1;
 $RST_ERROR_PASSWD = 2;
 $RST_OK_NORMAL = 3;
 $RST_OK_ROOT = 4;
 $RST = $RST_ERROR_DB;

 $connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);
 if(!$connect)
{
    echo $RST;
    exit();
}
mysql_select_db(DB_NAME, $connect);
mysql_query("SET NAMES 'UTF8'");

$result = mysql_query("select * from user where username='$username'");

if($row = mysql_fetch_array($result))
{   
    $RST = (($row['password'] == $passwd) ? ($row['authority']==0 ? $RST_OK_ROOT : $RST_OK_NORMAL ) : ($RST_ERROR_PASSWD));
}
else
{
    $RST =  $RST_ERROR_USERNAME;
}

//if($RST == $RST_OK_NORMAL)
//{
//    setcookie('user_id', $row['id'], time() + 5*60);
//    setcookie('user_name', $row['username'], time() + 5*60);
//}
//else if ($RST == $RST_OK_ROOT)
//{
//    setcookie('user_id', $row['id'], time() + 1 * 60);
//    setcookie('user_name', $row['username'], time() + 1 * 60);
//    setcookie('user_auth', $row['authority'], time() + 1 * 60);
//}
echo $RST;

?>