<?php
require('./setting.php');
require('./db_conn.php');
$q="SELECT keyword_history.* from keyword,keyword_history where keyword.history_id=keyword_history.id;";
$result=mysql_query($q,$db);
$count=mysql_num_rows($result);
echo "저장되어 있는 키워드들<br>";
for($n=1;$n<$count+1;$n++)
{
	$row=mysql_fetch_array($result);
	echo "<a href=read.php?id=".$row['id'].">".$row['title']."</a><br>";
}
echo "<a href=keyword_insert.html>키워드 추가</a>"
?>