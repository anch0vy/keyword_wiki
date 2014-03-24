<?php
require('./setting.php');
require('./db_conn.php');
$id=$_GET['id'];
$ip=$_SERVER['REMOTE_ADDR'];
$title=$_GET['title'];
$synonyms=$_GET['synonyms'];
$link=$_GET['link'];

#일단 keyword_history 에 저장을 한다
$q="INSERT INTO keyword_history (title, synonyms, link, ip,keyword_id) VALUES('$title','$synonyms','$link','$ip',
	(select id from keyword where history_id=$id));";
echo $q;
mysql_query($q,$db) or die($q);

#그후 keyword 디비의 history_id를 변경한다
$q="UPDATE keyword SET history_id=(select id from keyword_history where title='$title' order by id desc limit 1) WHERE history_id=$id;";
echo $q;
mysql_query($q,$db) or die('error');


?>