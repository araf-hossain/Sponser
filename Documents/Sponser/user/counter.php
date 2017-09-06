<?php
session_start();
include("../database/connection.php");
$session_id=session_id();
// c6f09a8fb7392c2af26cd558e554e28f19
 // $session_id="127.0.0.2";

$result = mysql_query("SELECT MAX(views) AS max_view FROM user_views");
$fetch_views = mysql_fetch_array($result);

$slct_session=mysql_query("SELECT * FROM user_views");
$fetch_session=mysql_fetch_array($slct_session);

	if ($session_id!=$fetch_session[0]) 
	{
		$count_view=$fetch_views["max_view"]+1;
		mysql_query("INSERT INTO user_views(`session`,`views`)VALUE('$session_id','$count_view')");
		
	}


?>