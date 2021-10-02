<html>
<head>
<meta charset="utf-8">
<title>登入</title>
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

<!--點擊圖片可以更換驗證碼-->
 <script>
      function refresh_code(){
          document.getElementById("imgcode").src="ppp.php";
      }
</script>


</head>
<body style="margin:10px">

<form method="post" action="re_login2.php">
帳號：
<input type="text" required name="uid">
<span class="ok">ok</span>
<br>
密碼：
<input type="password" required name="pwd">
<span class="ok">ok</span>
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
<br><a href="re_fv.php">會員註冊</a><br>
</body>
</html>

