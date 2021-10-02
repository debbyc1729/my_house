<?php
	session_start();

	if(!(isset($_SESSION['admin'])))
	//if($_SESSION['admin'])
		echo "<script type=\"text/javascript\">alert(\"你還沒登入喔!\");location.href='re_login.php';</script>";

		//"<script>location.href='re_login.php'</script>";
	else{
?>
<html>
<head>
<meta charset="utf-8">
<title>寫文章</title>
<style type="text/css">

a:link{color:#ff00ff;text-decoration:none}
a:visited{color:#ff00ff;text-decoration:none}
a:hover{color:#ff00ff;text-decoration:underline}
a:active{color:#ff00ff;text-decoration:underline}

a.myaRED:link{color:#ff0000;text-decoration:none}
a.myaRED:visited{color:#ff0000;text-decoration:none}
a.myaRED:hover{color:#ff0000;text-decoration:underline}
a.myaRED:active{color:#ff0000;text-decoration:underline}

table{
	width:600px;
	border:1px solid #888888;
	border-collapse:collapse;
}
td{
	border:1px solid #888888;
	padding: 10px;
}
tr:nth-child(1){
	background-color:#7788aa;
	color:#ffffff;
}
tr:nth-child(even){
	background-color:a8a8a8;
	color:#ffffff;
}
</style>
</head>
<body style="margin:10px">
<?php
$pid2=$_POST['pid'];
echo "你的ID：" . $pid2;
echo "<br>";


$aticle2=$_POST['aticle'];
//echo "自我介紹：<br>" . $aticle2;
echo "<br><br>";


$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="update member2 set aticle='$aticle2' where pid=$pid2";
//echo "rs=$rs<br>";
echo "上傳成功" . "<br>";
$rs=$db->exec($rs);
echo "<br><a href=member_index.php?pid=$pid2><br>回小屋首頁</a>";
?>

<br>
</body>
</html>
<?php } ?>
