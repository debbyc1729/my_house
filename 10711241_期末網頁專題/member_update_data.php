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
<title>修改基本資料</title>
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
	padding:10px;
}
tr:nth-child(1){
	background-color:#7788aa;
	color:#ffffff;
}
tr:nth-child(even){
	background-color:#a8a8a8;
	color:#ffffff;
}
</style>
</head>
<body style="margin:10px">
<form method="post" action="member_update_date2.php" enctype="multipart/form-data">
<?php
$pid2=$_GET['pid'];
//echo $pid2;
echo "<input type=hidden name=pid value=$pid2>";

//if($_POST['pid1']=='')
	//"<script>location.href='login.htm'</script>";


$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
$rs=$db->query($rs);
$rs->setFetchMode(PDO::FETCH_BOTH);
?>
<table>
<tr>
	<td>序號</td>
	<td>帳號</td>
	<td>密碼</td>
	<td>姓名</td>
	<td>電郵</td>
	<td>電話</td>
	<td>性別</td>
	<td>生日</td>
</tr>
<?php
while($row=$rs->fetch()){
	echo "<tr>";
	echo "<td>" . $row[pid] . "</td>";
	echo "<td><input type=text name=uid value=" . $row['uid'] . "></td>";
	echo "<td><input type=password name=pwd value=" . $row['pwd'] . "></td>";
	echo "<td><input type=text name=uname value=" . $row['uname'] . "></td>";
	echo "<td><input type=email name=email value=" . $row['email'] . "></td>";
	echo "<td><input type=text name=phone value=" . $row['phone'] . "></td>";
	
	if($row[gender]==0){
		echo "<td>";
		echo "<input type=radio name=gender value=0 checked>女";
		echo "<input type=radio name=gender value=1>男";
		echo "</td>";
	}
	else{
		echo "<td>";
		echo "<input type=radio name=gender value=1 checked>男";
		echo "<input type=radio name=gender value=0>女";
		echo "</td>";
	}

	echo "<td><input type=date name=birth value=" . $row['birth'] . "></td>";
?>

<?php
	echo "</tr>";
}
echo "<tr>";
echo "<td colspan=8 align=center>";
echo "<input type=submit value=修改>";
echo "</td>";
echo "</tr>";
echo "<br>大頭照：<input type=file name=pho id=file><br><br>";
echo "</form>";
function tgender($g){
	if($g==0){
		$rg="女";
	}
	else{
		$rg="男";
	}
	return $rg;
}

?>
</table>
<br>
<?php echo "<br><a href=member_index.php?pid=$pid2>回小屋首頁</a>"; ?>
</body>
</html>
<?php } ?>
