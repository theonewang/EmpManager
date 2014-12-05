<?php
	require_once 'SQLHelper.class.php';
	class EmpService{
		//一个函数可以获取多少页
		function getPageCount($pageSize){
			
			$sql="select count(id) from emp";
			$sqlHelper=new SQLHelper();
			$res=$sqlHelper->execute_dql($sql);
			
			if($row=mysql_fetch_row($res)){
				$pageCount=ceil($row[0]/$pageSize);
			}
			
			mysql_free_result($res);
			$sqlHelper->close_connect();
			return $pageCount;
		}
		
		function getEmpListByPage($pageNow,$pageSize){
			$sql="select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
			
			$sqlHelper=new SQLHelper();
			$res=$sqlHelper->execute_dql2($sql);
			
			//mysql_free_result($res);
			//$sqlHelper->close_connect();
			
			return $res;
		}
		
		//第二种分页方法
		function getFenyePage($fenyePage){
			
			$sqlHelper=new SQLHelper();
			//??????
			$sql1="select * from emp limit ".($fenyePage->pageNow-1)*$fenyePage->pageSize.",$fenyePage->pageSize";
			$sql2="select count(id) from emp";
			$sqlHelper->execute_dql_fenye($sql1, $sql2, $fenyePage);
			$sqlHelper->close_connect();
		}
		
		function delEmpById($id){
			$sql="delete from emp where id=$id";
			$sqlHelper=new SQLHelper();
			
			return $sqlHelper->execute_dml($sql);
		}
	}
?>