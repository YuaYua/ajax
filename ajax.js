document.getElementById("btn").onclick = function(){
			alert("ccc");
			var names = document.getElementById("name").value;
			var pass = document.getElementById("password").value;
			
			ajax({
				type:"post",
				url:"login.php",
				data:{
					names :names,
					password:pass
				},
				success:function(data){
					alert(data);
				},
				error:function(data){
					alert("ccc"+data);
				}
			})
		}
		
		function path(data,url,type){
			//定义一个空数组
			var arr = [];
			//对data对象进行forin循环
			for(var key in data){
				//将每一个参数与值对应的储存在一个数组单元中（name=lck）的形式
				arr.push(key+"="+data[key]);
			}
			if(type=="post"){
				return arr.join("&");
			}else{
				var path = url+"?"+arr.join("&");
				return path;
			}	
		}
	
		function ajax(obj){
			var ajax = "";
			if(window.XMLHttpRequest){
				ajax = new XMLHttpRequest();
			}else{
				ajax = new ActiveXObject("Microsoft.XMLHTTP");
			}
			//GET
			if(obj.type.toLowerCase() =="get"){
				//url = "login.php?name=lck&password="333"
				var url = path(obj.data,obj.url,"get");
				ajax.open("GET",url,true);
				ajax.send();
			}else if(obj.type.toLowerCase() =="post"){
//				var url = "login.php"
				ajax.open("POST",obj.url,true);
				ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
				var data = path(obj.data,obj.url,"post");
				//name=lck&password="333";
				ajax.send(data);
			}
			ajax.onreadystatechange = function(){
				if(ajax.readyState == 4){
					if(ajax.status == 200){
						if(obj.success){
							obj.success(ajax.responseText);
						}
					}else{
						if(obj.error){
							obj.error(ajax.status);
						}
					}
				}
			}
		}