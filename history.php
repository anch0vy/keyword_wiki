<?php
require('./setting.php');
require('./db_conn.php');
$id=$_GET['id'];
#문제는 여기서 id가 히스토리 아이디라는 것
#keyword_id 가 0인경우 내역이 없는 놈이고 그 이외의 경우만 조사
$q="SELECT keyword_id FROM keyword_history WHERE id=$id;";
$result=mysql_query($q,$db) or die;
$row=mysql_fetch_array($result);
$keyword_id=$row['keyword_id'];
if($keyword_id==0)
{
	echo "no history";
}
else
{
	echo "yes history<br>";
	$q="SELECT * FROM keyword_history WHERE keyword_id=$keyword_id ORDER BY timestamp desc;";
	$result=mysql_query($q,$db);
	$count=mysql_num_rows($result);
	for($n=1;$n<$count+1;$n++)
	{
		$row=mysql_fetch_array($result);
		echo $row['title']."<br>".$row['synonyms']."<br>".$row['link']."<br>".$row['timestamp']."<br><br><br>";
	}
}
?>