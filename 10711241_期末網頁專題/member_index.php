<?php
	session_start();
?>

<?php
$pid2=$_GET['pid'];
echo $pid2;
echo "<input type=hidden name=pid value=$pid2>";


$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
$rs=$db->query($rs);
$rs->setFetchMode(PDO::FETCH_BOTH);
$row=$rs->fetch();
?>

<!DOCTYPE html>
<html lang="zh-TW">
   <head>
     <meta charset="utf-8">
     <title><?php echo $row['uid']; ?>的首頁</title>
     <style type="text/css">
     
         body{
			cursor:url(mouse/2.cur),url(mouse/2.png),auto;
			font-family:Microsoft JhengHei;
		 
        }
        
			
		img{
             width:100%;
             height:auto;
             margin:0;
		}	
         
         /*感覺是個好東西*/
         #main{
             margin:0 auto;
             border:0px #330000 solid;
             width:1000px;
             height:auto;
         }
             
         .menu{
             background-color: #FDC4CB;
             width:100%;
             height:50px;
             font-size:35px;
             
             padding-top:25px;
             padding-bottom:25px;
             margin-bottom:10px;
         }
         .music{
             width:40px;
             height:60px;
             visibility:hidden;
         }
         .article{
             z-index:9999;
             padding:50px;
             margin:10px 0;
         	 background-color:rgba(255,255,255,0.8);
         }
		.am{
             margin:10px 0;
			 position: absolute;
             z-index:0;
			 width:100%;
             height:auto;
		}

         p{
             cursor:url(mouse/1.cur),url(mouse/1.png),auto;
         }
         
        .dry{
			margin:10px 0;
			padding:15px 0;
             background-color:#FDE3E6;
             width:100%;
             height:100%;
		 }
         
         
         
         
         
         /*以下ok*/
         ul{
            list-style-type:none;
            margin:0;
            padding:0;
            width:100%;
            background-color:#FDE3E6;
            
            font-size:15px;
         }
         li a{
             display:block;
             color:#000;
             padding:10px 16px;
             text-decoration:none;
             
         }
         li a:visited{
             background-color:#FDE3E6;
             color:#000;
         }
         
         
         li a:hover{
             background-color:#F08080;
             color:white;
         }
         li a.active{
             background-color:#F08080;
             color:white;
             cursor:url(mouse/4.cur),url(mouse/4.png),auto;
         }
         li a:hover:not(.active){
             background-color:#F08080;
             color:white;
             cursor:url(mouse/4.cur),url(mouse/4.png),auto;
         }
         a{
             cursor:url(mouse/4.cur),url(mouse/4.png),auto;
         }
         
         
         /*回頂層*/
         ul.f{
            list-style-type:none;
            margin:10px 0;
            padding:0;
            width:100%;
            background-color:#F08080;
         }
         ul.f li a{
             display:block;
             color:#000;
             padding:10px 16px;
             text-decoration:none;
         }
         ul.f li a:hover{
             background-color:#555;
             color:red;
         }
         ul.f li a.active{
             background-color:#4CAF50;
             color:yellow;
         }
         ul.f li a:hover:not(.active){
             background-color:#F08080;
             color:white;
         }
         /*回頂層*/
         
         .header{
             background-image:url("images/74323682_p0_master1200.jpg");
			 
             width:1000px;
             height:200px;
             text-align:center;
             font-size:50px;
             margin:10px 0;
         }
         .footer{
             background-color:#FDC4CB;
             padding:10px;
             text-align:center;
			 margin-top:10px;
         }
		.bk{
		
             position: fixed;
             top:0;
			 right:0;
			 bottom:0;
			 left:0;
			 z-index:0;
             width:100%;
             height:auto;
		}

		 .mp{
             position: absolute;
             top:0;
			 right:0;
			 left:0;
			 margin:auto;
             width:1000px;
             height:auto;
         	 background-color:rgba(0,0,0,0.3);
			 
		 }
		 .row:after{
             content:"";
             display:table;
             clear:both;
         }
         .column{
             float:left;
             margin:10px 0;
             
         }
         .column.side{
             
             width:25%;
             height:auto;
             text-align: center;
         }
         .column.middle{
             
             width:75%;
             height:auto;
             
         }
         .fixed.gtp {
             position: fixed;
             bottom:0;
             right:0;
             width:150px;
         	 margin-right:10px;
		 }
		 .fixed.tp {
             position: fixed;
             z-index:9999;
			 top:0;
             right:0;
			 left:0;
             width:100%;
             background-color:#FDC4CB;
         }
		 
         .image {
             padding:5px 0;
             width:20%;
             float:left;
             
         }
		 .hphoto{
			width:auto;
			height:100px;
			margin:0px auto;
		 	
		 }
		 .hbor{
		 	border:1px white double;
			width:auto;
			height:100px;

		 }
         .word{
             position: absolute;
             top:0;
			 right:0;
			 bottom:0;
			 left:0;
			 margin:auto;
			width:50%;
			height:40%;
			 
             
             text-align:center;
             font-size:50px;
			 
         	 background-color:rgba(255,255,255,0.5);
         }
		 .bg{
			position: relative;
			margin:10px 0;
			width:100%;
			height:200px;
		 	overflow:hidden;
		 }
		 .bg.at{
			width:75%;
			height:100%;
		 	
		 }
         .pic{
             padding:20px 40px;
         }
		 .tpb{
			color:#ffffff;
			padding-left:100px;
			height:40px;
		 }
		 .tpb2{
		 	padding:7px 0;
		 }
         
         /*以上ok*/
      
     </style>  
   </head>
   <body class="back" onload="ShowTime()">

<?php
//$pid2=$_GET['pid'];
//echo $pid2;
//echo "<input type=hidden name=pid value=$pid2>";


//$db=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

//$db->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
//$rs="select * from member2 where pid=$pid2";
//echo "rs=$rs<br>";
//$rs=$db->query($rs);
//$rs->setFetchMode(PDO::FETCH_BOTH);
//$row=$rs->fetch();
?>



   <div id="main">
     <div class="bk">
		 <?php 
		 	if($row[bgi]!='')
		 		echo "<img src='images/pic/bgi/" . $row[bgi] . "'>";
		 ?>
	 
	 </div>
  <div class="mp">
  
   <div class="fixed tp"><!--頂端文字方塊-->
		<div class="tpb">
			<div class="tpb2">
			
				<a href="index.htm">首頁</a>
				<a href="http://web.nttu.edu.tw/phpmyadmin" style="padding-left:100px">資料庫編修</a>
				<a href="lotto.php" style="padding-left:50px">大樂透</a>
				<a href="train.php" style="padding-left:50px">火車票</a>
				
				
				
					<a href="re_logout.php" style="text-align:right;">登出</a>




			</div>
		</div>
   </div>
   <div class="row">
       <div class="header">
		  <div class="bg">
            	 <?php 
		 			if($row['tti']!='')
				 		echo "<img src='images/pic/tti/" . $row['tti'] . "'>";
				 ?>
			<div class="word">
		 		<?php	
					if($row['title']!='')
				 		echo $row['title'];
					else
						echo "NO TITLE";
				?>
			</div>
		  </div>
       </div>
       
       <div class="column middle">
           <div class="menu">
           <center>歡迎 !</center>
           </div>
		  
		  <div class="article">
           
			  <?php
			  //echo "<center><input type=button value=新增圖片 onclick=location.href='member_update_image.php?pid=$row[pid]'></center>";
			  ?>
			  <div style="width: 650px; word-break: break-word;">
			  
            	 <?php 
		 			if($row['aticle']!='')
				 		echo nl2br($row['aticle']) . "<br>";
				 ?>
			  </div>

		  <div class="pic">
            	 <?php 
		 			if($row['ati']!='')
				 		echo "<img src='images/pic/ati/" . $row['ati'] . "'>";
				?>
          	 </div>
          
         	 <div class="pic">
             	<?php
					
				?>
			 
			 </div>
              
		  </div>
       </div>
       
       <div class="column side">
           <div class="menu">
           <center>目錄</center>
           </div>
		   
		   <div class="dry"><!--會員基本資料-->

           		<center>>>基本資料<<</center><br>
				
				<div class="hphoto">
					<?php
		 				if($row['photo']!='')
							echo "<img class=hbor src='images/pic/pho/" . $row[photo] . "'>";
					?>
				</div>
				<?php
	echo "<br>";				
	echo "ID：" . $row['pid'] . "<br>";
	echo "帳號：" . $row['uid'] . "<br>";
	echo "姓名：" . $row['uname'] . "<br>";
	echo "電郵：" . $row['email'] . "<br>";
	echo "手機：" . $row['phone'] . "<br>";
	echo "性別：" . tgender($row['gender']) . "<br>";
	echo "生日：" . $row['birth'] . "<br>";

function tgender($g){
	if($g==0){
		$rg="女";
	} else {
		$rg="男";
	}
	return $rg;
}
				echo "<br>";
			   echo "<input type=button value=修改基本資料 onclick=location.href='member_update_data.php?pid=$row[pid]'>";
				?>
           </div>
		   
		   <div class="dry" style="width: 220px; padding: 15px; word-break: break-word;">
           		<center>>>自我介紹<<</center>
           <!--會員自我介紹-->
           			<?php
					
		   					echo nl2br($row['inter']) . "<br>";
					
		   			
			   				echo "<input type=button value=新增自我介紹 onclick=location.href='member_update_inter.php?pid=$row[pid]'>";
					?>
			</div>
			<div class="dry"><!--布置小屋-->
               <ul>
			   <li>
			   		<?php
			   		echo "<input type=button value=布置小屋 onclick=location.href='member_update_index.php?pid=$row[pid]'><br>";
			   		echo "<input type=button value=寫文章 onclick=location.href='re_aticle.php?pid=$row[pid]'>";
					?>
			   </li>
			   </ul>
			</div>
			<div class="dry"><!--音樂-->
       				<?php 
						echo ">>音樂<<" . "<br>";
						echo "<br>" . $row['mus'] . "<br>";
       					echo "<br><audio src='music/" . $row['mus'] . "' autoplay controls loop></audio>";
					?>
			</div>
       </div>
   </div>
   
   <div class="fixed gtp"><!--回頂層鍵-->
       <ul class="f">
           <li><a href="<?php 'member_index?uid=$uid2.php?pid=$row[pid]'?>"><center>回頂層</center></a></li>
       </ul>
   </div>
   
   <div class="footer"><!--頁尾-->
      <p></p> 
      <p></p> 
	   <?php
			$db_1=new PDO('mysql:host=localhost;dbname=u47;charset=utf8','u47','sd47');

			$db_1->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);
	
			$rs_1="select peocnt from member2 where pid=$pid2";
	
			$rs_1=$db->query($rs_1);
			$rs_1->setFetchMode(PDO::FETCH_BOTH);
			while($row_1=$rs_1->fetch()){
				echo "訪客人數：" . $row_1[peocnt] . "<br><br>";
				$cnt=$row_1[peocnt]+1;
				$rs2_1="update member2 set peocnt=$cnt where pid=$pid2";
	
				$rs2_1=$db->exec($rs2_1);
			}
		?>
		現在時間：
		<div id="showbox" ></div>
		<script language="JavaScript">
		function ShowTime(){
		　var NowDate=new Date();
		　var h=NowDate.getHours();
		　var m=NowDate.getMinutes();
		　var s=NowDate.getSeconds();　
		　document.getElementById('showbox').innerHTML = h+'時'+m+'分'+s+'秒';
		　setTimeout('ShowTime()',1000);
		}
		</script>
   </div>
  </div> 
   
   
   
   
   
   
   
   </div>
   </body>
</html>
