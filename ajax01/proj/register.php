<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	#registerDiv{
		margin: 100px auto;
		width: 40%;
		padding-top: 30px;
		text-align: center;
		background: darkturquoise;
	}
	#registerDiv>h1{
		
	}
	.reForm{
		margin-top: 50px;
		padding-bottom: 50px;
	}
	#register{
		width: 90%;
		margin: 0 auto;
	}
	.reDiv{
		margin-bottom: 10px;
		position: relative;
	}
	.reDiv>span{
		position: absolute;
		right: 73%;
	}
</style>



<div id="registerDiv">
	<h1>立即注册</h1>
	<div  method="post" enctype="multipart/form-data" class="reForm">
		<div id="register">
			<div class="reDiv">
				<span>用户名：</span><input type="text" name="username" id="username" value="" placeholder="用户名"/>
				<span style="left: 70%;width: 30%; text-align: left;" id="userN"></span>
			</div>
			<div class="reDiv">
				<span>密码：</span><input type="text" name="password" id="password" value="" placeholder="密码"/>
				<span style="left: 70%;width: 30%; text-align: left;" id="passN"></span>
				
			</div>

		</div>
		<input id="sub" type="submit" value="立即注册"/>
	</div>
</div>
<script src="../JQuery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
	$("#username").blur(function(){
//		var str=$("#username").val();
//		console.log(str);
		$.ajax({
			type:"get",
			url:"userCheck.php",
			data:{
				username:$("#username").val()
			},
			success:function(data){
				$("#userN").html(data);
			},
			async:true
		});
	});
	$("#password").blur(function(){
//		var str=$("#username").val();
//		console.log(str);
		$.ajax({
			type:"get",
			url:"passCheck.php",
			data:{
				password:$("#password").val()
			},
			success:function(data){
				$("#passN").html(data);
			},
			async:true
		});
	})
	$("#sub").click(function(){
		$.ajax({
			type:"get",
			url:"sent.php",
			
			data:{
				username:$("#username").val(),
				password:$("#password").val()
			},
//			dataType:"json",
			success:function(data){
				alert(data);
			},
			error:function(errors){
				console.log("失败");
				console.log(errors);
			},
			
			async:true
		});
	});
</script>