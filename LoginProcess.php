<?php
	require_once 'AdminService.class.php';
	$id=$_POST['id'];
	$password=$_POST['password'];
	
	$adminService=new AdminService();
	

	if($adminService->checkAdmin($id, $password)/* $id=="100"&&$password=='admin' */){
		header("Location: empManage.php");
		exit();
	}else {
		header("Location: Login.php?errno=1");
		exit();
	}
?>