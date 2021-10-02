<?php
	session_start();
	echo "你的ID：" . $_SESSION["admin"];

	if(!(isset($_SESSION['admin'])))
	//if($_SESSION['admin'])
		echo "<script type=\"text/javascript\">alert(\"你還沒登入喔!\");location.href='re_login.php';</script>";

		//"<script>location.href='re_login.php'</script>";
	else{
?>
<html>
<head>
<meta charset="utf-8">
<title>布置小屋</title>
<style type="text/css">

a:link{color:#ff00ff;text-decoration:none}
a:visited{color:#ff00ff;text-decoration:none}
a:hover{color:#ff00ff;text-decoration:underline}
a:active{color:#ff00ff;text-decoration:underline}

a.myaRED:link{color:#ff0000;text-decoration:none}
a.myaRED:visited{color:#ff0000;text-decoration:none}
a.myaRED:hover{color:#ff0000;text-decoration:underline}
a.myaRED:active{color:#ff0000;text-decoration:underline}

form{
	line-height:2em;
}

form>input, form>select{
	padding:5px 10px;
	border:1px solid #888888;
	border-radius:5px;
}
form>.ok{
	color:#008800;
}

form>input:valid+.ok{
	display:inline;
}
form>input:invalid+.ok{
	display:none;
}
</style>
</head>
<body style="margin:10px">

<img src="images/example" style="width:800px" align="right">

<form onsubmit="alert('表單送出');" method="post" action="mui2.php" enctype="multipart/form-data">
<?php
$pid2=$_GET['pid'];
//echo $pid2;
echo "<input type=hidden name=pid value=$pid2>";
	
	
echo "<br>標題文字(NO TITLE的地方)：<br><textarea type=text name=title value=" . $row['title'] . "></textarea><br>";
?>
<br>
背景圖片(1):<input type="file" name="bgi" id="file">
<br>
<br>
內文圖片(2):<input type="file" name="ati" id="file">
<br>
<br>
標題圖片(3):<input type="file" name="tti" id="file">
<br>
<br>
背景音樂:<input type="file" name="mus" id="file">
<br>
<br>



<br>
<input type="submit" value="送出">
</form>
<?php echo "<br><a href=member_index.php?pid=$pid2><br>回小屋首頁</a>"; ?>
</body>
</html>
<?php } ?>
