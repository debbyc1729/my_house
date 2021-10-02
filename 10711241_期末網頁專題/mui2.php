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

</style>
</head>
<body style="margin:10px">
<?php

$pid2=$_POST['pid'];
echo "你的ID：" . $pid2;
echo "<br>";

$title2=$_POST['title'];
echo "標題：";
if($title2!='')
	echo $title2;
else
	echo "未修改";
echo "<br>";

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
$rs=$db->query($rs);
$rs->setFetchMode(PDO::FETCH_BOTH);
$row=$rs->fetch();

echo "<input type=hidden name=bgi value=$bgi2>";
echo "<input type=hidden name=ati value=$ati2>";
echo "<input type=hidden name=tti value=$tti2>";
echo "<input type=hidden name=mus value=$nus2>";

$bgi2=$row[bgi];
$ati2=$row[ati];
$tti2=$row[tti];
$mus2=$row[mus];

	//限制圖片型別格式，大小
	if ((($_FILES["bgi"]["type"] == "image/gif")
    	|| ($_FILES["bgi"]["type"] == "image/jpeg")
    	|| ($_FILES["bgi"]["type"] == "image/png")
        || ($_FILES["bgi"]["type"] == "image/jpg"))
        && ($_FILES["bgi"]["size"] < 200000000)) {
        if ($_FILES["bgi"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["bgi"]["error"] . "<br />";
        } else {
            echo "檔名: " . $_FILES["bgi"]["name"] . "<br />";
            echo "檔案型別: " . $_FILES["bgi"]["type"] . "<br />";
            echo "檔案大小: " . ($_FILES["bgi"]["size"] / 1024) . " Kb<br />";
            echo "快取檔案: " . $_FILES["bgi"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("images/pic/bgi/" . $_FILES["bgi"]["name"])) {
            	//echo $_FILES["bgi"]["name"] . " already exists. ";
				echo $_FILES["bgi"]["name"] . "上傳成功<br>";
				$bgi2=$_FILES["bgi"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["bgi"]["tmp_name"],
                    "images/pic/bgi/" . $_FILES["bgi"]["name"]
                );
                echo "儲存於: " . "images/pic/bgi/" . $_FILES["bgi"]["name"] . "<br>";//上傳成功後提示上傳資訊
				$bgi2=$_FILES["bgi"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇檔案！<br>";//上傳失敗後顯示錯誤資訊
    }


	//限制圖片型別格式，大小
	if ((($_FILES["ati"]["type"] == "image/gif")
    	|| ($_FILES["ati"]["type"] == "image/jpeg")
    	|| ($_FILES["ati"]["type"] == "image/png")
        || ($_FILES["ati"]["type"] == "image/jpg"))
        && ($_FILES["ati"]["size"] < 200000000)) {
        if ($_FILES["ati"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["ati"]["error"] . "<br />";
        } else {
            echo "檔名: " . $_FILES["ati"]["name"] . "<br />";
            echo "檔案型別: " . $_FILES["ati"]["type"] . "<br />";
            echo "檔案大小: " . ($_FILES["ati"]["size"] / 1024) . " Kb<br />";
            echo "快取檔案: " . $_FILES["ati"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("images/pic/ati/" . $_FILES["ati"]["name"])) {
            	//echo $_FILES["ati"]["name"] . " already exists. ";
				echo $_FILES["ati"]["name"] . "上傳成功<br>";
				$ati2=$_FILES["ati"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["ati"]["tmp_name"],
                    "images/pic/ati/" . $_FILES["ati"]["name"]
                );
                echo "儲存於: " . "images/pic/ati/" . $_FILES["ati"]["name"] . "<br>";//上傳成功後提示上傳資訊
				$ati2=$_FILES["ati"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇檔案！<br>";//上傳失敗後顯示錯誤資訊
    }
	
	
	//限制圖片型別格式，大小
	if ((($_FILES["tti"]["type"] == "image/gif")
    	|| ($_FILES["tti"]["type"] == "image/jpeg")
    	|| ($_FILES["tti"]["type"] == "image/png")
        || ($_FILES["tti"]["type"] == "image/jpg"))
        && ($_FILES["tti"]["size"] < 200000000)) {
        if ($_FILES["tti"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["tti"]["error"] . "<br />";
        } else {
            echo "檔名: " . $_FILES["tti"]["name"] . "<br />";
            echo "檔案型別: " . $_FILES["tti"]["type"] . "<br />";
            echo "檔案大小: " . ($_FILES["tti"]["size"] / 1024) . " Kb<br />";
            echo "快取檔案: " . $_FILES["tti"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("images/pic/tti/" . $_FILES["tti"]["name"])) {
            	//echo $_FILES["tti"]["name"] . " already exists. ";
				echo $_FILES["tti"]["name"] . "上傳成功<br>";
				$tti2=$_FILES["tti"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["tti"]["tmp_name"],
                    "images/pic/tti/" . $_FILES["tti"]["name"]
                );
                echo "儲存於: " . "images/pic/tti/" . $_FILES["tti"]["name"] . "<br>";//上傳成功後提示上傳資訊
				$tti2=$_FILES["tti"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇檔案！<br>";//上傳失敗後顯示錯誤資訊
    }

	//限制圖片型別格式，大小
	echo $_FILES["mus"]["type"] . "<br>";
	if ((($_FILES["mus"]["type"] == "audio/mp3")
    	|| ($_FILES["mus"]["type"] == "audio/wav")
    	|| ($_FILES["mus"]["type"] == "audio/ogg")
        || ($_FILES["mus"]["type"] == "audio/wma"))
        && ($_FILES["mus"]["size"] < 200000000000000)) {
        if ($_FILES["mus"]["error"] > 0) {
        	echo "Return Code: " . $_FILES["mus"]["error"] . "<br />";
        } else {
            echo "檔名: " . $_FILES["mus"]["name"] . "<br />";
            echo "檔案型別: " . $_FILES["mus"]["type"] . "<br />";
            echo "檔案大小: " . ($_FILES["mus"]["size"] / 1024) . " Kb<br />";
            echo "快取檔案: " . $_FILES["mus"]["tmp_name"] . "<br />";

    //設定檔案上傳路徑，選擇指定資料夾

            if (file_exists("music/" . $_FILES["mus"]["name"])) {
            	//echo $_FILES["mus"]["name"] . " already exists. <br>";
				echo $_FILES["mus"]["name"] . "上傳成功<br>";
				$mus2=$_FILES["mus"]["name"];
            } else {
            	move_uploaded_file(
               		$_FILES["mus"]["tmp_name"],
                    "music/" . $_FILES["mus"]["name"]
                );
                echo "儲存於: " . "music/" . $_FILES["mus"]["name"] . "<br>";//上傳成功後提示上傳資訊
				$mus2=$_FILES["mus"]["name"];
            }
        }
	} else {
        echo "上傳失敗或未選擇檔案！<br>";//上傳失敗後顯示錯誤資訊
    }

$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="update member2 set bgi='$bgi2',ati='$ati2',tti='$tti2',mus='$mus2' where pid=$pid2";
//echo "rs=$rs<br>";
echo "上傳成功<br>";
$rs=$db->exec($rs);

if($title2!=''){
	$rs9="update member2 set title='$title2' where pid=$pid2";
	//echo "rs9=$rs9<br>";
	//echo "上傳成功<br>";
	$rs9=$db->exec($rs9);
}

echo "<br><a href=member_index.php?pid=$pid2>回小屋首頁</a>";

?>
<br>

</body>
</html>
<?php } ?>
