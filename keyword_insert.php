<?php
require('./setting.php');
require('./db_conn.php');

#일단 keyword_history 에 저장을 한다
$ip=$_SERVER['REMOTE_ADDR'];
$title=$_GET['title'];
$synonyms=$_GET['synonyms'];
$link=$_GET['link'];

#title이나 synonyms 에 중복된 단어가 있는지 체크
#나중에 인덱서를 만들어야 함
$q="SELECT group_concat(keyword_history.title,',',keyword_history.synonyms) as r FROM keyword,keyword_history where keyword.history_id=keyword_history.id";
$result=mysql_query($q,$db);
$row=mysql_fetch_array($result);
$r=$row['r'];
$tmp=$title.','.$synonyms;
$tmp=explode(",",$tmp);
$r=explode(",",$r);
$tmp2=array_intersect($r,$tmp);
if(count($tmp2))
{
	echo "중복된 타이틀이나 동의어가 존재합니다.<br>";
	foreach($tmp2 as $w)
	{
		echo $w."<br>";
	}
	die();
}


$q="INSERT INTO keyword_history (title, synonyms, link, ip) VALUES('$title','$synonyms','$link','$ip');";
mysql_query($q,$db) or die('error');

#방금 저장한 id를 가져온다
$q="SELECT id FROM keyword_history where title='$title'";
$result=mysql_query($q,$db);
$row=mysql_fetch_array($result);
$id=$row['id'];
$q="INSERT INTO keyword (history_id,title) VALUES($id,'$title');";
mysql_query($q,$db) or die('error');
header("location: index.php");
?>
