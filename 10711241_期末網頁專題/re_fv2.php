<?php /*檢查表單送過來的東西 */

	session_start();
	$checkCode = $_POST['checkCode'];
	if(!isset($_SESSION))
		$SEC = "";
	else 
		$SEC = $_SESSION['checkNum']; 
//如果驗證碼為空
	if($checkCode == "")
		echo "<script type=\"text/javascript\">alert(\"驗證碼請勿空白\");location.href='re_fv.php';</script>";
//如果驗證碼不是空白但輸入錯誤
	else if($checkCode != $SEC && $checkCode !="")
		echo "<script type=\"text/javascript\">alert(\"驗證碼請錯誤，請重新輸入\");location.href='re_fv.php';</script>";
//驗證碼輸入正確
	else{
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
echo "你的帳號：" . $uid2;
echo "<br>";

$pwd2=$_POST['pwd'];
echo "你的密碼；" . $pwd2;
echo "<br>";

$uname2=$_POST['uname'];//
echo "你的姓名：" . $uname2;
echo "<br>";

$email2=$_POST['email'];
echo "你的email：" . $email2;
echo "<br>";

$phone2=$_POST['phone'];
echo "你的電話：" . $phone2;
echo "<br>";

$gender2=$_POST['gender'];
echo "你的性別：" . $gender2;
echo "<br>";

$birth2=$_POST['birth'];
echo "你的生日：" . $birth2;
echo "<br>";


	//限制圖片型別格式，大小
	if ((($_FILES["pho"]["type"] == "image/gif")
    	|| ($_FILES["pho"]["type"] == "image/jpeg")
    	|| ($_FILES["pho"]["type"] == "image/png")
        || ($_FILES["pho"]["type"] == "image/jpg"))
        && ($_FILES["pho"]["size"] < 200000000)) {
        if ($_FILES["pho"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["pho"]["error"] . "<br />";
        } else {
            echo "檔名: " . $_FILES["pho"]["name"] . "<br />";
            //echo "檔案型別: " . $_FILES["pho"]["type"] . "<br />";
            //echo "檔案大小: " . ($_FILES["pho"]["size"] / 1024) . " Kb<br />";
            //echo "快取檔案: " . $_FILES["pho"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("images/pic/" . $_FILES["pho"]["name"])) {
            	//echo $_FILES["pho"]["name"] . " already exists. ";
				$photo2=$_FILES["pho"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["pho"]["tmp_name"],
                    "images/pic/" . $_FILES["pho"]["name"]
                );
                echo "儲存於: " . "images/pic/" . $_FILES["pho"]["name"];//上傳成功後提示上傳資訊
				echo "大頭照上傳成功<br>";
				$photo2=$_FILES["pho"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇大頭照！<br><br>";//上傳失敗後顯示錯誤資訊
    }

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rsA="select * from member2 where uid='$uid2'";
$rsB=$db->query($rsA);
$rsC=$rsB->fetchAll();
$rowCount=count($rsC);
echo "<br>";
//echo "rowCount=$rowCount";
echo "<br>";

if($rowCount==1){
	$msg="帳號已存在，請重新輸入";
	echo "<script>alert(\"$msg\");location.href='re_fv.php';</script>";
	//echo "<a href=re_fv.php>回上頁</a>";
} else{
	$rs="insert into member2(uid,pwd,uname,email,phone,gender,birth,photo) values('$uid2','$pwd2','$uname2','$email2','$phone2',$gender2,'$birth2','$photo2')";
	//echo "rs=$rs<br>";
	$rs=$db->exec($rs);
}
?>
<br>
<a href="re_login.php">登入</a><br><br>

</body>
</html>
<?php } ?>
