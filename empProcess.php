<?php
	require_once 'EmpService.class.php';
	$empService=new EmpService();
	
	if(!empty($_GET['flag'])){
		$id=$_GET['id'];
		
		if($empService->delEmpById($id)==1){
			header("Location: ok.php");
			exit();
		}else {
			header("Location: error.php");
			exit();
		}
	}
?>