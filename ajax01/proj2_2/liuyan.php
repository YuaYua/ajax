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
				<li class="parents">
					<p></p>
					<p>
					<p class='right'>
						<span></span>
						顶：<a href='#' data_id="" onclick="" status=""></a>
						踩：<a href='#' data_id="" onclick=""></a>
						<a href="#" data_id="" onclick="del()" >删除</a>
					</p>
					</p>
				</li>
			</ul>
		</div>
	</body>
	<script src="../JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		//提交添加留言
		function sub(){
			$.ajax({
				type:"get",
				url:"add.php",
				data:{
					content:$("#content").val(),
				},
				dataType:"json",
				success:function(data){
					console.log("success");
					console.log(data);
					var times=data.mesTime*1000;
					var newDate=new Date();
					newDate.setTime(times);
					var dates = newDate.getFullYear()+'年'+ling(newDate.getMonth()+1)+'月'+ling(newDate.getDate())+'日'+ling(newDate.getHours())+':'+ling(newDate.getMinutes())+':'+ling(newDate.getSeconds());
					console.log(dates);
					var liObj=$("<li class='parents'><p>"
					+data.mesCon+
					"</p><p> <p class='right'><span>"
					+dates+
					"</span>顶：<a href='#' data_id='' onclick='' status=''>"
					+data.mesD+
					"</a>踩：<a href='#' data_id='' onclick=''>"
					+data.mesC+
					"</a> <a href='#' data_id='' onclick='del()' >删除</a></p></p></li>");
					$("#uls").prepend(liObj);
					var h=liObj.height();
					liObj.height(0);
					liObj.animate({
						height:h
					});
					//当列表数大于6条时，去除最后一条
					if($("#uls li").length==6){
						$("#uls li:last-child").animate({
							height:0
						},function(){
							$("#uls li:last-child").remove();
						})
					}
					
				},
				error:function (errors){
					console.log("fail");
					console.log(errors);	
				},
				
				async:true
			});
		}
		function ling(num){
			var str="";
			if(num<10){
				str="0"+num;
				return str;
			}else{
				return num;
			}
			
		}
//		var li=$("<li class='parents'><p>"+arr[0]+"</p><p> <p class='right'><span>"+arr[1]+" </span>顶：<a href='#' data_id='' onclick='' status=''>"+arr[2]+"</a>踩：<a href='#' data_id='' onclick=''>"+arr[3]+"</a> <a href='#' data_id='' onclick='del()' >删除</a></p></p></li>");
		//
	</script>
</html>