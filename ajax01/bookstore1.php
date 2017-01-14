<?php 
	    $db=mysql_connect("localhost","root","");
	    mysql_select_db("php");
	    mysql_query("set names utf8");
?>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css"/>
<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	ul{
		list-style-type: none;
	}
	a{
		text-decoration: none;
		color: #8A8A8A;
	}
	#headbar{
		width: 90%;
		padding:0 5%;
		background: #222222;
		position: fixed;
		z-index: 1;
		top: 0;
	}
	#header{
		width: 100%;
		/*height: 80px;*/
	}
	.headUl{
		width: 70%;
		float: left;
	}
	.headUl:after{
		content: "";
		display: block;
		clear: both;
	}
	.headUl>li{
		float: left;
		width: 10%;
		height: 80px;
		
	}
	.headUl>li>a{
		width: 100%;
		display: block;
		text-align: center;
		line-height: 80px;
		color: #8A8A8A;
	}
	.headUl>li>a:hover{
		color:white;
		background: #080808;
	}
	.userinfo{
		width: 30%;
		float: right;
		margin-top: 32px;
	}
	#header:after{
		content: "";
		display: block;
		clear: both;
	}
	
	#box{
		position: relative;
		width: 70%;
		margin: 80px auto;
	}
	#bigImg {
		/*max-width: 790px;*/
		width: 100%;
		background: #EEEEEE;
		padding-top: 70px;
		padding-left: 60px;
		box-sizing: border-box;
	}
	#bigImg>img{
		width: 90%;
		margin-top: 4%;
		margin-bottom: 10%;
	}
	
	#show {
		list-style-type: none;
		/*width: 850px;*/
		width: 100%;
		margin-top: 50px;
		height: 725px;
	}
	#show:after{  
     	content:".";  
     	height:0;  
     	visibility:hidden;  
     	display:block;  	
     	clear:both;  
	}
	
	#showlist {
		width: 30%;
		height: 390px;
		border: 1px solid gainsboro;
		position: relative;
		border-radius: 3px;
		box-sizing: border-box;
		margin-right: 5%;
		margin-bottom: 20px;
		float: left;
		text-align: center;
	}
	#show>#showlist:nth-child(3n){
		margin-right: 0;
	}
	
	#showlist>img {
		width: 80%;
		/*height: 77%;*/
		/*position: absolute;*/
		/*left: 0;
		right: 0;*/
		margin: auto;
	}
	
	#bookname {
		/*position: absolute;
		bottom: 15%;
		left: 5%;*/
		margin: 3%  auto;
		font-size: 2em;
		text-overflow: ellipsis;
		width: 93%;
		height: 30px;
		white-space: nowrap;
		overflow: hidden;
	}
	#showlist>div{
		text-align: left;
		padding: 2% 5%;
		width: 90%;
	}
	#showlist>div:after{
		content: "";
		display: block;
		clear: both;
	}
	
	#price {
		/*position: absolute;
		bottom: 5%;
		left: 5%;*/
		font-size: 20px;
	}
	
	.buy {
		float: right;
		background: #46BA5F;
		/*display: inline-block;*/
		border-style: hidden;
		width: 80px;
		height: 35px;
		text-align: center;
		line-height: 35px;
		color: white;
		border-radius: 3px;
	}
	
</style>
<div id="headbar">
	<div id="header">
		<ul class="headUl">
			<li><a href="#">书吧</a></li>
			<li><a href="bookstore.php">网站首页</a></li>
			<li><a href="#">关于我们</a></li>
			<li><a href="#">图书展示</a></li>
			<li><a href="#">联系我们</a></li>
			<li><a href="#">购物车</a></li>
			<li><a href="insertBook.php">添加图书</a></li>
		</ul>
		<div class="userinfo" style="color: white;">
			<?php
				session_start();
			?>
			<a href="#">
				<?php 
					if(!empty($_SESSION)){
						echo $_SESSION["username"]; 
					}else{
						echo "未登录";
					}
				?>
			</a>
			<a href="destroy.php">注销</a>
		</div>
	</div>
</div>
<img src="../../php/php_03/review/img/1_160309182332_1.jpg"/>
<div id="box">
	<div id="bigImg">
		<h1>我的书城</h1>
		<h3>这里拥有世界各地的书籍，只有你想不到，没有我们这里没有的书籍</h3>
		<img src="bookstore img/bigImg.png" />
	</div>
	<?php 	
	    	define('PAGESIZE', 6);
	    $page=0;
	    if(isset($_GET["page"])){
	    		$page=$_GET["page"];
	    } 
		$query="select count(bookId) from book";
		$result=mysql_query($query);
		$row=mysql_fetch_row($result);
		$count=$row[0];
		$pages=ceil($count/PAGESIZE); 
	?>
	
	<ul id="show">
		<!--<?php 
		  if(mysql_num_rows($result)){
	     	while($row=mysql_fetch_assoc($result)){
	    ?>
		<li id="showlist">
			<img src="bookstore img/<?php echo $row["pic"]?>"/>
			<h4 id="bookname"><?php echo $row["bookName"]?></h4>
			<div>
				<span id="price">￥
					<span id="">
						<?php echo $row["price"];?>
					</span>
				</span>
				<a href="bookinfo.php?bookid=<?php echo $row['bookId']?>">
					<button class="buy">
						立即购买
					</button>
				</a>
				
			</div>
		</li>
		<?php 	
	    		 }
	      }  
	    ?>-->
	</ul>
</div>
<nav style="text-align: center;">
	  <ul class="pagination">
	  	<?php 
		    for ($i=0; $i < $pages; $i++) { 
		?>
			<li>
				<a class="pageA"><?php 
					    $num=$i+1;
					    echo $num; 
					?></a>
			</li>
		<?php 
		    } 
		?>
	  </ul>
</nav>
<br />
<br />
<br />
<br />
<script src="JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	var str="page="+0;
	function aa(str){
		//创建ajax对象
		var ajax=false;
		if(window.XMLHttpRequest){
			ajax=new XMLHttpRequest();
		}else{
			ajax=new ActiveXObject("Microsoft.XMLHTTP");
		}
		//创建请求
		ajax.open("post","bookstore.php");
		//发送请求
		ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		//发送页数
		ajax.send(str);
		//绑定状态改变的方法
		ajax.onreadystatechange=function(){
			//判断请求状态
			if(ajax.readyState==4){
				succ(ajax.responseText);
			}
		}
		function succ(data){
//			console.log(data);
			var arr=JSON.parse(data);
			console.log(arr);
			for(var i=0;i<arr.length;i++){
				var li=$('<li id="showlist"><img src="bookstore img/'+arr[i].pic+'"/><h4 id="bookname">'+arr[i].bookName+'</h4><div><span id="price">￥<span>'+arr[i].price+'</span></span><a><button class="buy">立即购买</button></a></div></li>');
				$('#show').append(li);
//				console.log(li);
			}
		}
	}
	aa(str);
	$('.pageA').click(function(){
		str="page="+($(this).text()-1);
		console.log(str);
		$('#show').html("");
		aa(str);
	});
</script>
