<?php
	//根据url的不同导航到不同的页面
	
	//var_dump($_SERVER);
	//判断数组中是否包含指定属性array_key_exists('PATH_INFO',$_SERVER)
	//
	$dir = 'main';//默认文件夹名称
	$filename = 'index';//默认文件名称
	if(array_key_exists('PATH_INFO',$_SERVER)){
		//获取URL中路径
		$path = $_SERVER['PATH_INFO'];
		//去掉第一个斜杠main/index
		$str = substr($path,1);
		//按照斜杠分隔目录名称和文件名称
		$arr = explode('/',$str);
		if(count($arr)==2){
			//覆盖默认的目录名称
			$dir = $arr[0];
			//覆盖默认的文件
			$filename = $arr[1];
		}else{
			//跳转到登陆页面
			$filename = 'login';
		}	
	}
	//嵌入一个子页面
	include('./views/'.$dir.'/'.$filename.'.html');	
	// include('./views/main/login.html');
?>