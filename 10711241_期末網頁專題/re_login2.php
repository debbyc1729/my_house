<?php /*檢查表單送過來的東西 */

	session_start();
	$checkCode = $_POST['checkCode'];
	if(!isset($_SESSION))$SEC = "";
	else $SEC = $_SESSION['checkNum']; 

//如果驗證碼為空
	if($checkCode == "")
		echo "<script type=\"text/javascript\">alert(\"驗證碼請勿空白\");location.href='re_login.php';</script>";

//如果驗證碼不是空白但輸入錯誤
	else if($checkCode != $SEC && $checkCode !="")
		echo "<script type=\"text/javascript\">alert(\"驗證碼請錯誤，請重新輸入\");location.href='re_login.php';</script>";

//驗證碼輸入正確
	else{//驗證碼輸入正確
		echo "<script type=\"text/javascript\">alert(\"驗證碼正確！\")</script>";

		//這邊可以做任何事情，像是寄信等等的東西
?>
<html>
<head>
<meta charset="utf-8">
<title>表單設計與驗證</title>
<style type="text/css">

a:link{color:#ff00ff;text-decoration:none}
a:visited{color:#ff00ff;text-decoration:none}
a:hover{color:#ff00ff;text-decoration:underline}
a:active{color:#ff00ff;text-decoration:underline}

a.myaRED:link{color:#ff0000;text-decoration:none}
a.myaRED:visited{color:#ff0000;text-decoration:none}
a.myaRED:hover{color:#ff0000;text-decoration:underline}
a.myaRED:active{color:#ff0000;text-decoration:underline}

</style>
</head>
<body style="margin:10px">
<?php


$uid2=$_POST['uid'];
echo "uid2=" . $uid2;
echo "<br>";

$pwd2=$_POST['pwd'];
echo "pwd2=" . $pwd2;
echo "<br>";

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rsA="select * from member2 where uid='$uid2' and pwd='$pwd2'";
$rsB=$db->query($rsA);
$rsC=$rsB->fetchAll();
$rowCount=count($rsC);
echo "<br>";
echo "rowCount=$rowCount";
echo "<br>";

$rs=$db->query($rsA);
$row=$rs->fetch();
$pid2=$row[pid];



if($rowCount!=1){
	$msg="登入失敗,帳號或密碼錯誤";
	echo "<script>alert(\"$msg\");location.href='re_login.php';</script>";
	//echo "login success<br>";
} else{
	$msg="登入成功";
	//echo "<form method=post action=member_index.php>";
	//echo "<input type=hidden name=pid1 value=$pid3>";
	//echo "</form>";
	echo "<script>alert(\"$msg\");location.href='member_index.php?pid=$pid2';</script>";
	
	
	$_SESSION["admin"] = $pid2;


	//echo "login fail<br>";
}
?>
<br>
<a href="index.htm">回首頁</a>

</body>
</html>
<?php } ?>
