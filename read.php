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
	echo "<a href=".$l." target=\"_blank\">".$l."</a><br>";
	#저기서 나올건 타이틀
}
echo "<a href=edit.html?id=".$id.">수정하기</a><br>";
echo "<a href=history.php?id=".$id.">수정내역</a>";
?>