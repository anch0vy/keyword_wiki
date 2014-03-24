<?php
require('./setting.php');
$db=mysql_connect($gDBserver,$gDBuser,$gDBpassword) or die("db connection error");
mysql_select_db($gDBname,$db) or die("db connection error2");
mysql_query("set names utf8",$db);
?>