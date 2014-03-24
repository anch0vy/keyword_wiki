<?php
require('./setting.php');
require('./db_conn.php');
$id=$_GET['id'];
$q="SELECT * FROM keyword_history where id=$id";
$result=mysql_query($q,$db) or die;
$row=mysql_fetch_array($result);
echo $row['title'].'<br>';
echo '동의어: '.$row['synonyms'].'<br>';
echo '유용한 링크<br>';
$link=explode(",",$row['link']);
foreach($link as $l)
{
	echo "<a href=".$l." target=\"_blank\">"."여기가 타이틀 나올 부분"."</a><br>";
}
?>