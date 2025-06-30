<?php
//本示例仅供参考

	//必须引入STLStats文件才能计算模型！
	include "STL/STLStats.php";
	
	//建议在这里加入过滤文件后缀，以免产生不可预料错误，本程序仅提供简单示例故没有加入。
	
	if ($_FILES["file"]["error"] > 0){
		echo "{\"message\":\"error\"}";//如果文件上传错误，返回一个错误的信号，上传错误多半是服务器设置的“最大上传文件大小”这个值太小，需要在php.ini修改。
	}else{
		$fileName="upload/" . time() . ".stl";
		move_uploaded_file($_FILES["file"]["tmp_name"], $fileName);//把文件持久化到硬盘
		
		//创建一个读取类，需要一个参数，表明要读取的文件
		$obj = new STLStats($fileName);
		//创建一个result数组，$obj->getVolume()即为获取stl文件的体积。单位mm3
		$result["volume"]=$obj->getVolume();
		
		//分别获取STL文件的长(width)宽(height)高(depth)，单位mm
		$box=$obj->getBBox();
		$result["width"]=$box["width"];
		$result["height"]=$box["height"];
		$result["depth"]=$box["length"];

		//获取STL文件模型的表面积，单位mm2
		$result["area"]=$obj->getArea();
		//插入一个键“file”，表明上传的文件名（给前端读模型的组件使用）
		$result["file"]=$fileName;
		$result["clientFile"]=$_FILES['file']['name'];
		//把结果变为json字符串，并且输出
		echo json_encode($result);
	}
?>