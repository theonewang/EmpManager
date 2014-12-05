<?php
	require_once 'SQLHelper.class.php';
	class AdminService{
		
		public function  checkAdmin($id,$password){
			$sql="select password,name from admin where id=$id";
			
			$sqlHelper=new SQLHelper();
			$res=$sqlHelper->execute_dql($sql);
			if($row=mysql_fetch_assoc($res)){
				if(md5($password)==$row['password']){
					return true;
				}
			}
			
			mysql_free_result($res);
			$sqlHelper->close_connect();
			return false;
		}
	}
?>