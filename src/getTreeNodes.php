
<?php
require_once "dbConfig.php";
$connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);
 if(!$connect)
{
    exit();
}
mysql_select_db(DB_NAME, $connect);
mysql_query("SET NAMES 'UTF8'");

$GLOBALS['array'] = array();
FindChildren(-1);
echo json_encode($array);


function FindChildren($pid)
{
    $result = mysql_query("select id,pid,name,generation,rank from maintree where pId=$pid");
	while($row=mysql_fetch_array($result))
	{
		$menu = array(
			"id"=>$row['id'],
			"pId"=>$row['pid'],
			"name"=>$row['name'],
			"open"=>$row['generation']>4 ? "false" : "true"
			); 
        //print_r($menu);
		array_push($GLOBALS["array"], $menu);
		FindChildren($row["id"]);
	}
}
?>