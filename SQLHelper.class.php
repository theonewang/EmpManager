<?php
	class SQLHelper
	{
		public $conn;
		public $dbname="empmanager";
		public $username="root";
		public $password="201212";
		public $host="localhost";
		
		public function __construct(){
			$this->conn=mysql_connect($this->host,$this->username,$this->password);
			if(!$this->conn){
				die("链接失败".mysql_error());
			}/* else {
				echo "链接成功";
			} */
			
			$select=mysql_select_db($this->dbname,$this->conn);
			if(!$select)
			{
				echo "选择数据库失败";
			}
		}
		
		public function execute_dql($sql){
		
			$res=mysql_query($sql,$this->conn) or die(mysql_error());
			return $res;
			//mysql_close($this->conn);
		}
		
		public function execute_dql2($sql){
			
			$arr=array();
			$res=mysql_query($sql,$this->conn) or die(mysql_error());
			$i=0;
			
			while($row=mysql_fetch_assoc($res)){
				$arr[$i++]=$row;
			}
			mysql_free_result($res);
			return $arr;
			//return $res;
			//mysql_free_result($res);
			//mysql_close($this->conn);
		}
		//sql1 select *from limit
		//sql2 select count(id)...
		public function execute_dql_fenye($sql1,$sql2,$fenyePage){
			$res=mysql_query($sql1,$this->conn) or die(mysql_error());
			$arr=array();
			while($row=mysql_fetch_assoc($res)){
				$arr[]=$row;
			}
			mysql_free_result($res);
			
			$res2=mysql_query($sql2,$this->conn) or die(mysql_error());
			
			if($row=mysql_fetch_row($res2)){
				$fenyePage->pageCount=ceil($row[0]/$fenyePage->pageSize);
				$fenyePage->rowCount=$row[0];
			}
			
			if($fenyePage->pageNow>1){
				$prePage=$fenyePage->pageNow-1;
				$navigate="<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
			}
			if($fenyePage->pageNow<$fenyePage->pageCount){
			$nextPage=$fenyePage->pageNow+1;
			$navigate.="<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
			}
			
			$fenyePage->res_array=$arr;
			$fenyePage->navigate=$navigate;
			
		}
		
		public function execute_dml($sql){
			$b=mysql_query($sql,$this->conn) or die(mysql_error());
			if(!$b){
				return 0;
			}else {
				if(mysql_affected_rows($this->conn)>0){
					return 1;//表示执行ok
				}else {
					return 2;//表示没有行受到影响
				}
			}
		}
		
		public  function close_connect(){
			if(!empty($this->conn)){
				mysql_close($this->conn);
			}
		}
	}
?>