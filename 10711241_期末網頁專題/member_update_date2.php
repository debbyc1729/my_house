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

$uid2=$_POST['uid'];
echo "你的帳號：" . $uid2;
echo "<br>";

$pwd2=$_POST['pwd'];
echo "你的密碼：" . $pwd2;
echo "<br>";

$email2=$_POST['email'];
echo "你的email：" . $email2;
echo "<br>";

$phone2=$_POST['phone'];
echo "你的手機：" . $phone2;
echo "<br>";

$gender2=$_POST['gender'];
echo "你的性別：" . $gender2;
echo "<br>";

$birth2=$_POST['birth'];
echo "你的生日：" . $birth2;
echo "<br>";

$uname2=$_POST['uname'];
echo "你的姓名：" . $uname2;
echo "<br>";

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
$rs=$db->query($rs);
$rs->setFetchMode(PDO::FETCH_BOTH);

$row=$rs->fetch();

echo "<input type=hidden name=photo value=$photo2>";
$photo2=$row[photo];


//限制圖片型別格式，大小
	if ((($_FILES["pho"]["type"] == "image/gif")
    	|| ($_FILES["pho"]["type"] == "image/jpeg")
    	|| ($_FILES["pho"]["type"] == "image/png")
        || ($_FILES["pho"]["type"] == "image/jpg"))
        && ($_FILES["pho"]["size"] < 200000000)) {
        if ($_FILES["pho"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["pho"]["error"] . "<br />";
        } else {
            //echo "檔名: " . $_FILES["pho"]["name"] . "<br />";
            //echo "檔案型別: " . $_FILES["pho"]["type"] . "<br />";
            //echo "檔案大小: " . ($_FILES["pho"]["size"] / 1024) . " Kb<br />";
            //echo "快取檔案: " . $_FILES["pho"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("images/pic/pho/" . $_FILES["pho"]["name"])) {
            	//echo $_FILES["pho"]["name"] . " already exists. <br>";
				//echo "<br>";
				$photo2=$_FILES["pho"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["pho"]["tmp_name"],
                    "images/pic/pho/" . $_FILES["pho"]["name"]
                );
                //echo "儲存於: " . "images/pic/pho/" . $_FILES["pho"]["name"] . "<br>";//上傳成功後提示上傳資訊
				echo "上傳成功<br>";
				$photo2=$_FILES["pho"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇檔案！<br>";//上傳失敗後顯示錯誤資訊
				//echo "你的大頭照：" . $_FILES["pho"]["name"] . "<br>";
    }


$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="update member2 set uid='$uid2',pwd='$pwd2',email='$email2',phone='$phone2',gender=$gender2,birth='$birth2',photo='$photo2',uname='$uname2' where pid=$pid2";
//echo "rs=$rs<br>";
echo "上傳成功";
$rs=$db->exec($rs);
echo "<br><a href=member_index.php?pid=$pid2>回小屋首頁</a>";
?>

<br>
</body>
</html>
<?php } ?>
