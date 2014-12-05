<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<h1>雇员管理系统</h1>
<form action="LoginProcess.php" method="post">
<table>
<tr><td>用户id</td><td><input type="text" name="id" /></td></tr>
<tr><td>密码</td><td><input type="password" name="password"/></td></tr>
<tr>
<td><input type="submit" value="用户登录"/></td>
<td><input type="reset" value="重新填写"/></td>
</tr>
</table>
</form>
<?php 
if(!empty($_GET['errno'])){
	$errno=$_GET['errno'];
	if($errno==1){
		echo '用户信息填写错误';
	}
}
?>
</html>