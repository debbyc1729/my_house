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
<title>寫文章</title>
<style type="text/css">

textarea{
	width:500px;
	height:250px
}

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

<form onsubmit="alert('表單送出');" method="post" action="re_aticle2.php" enctype="multipart/form-data">

<?php
$pid2=$_GET['pid'];
//echo "pid=" . $pid2 . "<br>";
echo "<input type=hidden name=pid value=$pid2>";

//if($_GET['pid1']=='')
	//"<script>location.href='login.htm'</script>";

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
$rs=$db->query($rs);
$rs->setFetchMode(PDO::FETCH_BOTH);

$row=$rs->fetch();
	echo "寫文章：<br><textarea type=text name=aticle value=" . $row['aticle'] . "></textarea>";

?>

<br>
<input type="submit" value="送出">
</form>
<?php echo "<br><a href=member_index.php?pid=$pid2><br>回小屋首頁</a>"; ?>
</body>
</html>
<?php } ?>
