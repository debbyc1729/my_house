<html>
<head>
<meta charset="utf-8">
<title>會員註冊</title>
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
p
}
</style>

<!--點擊圖片可以更換驗證碼-->
<script>
       function refresh_code(){
           document.getElementById("imgcode").src="ppp.php";
       }
</script>


</head>
<body style="margin:10px">

<form onsubmit="alert('表單送出');" method="post" action="re_fv2.php" enctype="multipart/form-data">
帳號：
<input type="text" required pattern="[0-9a-zA-Z]{4,8}" name="uid">
<span class="ok">ok</span>
<br>
密碼：
<input type="password" required pattern="[0-9a-zA-Z]{8,16}" name="pwd">
<span class="ok">ok</span>
<br>
姓名：
<input type="text" required name="uname">
<span class="ok">ok</span>
<br>
大頭貼：:<input type="file" name="pho" id="file">
<br>
電郵：
<input type="email" required name="email">
<br>
電話：
<input type="text" pattern="[0-9]{8,10}" name="phone">
<br>
性別：
	男<input type="radio" value="1" name="gender" required>
	女<input type="radio" value="0" name="gender" required>
<br>
生日：
<!--
<select required name="byear">
	<option value=""></option>
	<option value="1999">1999</option>
	<option value="2000">2000</option>
	<option value="2001">2001</option>
</select>
-->
<input type="date" name="birth">
<br>

<!--樓下是圖形驗證碼-->
<!--把ppp.php當圖片使用-->
<img id="imgcode" src="ppp.php" width="200px" onclick="refresh_code()">
點擊圖片可以更換驗證碼<br>
<!--樓下這一句是為了確認使用者點了提交按鈕-->
<input type="hidden" name="click" value="1">
<!--樓下是使用者輸入驗證碼的地方-->
<input type="text" name="checkCode">
<br>

<input type="submit" value="送出">
</form>
<br>
<a href="re_login.php">點這裡登入</a><br><br>
</body>
</html>

