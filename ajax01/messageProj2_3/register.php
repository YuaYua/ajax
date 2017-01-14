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
		width: 50%;
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
	<form action="register.php" method="post" enctype="multipart/form-data" class="reForm">
		<div id="register">
			<div class="reDiv">
				<span>用户名：</span><input type="text" name="username" id="username" value="" placeholder="用户名"/>
			</div>
			<div class="reDiv">
				<span>密码：</span><input type="text" name="password" id="password" value="" placeholder="密码"/>
			</div>

		</div>
		<input type="submit" value="立即注册"/>
	</form>
</div>

<?php
	include_once "sqp.php";
//	var_dump($_POST);
	if(!empty($_POST)){
		if(!empty($_POST["username"])){
			$name=$_POST["username"];
		}else{
			echo "用户名不能为空";
		}
		if(!empty($_POST["password"])){
			$pass=$_POST["password"];
		}else{
			echo "密码不能为空";
		}
		if(!empty($_POST["username"])&&!empty($_POST["password"])){
			$query="select name from user where name='$name'";
			$result=mysql_query($query);
			if(mysql_affected_rows()==0){
				$query="insert into user(name,password) values ('$name','$pass')";
				$result=mysql_query($query);
				if(mysql_affected_rows()==1){
//					echo "成功";
					header("location:login.php");
				}
			}else{
				echo "用户名已被使用";
			}
		}

	}
?>