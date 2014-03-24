<?php
require('./setting.php');
require('./db_conn.php');

#일단 keyword_history 에 저장을 한다
$ip=$_SERVER['REMOTE_ADDR'];
$title=$_GET['title'];
$synonyms=$_GET['synonyms'];
$link=$_GET['link'];
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
