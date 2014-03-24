<?php
require('./setting.php');
require('./db_conn.php');

#대표 키워드, 동의어, 추천링크를 받아옴
#동의어 추천링크는 , 로 분리해서 받아온다
#보내주는 페이지서 javascript 로 처리하거나 아님 걍 그렇게 쓰라고 시킨당
$ip=$_SERVER['REMOTE_ADDR'];
$title=$_GET['title'];
$synonyms=$_GET['synonyms'];
$link=$_GET['link'];
$q="INSERT INTO keyword_history (title, synonyms, link, ip) VALUES('$title','$synonyms,'$link','$ip');";
$result=mysql_query($q,$db);

?>
