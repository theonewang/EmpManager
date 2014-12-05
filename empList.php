<?php
    header("content-type:text/html;charset=utf-8");
	require_once 'EmpService.class.php';
	require_once 'FenyePage.class.php';
	
	$empService=new EmpService();
	
	$fenyePage=new FenyePage();
	$fenyePage->pageNow=1;
	$fenyePage->pageSize=6;
	
// 	$pageSize=6;
// 	$rowCount=0;
// 	$pageNow=1;
	
	if(!empty($_GET['pageNow'])){
		$fenyePage->pageNow=$_GET['pageNow'];
	}
	
	$empService=new EmpService();
	//$pageCount=$empService->getPageCount($pageSize);
	
	$res2=$empService->getFenyePage($fenyePage);
	
	echo "<table border='1px' bordercolor='green' cellpadding='0px' >";
	echo "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>操作1</th><th>操作2</th></tr>";
	
// 	while($row=mysql_fetch_assoc($res2)){
// 		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
		
// 	}
	for($i=0;$i<count($fenyePage->res_array);$i++){
		$row=$fenyePage->res_array[$i];
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a onclick='return confirmDele({$row['id']})'href='empProcess.php?flag=del&id={$row['id']}'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
	}
	echo "<h1>雇员信息列表</h1>";
	echo "</table>";
	
// 	if($fenyePage->pageNow>1){
// 		$prePage=$fenyePage->pageNow-1;
// 		echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
// 	}
// 	if($fenyePage->pageNow<$fenyePage->pageCount){
// 		$nextPage=$fenyePage->pageNow+1;
// 		echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
// 	}
	
	echo $fenyePage->navigate;
	
// 	echo "<a href='#'><<</a>&nbsp;&nbsp;";
// // 	echo "<a href='#'>[1]</a>";
// // 	echo "<a href='#'>[2]</a>";
// // 	echo "<a href='#'>[3]</a>";
// // 	echo "<a href='#'>[4]</a>";
// // 	echo "<a href='#'>[5]</a>";
// 	$start=floor(($pageNow-1)/10)*10+1;
// 	$index=$start;
// 	for(;$start<$index+10;$start++){
// 		echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
// 	}
// 	echo "<a href='#'>>></a>";
	
// 	echo "当前页{$pageNow}/共{$pageCount}页";
	
// 	echo "<br/><br/>";	
?>

<form action="empList.php">
跳转到：<input type="text" name="pageNow"/>
<input type="submit" value="GO">
</form>
<?php 
//mysql_free_result($res2);
//mysql_close($conn);
?>