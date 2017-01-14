<?php 
	//获取时间
	date_default_timezone_set('PRC');
    echo date("Y年m月j日 H:i:s",time()); 
	include_once "../sqp.php";
	
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			body,html{
				margin: 0;
				padding: 0;
				background: #eee;
				text-align: center;
			}
			#bodys{
				margin: auto;
				text-align: left;
				padding: 20px 10px;
				width: 355px;
				/*height: 600px;*/
				border: 1px solid #aaa;
			}
			#content{
				width: 300px;
				height: 150px;
			}
			button{
				display: block;
				width: 90px;
				height: 30px;
				background: white;
			}
			#center{
				display: table;
			}
			#ccc{
				display: table-cell;
				vertical-align: middle;
			}
			ul{
				list-style-type: none;
				padding: 0;
				margin: 10px 0 0px;
				
			}
			li{
				text-indent: 30px;
				background: white;
				list-style: none;
				margin: 0;
				padding: 0;
				overflow: hidden;
				padding-right: 10px;
				border-bottom: 1px solid #ccc;
			}
			.right{
				text-align: right;
			}
		</style>
	</head> 
	<body>
		<input type="hidden" name="ids" id="ids" value="" />
		<div id="bodys">
			<div id="center">
				<span id="ccc">内容：</span>
				<textarea id="content" name="" rows="" cols=""></textarea>
				<button id="sub" onclick="sub()">提交</button>
			</div>
			<div>
				<input type="hidden" name="page" id="page" value="<?php echo $pages; ?>" />
			</div>
			<ul id="uls" data_id="ccc">	
				<!--<li class="parents">
					<p>sdajkdaha</p>
					<p>
					<p class='right'>
						<span>2016-3-10</span>
						顶：<a href='#' data_id="" onclick="" status="">0</a>
						踩：<a href='#' data_id="" onclick="">0</a>
						<a href="#" data_id="" onclick="" >删除</a>
					</p>
					</p>
				</li>-->
				<?php 
				    $query="select * from message order by mesTime DESC";
					$result=mysql_query($query);
					if(mysql_num_rows($result)){
						while($row=mysql_fetch_assoc($result)){
				?>
				<li class="parents">
					<p><?php echo $row["mesCon"];?></p>
					<p>
					<p class='right'>
						<span><?php echo $row["mesTime"];?></span>
						顶：<a href='#' data_id="" onclick="" status=""><?php echo $row["mesD"];?></a>
						踩：<a href='#' data_id="" onclick=""><?php echo $row["mesC"];?></a>
						<a href="#" data_id="" onclick="del()" >删除</a>
					</p>
					</p>
				</li>
				<?php
						}
					} 
				?>
			</ul>
		</div>
	</body>
	<script src="../JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		//data是 PHP 传过来的时间戳
//		function aaa(data){
//			var newDate=new Date();
//			console.log(newDate.getTime());
//			//php的时间戳是以秒为单位存的
//			//js的时间戳是以毫秒为单位存的
//			//把php的时间戳传到 js 要乘1000
//			newDate.setHours(data[0].times*1000);
//			console.log(newDate.getHours());
//		}
//		aaa();
		//提交添加留言
		function sub(){
			$.ajax({
				type:"get",
				url:"sub.php",
				data:{
					text:$("#content").val()
				},
				success:function(data){
					console.log(data);
//					console.log( JSON.parse(data) );
					var arr=JSON.parse(data);
					var li=$("<li class='parents'><p>"+arr[0]+"</p><p> <p class='right'><span>"+arr[1]+" </span>顶：<a href='#' data_id='' onclick='' status=''>"+arr[2]+"</a>踩：<a href='#' data_id='' onclick=''>"+arr[3]+"</a> <a href='#' data_id='' onclick='del()' >删除</a></p></p></li>");
					$("#uls").prepend(li);
				},
				async:true
			});
		}
		//删除留言
//		function
	</script>
</html>