<?php
require_once "dbConfig.php";

$name = $_POST['name'];
//$name = "赖少发";

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASSWD);
 if(!$connect)
{
    die("Error@mysql_connect");
}
mysql_select_db(DB_NAME, $connect);
mysql_query("SET NAMES 'UTF8'");

$sql = "select maintree.id,maintree.pid,maintree.generation,maintree.rank,
        member.*, 
        generations.genename 
        from maintree,member,generations where maintree.name=member.name and maintree.generation=generations.id and maintree.name='$name'";

$result = mysql_query($sql);
if(!$result)
{
    die(mysql_error());
}
$row = mysql_fetch_array($result);
$info = array(
    'id'=>$row['id'],
    'pId'=>$row['pid'],
    'rank'=>$row['rank'],
    'generation'=>$row['generation']."代 ".$row['genename'],
    'name'=>$row['name'],
    'sex'=>$row['sex'],
    'evername'=>$row['evername'],
    'courtesyname'=>$row['courtesyname'],
    'penname'=>$row['penname'],
    'posttitle'=>$row['posttitle'],
    'idnum'=>$row['idnum'],
    'country'=>$row['country'],
    'people'=>$row['people'],
    'education'=>$row['education'],
    'phione'=>$row['phione'],
    'email'=>$row['email'],
    'state'=>$row['state'],
    'birthday'=>$row['birthday'],
    'birthaddr'=>$row['birthaddr'],
    'deadday'=>$row['deadday'],
    'deadaddr'=>$row['deadaddr'],
    'liveaddr'=>$row['liveaddr'],
    'tombaddr'=>$row['tombaddr'],
    'image'=>$row['image']
    );

echo json_encode($info);

?>
