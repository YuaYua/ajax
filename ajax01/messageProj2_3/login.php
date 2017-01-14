<?php
	$name="";
	$pass="";
//	session_start();
	//检测用户是否登录
	if(empty($_SESSION)){//检测 session 是不是空的
			//如果 session 为空 但上一次登陆用户选择了免登陆
		if(!empty($_COOKIE["username"])&&!empty($_COOKIE["password"])){
			$name=$_COOKIE["username"];
			$pass=$_COOKIE["password"];
			header("location:index.php");
		}
	}
?>

<style type="text/css">
	*{
		margin: 0;
		padding: 0;
	}
	#loginDiv{
		width: 100%;
		/*height: ;*/
		background: orange;
		padding: 5%;
	}
	#loginDiv>h1{
		margin-left: 5%;
	}
	#userDiv{
		margin-left: 5%;
		margin-top: 5%;
	}
	#userDiv>div{
		width:100%;
		margin-bottom: 5%;
		/*text-align: right;*/
	}
	#userDiv>div>span{
		text-align: right;
		display: inline-block;
		width: 20%;
	}
	#sub,#register{
		/*display: block;*/
		border-style: none;
		border: 1px solid black;
		border-radius: 5px;
		background: white;
		font-size: 20px;
		width: 70px;
		height: 30px;		
	}
	.regA{
		position: absolute;
		top: 212px;
		left: 200px;
	}
	#main{
		width: 30%;
		margin: 100px auto;
		position: relative;
	}
</style>
<div id="main">
	<form id="loginDiv" action="index.php" method="post" enctype="multipart/form-data">
		<h1>快速登录</h1>
		<div id="userDiv">
			<div>
				<span>用户名：</span><input type="text" name="username" id="username" value="<?php echo $name;?>" placeholder="用户名"/>
			</div>
			<div>
				<span>密码：</span><input type="text" name="password" id="password" value="<?php echo $pass;?>" placeholder="密码"/>	
			</div>
			<div>
				<input type="checkbox" name="unLogin" id="" value="" /><span style="width: 30%;text-align: left;">&nbsp;&nbsp;七天内免登陆</span>
			</div>
		</div>
		<div>
			<input type="submit" name="sub" id="sub" value="登录" />
	
		</div>
	</form>
	<a href="register.php" class="regA"><button id="register">注册</button></a>
</div>
