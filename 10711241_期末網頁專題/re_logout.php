<?php
	//header("Content-Type:text/html; charset=utf-8");'
//開啟Session
	session_start();
//清除Session
	session_destroy();
//導到login.php
	//header("Location:re_login.php");
	echo "<script type=\"text/javascript\">alert(\"你已登出\");location.href='re_login.php';</script>";

?>
